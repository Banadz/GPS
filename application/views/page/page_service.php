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
                            <form action="<?= base_url().'Ajouter/ajoutser'?>" method="POST" id="formser">
                                <div class="row form-group">
                                    <div class="form-group col-2">
                                        <label>Code service</label>
                                        <input type="text" required class="form-control" placeholder="Code du service" name="code_ser" id="code_ser">
                                        <small id="sercode" style="display: none;"></small>
                                    </div>
                                    <div class="form-group col-10">
                                        <label>Label</label>
                                        <input type="text" required class="form-control" placeholder="Label" name="libelle" id="libelle">
                                    </div>
                                </div>
                                <fieldset class="border rounded">
                                    <legend class="text-center">En-tête</legend>
                                    <div class="row form-group">
                                        <div class="form-group col-6">
                                            <label>Niveau 1</label>
                                            <input type="text" required class="form-control" placeholder="En-tête niveau 1" name="entete1" id="entete1">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Niveau 2</label>
                                            <input type="text" required class="form-control" placeholder="En-tête niveau 2" name="entete2" id="entete2">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="form-group col-6">
                                            <label>Niveau 3</label>
                                            <input type="text" required class="form-control" placeholder="En-tête niveau 3" name="entete3" id="entete3">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Niveau 4</label>
                                            <input type="text" class="form-control" placeholder="En-tête niveau 4" name="entete4" id="entete4">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="form-group col-6">
                                            <label>Niveau 5</label>
                                            <input type="text" class="form-control" placeholder="En-tête niveau 5" name="entete5" id="entete5">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row form-group">
                                    <div class="form-group col-8">
                                        <label>Sigle</label>
                                        <input type="text" required class="form-control" placeholder="Sigle" name="sigle" id="sigle">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Ville</label>
                                        <select name="ville" id="ville" class="form-control">
											<option value="Antananarivo">Antananarivo</option>
											<option value="Antsiranana">Antsiranana</option>
											<option value="Fianarantsoa">Fianarantsoa</option>
											<option value="Mahajanga">Mahajanga</option>
											<option value="Toamasina">Toamasina</option>
											<option value="Toliara">Toliara</option>
										</select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="form-group col-4">
                                        <label>Contact</label>
                                        <input type="text" required class="form-control" placeholder="Numéro téléphone" name="contact" id="contact" maxlength="17">
                                    </div>
                                    <div class="form-group col-8">
                                        <label>Adresse</label>
                                        <input type="text" required class="form-control" placeholder="Adresse précis" name="adresse" id="addresse">
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="<?php echo base_url('listeservice');?>" style="color: #00aced; text-decoration-line: underline;">Voir les listes</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 save_ser" id="save_ser" name="save_ser" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-download"></i>  Enregistrer</button>                                          
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>


<!-- verification -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/verification.js');?>" defer></script>