<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Espace Managements</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Service</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Service</strong>
                        </div>
                        <div class="card-body">
                            <?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>
                            <form action="<?php echo base_url().'updtser/'.$SERVICE['CODE_SER'];?>" method="POST">
                                <div class="row form-group">
                                    <div class="col-2">
                                        <label>Code service</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['CODE_SER'];?>" name="code_ser" id="code_ser">
                                    </div>
                                    <div class="col-10">
                                        <label>Label</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['LIBELLE'];?>" name="libelle" id="libelle">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Premier en-tête</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['ENTETE1'];?>" name="entete1" id="entete1">
                                    </div>
                                    <div class="col-6">
                                        <label>Deuxième en-tête</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['ENTETE2'];?>" name="entete2" id="entete2">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Troisième en-tête</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['ENTETE3'];?>" name="entete3" id="entete3">
                                    </div>
                                    <div class="col-6">
                                        <label>Quatrième en-tête</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['ENTETE4'];?>" name="entete4" id="entete4">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Cinquième en-tête</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['ENTETE5'];?>" name="entete5" id="entete5">
                                    </div>
                                    <div class="col-6">
                                        <label>Sigle</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['SIGLE'];?>" name="sigle" id="sigle">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <label>Ville</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['VILLE'];?>" name="ville" id="ville">
                                    </div>
                                    <div class="col-4">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['ADRESSE'];?>" name="adresse" id="addresse">
                                    </div>
                                    <div class="col-4">
                                        <label>Contact</label>
                                        <input type="text" class="form-control" value="<?php echo $SERVICE['CONTACT'];?>" name="contact" id="contact" maxlength="17">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="save_cat" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-refresh"></i>  Mettre à jour</button>
                                <a href="<?php echo base_url().'listeservice';?>"><button type="button" class="btn btn-danger btn-flat m-b-30 m-t-30" name="cancel" style="opacity: 0.8; border-radius: 2%;">  Annuler</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>