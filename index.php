


<?php

    session_start();

//    echo '<pre>';  print_r($_SESSION); die();
    include_once 'application/lib_glob_const/libval.php';

    #SI LA SESION NO ES INICIADA
    if( !isset( $_SESSION['is_open'] ) )
    {
        header('Location:'.DOCUMENT_HTTP.'/system/login' );
    }

    include_once 'application/main.php';

    #VALIDAR COMPANY USUARIO
    VALIDAR_USUARIO_COMPANY( $_SESSION['company'] );

    #PERMISOS GLOBAL
    PERMMIS_SECURITY( (isset($_GET['security']) ? $_GET['security'] : 'false' ) );

    $view = "";

    if( isset($_GET['view']) )
    {
        $view = $_GET['view'];
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
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">

                <?php

                    if(is_file(DOCUMENT_ROOT .'/public/view/' . $view .'.php')){
                        if( !empty( $view )  ) {
                            include_once DOCUMENT_ROOT .'/public/view/' . $view .'.php';
                        }
                    }else{
                       print error_403();
                    }

                ?>

            </div>


            <!-- footer -->
            <!-- ============================================================== -->
                    <?= FOOTER_LINK();  ?>
            <!-- ============================================================== -->
            <!-- End footer -->
        </div>
        <!-- ============================================================== -->
    </div>
</body>
</html>




