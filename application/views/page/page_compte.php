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
                        <a href="#">Compte</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Compte</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url().'Ajouter/ajoutCompte'?>" method="POST" id="formcmpt">
                                <div class="form-group">
                                    <label>Numéro du compte</label>
                                    <input type="text" class="form-control" placeholder="Numéro du compte"
                                        name="num_cmpt" id="num_cmpt" required>
                                    <small id="comptes" style="display: none;"></small>
                                </div>
                                <div class="form-group">
                                    <label>Libellé</label>
                                    <input type="text" class="form-control" placeholder="Désignations"
                                        name="designation_cmpt" id="designation_cmpt" required>
                                    <small id="designation" style="display: none;"></small>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="<?php echo base_url('listecompte');?>"
                                            style="color: #00aced; text-decoration-line: underline;">Voir les listes</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 save_cmpt"
                                    id="save_cmpt" name="save_cmpt" style="opacity: 0.8; border-radius: 2%;"><i
                                        class="fa fa-download"></i> Enregistrer</button>
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