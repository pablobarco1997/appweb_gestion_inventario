

<?php


    session_start();

//    echo '<pre>';  print_r($_SESSION); die();
    include_once '../../application/lib_glob_const/libval.php';

    #SI LA SESION ESTA INICIADA - SE VALIDA EL USUARIO
    if( isset($_SESSION['is_open'])) #Se valida solo con el usuario normal
    {
        #usuario normal
        if($_SESSION['S_admin'] == 0 ) {
            header('Location: '. DOCUMENT_HTTP .'?security='.KEY_SECURITY.'&view=main_inicio' );
        }

        #usuario all privilegios
        if($_SESSION['S_admin'] == 1 ){
            if(  is_object($_SESSION['company']) || is_array($_SESSION['company']) ){
                if(is_object($_SESSION['company'])){
                    if($_SESSION['company']->rowid > 0){
                        header('Location: '. DOCUMENT_HTTP .'?security='.KEY_SECURITY.'&view=main_inicio' );
                    }
                }
            }
        }

    }

    if( isset($_SESSION['S_admin']) && $_SESSION['S_admin'] == 1 ) {
        include_once DOCUMENT_ROOT .'/application/lib.ini.php'; #Se inicia la conecion si el usuario es super administrador o Desarrollador
    }

    #main
    include_once DOCUMENT_ROOT .'/application/main.php';


    $view = '';
    #VISTA
    if( isset($_GET['v']) )
    {

        if( $_GET['v'] == 'recover_password')
        {
            $view = 'recover_password';

        }elseif ( $_GET['v'] == 'companyadmin'){

            $view = 's_adminmodule';
        }

    }else{

        $view = 'ini_sesion';
    }

?>

<!--lib glob javascript-->
<script type="text/javascript">
    $_URL_HTTP                      = "<?= DOCUMENT_HTTP ?>";
    $_URL_ROOT                      = "<?= DOCUMENT_ROOT?>" ;
    $_KEY_GLOBSECURITY              = "<?= KEY_SECURITY ?>";
</script>

<!doctype html>
<html lang="en">

<!--    HEAD-->
<?=  HEAD_LINK();  ?>

<link rel="stylesheet" href="css/login.css">

<body>

<!--    LOADDING-->
<?= PRELOADDER_SPINNER(); ?>

<div id="main-wrapper">


    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">

                <?php

                if( !empty( $view )  )
                {
                    include_once DOCUMENT_ROOT .'/system/login/view/' . $view .'.php';

                }else{

                    echo '<h1> ERROR </h1>';
                    die();
                }

                ?>

            </div>
        </div>
    </div>

    <!-- ============================================================== -->
</div>
</body>
</html>
















