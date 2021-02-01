<?php


function NAV_LINK_SEARCH()
{

    $nav = '
                
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                                
                        <li class="nav-item search-box hide"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)" style="padding-top: 0px"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
            
            ';

    return $nav;
}



?>