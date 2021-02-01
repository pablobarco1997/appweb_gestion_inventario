
// validar formulario de Terceros
var ValidacionFormTerceros = function() {

    //clear text error
    $('.MessErr').remove();

    var nombre             = document.getElementById('ft_nomape');
    var iddentificacion    = document.getElementById('ft_identificacion');
    var codcliente         = document.getElementById('ft_codcliente');
    var telefono           = document.getElementById('ft_telefono');
    var email              = document.getElementById('ft_email');
    var tipoclient         = document.getElementById('ft_tipoCliente');
    var tipoproveedor      = document.getElementById('ft_tipoProveedor');

    let  menssages = [];

    //se declara los paramectros parar la validacion
    if(nombre.value == null || nombre.value == ''){
        menssages.push({
            documentElemento : nombre ,
            texto            : 'Este campo es requerido'
        });
    }

    if(iddentificacion.value == null || iddentificacion.value == ''){
        menssages.push({
            documentElemento : iddentificacion ,
            texto            : 'Identificación. Este campo es requerido'
        });

    }

    if(iddentificacion.value != null || iddentificacion.value != ""){
        if(iddentificacion.value.length < 10){
            menssages.push({
                documentElemento : iddentificacion ,
                texto            : 'La identificacion debe tener al menos 10 digitos'
            });
        }
        if(iddentificacion.value.length >= 10){
            //cedula
            if( validationCedula(iddentificacion.value) == false ){
                menssages.push({
                    documentElemento : iddentificacion ,
                    texto            : 'Identificación. Cedula Incorrecta'
                });
            }
            //ruc
        }
    }

    if(!$(tipoclient).is(':checked') && !$(tipoproveedor).is(':checked')){
        menssages.push({
            documentElemento : $(tipoclient).parents('.col-checked') ,
            texto            : 'Selecione una opción. Cliente o Proveedor'
        });
    }

    if( menssages.length > 0 ){

        for(var i = 0; i <= menssages.length -1; i++){

            var MessageElmenterr = document.createElement('small');
            MessageElmenterr.setAttribute('style','display: block; color: red');
            MessageElmenterr.setAttribute('class','MessErr');

            var documentElm  = menssages[i]['documentElemento'];
            var texto        = menssages[i]['texto'];

            console.log($( documentElm ).parent().find('.MessErr').text());

            //si el mensaje ya lo muestra no lo vuelve a mostrar
            if( $( documentElm ).parent().find('.MessErr').text() !== texto ){
                MessageElmenterr.appendChild(document.createTextNode(texto));
                $( MessageElmenterr ).insertAfter( $(documentElm) );
            }
        }

        return false;
    }

    if(menssages.length == 0){
        return true;
    }

};


$('#btn_nuevoEdit').on('click', function(){


    var btn = $('#btn_nuevoEdit');

    // alert(ValidacionFormTerceros());
    if(ValidacionFormTerceros()==false){
        return false;
    }

    btn.text('Procesando...').addClass('disabled_link');

    let form = new FormData();

    var subaccionTercero = "nuevo";
    if($idTerceroMod != 0 && $idTerceroMod != ''){
        subaccionTercero = 'modificar';
    }

    form.append('accion', 'registrarterceros');
    form.append('ajaxSend', 'ajaxSend');
    form.append('security', $_KEY_GLOBSECURITY );
    form.append('subaccion', subaccionTercero);
    form.append('idTercero', $idTerceroMod);

    form.append('ft_nomape', $('#ft_nomape').val() );
    form.append('ft_identificacion', $('#ft_identificacion').val() );
    form.append('ft_codcliente', $('#ft_codcliente').val() );
    form.append('ft_telefono', $('#ft_telefono').val() );
    form.append('ft_email', $('#ft_email').val() );
    form.append('ft_tipoCliente', ($('#ft_tipoCliente').is(':checked') ? 1:0 ) );
    form.append('ft_tipoProveedor', ($('#ft_tipoProveedor').is(':checked') ? 1:0 ) );

    form.append('ft_pais', $('#ft_pais').find(':selected').val() );
    form.append('ft_provincias', $('#ft_provincias').find(':selected').val() );
    form.append('ft_ciudad', $('#ft_ciudad').find(':selected').val() );
    form.append('ft_direccion', $('#ft_direccion').val() );


    $.ajax({
        url: $_URL_HTTP + '/system/terceros/controller/controller_terceros.php',
        type: 'POST' ,
        data: form ,
        processData: false ,
        contentType: false,
        dataType:'json',
        complete: function(xhr, status){

            console.log(xhr.readyState);
            console.log(xhr.statusText);
            if(xhr['readyState']== 4 && xhr['statusText']=='OK'){
                btn.text('Guardar').addClass('disabled_link');
            }else{
                btn.text('Ocurrio un error').addClass('disabled_link');
            }
        },
        success: function(r) {
            console.log(r);
           if(r.error == ""){
               toastr.success('Registro Actualizado', 'Información Actualizada');
               setTimeout(function() {
                   window.location = $_URL_HTTP + '/system/terceros/index.php?security='+$_KEY_SECURITY+'&view=listprincipal' ;
               },1000);
           }else{
               toastr.error(r.error , 'Error');
           }
       }
    });

});

