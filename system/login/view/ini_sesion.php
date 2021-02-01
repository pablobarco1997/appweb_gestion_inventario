
    <style>
        .invalic-red{
            border: 1px solid red !important;
        }
    </style>


    <div class="form-group col-md-8 col-xs-12 col-sm-12 col-lg-6 col-centered">


        <div class="text-center p-t-20 p-b-20" style="padding-top: 25%">
            <span class="db"><img src="<?= DOCUMENT_HTTP .'/public'?>/assets/images/logo.png" alt="logo"></span>
        </div>



        <div id="loginform" style="padding-top: 35%">
            <!-- Form -->
            <div class="form-horizontal m-t-20" id="loginform" >
                <div class="row p-b-30">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white" style="background-color: #141619" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="Username" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text  text-white"  style="background-color: #141619" id="basic-addon1"><i class=" fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control form-control-lg" id="Password" placeholder="password" aria-label="Password" aria-describedby="basic-addon1" required="">
                        </div>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <a class="btn btn-primary btn-sm text-white" id="" ><i class="fa fa-lock m-r-5"></i> ¿Contraseña perdida? </a>
                                <input class="btn btn-success float-right" id="logearse" type="button" value="Login">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<script src="<?=  DOCUMENT_HTTP ?>/system/login/js/login.js"></script>