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
                        <a href="#">Nomenclature</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Nomenclature</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url().'Ajouter/ajoutcmpt_nom'?>" method="POST" id="formnomencl">
                                <div class="form-group">
                                    <label>Numéro</label>
                                    <input type="text" class="form-control" placeholder="01"  name="id_nom" id="id_nom" required>
                                    <small id="nomenclnum" style="display: none;"></small>
                                </div>
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control" placeholder="Combusitibles et luminaire" name="detail_nom" id="detail_nom" required>
                                    <small id="item" style="display: none;"></small>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="<?php echo base_url('listenomenclature');?>" style="color: #00aced; text-decoration-line: underline;">Voir les listes</a>
                                    </label>
                                </div> 
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 save_nomencl" id="save_nomencl" name="save_nomencl" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-download"></i>  Enregistrer</button>            
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