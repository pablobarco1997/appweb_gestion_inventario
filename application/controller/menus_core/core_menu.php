
<?php

    include_once DOCUMENT_ROOT.'/application/controller/menus_core/nav_create_new.php';
    include_once DOCUMENT_ROOT.'/application/controller/menus_core/nav_search_link.php';
    include_once DOCUMENT_ROOT.'/application/controller/menus_core/nav_float_right.php';
    include_once DOCUMENT_ROOT.'/application/controller/menus_core/nav__usuarioperfil.php';
    include_once DOCUMENT_ROOT.'/application/controller/menus_core/Modules.permis.php';


    function MENUS_CORES()
    {


        $MENUS_ADMIN = '


            <header class="topbar" data-navbarbg="skin5" >
                <nav class="navbar top-navbar navbar-expand-md navbar-dark" >
                
                    <div class="navbar-header" data-logobg="skin5">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        <a class="navbar-brand" href="#">
                            <!-- Logo icon -->
                            <b class="logo-icon p-l-10">
                                <!-- Dark Logo icon -->
                                <img src="'. DOCUMENT_HTTP .'/public/assets/images/logo-icon.png" alt="homepage" class="light-logo"  width="30px" height="23px" />
        
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                     <!-- dark Logo text -->
                                     <img src="'. DOCUMENT_HTTP .'/public/assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            </span>
                        </a>
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>      
                    </div>
                    
                    <!-- ============================================================== -->
                   
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5" >
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-left mr-auto">
                            <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                            <!-- ============================================================== -->
                            <!-- create new -->
                            '. NAV_CREATE_NEW() .'
                            
                            <!-- ============================================================== -->
                            <!-- Search -->
                            '. NAV_LINK_SEARCH() .'
                        
                        </ul>
                        
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        '. NAV_FLOAT_RIGHT() .'
                        
                    </div>
                </nav>
            </header>


            <!-- ============================================================== -->
            <!-- PERMMISOS DE MODULOS -->
            ' . MENU_CORE_PERMMIS() . '
          
            
        ';


        return $MENUS_ADMIN;

    }


?>

