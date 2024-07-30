<?php
    $idcmpthaza = $NOMCOMPTE['NUM_CMPT'];
    $compte =  $this->db->query("SELECT * FROM COMPTE WHERE NUM_CMPT != '$idcmpthaza'");

?>
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
                        <a href="#">Catégorie</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Modifier Categorie</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url().'updtcat/'.$CATEGORIE['ID_CAT'];?>" method="POST">
                                <div class="form-group">
                                    <label>Compte</label>
                                    <select name="id_cmpts" id="id_cmpts" class="form-control">
                                        <option value="<?php echo $NOMCOMPTE['NUM_CMPT'] ?>"><?php echo $NOMCOMPTE['NUM_CMPT']." - "; echo $NOMCOMPTE['DESIGNATION_CMPT'] ?></option>
                                        <?php  foreach ($compte->result() as $rows) { ?>
                                            <option value="<?php echo $rows->NUM_CMPT;?>"><?php echo $rows->NUM_CMPT ." - " ;echo $rows->DESIGNATION_CMPT; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Label</label>
                                    <input type="text" class="form-control" value="<?= $CATEGORIE['LABEL_CAT'] ?>" name="label_cat" id="label_cat">
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="save_cat" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-refresh"></i>  Mettre à jour</button>
                                <a href="<?php echo base_url().'category';?>"><button type="button" class="btn btn-danger btn-flat m-b-30 m-t-30" name="cancel" style="opacity: 0.8; border-radius: 2%;">  Annuler</button></a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>