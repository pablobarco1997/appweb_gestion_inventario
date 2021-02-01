

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
            
            <title>Control Inventario</title>
    
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/jquery-minicolors/jquery.minicolors.css" rel="stylesheet">
    
            <!-- Select2 CSS -->
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
            <!-- DataTable CSS -->
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
            
            
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/quill/dist/quill.snow.css" rel="stylesheet">
            <!-- Custom CSS -->            
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/flot/css/float-chart.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="'. DOCUMENT_HTTP .'/public/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
            <!-- Style CSS -->
            <link href="'. DOCUMENT_HTTP .'/public/dist/css/style.min.css" rel="stylesheet">  
            <!-- Style Glob CSS -->
            <link href="'. DOCUMENT_HTTP .'/public/css/style_glob.css" rel="stylesheet">  
           
            
            <!--
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  -->
            
            
            
            <!-- assets -->
               
               
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/jquery/dist/jquery.min.js"></script>           
            
            <!-- Bootstrap tether Core JavaScript -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/extra-libs/sparkline/sparkline.js"></script>
            
            <!--Wave Effects -->
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/custom.min.js"></script>
            
            <!-- This Page JS -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/toastr/build/toastr.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/dist/js/pages/mask/mask.init.js"></script>           
           
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
        
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/quill/dist/quill.min.js"></script>
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            
            <!-- Select2 js -->
            <script src="'. DOCUMENT_HTTP .'/public/assets/libs/select2/dist/js/select2.min.js"></script> 
            <!-- DataTable js-->
            <script src="'. DOCUMENT_HTTP .'/public/assets/extra-libs/DataTables/datatables.min.js"></script>                   
          
        </head>
    ';


    $header .= '
        
        <style>
        
            /*contenedor centro col bootstrap*/
            .col-centered{
                float: none;
                margin: 0 auto;
            }
            
            .thead-light th{
                font-weight: bolder !important;
            }
            
            .isDisabled {
                color: currentColor;
                cursor: not-allowed;
                opacity: 0.8;
                pointer-events: none;
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
               <!-- All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.-->
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

function Breadcrumbs_Mod( $titulo, $url, $module = true )
{


    $Breadcrumbs_Mod = array();
    $Breadcrumbs = "";
    $htmlBreadcrumbs = "";
    $CountBread = 0;

    #cuando sea el modulo principal
    if( $module == true){

        $_SESSION['breadcrumbsAcu'] = 0;
        $_SESSION['breadcrumbs'] = array();
        $_SESSION['breadcrumbs'][] = array( 'url' => $url , 'titulo' => $titulo );
        $Breadcrumbs_Mod = $_SESSION['breadcrumbs'];

    }else{

        #cuando sea varios modulos
        if(is_array($_SESSION['breadcrumbs']) && count($_SESSION['breadcrumbs']) > 0){

            foreach ($_SESSION['breadcrumbs'] as $key => $value)
            {
                if($value['titulo'] == $titulo){
                    unset($_SESSION['breadcrumbs'][$key]);
                }
            }

            $_SESSION['breadcrumbs'][] = array( 'url' => $url , 'titulo' => $titulo );
            $_SESSION['breadcrumbsAcu']++;

            $Breadcrumbs_Mod = $_SESSION['breadcrumbs'];
            $CountBread = $_SESSION['breadcrumbsAcu'];

        }else{

            foreach ($_SESSION['breadcrumbs'] as $key => $value)
            {
                if($value['titulo'] == $titulo){
                    unset($_SESSION['breadcrumbs'][$key]);
                }
            }

            $_SESSION['breadcrumbs'][] = array( 'url' => $url , 'titulo' => $titulo );
            $Breadcrumbs_Mod = $_SESSION['breadcrumbs'];
            $_SESSION['breadcrumbsAcu']++;
            $CountBread = $_SESSION['breadcrumbsAcu'];

        }
    }

//    echo '<pre>'; print_r($_SESSION['breadcrumbs']); die();

    if(!empty($titulo) )
    {


        $Breadcrumbs .= '<ol class="breadcrumb " >';
        for( $i = 0; $i <= $CountBread; $i++ )
        {
            if(isset($Breadcrumbs_Mod[$i])) //verifico si existe o hay valores
            {

                if($i==0){
                    $Breadcrumbs .= '<li class="breadcrumb-item"><a href=" '. $Breadcrumbs_Mod[$i]['url'] .' " title="'. $Breadcrumbs_Mod[$i]['titulo'] .'"  > '. $Breadcrumbs_Mod[$i]['titulo'] .' </a></li>';
                }else{
                    $Breadcrumbs .= '<li class="breadcrumb-item"><a href=" '. $Breadcrumbs_Mod[$i]['url'] .' " title="'. $Breadcrumbs_Mod[$i]['titulo'] .'"  > '. $Breadcrumbs_Mod[$i]['titulo'] .' </a></li>';

                }
            }
        }
        $Breadcrumbs .= '</ol>' ;

    }

    return $Breadcrumbs;
}

?>