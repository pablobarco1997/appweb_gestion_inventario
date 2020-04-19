


<?php

    include_once 'application/lib_glob_const/libval.php';
    include_once 'application/main.php';



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

            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">

                <?php

                    if( !empty( $view )  )
                    {
                        include_once DOCUMENT_ROOT .'/public/view/' . $view .'.php';
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




