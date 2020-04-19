

    
        
       function  fetch_terceros()
       {

           var dataTerceros = {

               'nombre'             : $('#ft_nomape').val(),
               'identificacion'     : $('#ft_identificacion').val(),
               'codigoCliente'      : $('#ft_codcliente').val(),
               'telefono'           : $('#ft_telefono').val(),
               'email'              : $('#ft_email').val(),
               'pais'               : $('#ft_pais').val(),
               'ciudad'             : $('#ft_ciudad').val(),
               'direccion'          : $('#ft_direccion').val(),


           };

           console.log(dataTerceros);

       }



       $('#btn_nuevoEdit').click(function() {

           var objTercero = fetch_terceros();

       });


