

<?php


    include_once '../../../application/lib_glob_const/libval.php';


    if( isset($_GET['ajaxSend']) || isset($_POST['ajaxSend']) && GETPOST('security') != "")
    {
        $security = GETPOST('security');
        if( $security == md5('PRINCIPAL_VISTAS_GESTIONINVENTARIO_APP') )
        {

            $accion = GETPOST('accion');

            switch ( $accion )
            {

                case 'login_start':

                    session_start();

//                    if( isset($_SESSION['is_open']) && $_SESSION['is_open'] == 1 )
//                    {
//                        session_unset();
//                        session_destroy();
//                    }

                    $info_users = 0;
                    $error = '';
                    $ini_session = 0;

                    $admin_usuario = GETPOST('usu') ;
                    $admin_pass    = GETPOST('pass');


                    #Si la infomacion es correcto return un Array
                    #Si la informacion es incorrecta return un String
                    $ini_session = ENTERPRISE_ENTITY_LOGIN($admin_usuario , $admin_pass);

                    if(is_array($ini_session))
                    {
                        #USUARIO Y PASSWORD INCORRECTOS
                        if( (int)$ini_session['id'] == 2)
                        {

                            $info_users = $ini_session['S_admin'];

                            $_SESSION['is_open']        = true;
                            $_SESSION['nom_usuario']    = $ini_session['nom_usuario'];
                            $_SESSION['S_admin']        = $ini_session['S_admin']; #Si en caso es Super Usuario o Usuario Normal
                            $_SESSION['company']        = $ini_session['company'];
                            $_SESSION['entity']         = $ini_session['entity'];

                            if( !isset($_SESSION['is_open']) )
                            {
                                session_unset();
                                session_destroy();
                                $error = 'Ocurrio un error intentelo de nuevo';
                            }

                        }

                    }
                    else{
                        $error = $ini_session;
                    }

                    $output = [
                        'error'               => $error ,
                        'info_spusers_admin'  => $info_users #si en caso es super usuario 1 o nomral 0
                    ];

//                    print_r($output); die();

                    echo json_encode($output);

                    break;

                #CERRAR SESION
                case 'close_session':

                    $error = '';
                    session_start();
                    session_unset();
                    session_destroy();

                    if( isset( $_SESSION['is_open'] )){

                        $error = 'Ocurrio un error intentelo de nuevo';
                    }

                    $output = [
                        'error' => $error
                    ];

                    echo json_encode($output);

                    break;

                case 's_admin_enterprise': #se usa para iniciar sesion con Desarrolladores o Soporte

                    $error = '';

                    session_start();

                    if(isset($_SESSION['is_open']))
                    {
                        if( isset($_SESSION['S_admin']) && !empty(GETPOST('entity')) )
                        {

                            #super administrador
                            if($_SESSION['S_admin'] == 1)
                            {
                                $entity              = GETPOST('entity');
                                $_SESSION['company'] = reconnectarEntity($entity);  #retorna el objeto de la entidad que se seleccino
                                $_SESSION['entity']  = $entity;

                            }else{

                                $error = 'Ud. No tiene <b>Permisos</b> para acceder al sistema';
                            }

                        }else{

                            session_start();
                            session_unset();
                            session_destroy();
                            $error = 'Ocurrio un error con el usuario';
                        }

                    }else{

                        session_start();
                        session_unset();
                        session_destroy();
                        $error = 'Ocurrio un error de Privilegios';
                    }


                    $output = [
                        'error' => $error
                    ];

                    echo json_encode($output);


                    break;

            }


        }else{

            $output = [
                'error' => 'Ocurrio un error de privilegios'
            ];

            echo json_encode($output);
        }


    }


