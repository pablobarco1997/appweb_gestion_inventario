
<?php


function NAV_CREATE_NEW()
{

    $nav = '
            
            <!-- create new -->
            <!-- ============================================================== -->
                <li class="nav-item dropdown hide">
                    
                    <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <span class="d-none d-md-block">Create New &nbsp; <i class="fa fa-angle-down"></i></span>
                        <span class="d-block d-md-none" style="padding-top: 0px"><i class="fa fa-plus"></i></span>
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

?>