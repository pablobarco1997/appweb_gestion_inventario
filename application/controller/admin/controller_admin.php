

<?php


#CONTROLLER ADMIN HTML PRINCIPAL HEADER FOOTER


function HEAD_LINK(){


    $header = '
    
        <head>
        
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="'. DOCUMENT_HTTP .'/public/assets/images/favicon.png">
            
            <title>GESTION INVENTARIO</title>
    

            <!-- Custom CSS -->            
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/flot/css/float-chart.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="'. DOCUMENT_HTTP .'/public/dist/css/style.min.css" rel="stylesheet">
            
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
            
            
            <!-- assets -->
               
               
           <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/extra-libs/sparkline/sparkline.js"></script>
            <!--Wave Effects -->
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/custom.min.js"></script>
            <!--This page JavaScript -->
            <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
            <!-- Charts js Files -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot/excanvas.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot/jquery.flot.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot/jquery.flot.pie.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot/jquery.flot.time.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot/jquery.flot.stack.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot/jquery.flot.crosshair.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/pages/chart/chart-page-init.js"></script> 
            
            
        </head>
        
        <style>
            /*contenedor centro col bootstrap*/
            .col-centered{
                float: none;
                margin: 0 auto;
            }
        </style>
        
     
    ';


    return $header;

}

function PRELOADDER_SPINNER(){

    $spinner = '
    
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        
    ';

    return $spinner;

}

function FOOTER_LINK(){

    $footer = '
        <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    ';


    return $footer;
}


function PERMMIS_SECURITY( $key )
{
    if( $key != md5('PRINCIPAL_VISTAS_GESTIONINVENTARIO_APP') )
    {
        echo 'PERMISO DENEGADO';
        die();
    }
}


?>