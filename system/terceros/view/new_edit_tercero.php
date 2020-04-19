
<?php

    $module = null;
    $id = null;

    if( isset($_GET['id']) )
    {
        $module = "MODIFICAR TERCERO";
    }else{
        $module = "NUEVO TERCERO";
    }

?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <?= $module ?> </h5>


<!--                FORMULARIO TERCEROS -->

                <br>
                <div class="form-group col-sm-12 col-md-12">
                    <div class="form-horizontal">
                        <div class="form-group col-md-9 col-xs-12 col-sm-12 col-centered ">

                            <div class="form-group row">
                                <label for="ft_nomape" class="col-sm-3 text-left control-label col-form-label">Nombre Apellido</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ft_nomape" placeholder="nombre de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_identificacion" class="col-sm-3 text-left control-label col-form-label">Identificación</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ft_identificacion" placeholder="codigo de identifición">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_codcliente" class="col-sm-3 text-left control-label col-form-label">Codigo Cliente</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ft_codcliente" placeholder="codigo de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_telefono" class="col-sm-3 text-left control-label col-form-label">Telefono</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ft_telefono" placeholder="telefono de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_email" class="col-sm-3 text-left control-label col-form-label">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ft_email" placeholder="e-mail de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 text-left control-label col-form-label">Tipo</label>
                                <div class="col-sm-2">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="ft_tipoCliente">
                                        <label class="custom-control-label" for="ft_tipoCliente" style="cursor: pointer">Cliente</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="ft_tipoProveedor">
                                        <label class="custom-control-label" for="ft_tipoProveedor" style="cursor: pointer">Proveedor</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_pais" class="col-sm-3 text-left control-label col-form-label">País</label>
                                <div class="col-sm-8">
                                    <select name="ft_pais" id="ft_pais" class="form-control" >
                                        <option value="">selecciona opción</option>
                                        <option value="">Ecuador</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_ciudad" class="col-sm-3 text-left control-label col-form-label">Ciudad</label>
                                <div class="col-sm-8">
                                    <select name="ft_ciudad" id="ft_ciudad" class="form-control" >
                                        <option value="">selecciona opción</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_direccion" class="col-sm-3 text-left control-label col-form-label">Dirección</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ft_direccion" placeholder="dirección de tercero">
                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <button type="button" id="btn_nuevoEdit" class="btn btn-success btn-block">GUARDAR</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $_URL_HTTP                      = "<?= DOCUMENT_HTTP ?>";
    $_KEY_GLOBSECURITY              = "<?= KEY_SECURITY ?>";

</script>

<script src=" <?= DOCUMENT_HTTP ?>/system/terceros/js/new_edit_tercero.js"></script>
