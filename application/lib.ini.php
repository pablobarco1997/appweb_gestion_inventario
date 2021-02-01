<?php

    /** SE DECLARA VARIABLES GLOBALES*/

    global
        $db ,       #connecion de la conpany
        $cn_entity, #conecion de la base principal
        $conf ,
        $user ,
        $company ,
        $log;


    $db = new stdClass();
    include_once  DOCUMENT_ROOT .'/application/config/conneccion/connecion.lib.php';
    include_once  DOCUMENT_ROOT .'/application/config/class/company.class.php';


    /** Se obtiene la connecion para la base principal **/
    $permmis = json_decode( file_get_contents(DOCUMENT_ROOT.'/application/config/conneccion/credentials.json') , true);

    $ObtenerConn  = new connecion_lib();

    /** Connecion Principal */
    #connecion base datos principal
    #parametros de coneccion Principal
    $ObtenerConn->hots           = $permmis['host'];
    $ObtenerConn->Usuario        = $permmis['usuario'];
    $ObtenerConn->Password       = $permmis['password'];
    $ObtenerConn->database       = $permmis['database'];
    $cn_entity                   = $ObtenerConn->connect(); #Obtengo mi coneccion Principal

    /**Solo si existe una company seleccionada**/
    $fetchCompany = new company();
    $fetchCompany->fetchCompany( $_SESSION['company'] );
    #connecion base datos company db_name
    $db                          = $ObtenerConn->connect_db( $fetchCompany->schema );
//    echo '<pre>';  print_r($_SESSION['company']);   die();




?>