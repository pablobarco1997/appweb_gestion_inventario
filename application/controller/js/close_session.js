
$('#close_session').click(function() {

    $.ajax({
        url: $_URL_HTTP + '/system/login/controller/controller_login.php',
        type:'GET',
        data:{
            'accion'   : 'close_session',
            'ajaxSend' : 'ajaxSend',
            'security' : $_KEY_GLOBSECURITY ,
        },
        dataType: 'json',
        async:false,
        cache:false ,
        success : function( resp )
        {

            if(resp.error == '')
            {
                location.reload();

            }else{
                toastr.warning( resp.error , 'CERRAR SESSION');
            }
        }

    });

});