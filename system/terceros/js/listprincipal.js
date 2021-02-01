

$('#teceros').DataTable({
    "ordering":false,
    "destroy": true,
    "searching": false,
    "serverSide": false,
    "paging":true,
    "ajax":{
        "url": $_URL_HTTP + '/system/terceros/controller/controller_terceros.php',
        "type": 'POST',
        "data":{
            'accion':'terceroslist' ,
            'ajaxSend':'ajaxSend',
            'security':$_KEY_GLOBSECURITY
        }
    } ,

    "columnDefs": [
        {
            'targets': 5,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){

                var dropmenu    = document.createElement("div");
                dropmenu.setAttribute("class","dropdown");

                var button      = document.createElement("button");
                button.setAttribute("class","btn btn-light btn-sm dropdown-toggle");
                button.setAttribute("data-toggle","dropdown");

                var icon        = document.createElement("i");
                icon.setAttribute("class","fas fa-cog");
                button.append(icon);
                button.appendChild(document.createTextNode(" option"));

                //content Menu
                var dropMenulist = document.createElement("div");
                dropMenulist.setAttribute("class", "dropdown-menu pull-left");


                //url modificar
                var url_mod =  $_URL_HTTP + '/system/terceros/index.php?security=' + $_KEY_GLOBSECURITY + '&view=new_edit_tercero&idt='+full[6];



                //lista de comportamientos
                var lista = [];

                var modificar  = document.createElement("a");
                modificar.appendChild(document.createTextNode("Modificar"));
                modificar.setAttribute("class","dropdown-item");
                modificar.setAttribute("style","padding-top: 2px; padding-bottom: 2px; padding-right: 10px; padding-left: 10px;");
                modificar.setAttribute("href", url_mod);

                lista.push(modificar);



                $.each(lista, function(i, item){
                    $(dropMenulist).append($(item).prop("outerHTML"));
                });

                $(dropmenu).append(button);
                $(dropmenu).append(dropMenulist);

                //convert objeto a JQuery a String
                var str = $(dropmenu).prop("outerHTML");

                return str;
            },
        }
    ],

    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }

});

function teceroslist(){

}



$(window).on('load', function() {

    teceroslist();

});