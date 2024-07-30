<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Espace de configuration</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?php echo base_url();?>Home">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>config">base</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Division</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>insertDivision" method="POST" enctype="mutlipart/form-data" id="insertionDivi">
                                <div class="form-group">
                                    <label>Importer ici le Fichier DIVISION</label>
                                    <input type="file" name="division" class="file-upload-default back">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="types cdv ou xlsx">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Choisir</button>
                                        </span>
                                        <!-- <input type="file" name="division" class="form-contol"> -->
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 adminDiv"><i class="fa fa-download"></i>  Insérer</button>            
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">AGENTS</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>insertAgent" method="POST" id="formAGent">
                                <div class="form-group">
                                    <label>Fichier AGENT</label>
                                    <input type="file" name="agent" class="file-upload-default back">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="fichier.cdv .xlsx">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Choisir</button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 adminNome" id="save_cat"><i class="fa fa-download"></i>  Insérer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">NOMENCLATURE</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>insertNommenclature" method="POST" id="formNomenclature">
                                <div class="form-group">
                                    <label>Importer ici le Fichier de données</label>
                                    <input type="file" name="nomenclature" class="file-upload-default back">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder=".csv uniquement">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Choisir</button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 adminCompte"><i class="fa fa-download"></i>Insérer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">COMPTES</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>insertCompte" id="formCompte" method="POST" enctype="mutlipart/form-data">
                                <div class="form-group">
                                    <label>Importer un fichier de données .csv</label>
                                    <input type="file" name="compte" class="file-upload-default back">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="fichier .csv">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-danger" type="button">Choisir</button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 adminCat"><i class="fa fa-download"></i>  Insérer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Catégorie</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>insertCategorie" method="POST" id="formCategorie" enctype="mutlipart/form-data">
                                <div class="form-group">
                                    <label>Importer ici le Fichier de données</label>
                                    <input type="file" name="categorie" class="file-upload-default back">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Fichier pour le catégorie">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-danger" type="button">Choisir</button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 adminCat"><i class="fa fa-download"></i>  Insérer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Article</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>insertArticle" method="POST" id="formArticle">
                                <div class="form-group">
                                    <label>Importer ici le Fichier de données</label>
                                    <input type="file" name="article" class="file-upload-default back">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Liste d'Article">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Choisir</button>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 adminArt"><i class="fa fa-download"></i>  Insérer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#insertionDivi').on('submit', function(non){
            non.preventDefault();
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error.im_error.imageError, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        })

        $('#formAGent').on('submit', function(non){
            non.preventDefault();
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error.im_error.imageError, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        })

        $('#formNomenclature').on('submit', function(non){
            non.preventDefault();
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error.im_error.imageError, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        })
        
        $('#formCompte').on('submit', function(non){
            non.preventDefault();
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error.im_error.imageError, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        })

        $('#formCategorie').on('submit', function(non){
            non.preventDefault();
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error.im_error.imageError, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        })

        $('#formArticle').on('submit', function(non){
            non.preventDefault();
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error.im_error.imageError, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        })
    })
</script>

<script src="<?php echo base_url();?>bootstrap/login_assets/js/file-upload.js"></script>