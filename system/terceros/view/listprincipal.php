

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group col-md-12 col-xs-12">
                    <h5 class="card-title "> <span>CLIENTES / PROVEEDORES</span> </h5>
                </div>

                <div class="form-group col-sm-12 col-md-12" style="margin: 0px">
                    <ul class="list-inline list-inline-menu text-right border-bottom" style="margin: 0px">
                        <li><a href="<?= DOCUMENT_HTTP.'/system/terceros/index.php?security='. KEY_SECURITY . '&view=new_edit_tercero' ?>" class="btn btn-link" id="addTerceros">
                                <i class="mdi mdi-account-plus"></i> Agregar Tercero </a>
                        </li>
                    </ul>
                </div>

                <div class="form-group col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <br>
                        <br>
                        <table class="table " width="100%" id="teceros">
                            <thead class="thead-light" >
                                <tr>
                                    <th>Identidad</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th width="2%"> <i class="fas fa-cogs"></i> </th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src=" <?= DOCUMENT_HTTP ?>/system/terceros/js/listprincipal.js"></script>
