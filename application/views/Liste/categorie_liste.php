<?php
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
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Liste catégorie</h4>
                                <button class="btn btn-danger btn-round ml-auto">
                                    <a href="<?php echo base_url().'category';?>" class="btn btn-danger btn-round ml-auto">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablecategorie" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Compte</th>
                                            <th>Categorie</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach ($query->result() as $row) { ?>
                                            <tr id="<?php echo $row->ID_CAT;?>">
                                                <td class ="designation"><?php echo $row->DESIGNATION_CMPT;?></td>
                                                <td class="categorie"><?php echo $row->LABEL_CAT;?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'affichcat?categorie='.$row->ID_CAT;?>" class="edit"><button id="" class="btn btn-link btn-success btn-lg" title="Modifier"><i class="fas fa-edit"></i></button></a>
                                                </td>
                                                <td>
                                                <button type="button" value="<?php echo $row->ID_CAT;?>" class="btn btn-link btn-danger btn-lg supprimercat" title="Supprimer"><i class="fas fa-prescription-bottle"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>