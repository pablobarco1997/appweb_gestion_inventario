


<?php


            #OBTENGO EL LINK DEL DIRECTORIO DESDE LA RAIZ
            $LINK_DIRECTORIO         = $_SERVER['DOCUMENT_ROOT'].'/appweb_gestion_inventario';
            $LINK_HTTP_DIRECTORIO    = 'http://localhost/appweb_gestion_inventario';
            $SECURITY                = 'PRINCIPAL_VISTAS_GESTIONINVENTARIO_APP';
            $SECURITY_GET            = (GETPOST('security')==""?"error":GETPOST('security'));//encryt md5


            define('DOCUMENT_ROOT',  $LINK_DIRECTORIO);
            define('DOCUMENT_HTTP',  $LINK_HTTP_DIRECTORIO);
            define('KEY_SECURITY' ,  md5($SECURITY) );
            define('KEY_SECURITY_GET', $SECURITY_GET);//valida la seguridad por la url




            /**FUNCIONES GLOBALES PARA USAR EL PHP VISTAS CONTROLADORES**/

            #FUNCION GETPOST
            function GETPOST($paramname, $check = '', $method = 0)
            {
                if (empty($method)) $out = isset($_GET[$paramname])    ? $_GET[$paramname]  : (isset($_POST[$paramname]) ? $_POST[$paramname] : '');
                elseif ($method == 1) $out = isset($_GET[$paramname])  ? $_GET[$paramname]  : '';
                elseif ($method == 2) $out = isset($_POST[$paramname]) ? $_POST[$paramname] : '';
                elseif ($method == 3) $out = isset($_POST[$paramname]) ? $_POST[$paramname] : (isset($_GET[$paramname]) ? $_GET[$paramname] : '');
                else return 'BadParameter';

                if (!empty($check)) {
                    // Check if numeric
                    if ($check == 'int' && !preg_match('/^[-\.,0-9]+$/i', $out)) {
                        $out = trim($out);
                        $out = '';
                    } // Check if alpha
                    elseif ($check == 'alpha') {
                        $out = trim($out);
                        // '"' is dangerous because param in url can close the href= or src= and add javascript functions.
                        // '../' is dangerous because it allows dir transversals
                        if (preg_match('/"/', $out)) $out = '';
                        else if (preg_match('/\.\.\//', $out)) $out = '';
                    } elseif ($check == 'array') {
                        if (!is_array($out) || empty($out)) $out = array();
                    }
                }

                return $out;
            }

            function VALIDAR_USUARIO_COMPANY($company = null)
            {

                #Se comprueba si la sesion de la compay global tiene Informacion Asignada
                /*
                 * Esto se realizo si encaso accede al sistema sin haber selecionado una compañia o el usuario no esta asociado a una
                 *
                 * */

                if( is_object($company) || is_array($company) )
                {
                    #si en caso la varible es un objeto entonces - Inicio sesion con usuario normal o  puede ser Desarrollador
                    if( is_object($company) )
                    {

                        $puedoser = false;
                        if($company->entity == $_SESSION['entity'])
                        {
                            $puedoser = true;
                        }

                        if($puedoser == false)
                        {
                            #este error es si encaso la entidad no es la misma selecionada
                            include_once DOCUMENT_ROOT.'/application/controller/error/error_usuario.php';
                            die();
                        }
                    }

                    #si en caso la varible es un Array vacio
                    if( is_array($company)  )
                    {
                        if(count($company) == 0)
                        {
                            #vista de error de usuario company
                            include_once DOCUMENT_ROOT.'/application/controller/error/error_acceso_company_users.php';
                            die();
                        }
                    }
                }

            }


?>
