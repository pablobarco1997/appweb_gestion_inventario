

<?php



function MENU_CORE_PERMMIS()
{

    $Menus_Permmis_Modules = '';


    #SE INGRESA LOS PERMISOS DE LOS MODULOS ACTIVADOS

    $ARRAY_INICIO_PERMMIS = [
        'URL'     => DOCUMENT_HTTP .'?security='.KEY_SECURITY.'&view=main_inicio',
        'ACTIVE'  => '',
        'PERMISO' => '',
        'title'   => 'Inicio'
    ];

    $ARRAY_TERCEROS_PERMMIS = [
        'URL'         => DOCUMENT_HTTP .'/system/terceros/index.php?security='.KEY_SECURITY.'&view=listprincipal',
        'ACTIVE'  => '',
        'PERMISO' => '',
        'title'   => 'Terceros'
    ];





    $Menus_Permmis_Modules .= '
        <style>
                .sidebar-item a{
                    padding-bottom: 8px !important;
                    padding-top: 8px !important;
                }
        </style>';



    $Menus_Permmis_Modules .= '
                
                
                <aside class="left-sidebar" data-sidebarbg="skin5">
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav" class="p-t-30">
                               
                               
                                <li class="sidebar-item"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="'. $ARRAY_INICIO_PERMMIS['URL'] .'" aria-expanded="false">
                                            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> &nbsp; '. $ARRAY_INICIO_PERMMIS['title'] .'</span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-item"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="'. $ARRAY_TERCEROS_PERMMIS['URL'] .'" aria-expanded="false">
                                            <i class="fas fa-users"></i><span class="hide-menu"> &nbsp; '. $ARRAY_TERCEROS_PERMMIS['title'] .'</span>
                                    </a>
                                </li>
                                
                                
                                <!--
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link">
                                                <i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link">
                                                <i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a>
                                        </li>
                                    </ul>
                                </li>-->
                                
                                
                            </ul>
                        </nav>
                    </div>
                </aside>
                
                
        ';


    return $Menus_Permmis_Modules;


}



?>