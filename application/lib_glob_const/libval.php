


<?php


            #OBTENGO EL LINK DEL DIRECTORIO DESDE LA RAIZ
            $LINK_DIRECTORIO         = $_SERVER['DOCUMENT_ROOT'].'/appweb_gestion_inventario';
            $LINK_HTTP_DIRECTORIO    = 'http://localhost/appweb_gestion_inventario';
            $SECURITY                = 'PRINCIPAL_VISTAS_GESTIONINVENTARIO_APP';


            define('DOCUMENT_ROOT',  $LINK_DIRECTORIO);
            define('DOCUMENT_HTTP',  $LINK_HTTP_DIRECTORIO);
            define('KEY_SECURITY' ,  md5($SECURITY) );


?>
