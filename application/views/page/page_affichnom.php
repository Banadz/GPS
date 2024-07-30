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
                            <strong class="card-title mb-3">Modifier nomenclature</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url().'updtnom/'.$NOMENCLATURE['ID_NOM'];?>" method="POST">
                                <div class="form-group">
                                    <label>Numéro</label>
                                    <input type="text" class="form-control" value="<?= $NOMENCLATURE['ID_NOM'] ?>"  name="id_nom" id="id_nom" disabled>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control" value="<?= $NOMENCLATURE['DETAIL_NOM'] ?>" name="detail_nom" id="detail_nom">
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="save_cat" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-refresh"></i>  Mettre à jour</button>
                                <a href="<?php echo base_url().'listenomenclature';?>"><button type="button" class="btn btn-danger btn-flat m-b-30 m-t-30" name="cancel" style="opacity: 0.8; border-radius: 2%;">  Annuler</button></a>           
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>