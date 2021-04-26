
<?php


    include_once '../../../application/lib_glob_const/libval.php';

    if( isset($_GET['ajaxSend']) || isset($_POST['ajaxSend']) && (GETPOST('security') != "" && GETPOST('security') == KEY_SECURITY ) == true )
    {

        session_start();

        include_once DOCUMENT_ROOT .'/application/lib.ini.php';

        $accion = GETPOST('accion');

        switch ($accion)
        {

            case 'registrarterceros': //crear o modifcar Tercero

                $idTercero                  = GETPOST('idTercero');
                $subaccionTercero           = GETPOST('subaccion');

                $ft_nomape                  = GETPOST("ft_nomape");
                $ft_identificacion          = GETPOST("ft_identificacion");
                $ft_codcliente              = GETPOST("ft_codcliente");
                $ft_telefono                = GETPOST("ft_telefono");
                $ft_email                   = GETPOST("ft_email");
                $ft_tipoCliente             = GETPOST("ft_tipoCliente");
                $ft_tipoProveedor           = GETPOST("ft_tipoProveedor");
                $ft_pais                    = GETPOST("ft_pais");
                $ft_provincias              = GETPOST("ft_provincias");
                $ft_ciudad                  = GETPOST("ft_ciudad");
                $ft_direccion               = GETPOST("ft_direccion");

                $datos = [
                    "ft_nomape"             => $ft_nomape   ,
                    "ft_identificacion"     => $ft_identificacion,
                    "ft_codcliente"         => $ft_codcliente ,
                    "ft_telefono"           => $ft_telefono ,
                    "ft_email"              => $ft_email ,
                    "ft_tipoCliente"        => $ft_tipoCliente ,
                    "ft_tipoProveedor"      => $ft_tipoProveedor  ,
                    "ft_pais"               => $ft_pais ,
                    "ft_provincias"         => $ft_provincias ,
                    "ft_ciudad"             => $ft_ciudad ,
                    "ft_direccion"          => $ft_direccion
                ];

                if($subaccionTercero == 'nuevo'){
                    $error = (createRegistroTerceros( $datos )==true) ? "" : "Ocurrio un error, No se pudo crear el Tercer consulte con soporte o vuelva a intentarlo";
                }
                if($subaccionTercero == 'modificar'){
                    $error = (UpdateRegistroTerceros( $datos , $idTercero )==true) ? "" : "Ocurrio un error, No se pudo Modificar el Tercer consulte con soporte o vuelva a intentarlo";
                }

                $output = [
                    'error' => $error
                ];

                echo json_encode($output);
                break;

            case 'fetchTerceros':

                $error = '';

                $fetchTercero = array();
                $idTercero = GETPOST("idtercero"); 

                $query = "select * from gst_terceros where rowid = ".$idTercero;
                $result = $db->query($query);
                if($result && $result->num_rows > 0){
                    $fetchTercero = ($result->fetch_all(MYSQLI_ASSOC));
                }

                $output = [
                    'error' => $error,
                    'fetch' => $fetchTercero[0]
                ];

                echo json_encode($output);
                break;

            case 'terceroslist':

                $error = "";
                $data = [];
                $sql = "SELECT rowid,  nom , identificacion , t_cliente , t_proveedor, telefono , direccion  FROM gst_terceros";
                $rs = $db->query($sql);
                if($rs&&$rs->num_rows>0){
                    while ($ob = $rs->fetch_object()){

                        $t_tercero = [];

                        if($ob->t_cliente==1)
                            $t_tercero[]="<span class='badge badge-pill badge-danger' style='font-size: 0.77rem'>Cliente</span>";

                        if($ob->t_proveedor==1)
                            $t_tercero[]="<span class='badge badge-pill badge-success' style='font-size: 0.77rem' >Proveedor</span>";


                        $row = [];
                        $row[] = $ob->identificacion;
                        $row[] = $ob->nom;
                        $row[] = implode('&nbsp;',$t_tercero);
                        $row[] = $ob->telefono;
                        $row[] = $ob->direccion;
                        $row[] = "";
                        $row[] = $ob->rowid;
                        $data[] = $row;

                    }
                }else{
                    $error = "No hay datos en la tabla";
                }

                $output = [
                    'msg'   => $error,
                    'data'  => $data ,
                ];

                echo json_encode($output);
                break;
        }
    }else{

        if(GETPOST('security') != KEY_SECURITY){

            $error = "Ocurrio un error de permisos";

            $output = [
                'error' => $error
            ];

            echo json_encode($output);
        }
    }


    function createRegistroTerceros( $datos ){

        global  $db;

        $sql = "INSERT INTO gst_terceros (`nom`, `identificacion`, `cod_cliente`, `telefono`, `email`, `t_proveedor`, `t_cliente`, `fk_pais`, `fk_provincia`, `fk_ciudad`, `direccion`) ";
        $sql .= " VALUES (";
        $sql .= " '". $datos['ft_nomape'] ."' ";
        $sql .= " ,'". $datos['ft_identificacion'] ."' ";
        $sql .= " ,'". $datos['ft_codcliente'] ."' ";
        $sql .= " ,'". $datos['ft_telefono'] ."' ";
        $sql .= " ,'". $datos['ft_email'] ."' ";
        $sql .= " ,'". $datos['ft_tipoProveedor'] ."' ";
        $sql .= " ,'". $datos['ft_tipoCliente'] ."' ";
        $sql .= " ,'". $datos['ft_pais'] ."' ";
        $sql .= " ,'". $datos['ft_provincias'] ."' ";
        $sql .= " ,'". $datos['ft_ciudad'] ."' ";
        $sql .= " ,'". $datos['ft_direccion'] ."' ";
        $sql .= " )";

        $rs = $db->query($sql);

        if($rs)
            return true;
        else
            return false;

    }

    function UpdateRegistroTerceros( $datos, $id ){

        global  $db;

        $sql  = " UPDATE `gst_terceros`";
        $sql .= "  SET `nom`='".$datos['ft_nomape']."',  ";
        $sql .= " `identificacion`='".$datos['ft_identificacion']."', ";
        $sql .= " `cod_cliente`='".$datos['ft_codcliente']."', ";
        $sql .= " `telefono`='".$datos['ft_telefono']."', ";
        $sql .= " `email`='".$datos['ft_email']."',";
        $sql .= " `t_proveedor`='".$datos['ft_tipoProveedor']."', ";
        $sql .= " `t_cliente`='".$datos['ft_tipoCliente']."',";
        $sql .= " `fk_pais`='".($datos['ft_pais'])."', ";
        $sql .= " `fk_provincia`='".($datos['ft_provincias'])."', ";
        $sql .= " `fk_ciudad`='".($datos['ft_ciudad'])."' ,";
        $sql .= " `direccion`='".($datos['ft_direccion'])."'  ";
        $sql .= "  WHERE `rowid`= ".$id." ";

//        print_r($sql); die();
        $rs = $db->query($sql);

        if($rs)
            return true;
        else
            return false;

    }


?>