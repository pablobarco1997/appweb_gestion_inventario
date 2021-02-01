

<?php

    session_start();

//    echo '<pre>';  print_r($_SESSION); die();
    include_once '../../application/lib_glob_const/libval.php';

    #SI LA SESION NO ES INICIADA
    if( !isset($_SESSION['is_open'] ))
    {
        header('Location: '. DOCUMENT_HTTP .'/system/login' );
    }

    include_once DOCUMENT_ROOT .'/application/main.php';

    #VALIDAR COMPANY USUARIO
    VALIDAR_USUARIO_COMPANY( $_SESSION['company'] );

    #PERMISOS GLOBAL
    PERMMIS_SECURITY( (isset($_GET['security']) ? $_GET['security'] : 'false' ) );

    $view = "";

    if( isset($_GET['view']) )
    {
        $view = $_GET['view'];
    }

    if(empty($view)){
        echo '<h5>ACCESO DENEGADO</h5>';
        die();
    }

    /**Inicia lib.ini.php
     * Contiene admin usuarios base datos controller
     * Connecciones db company
     * Base Principal
     **/
    include_once DOCUMENT_ROOT .'/application/lib.ini.php';


?>

<!--lib glob javascript-->
<script type="text/javascript">
    $_URL_HTTP                      = "<?= DOCUMENT_HTTP ?>";
    $_URL_ROOT                      = "<?= DOCUMENT_ROOT?>" ;
    $_KEY_GLOBSECURITY              = "<?= KEY_SECURITY_GET ?>";
    $_KEY_SECURITY                  = "<?= KEY_SECURITY ?>";
</script>

<!doctype html>
<html lang="en">


<!--    HEAD-->
<?=  HEAD_LINK();  ?>

<body>

<!--    LOADDING-->
<?= PRELOADDER_SPINNER(); ?>

<div id="main-wrapper" data-sidebartype="mini-sidebar" class="mini-sidebar">

    <?= MENUS_CORES(); ?>

    <!-- ========================= PAGINAS MODULOS===================================== -->
    <!-- Page wrapper Modulos  -->
    <div class="page-wrapper" >

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Terceros</h4>

<!--                    breadcrumb-->
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <?php
                                #Se ingresa los modulos breadcrumb
                                if(!empty($view)){
                                    if($view=='listprincipal')
                                        print Breadcrumbs_Mod('Clientes/Proveedores', $_SERVER['REQUEST_URI'], true);
                                    if($view=='new_edit_tercero')
                                        print Breadcrumbs_Mod('Nuevo Modificar Tercero', $_SERVER['REQUEST_URI'], false);
                                }
                            ?>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <!-- Container fluid  -->
        <!-- ============================================================== -->

        <div class="container-fluid">

            <?php

            if( is_file( DOCUMENT_ROOT .'/system/terceros/view/' . $view .'.php' ) ){

                if( !empty( $view )  )
                {
                    include_once DOCUMENT_ROOT .'/system/terceros/view/' . $view .'.php';

                }

            }
            else{

                print error_403(); #pagina no encontrada

            }

            ?>

        </div>


        <!-- FOOTER -->
        <!-- ============================================================== -->
        <?= FOOTER_LINK();  ?>
        <!-- ============================================================== -->
        <!-- End FOOTER -->
    </div>
    <!-- ============================================================== -->
</div>
</body>
</html>