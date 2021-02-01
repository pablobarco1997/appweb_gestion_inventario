

/**validar login usuario y password*/
function invalic_login()
{
    var puedoLogin = 0;

    var usuario  = $('#Username');
    var password = $('#Password');

    if( usuario.val() == "" ){
        usuario.addClass('invalic-red');
        toastr.warning( "Ingrese el Usuario" , 'LOGIN');
        puedoLogin++;
    }else{
        usuario.removeClass('invalic-red');
    }

    if( password.val() == "" ){
        password.addClass('invalic-red');
        toastr.warning( "Ingrese el Password" , 'LOGIN');
        puedoLogin++;
    }else{
        password.removeClass('invalic-red');
    }

    return puedoLogin;
}



/** clickn logearse */
$('#logearse').click(function(){

    if( invalic_login() == 0 )
    {

        $.ajax({

            url: $_URL_HTTP + '/system/login/controller/controller_login.php',
            type:'POST',
            data:{
                'ajaxSend'  :'ajaxSend',
                'accion'    : 'login_start',
                'usu'       : $('#Username').val(),
                'pass'      : btoa($('#Password').val()),
                'security'  : $_KEY_GLOBSECURITY ,
            },
            dataType:'json',
            async: false,
            beforeSend: function() {
                $('#logearse').attr('value', 'cargando...').attr('disabled', true);
            },

            complete:function(){
                setTimeout(function() {  $('#logearse').attr('value', 'Login').attr('disabled', false); } , 2000);
            },

            success:function( resp )
            {

                if( resp.error == '' )
                {
                    //Usuario Nomal == 0
                    //Super Usuario == 1
                    if(resp.info_spusers_admin == 0){

                        toastr.success('redirigiendo...', 'LOGIN');
                        $(this).addClass('disabled');
                        setTimeout(function() { location.reload(); }, 2000);
                        $(this).removeClass('disabled');
                    }

                    //Super Usuario si en caso es super usuario
                    //entonces mostrar una vista donde puede selecionar cualquier company
                    if(resp.info_spusers_admin == 1){
                        location.href = $_URL_HTTP + '/system/login/index.php?v=companyadmin';
                    }

                }else{

                    toastr.warning( resp.error , 'LOGIN');
                    $('#logearse').removeClass('disabled');
                }
            }

        });

    }
});





$(document).ready(function() {



});

