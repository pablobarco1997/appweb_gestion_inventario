

<?php


    include_once '../../application/lib_glob_const/libval.php';
    include_once DOCUMENT_ROOT .'/application/main.php';


    #PERMISOS GLOBAL
    PERMMIS_SECURITY( (isset($_GET['security']) ? $_GET['security'] : 'false' ) );


    $view = "";

    if( isset($_GET['view']) )
    {
        $view = $_GET['view'];
    }



?>



<!doctype html>
<html lang="en">

<!--    HEAD-->
<?=  HEAD_LINK();  ?>

<body>

<!--    LOADDING-->
<?= PRELOADDER_SPINNER(); ?>

<div id="main-wrapper">

    <?= MENUS_CORES(); ?>



    <!-- ========================= PAGINAS MODULOS===================================== -->
    <!-- Page wrapper Modulos  -->
    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">CLIENTES - PROVEEDORES</h4>
                </div>
            </div>
        </div>

        <!-- Container fluid  -->
        <!-- ============================================================== -->

        <div class="container-fluid">

            <?php

            if( !empty( $view )  )
            {
                include_once DOCUMENT_ROOT .'/system/terceros/view/' . $view .'.php';
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