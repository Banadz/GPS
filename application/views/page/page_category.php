<?php
$requete = $this->db->query("SELECT * FROM COMPTE ORDER BY NUM_CMPT");
$result = $requete->result_array();

// $requetes = $this->db->query("SELECT * FROM NOMENCLATURE ORDER BY ID_NOM ASC");
// $results = $requetes->result_array();

$query = $this->db->query("SELECT CATEGORIE.ID_CAT,CATEGORIE.LABEL_CAT,COMPTE.DESIGNATION_CMPT FROM CATEGORIE,COMPTE WHERE COMPTE.NUM_CMPT = CATEGORIE.NUM_CMPT GROUP BY CATEGORIE.ID_CAT,CATEGORIE.LABEL_CAT,COMPTE.DESIGNATION_CMPT");
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
                            <strong class="card-title mb-3">Categorie</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url().'Ajouter/ajoutcat'?>" method="POST" id="formcat">
                                <div class="form-group">
                                    <label>Compte</label>
                                    <select name="id_cmpts" id="id_cmpts" class="form-control">
                                        <?php foreach ($result as $row) { ?>
                                            <option id="idopt" value="<?php echo $row['NUM_CMPT'];?>"><?php echo $row["NUM_CMPT"];?> - <?php echo $row["DESIGNATION_CMPT"];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Label categorie</label>
                                    <input type="text" class="form-control" placeholder="TABLE" name="label_cat" id="label_cat" required>
                                    <small id="categorie" style="display: none;"></small>
                                </div>
                                
                                <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="<?php echo base_url('listecategorie');?>" style="color: #00aced; text-decoration-line: underline;">Voir les listes</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 save_cat" id="save_cat" name="save_cat" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-download"></i>  Enregistrer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<!-- verification -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/verification.js');?>" defer></script>