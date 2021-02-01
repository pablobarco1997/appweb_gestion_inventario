
<?php



function nav_link_UsuarioPerfil()
{

    #USUARIO LINK  - PERFIL

    $nav = '
            
             <li class="nav-item dropdown">
                    <a class="dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" style="padding-top: 0px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="'. DOCUMENT_HTTP .'/public/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                  
                    <div class="dropdown-menu dropdown-menu-right user-dd animated " style="padding-bottom: 0px; margin-top: 0px">
                       <a class="dropdown-item" href="#"> <i class="ti-user m-r-5 m-l-5"></i> &nbsp; Perfil</a>
                       <a class="dropdown-item" href="#" id="close_session"> <i class=""></i> &nbsp; Cerrar </a>
                    </div>
             </li>
        
        ';


    #SCRIPT IMPORTADOS

    $nav .= '<script src="'.DOCUMENT_HTTP.'/application/controller/js/close_session.js" ></script>';

    return $nav;
}


?>