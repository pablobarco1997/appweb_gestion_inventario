
<?php

    $module = null;
    $id = null;
    $modificarTercero = 0;

    if( isset($_GET['idt']) ) {
        $id = $_GET['idt'];
        $modificarTercero = 1;
        $module = "MODIFICAR TERCERO";
    }else{
        $module = "NUEVO TERCERO";
    }


    $obtenerPais      = [];
    $obtenerProvincia = [];
    $obetnerCiudad    = [];

    $qs         = "SELECT * FROM gst_pais";
    $rpa        = $db->query($qs);
    if($rpa->num_rows > 0){
        while ($ob = $rpa->fetch_array(MYSQLI_ASSOC)){
            $obtenerPais[] = array('id' => $ob['rowid'] , 'text' => $ob['text']);
        }
    }

    $qp         = "SELECT * FROM gst_provincia";
    $rpr        = $db->query($qp);
    if($rpr->num_rows>0){
        while ($ob = $rpr->fetch_array(MYSQLI_ASSOC)){
            $obtenerProvincia[] = array('id' => $ob['rowid'] , 'text' => $ob['text'], 'fk_pais' => $ob['fk_pais']);
        }
    }

    $qc        = "SELECT * FROM gst_ciudad";
    $rpr        = $db->query($qc);
    if($rpr->num_rows>0){
        while ($ob = $rpr->fetch_array(MYSQLI_ASSOC)){
            $obetnerCiudad[] = array('id' => $ob['rowid'] , 'text' => $ob['text'], 'fk_provincia' => $ob['fk_provincia']);
        }
    }

//    echo '<pre>';  print_r(json_encode($obtenerPais)); die();


?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group col-md-12 col-xs-12">
                    <h5 class="card-title "> <span> <?= $module ?> </span> </h5>
                </div>

<!--                FORMULARIO TERCEROS -->

                <br>
                <div class="form-group col-sm-12 col-md-12">
                    <div class="form-horizontal" id="formValTerceros" >
                        <div class="form-group col-md-12 col-xs-12 col-sm-12 col-lg-9 col-centered ">

                            <div class="form-group row">
                                <label for="ft_nomape" class="col-sm-3 text-left control-label col-form-label">Nombre Apellido</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ft_nomape" placeholder="nombre de tercero" onkeyup="ValidacionFormTerceros()">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_identificacion" class="col-sm-3 text-left control-label col-form-label">Identificación</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ft_identificacion" placeholder="codigo de identifición" onkeyup="ValidacionFormTerceros()">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_codcliente" class="col-sm-3 text-left control-label col-form-label">Codigo Cliente</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ft_codcliente" placeholder="codigo de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_telefono" class="col-sm-3 text-left control-label col-form-label">Telefono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ft_telefono" placeholder="telefono de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_email" class="col-sm-3 text-left control-label col-form-label">E-mail</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ft_email" placeholder="e-mail de tercero">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 text-left control-label col-form-label">Tipo</label>
                                <div class="input_select_checked_tercero col-sm-9">
                                    <div class="col-checked">
                                        <div class="col-sm-2">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="ft_tipoCliente" onchange="ValidacionFormTerceros()">
                                                <label class="custom-control-label" for="ft_tipoCliente" style="cursor: pointer">Cliente</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="ft_tipoProveedor" onchange="ValidacionFormTerceros()">
                                                <label class="custom-control-label" for="ft_tipoProveedor" style="cursor: pointer">Proveedor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_pais" class="col-sm-3 text-left control-label col-form-label">País</label>
                                <div class="col-sm-9">
                                    <select name="ft_pais" id="ft_pais" class="form-control select2 custom-select" style="width: 100%; height:36px;" >
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_ciudad" class="col-sm-3 text-left control-label col-form-label">Provincias</label>
                                <div class="col-sm-9">
                                    <select name="ft_provincias" id="ft_provincias" class="form-control select2 custom-select" disabled></select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_ciudad" class="col-sm-3 text-left control-label col-form-label">Ciudad</label>
                                <div class="col-sm-9">
                                    <select name="ft_ciudad" id="ft_ciudad" class="form-control select2 custom-select" disabled></select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ft_direccion" class="col-sm-3 text-left control-label col-form-label">Dirección</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ft_direccion" placeholder="dirección">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-sm-12 col-lg-9 col-centered ">
                            <hr>
                            <button type="button" id="btn_nuevoEdit" class="btn btn-success pull-right" style="float: right">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $data_paices        = <?= (count($obtenerPais) > 0) ? json_encode($obtenerPais): [] ?>;
    $data_provincias    = <?= (count($obtenerProvincia) > 0) ? json_encode($obtenerProvincia): [] ?>;
    $data_ciudad        = <?= (count($obetnerCiudad) > 0) ? json_encode($obetnerCiudad): [] ?>;
    $idTerceroMod       = <?= ($id==null)? "''" : $id ?>;
    $modificarTercero   = <?= ($id==null)? 0:1 ?>;

</script>

<script src=" <?= DOCUMENT_HTTP ?>/system/terceros/js/new_edit_tercero.js"></script>
