




<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> LISTA DE CLIENTES - PROVEEDORES </h5>

                <div class="form-group col-sm-12 col-md-12">
                    <ul class="list-inline text-right" style="background-color: #eeeeee">
                        <li><a href="<?= DOCUMENT_HTTP.'/system/terceros/index.php?security='. KEY_SECURITY . '&view=new_edit_tercero' ?>" class="btn btn-link" id="addTerceros">
                                <i class="mdi mdi-account-plus"></i> Agregar Tercero </a>
                        </li>
                    </ul>
                </div>

                <div class="form-group col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>IDENTIDAD</th>
                                    <th>NOMBRE</th>
                                    <th>TIPO</th>
                                    <th>TELEFONO</th>
                                    <th>DIRECCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1206851816</td>
                                    <td>PABLO BARCO</td>
                                    <td><span class="badge badge-success">CLIENTE</span></td>
                                    <td>0987722863</td>
                                    <td>VIA DAULE</td>
                                </tr>
                                <tr>
                                    <td>1206851816</td>
                                    <td>PABLO BARCO</td>
                                    <td><span class="badge badge-primary">PROVEEDOR</span></td>
                                    <td>0987722863</td>
                                    <td>VIA DAULE</td>
                                </tr>
                            </tbody>
                        </table>
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

<script src=" <?= DOCUMENT_HTTP ?>/system/terceros/js/listprincipal.js"></script>
