<?php

$codeser = $_SESSION['agent_ser']['0']['CODE_SER'];
$this->db->select('*');
$this->db->from('CATEGORIE');
$this->db->order_by('ID_CAT', 'ASC');
$query = $this->db->get();

$this->db->select('*');
$this->db->from('NOMENCLATURE');
$this->db->order_by('ID_NOM', 'ASC');
$nomencl = $this->db->get();

$this->db->select('*');
$this->db->from('COMPTE');
$this->db->order_by('NUM_CMPT');
$cmpt = $this->db->get();

$resultat = $this->db->query("SELECT AGENT.NOM_AG, AGENT.PRENOM_AG,AGENT.MATRICULE, AGENT.CODE_DIVISION, SERVICE.CODE_SER FROM AGENT,SERVICE,DIVISION WHERE AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION AND SERVICE.CODE_SER = DIVISION.CODE_SER AND SERVICE.CODE_SER = '$codeser'");

$this->db->select('*');
$this->db->from('SERVICE');
$this->db->order_by('CODE_SER', 'ASC');
$service = $this->db->get();

$listeorigine = $this->db->query("SELECT *  FROM SERVICE WHERE CODE_SER != 'ADMIN' ORDER BY CODE_SER ASC");


$this->db->select('*');
$this->db->from('DIVISION');
$this->db->where('CODE_SER', $codeser);
$this->db->order_by('CODE_DIVISION', 'ASC');
$division = $this->db->get();



$requetesort = $this->db->query("SELECT MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT,MATERIEL.ETAT_MAT,MATERIEL.DATE_DEB,MATERIEL.CODE_DIVISION,MATERIEL.SORTIE,AGENT.MATRICULE,AGENT.NOM_AG,AGENT.NOM_UTIL_AG,AGENT.GENRE,CATEGORIE.LABEL_CAT,TO_CHAR(SORTIE.DATE_SORT, 'DD/mon/YY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATYSORT, TO_CHAR(TRUNC(SORTIE.DATE_SORT), 'YYYY-MM-DD') AS DS FROM MATERIEL,AGENT,DIVISION,CATEGORIE,SORTIE WHERE MATERIEL.MATRICULE = AGENT.MATRICULE AND MATERIEL.ID_CAT = CATEGORIE.ID_CAT AND MATERIEL.CODE_DIVISION = DIVISION.CODE_DIVISION AND MATERIEL.CODE_SER = '$codeser' AND MATERIEL.SORTIE = 'OK' AND MATERIEL.REF_MAT = SORTIE.REF_MAT ORDER BY DATYSORT DESC");
$sortie = $requetesort->result();

