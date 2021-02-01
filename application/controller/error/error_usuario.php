<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!--    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">-->
    <title>error</title>
    <!-- Custom CSS -->
    <link href="<?= DOCUMENT_HTTP ?>/public/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class=" text-danger">ERROR DE USUARIO</h1>

            <h3 class="text-uppercase error-subtitle"></h3>
            <h3><b> <?= $_SESSION['nom_usuario'];  ?> </b></h3>

            <p  class="text-muted m-t-30 m-b-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa deleniti perspiciatis totam voluptatibus. Illum?</p>

            <a  class="btn btn-danger btn-rounded waves-effect waves-light m-b-40" style="color: #ffffff" id="inciardNuevo"  >iniciar de nuevo</a>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="<?= DOCUMENT_HTTP ?>/public/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= DOCUMENT_HTTP ?>/public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= DOCUMENT_HTTP ?>/public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();


    $('#inciardNuevo').click(function() {

        $(function() {

            var url = "<?= DOCUMENT_HTTP ?>" + '/system/login/controller/controller_login.php';
            var parametros = {'ajaxSend':'ajaxSend', 'accion':'close_session', 'security': "<?= KEY_SECURITY ?>" };
            $.get(url, parametros, function(data){
                var resp = $.parseJSON(data);
                if(resp.error == '')
                {
                    location.reload();
                }else{

                }
            });

        });
    });

</script>

</body>

</html>