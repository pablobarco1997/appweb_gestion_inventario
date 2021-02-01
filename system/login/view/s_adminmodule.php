
<?
    global $cn_entity;
?>


<div class="form-group col-md-9 col-xs-12 col-sm-12 col-lg-9 col-centered">

    <div class="text-center p-t-20 p-b-20" style="padding-top: 25%">
        <span class="db"><img src="<?= DOCUMENT_HTTP .'/public'?>/assets/images/logo.png" alt="logo"></span>
    </div>

    <br>
    <br>

    <div class="form-group ">
        <input type="text" class="form-control" placeholder="buscar compañia" id="buscar-company">
    </div>

    <div class="form-group">
        <ul class="list-group list-group-flush search-company">
            <?php

                $sqlentity = "SELECT * FROM gst_enterprise_entity";
                $rs = $cn_entity->query($sqlentity);
                if( $rs && $rs->num_rows >0 )
                {
                    while ($obj = $rs->fetch_array())
                    {
                        print '<li class="list-group-item "><a href="#" onclick="iniCompany('.$obj['entity'].','.$obj['rowid'].')"  data-idcompany="'.( $obj['rowid'] ).'" data-entity="'.( $obj['entity'] ).'" > '. ( strtoupper( $obj['label'] ) ) .' </a> </li>';
                    }
                }else{
                    print '<li class="list-group-item"><a href="#"> No hay Datos </a> </li>';
                }

            ?>
        </ul>
    </div>

</div>


<script>

    function iniCompany($entity , $idcompany)
    {

        var url = $_URL_HTTP + '/system/login/controller/controller_login.php';
        var parametros = {'ajaxSend':'ajaxSend', 'accion':'s_admin_enterprise','entity': $entity, 'security': $_KEY_GLOBSECURITY};

        $('.search-company').find('li').addClass('isDisabled');

        $.get(url, parametros , function(data) {
            var dataInfo = $.parseJSON(data);
            if(dataInfo.error == ''){

                toastr.success('redirigiendo...', 'LOGIN');
                setTimeout(function() {
                    location.href = $_URL_HTTP + '?security='+$_KEY_GLOBSECURITY+'&view=main_inicio';
                },1500);

            }else{

               $('.search-company').find('li').removeClass('isDisabled');
               toastr.warning(dataInfo.error , 'LOGIN');
            }
        });

    }

    $(document).ready(function(){

        $("#buscar-company").on("keyup", function() {

            var value = $(this).val().toLowerCase();

            $(".search-company li").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });

    });

</script>