?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Matériels</h4>
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
                        <a href="#">Matériels</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#page_ajout" role="tab" aria-controls="pills-home" aria-selected="true">Nouveau</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#entres" role="tab" aria-controls="pills-home" aria-selected="true">Entrés</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#utilises" role="tab" aria-controls="pills-profile" aria-selected="false">Utilisés</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#sortis" role="tab" aria-controls="pills-contact" aria-selected="false">Sortis</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                
                                <div class="tab-pane fade" id="page_ajout" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="page">
                                                <div class="">
                                                    <br>
                                                    <div class="card-header">
                                                        <strong class="card-title mb-3">Nouveau matériel</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- Nomenclature table -->
                                                        <div class="modal fade" id="nomencltable" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="smallmodalLabel">Selectionner un nomenclature</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table id="tablenom" class="display table table-striped table-hover" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Numéro</th>
                                                                                        <th>Item</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php  foreach ($nomencl->result() as $row) { ?>
                                                                                        <tr id="<?php echo $row->ID_NOM;?>">
                                                                                            <td><?php echo $row->ID_NOM;?></td>
                                                                                            <td><?php echo $row->DETAIL_NOM;?></td>
                                                                                            <td>
                                                                                                <button id="" class="btn btn-link btn-primary btn-lg insertnomencl" title="Choisir"><i class="fas fa-location-arrow"></i></button>
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
                                                        <!-- Compte table -->
                                                        <div class="modal fade" id="comptetable" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="smallmodalLabel">Selectionner un compte</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table id="tablecmpt" class="display table table-striped table-hover" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Compte</th>
                                                                                        <th>Libellé</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php  foreach ($cmpt->result() as $row) { ?>
                                                                                        <tr id="<?php echo $row->NUM_CMPT;?>">
                                                                                            <td><?php echo $row->NUM_CMPT;?></td>
                                                                                            <td><?php echo $row->DESIGNATION_CMPT;?></td>
                                                                                            <td>
                                                                                                <button id="" class="btn btn-link btn-primary btn-lg insertcompte" title="Choisir"><i class="fas fa-location-arrow"></i></button>
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
                                                        <!-- Categorie table -->
                                                        <div class="modal fade" id="categorietable" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="smallmodalLabel">Selectionner une catégorie</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table id="tablecat" class="display table table-striped table-hover" >
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Compte</th>
                                                                                    <th>Categorie</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody class="bodycat">
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Formulaire ajout matériel -->
                                                        <form action="<?= base_url().'Ajouter/ajoutassets'?>" method="POST" id="formmodalassets">
                                                            <div class="row form-group">
                                                                <div class="form-group col-6">
                                                                    <label class="form-label">Nomenclature</label>
                                                                    <div class="input-group">
                                                                        <input type="hidden" class="form-control nomenclaturehide" aria-label="Text input with dropdown button" id="id_nom" name="id_nom">
                                                                        <input type="hidden" class="form-control nomenclaturehide" value = "<?php echo $_SESSION['agent_ser']['0']['CODE_SER'];?>" aria-label="Text input with dropdown button" id="service" name="service">
                                                                        <input type="text" required class="form-control nomenclature" aria-label="Text input with dropdown button" placeholder="Choisir un nomenclature" id="nomencl">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary btn-border nomencltable" type="button" id=""><i class="fas fa-align-justify"></i></button>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label class="form-label">Compte</label>
                                                                    <div class="input-group">
                                                                        <input type="hidden" class="form-control comptehide" aria-label="Text input with dropdown button" id="id_cmpt" name="id_cmpt">
                                                                        <input type="text" required class="form-control compte" aria-label="Text input with dropdown button" placeholder="Choisir un compte">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary btn-border comptetable" type="button"><i class="fas fa-align-justify"></i></button>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="form-group col-6">
                                                                    <label class="form-label">Catégorie</label>
                                                                    <div class="input-group">
                                                                        <input type="hidden" class="form-control categoriehide" aria-label="Text input with dropdown button" id="id_cat" name="id_cat">
                                                                        <input type="text" required class="form-control categorie" aria-label="Text input with dropdown button" placeholder="Choisir un catégorie">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary btn-border categorietable" type="button"><i class="fas fa-align-justify"></i></button>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label class="form-label">Référence</label>
                                                                    <input type="text" required class="form-control" placeholder="Référence du matériel" name="ref_mat" id="ref_mat">
                                                                    <small id="reference" style="display: none;">
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="form-group col-5">
                                                                    <label>Désignation</label>
                                                                    <input type="text" required class="form-control" placeholder="Désignation matériel" name="design_mat" id="design_mat">
                                                                    <small id="designation" style="display: none;">Désignation invalide</small>
                                                                </div>
                                                                <div class="form-group col-7">
                                                                    <label>Specificité</label>
                                                                    <textarea rows="2" class="form-control t-text-area" placeholder="Spécificité matériel" name="spec_mat" id="spec_mat" required></textarea>
                                                                    <small id="specificite" style="display: none;">Spécificité invalide</small>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="form-group col-sm-5">
                                                                    <label>Etat matériel</label>
                                                                    <select name="etat_mat" id="etat_mat" class="form-control">
                                                                        <option value="Bon">Bon</option>
                                                                        <option value="Moyen">Moyen</option>
                                                                        <option value="Mauvais">Mauvais</option>
                                                                        <option value="Hors d'usage">Hors d'usage</option>
                                                                    </select>
                                                                    <small id="etatmate" style="display: none;">Etat matériel invalide</small>
                                                                    <input type="hidden" name="quantite" id="quantite" value="1">  
                                                                </div>
                                                                <div class="form-group col-sm-7">
                                                                    <label>Origine</label>
                                                                    <select name="origine" id="origine" class="form-control" required>
                                                                        <?php  foreach ($listeorigine->result() as $row) { ?>
                                                                            <option value="<?php echo $row->CODE_SER;?>"><?php echo $row->LIBELLE;?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <input type="hidden" name="quantite" id="quantite" value="1">  
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="form-group col-6">
                                                                    <label>Référence pièce entrée</label>
                                                                    <input type="text" required class="form-control" placeholder="Facture ou ordre d'entrée" name="attestation" id="attestation">
                                                                    <small id="attest" style="display: none;">Attestation invalide</small>
                                                                </div>
                                                                <div class="form-group col-3">
                                                                    <label>Montant</label>
                                                                    <input type="text" required class="form-control" placeholder="Montant du matériel" name="montant" id="montant">
                                                                    <small id="Mont" style="display: none;">Montant invalide</small>
                                                                </div>
                                                                <div class="form-group col-3">
                                                                    <label>Date acquisition</label>
                                                                    <input type="date" class="form-control" name="date_org" id="date_org" required>
                                                                    <small id="date" style="display: none;">Date acquisition invalide</small>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-success add" name="add" id="add">Ajouter</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- MATERIEL ENTRES -->

                                <div class="tab-pane fade show active" id="entres" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <br>
                                                <div class="card-header">
                                                    <strong class="card-title mb-3">Matériels entrés</strong>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Modal détenir matériel-->
                                                    <div class="modal fade" id="detmatmodal" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/updatemateriel" method="POST" id="formmateriel">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="modalheader">
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row form-group" id="rowdiv">
                                                                                    <div class="form-group col-9">
                                                                                        <label for="">Détenteur</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" required class="form-control cherchedet" aria-label="Text input with dropdown button" placeholder="Recherche du detenteur" id="rechdet">
                                                                                            <div class="input-group-append" style="display: none" id="remove">
                                                                                                <button class="btn btn-primary btn-border nomencltable" type="button" id=""><i class="icon-user-unfollow"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <select class="form-control" name="detenteur" id="detenteur" size="">
                                                                                        </select>
                                                                                        <small id="rechres" class="rechres" style="display: none;">Aucun valeur correspondant à votre recherche</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-6" id="date">
                                                                                        <label for="">Date début</label>
                                                                                        <input type="date" name="date_debut" id="date_debut" class="form-control">
                                                                                        <input type="hidden" name="service" id='service' value="<?php echo $_SESSION['agent_ser']['0']['CODE_SER'];?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary save" id="save" style="cursor: not-allowed" disabled>Enregistrer</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal modifier matériel -->
                                                    <div class="modal fade" id="matmodifmodal" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/modifymateriel" method="POST" id="formmodfmateriel">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="header">
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                    <div class="row form-group">
                                                                                        <div class="form-group col-3">
                                                                                            <label class="form-label">Référence matériel</label>
                                                                                            <input type="text" name="reference" id="reference" class="form-control reference">
                                                                                        </div>
                                                                                        <div class="form-group col-9">
                                                                                            <label class="form-label">Désignation</label>
                                                                                            <input type="text" name="designation" id="designation" class="form-control designation">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="form-group col-8">
                                                                                            <label for="" class="form-label">Spécificité matériel</label>
                                                                                            <input type="text" name="specificite" id="specificite" class="form-control specificite">
                                                                                        </div>
                                                                                        <div class="form-group col-4">
                                                                                            <label for="" class="form-label">Etat matériel</label>
                                                                                            <select name="nouvetat" id="nouvetat" class="form-control nouvetat">
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary save" id="save">Modifier</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal sortir matériel -->
                                                    <div class="modal fade" id="sortmatentres" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/condmatentres" method="POST" id="formcondmatentres">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="headmatentres">
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                    <div class="form-group col-4">
                                                                                        <label for="">Statut</label>
                                                                                        <select name="statut" id="statut" class="form-control">
                                                                                            <option value="perdu">Perte</option>
                                                                                            <option value="hors d'usage">Hors d'usage</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-6" id="date1">
                                                                                        <label for="">Date sortie</label>
                                                                                        <input type="date" name="date_sort" id="date_sort" class="form-control" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-5" id="refsort1">
                                                                                        <label for="">Référence sortie</label>
                                                                                        <input type="text" name="ref_sort" id="ref_sort" class="form-control" placeholder="Référence sortie" required>
                                                                                    </div>
                                                                                    <div class="form-group col-7" id="obs1">
                                                                                        <label for="">Observation</label>
                                                                                        <textarea rows="3" class="form-control t-text-area" placeholder="Observation de la sortie" name="observation" id="observation" required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary save1" id="save1">Enregistrer</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tableau matériels entrés -->
                                                    <div class="table-responsive">
                                                        <table id="matentertable" class="display table table-striped table-hover" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Catégorie</th>
                                                                    <th>Référence</th>
                                                                    <th>Désignation</th>
                                                                    <th>Spécificité</th>
                                                                    <th>Etat matériel</th>
                                                                    <th>Gérer</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  foreach ($ENTRES as $row) { ?>
                                                                    <tr id="<?php echo $row->REF_MAT;?>">
                                                                        <td><?php echo $row->LABEL_CAT;?></td>
                                                                        <td><?php echo $row->REF_MAT;?></td>
                                                                        <td><?php echo $row->DESIGN_MAT;?></td>
                                                                        <td><?php echo $row->SPEC_MAT;?></td>
                                                                        <td><?php echo $row->ETAT_MAT;?></td>
                                                                        <td>
                                                                            <button id="modifboutmat" class="btn btn-link btn-primary btn-lg modifboutmat" title="Modifier"><i class="fas fa-edit"></i></button>
                                                                            <button id="detboutton" class="btn btn-link btn-primary btn-lg detboutton" title="Detenir"><i class="fas fa-user-alt"></i></button>
                                                                            <button type="button" class="btn btn-link btn-danger btn-lg sortirbout2" title="Sortir"><i class="fa fa-share"></i></button>
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

                                
                                <!-- MATERIEL UTILISES -->


                                <div class="tab-pane fade" id="utilises" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <br>
                                                <div class="card-header">
                                                    <strong class="card-title mb-3">Matériels utilisés</strong>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Modal changer détenteur-->
                                                    <div class="modal fade" id="changedetmodal" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/updateassets" method="POST" id="formdetchange">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="modalhead">
                                                                                
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row form-group" id="ambony">
                                                                                    <div class="form-group col-9">
                                                                                        <label for="">Détenteur</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" required class="form-control cherchedet" aria-label="Text input with dropdown button" placeholder="Recherche du detenteur" id="rechdet2">
                                                                                            <input type="hidden" required class="form-control refmat" aria-label="Text input with dropdown button" id="referencemat" name="referencemat">
                                                                                            <div class="input-group-append" style="display: none" id="remove2">
                                                                                                <button class="btn btn-primary btn-border nomencltable" type="button" id=""><i class="icon-user-unfollow"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <select name="det" id="det" class="form-control det">
                                                                                        </select>
                                                                                        <small id="rechres2" class="rechres2" style="display: none;">Aucun valeur correspondant à votre recherche</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-6" id="date">
                                                                                        <label for="">Date début</label>
                                                                                        <input type="date" name="date_deb" id="date_deb" class="form-control">
                                                                                        <input type="hidden" name="service" id='service' value="<?php echo $_SESSION['agent_ser']['0']['CODE_SER'];?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary enregistrer" id="enregistrer" style="cursor: not-allowed" disabled>Enregistrer</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal modifier matériel -->
                                                    <div class="modal fade" id="Modalmodification" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/modifymateriel2" method="POST" id="formmodfmateriels">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="header1">
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-3">
                                                                                        <label class="form-label">Référence matériel</label>
                                                                                        <input type="text" name="reference1" id="reference1" class="form-control reference1">
                                                                                    </div>
                                                                                    <div class="form-group col-9">
                                                                                        <label class="form-label">Désignation</label>
                                                                                        <input type="text" name="designation1" id="designation1" class="form-control designation1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-8">
                                                                                        <label for="" class="form-label">Spécificité matériel</label>
                                                                                        <input type="text" name="specificite1" id="specificite1" class="form-control specificite1">
                                                                                    </div>
                                                                                    <div class="form-group col-4">
                                                                                        <label for="" class="form-label">Etat matériel</label>
                                                                                        <select name="nouvetat1" id="nouvetat1" class="form-control nouvetat1">
                                                                                            
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-8">
                                                                                        <label for="" class="form-label">Date début</label>
                                                                                        <input type="date" name="date_deb" id="date_deb" class="form-control date_deb">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary save" id="save">Modifier</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal sortir matériel -->
                                                    <div class="modal fade" id="Modalsortir" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/sortir" method="POST" id="formsortir">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="head">
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-4">
                                                                                        <label for="">Statut</label>
                                                                                        <select name="statut" id="statut" class="form-control">
                                                                                            <option value="perdu">Perte</option>
                                                                                            <option value="hors d'usage">Hors d'usage</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-6" id="date">
                                                                                        <label for="">Date sortie</label>
                                                                                        <input type="date" name="date_sort" id="date_sort" class="form-control" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-5" id="refsort">
                                                                                        <label for="">Référence sortie</label>
                                                                                        <input type="text" name="ref_sort" id="ref_sort" class="form-control" placeholder="Référence sortie" required>
                                                                                    </div>
                                                                                    <div class="form-group col-7" id="obs">
                                                                                        <label for="">Observation</label>
                                                                                        <textarea rows="3" class="form-control t-text-area" placeholder="Observation de la sortie" name="observation" id="observation" required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary enregistrer1" id="enregistrer1">Enregistrer</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tableau matériels utilisés -->
                                                    <div class="table-responsive">
                                                        <table id="tableau_utilise" class="display table table-striped table-hover" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Référence</th>
                                                                    <th>Désignation</th>
                                                                    <th>Specificité</th>
                                                                    <th>Detenteur</th>
                                                                    <th>Division</th>
                                                                    <th>Date début</th>
                                                                    <th>Etat</th>
                                                                    <th>Gérer</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  foreach ($UTILISES as $row) { ?>
                                                                    <tr>
                                                                        <td><?php echo $row->REF_MAT;?></td>
                                                                        <td><?php echo $row->DESIGN_MAT;?></td>
                                                                        <td><?php echo $row->SPEC_MAT;?></td>
                                                                        <td><?php echo $row->MATRICULE .' - ';if ($row->GENRE == 'M') {echo 'Mr ';} else { echo 'Mme ';}echo $row->NOM_UTIL_AG;?></td>
                                                                        <td><?php echo $row->CODE_DIVISION;?></td>
                                                                        <td><?php echo $row->DATYDEB;?></td>
                                                                        <td><?php echo $row->ETAT_MAT;?></td>
                                                                        <td>
                                                                            <button type="button" id="editbout" class="btn btn-link btn-primary btn-lg editbout" title="Modifier"><i class="fas fa-edit"></i></button>
                                                                        </td>
                                                                        <td>
                                                                            <button id="changebout" class="btn btn-link btn-primary btn-lg changebout" title="Changer"><i class="fas fa-user-edit"></i></button>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-link btn-danger btn-lg sortirbout" title="Sortir"><i class="fa fa-share"></i></button>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url().'informations?materiel='.$row->REF_MAT;?>"><button type="button" class="btn btn-link btn-warning btn-lg" title="Informations <?php echo $row->REF_MAT;?>"><i class="fa fa-info-circle"></i></button></a>
                                                                        </td>
                                                                        <!-- <?php // } ?> -->
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


                                <!-- MATERIELS SORTIS -->


                                <div class="tab-pane fade" id="sortis" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <br>
                                                <div class="card-header">
                                                    <strong class="card-title mb-3">Matériels sortis</strong>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Modal modifier les informations du sortis-->
                                                    <div class="modal fade" id="modinfosort" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="AjaxController/sortmodif" method="POST" id="formsortmodif">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" id="headmatinfo">
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-4">
                                                                                        <label for="">Statut</label>
                                                                                        <select name="statut" id="statut" class="form-control nouvstatut">
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-6" id="date">
                                                                                        <label for="">Date sortie</label>
                                                                                        <input type="date" name="date_sort" id="date_sort" class="form-control date_sort">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="form-group col-5" id="refsort">
                                                                                        <label for="">Référence sortie</label>
                                                                                        <input type="text" name="ref_sort" id="ref_sort" class="form-control ref_sort" placeholder="Référence sortie" required>
                                                                                        <input type="hidden" name="id_sort" id="id_sort" class="form-control id_sort" required>
                                                                                    </div>
                                                                                    <div class="form-group col-7 obs" id="obs">
                                                                                        <label for="">Observation</label>
                                                                                        <textarea rows="3" class="form-control t-text-area observation" name="observation" id="observation" required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary modifsort" id="modifsort">Modifier</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tableau matériels sortis -->
                                                    <div class="table-responsive">
                                                        <table id="tableau_sortis" class="display table table-striped table-hover" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Référence</th>
                                                                    <th>Désignation</th>
                                                                    <th>Spécificité</th>
                                                                    <th>Etat matériel</th>
                                                                    <th>Date sortie</th>
                                                                    <th>Gérer</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  foreach ($sortie as $row) { ?>
                                                                    <tr id="<?php echo $row->REF_MAT;?>">
                                                                        <td><?php echo $row->REF_MAT;?></td>
                                                                        <td><?php echo $row->DESIGN_MAT;?></td>
                                                                        <td><?php echo $row->SPEC_MAT;?></td>
                                                                        <td><?php echo $row->ETAT_MAT;?></td>
                                                                        <td><?php echo $row->DATYSORT;?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url().'informations?materiel='.$row->REF_MAT;?>"><button type="button" class="btn btn-link btn-warning btn-lg" title="Informations <?php echo $row->REF_MAT;?>"><i class="fa fa-info-circle"></i></button></a>
                                                                            <?php
                                                                            $ds = $row->DS;

                                                                            $date1 = new DateTime();
                                                                            $date2 = new DateTime($ds);

                                                                            $diff = $date1->diff($date2);
                                                                            $nbr = $diff->days;

                                                                            if ( $nbr >= 0 && $nbr < 3) { ?>
                                                                                <button id="infos" class="btn btn-link btn-primary btn-lg infos" title="Modifier"><i class="fas fa-edit"></i></button>
                                                                            <?php }?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- assets -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/assets.js');?>" defer></script>
<!-- verification -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/verification.js');?>" defer></script>