$('#ft_pais').change(function() {

    var pais = $(this).find(':selected').val();
    if(pais!="") {

        var optionprovincia = [];
        $('#ft_provincias').empty().attr('disabled', false);

        for (var i = 0; i <= $data_provincias.length -1; i++){
            if($data_provincias[i]['fk_pais'] == pais ){
                     optionprovincia.push({'id' : $data_provincias[i]['id'] , 'text' : $data_provincias[i]['text'] });
            }
        }
        $('#ft_provincias').select2({
            placeholder:'selecciona una opción' ,
            data: optionprovincia
        });
        $('#ft_provincias').trigger('change');

    }else{
        $('#ft_provincias').empty().attr('disabled', true);
        $('#ft_ciudad').empty().attr('disabled', true);
    }
});


$('#ft_provincias').change(function() {

    var provincia = $(this).find(':selected').val();

    if(provincia!="") {
        var optionciudad = [];

        $('#ft_ciudad').empty().attr('disabled', false);
        for (var i = 0; i <= $data_ciudad.length -1; i++){
            if($data_ciudad[i]['fk_provincia'] == provincia ){
                optionciudad.push({'id' : $data_ciudad[i]['id'] , 'text' : $data_ciudad[i]['text'] });
            }
        }
        $('#ft_ciudad').select2({
            placeholder:'selecciona una opción' ,
            data: optionciudad
        });

    }else{
        $('#ft_ciudad').empty().attr('disabled', true);
    }

});


//validacion de cedula
function validationCedula(text) {

    var cad     = text;
    var cedula  = cad;
    //Preguntamos si la cedula consta de 10 digitos
    if(cedula.length == 10)
    {
        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0,2);
        //Pregunto si la region existe ecuador se divide en 24 regiones
        if( digito_region >= 1 && digito_region <=24 )
        {
            // Extraigo el ultimo digito
            var ultimo_digito   = cedula.substring(9,10);
            //Agrupo todos los pares y los sumo
            var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));
            //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
            var numero1 = cedula.substring(0,1);
            var numero1 = (numero1 * 2);
            if( numero1 > 9 ){ var numero1 = (numero1 - 9); }
            var numero3 = cedula.substring(2,3);
            var numero3 = (numero3 * 2);
            if( numero3 > 9 ){ var numero3 = (numero3 - 9); }
            var numero5 = cedula.substring(4,5);
            var numero5 = (numero5 * 2);
            if( numero5 > 9 ){ var numero5 = (numero5 - 9); }
            var numero7 = cedula.substring(6,7);
            var numero7 = (numero7 * 2);
            if( numero7 > 9 ){ var numero7 = (numero7 - 9); }
            var numero9 = cedula.substring(8,9);
            var numero9 = (numero9 * 2);
            if( numero9 > 9 ){ var numero9 = (numero9 - 9); }
            var impares = numero1 + numero3 + numero5 + numero7 + numero9;
            //Suma total
            var suma_total = (pares + impares);
            //extraemos el primero digito
            var primer_digito_suma = String(suma_total).substring(0,1);
            //Obtenemos la decena inmediata
            var decena = (parseInt(primer_digito_suma) + 1)  * 10;
            //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
            var digito_validador = decena - suma_total;
            //Si el digito validador es = a 10 toma el valor de 0
            if(digito_validador == 10)
                var digito_validador = 0;
            //Validamos que el digito validador sea igual al de la cedula
            if(digito_validador == ultimo_digito){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }else{
        return false;
    }
}

//funcion Modificar Terceros
//fetch datos Terceros
var fetch_Terceros = function($idTercero=""){

    if($idTercero=="" || $idTercero ==0){
        toastr.error('Ocurrio un error con la Operación consulte con soporte ', 'Error de parametros');
        return false;
    }

    $.ajax({
        url: $_URL_HTTP + '/system/terceros/controller/controller_terceros.php',
        type: 'POST' ,
        data: {
            'accion'    : 'fetchTerceros',
            'ajaxSend'  : 'ajaxSend',
            'security'  : $_KEY_GLOBSECURITY,
            'idtercero' : $idTercero
        },
        dataType:'json',
        cache:false,
        complete:function (xhr, status) {
            console.log(xhr);
            console.log(status);
        },
        success:function (dataprincipal) {

            var data = dataprincipal['fetch'];

            $("#ft_nomape").val(data['nom']);
            $("#ft_identificacion").val(data['identificacion']);
            $("#ft_codcliente").val(data['cod_cliente']);
            $("#ft_telefono").val(data['telefono']);
            $("#ft_email").val(data['email']);

            var t_cliente   = (data['t_cliente']==1)?true:false;
            var t_proveedor = (data['t_proveedor']==1)?true:false;
            $("#ft_tipoCliente").prop('checked', t_cliente);
            $("#ft_tipoProveedor").prop('checked', t_proveedor);

            $("#ft_pais").val(data['fk_pais']).trigger('change');
            $("#ft_provincias").val(data['fk_provincia']).trigger('change');
            $("#ft_ciudad").val(data['fk_provincia']).trigger('change');
            console.log(data);


        }
    });

};


$(window).on('load', function(e) {

    if($modificarTercero){
        fetch_Terceros($idTerceroMod);
    }

});


$(document).ready(function() {

    $("#ft_pais").select2({
        placeholder:'selecciona una opción' ,
        allowClear: true ,
        data: $data_paices
    });


});