#SE BUSCA LA EMPRESA POR EL LOGIN DEL USUARIO
function ENTERPRISE_ENTITY_LOGIN( $usuario_text = '' , $password_text = '' )
{

    include_once DOCUMENT_ROOT.'/application/config/conneccion/connecion.lib.php';

    $permmis = json_decode( file_get_contents(DOCUMENT_ROOT.'/application/config/conneccion/credentials.json') , true);

    $ObtenerConn = new connecion_lib();

    #parametros de coneccion
    $ObtenerConn->hots           = $permmis['host'];
    $ObtenerConn->Usuario        = $permmis['usuario'];
    $ObtenerConn->Password       = $permmis['password'];
    $ObtenerConn->database       = $permmis['database'];

    $cnn = $ObtenerConn->connect(); #obtengo la connecion Mysql

    $usuario_text  = $cnn->real_escape_string($usuario_text);
    $password_text = $cnn->real_escape_string($password_text);


    #SE BUSCA EL USUARIO
    $sql  = "SELECT     
                        usu            as nom_usuario,
                        pass           as password,
                        -- 1 = super admin
                        fk_type_users  as typeusers , 
                        entity
                     FROM 
                     gst_enterprise_login lg 
                     where 
                     lg.usu = '$usuario_text' 
                     and pass = '". (base64_decode($password_text)) ."' ";
    $rs   = $cnn->query($sql);
//    echo '<pre>'; print_r($sql); die();
    if($rs && $rs->num_rows == 1)
    {
        $InfoEnterprise = array(); #Se crea una matriz de associativa para obtener la informacion de  ese usuario y aque empresa pertenece

        while ($objusers = $rs->fetch_array())
        {

            $sqlEnterp  = 'SELECT * FROM gst_enterprise_entity WHERE entity = '. $objusers['entity'] .'  limit 1';
            $resul      = $cnn->query($sqlEnterp);
            if(!$resul){

                return 'Ocurrio un error con la Operacion , Consulte con Soporte para resolver su problema';

            }elseif($resul && $resul->num_rows == 0){

                return 'Ocurrio un error no se encontro entity usuario , consulte con Soporte';

            }elseif($resul && $resul->num_rows >= 2){ #no puede tener dos entidades asociadas a una misma empresa

                return 'Ocurrio un problema de usuario, Consulte con Soporte';
            }
            else{

                $designio = null;
                $entity   = null;

                if($objusers['typeusers'] == 0){ #usuario normal
                    #Se envia el objeto de la compania si en caso exite
                    $designio = $resul->fetch_object();
                    $entity   = $designio->entity;
                }
                if($objusers['typeusers'] == 1){#super usuario o  Desarrollador
                    $designio = [];
                    $entity = null;
                }

                /*
                 *
                 * typeusers = 0       usuario que maneja solo una empres
                 * typeusers = 1       usuario o Desarrollador que tiene privilegios a todas las empresas
                 *
                 * */



                $InfoEnterprise = array(

                    'id'            => '2'             ,
                    'nom_usuario'   => $usuario_text   ,
                    'password'      => $objusers['password']  ,
                    'S_admin'       => $objusers['typeusers'] , #si es 1 todos los privilegios asignados
                    'company'       => $designio ,
                    'entity'        => $entity
                );

//                print_r($InfoEnterprise); die();

                return $InfoEnterprise;
            }

        }

    }else{

        return  'Usuario no encontrado';
    }


}

#Se usa para administra las compañias super administrados
function reconnectarEntity($entity = null)
{
    if($entity != null)
    {

        include_once DOCUMENT_ROOT.'/application/config/conneccion/connecion.lib.php';

        $permmis = json_decode( file_get_contents(DOCUMENT_ROOT.'/application/config/conneccion/credentials.json') , true);

        $ObtenerConn = new connecion_lib();

        #parametros de coneccion
        $ObtenerConn->hots           = $permmis['host'];
        $ObtenerConn->Usuario        = $permmis['usuario'];
        $ObtenerConn->Password       = $permmis['password'];
        $ObtenerConn->database       = $permmis['database'];

        $cnn = $ObtenerConn->connect(); #obtengo la connecion Mysql

        if($cnn)
        {

            $sql = "SELECT * FROM gst_enterprise_entity where entity = $entity limit 1";
            $rs  = $cnn->query($sql);

            #no puede haber entidades repetidas
            if($rs && $rs->num_rows == 1)
            {
                $objetoMain = $rs->fetch_object();
                return $objetoMain;
            }
        }

    }
}

?>