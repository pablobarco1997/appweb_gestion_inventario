
<?php


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
                            '. nav_CreateNew() .'
                            
                            <!-- ============================================================== -->
                            <!-- Search -->
                            '. nav_link_Search() .'
                        
                        </ul>
                        
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        '. nav_float_right() .'
                        
                    </div>
                </nav>
            </header>


            <!-- ============================================================== -->
            <!-- PERMMISOS DE MODULOS -->
            ' . MENU_CORE_PERMMIS() . '
            
            
            
        ';


        return $MENUS_ADMIN;

    }

    function nav_float_right()
    {
        $nav = '

            <style>
            
                .optionUser li:hover{
                    cursor: pointer;
                }
                
            </style>


            <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- OCULTO HIDE -->
                    <li class="nav-item dropdown hide">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                  
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown hide">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i></a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Event today</h5>
                                                    <span class="mail-desc">Just a reminder that event</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Settings</h5>
                                                    <span class="mail-desc">You can customize this template</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Pavan kumar</h5>
                                                    <span class="mail-desc">Just see the my admin!</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Luanch Admin</h5>
                                                    <span class="mail-desc">Just see the my new admin!</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    '. nav_link_UsuarioPerfil() .'
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
            </ul>
        ';

        return $nav;
    }

    function nav_link_UsuarioPerfil()
    {

        #USUARIO LINK  - PERFIL

        $nav = '
            
             <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" style="padding-top: 15px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="'. DOCUMENT_HTTP .'/public/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                  
                    <div class="dropdown-menu dropdown-menu-right user-dd animated " style="padding-bottom: 0px; margin-top: 0px">
                       <a class="dropdown-item" href="#"> <i class="ti-user m-r-5 m-l-5"></i> &nbsp; Perfil</a>
                       <a class="dropdown-item" href="#"> <i class=""></i> &nbsp; Cerrar Sesión</a>
                    </div>
             </li>
        
        ';

        return $nav;
    }

    function nav_link_Search()
    {

        $nav = '
            
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
                            
                    <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)" style="padding-top: 25px"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
        
        ';

        return $nav;
    }

    function nav_CreateNew()
    {

        $nav = '
            
            <!-- create new -->
            <!-- ============================================================== -->
                <li class="nav-item dropdown ">
                    
                    <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <span class="d-none d-md-block">Create New &nbsp; <i class="fa fa-angle-down"></i></span>
                        <span class="d-block d-md-none" style="padding-top: 25px"><i class="fa fa-plus"></i></span>
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top: 0px; padding-bottom: 0px">
                        <a class="dropdown-item" href="#">Action Perfil</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                    
                </li>
                            
        ';

        return $nav;
    }

    function MENU_CORE_PERMMIS()
    {

        #SE INGRESA LOS PERMISOS DE LOS MODULOS ACTIVADOS

        $ARRAY_INICIO_PERMMIS = [
            'URL'     => DOCUMENT_HTTP .'?security='.KEY_SECURITY.'&view=main_inicio',
            'ACTIVE'  => '',
            'PERMISO' => '',
        ];

        $ARRAY_TERCEROS_PERMMIS = [
            'URL'     => DOCUMENT_HTTP .'/system/terceros/index.php?security='.KEY_SECURITY.'&view=listprincipal',
            'ACTIVE'  => '',
            'PERMISO' => '',
        ];




        $Menus_Permmis_Modules = '
                
                
                <aside class="left-sidebar" data-sidebarbg="skin5">
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav" class="p-t-30">
                               
                               
                                <li class="sidebar-item"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="'. $ARRAY_INICIO_PERMMIS['URL'] .'" aria-expanded="false">
                                    <i class="mdi mdi-view-dashboard"></i><span class="hide-menu"><b> &nbsp; INICIO</b></span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-item"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="'. $ARRAY_TERCEROS_PERMMIS['URL'] .'" aria-expanded="false">
                                    <i class="fas fa-users"></i><span class="hide-menu"><b> &nbsp; TERCEROS</b></span>
                                    </a>
                                </li>
                                
                                <!--
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                                        <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>
                                    </ul>
                                </li> -->
                                
                                
                            </ul>
                        </nav>
                    </div>
                </aside>
                
                
        ';


        return $Menus_Permmis_Modules;


    }


?>



<script>


</script>

