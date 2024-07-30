<?php
$month = array('Jan'=>"janvier", 'Feb'=>"février", 'Mar'=>"mars", 'Apr'=>"avril", 'May'=>"mai", 'Jun'=>"juin", 'Jul'=>"juillet", 'Aug'=>"août", 'Sep'=>"septembre", 'Oct'=>"octobre", 'Nov'=>"novembre", 'Dec'=>"décembre");
$mois = $month[date("M")];
$jours = date("d");
$annee = date("y");

$date = $jours.'/'.$mois.'/'.$annee;

$materiel = $_GET['materiel'];
$requetemat = $this->db->query("SELECT HISTORIQUE.REF,HISTORIQUE.DESIGN,HISTORIQUE.SPEC,HISTORIQUE.ETAT,TO_CHAR(HISTORIQUE.DATEDEB, 'YY/mon/DD',  'NLS_DATE_LANGUAGE = FRENCH') AS DATYDEB,TO_CHAR(HISTORIQUE.DATEFIN, 'DD/mon/YY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATYFIN,HISTORIQUE.CODE_DIVISION,AGENT.MATRICULE,AGENT.NOM_AG,AGENT.NOM_UTIL_AG,AGENT.GENRE,CATEGORIE.LABEL_CAT FROM HISTORIQUE,AGENT,DIVISION,CATEGORIE WHERE HISTORIQUE.REF = '$materiel' AND HISTORIQUE.MATRICULE = AGENT.MATRICULE AND HISTORIQUE.ID_CAT = CATEGORIE.ID_CAT AND HISTORIQUE.CODE_DIVISION = DIVISION.CODE_DIVISION ORDER BY HISTORIQUE.AUTO_MAT DESC");
$valiny1 = $requetemat->result();

$requetehafa = $this->db->query("SELECT MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT,MATERIEL.ETAT_MAT,TO_CHAR(MATERIEL.DATE_DEB, 'DD/mon/YY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATYDEB,MATERIEL.CODE_DIVISION,AGENT.MATRICULE,AGENT.NOM_AG,AGENT.NOM_UTIL_AG,AGENT.GENRE,CATEGORIE.LABEL_CAT FROM MATERIEL,AGENT,DIVISION,CATEGORIE WHERE MATERIEL.REF_MAT = '$materiel' AND MATERIEL.MATRICULE = AGENT.MATRICULE AND MATERIEL.ID_CAT = CATEGORIE.ID_CAT AND MATERIEL.CODE_DIVISION = DIVISION.CODE_DIVISION");
$valiny2 = $requetehafa->result();
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
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Informations du matériel <?php echo $_GET['materiel'];?></h4>
                                <button class="btn btn-danger btn-round ml-auto">
                                    <a href="<?php echo base_url().'assets';?>" class="btn btn-danger btn-round ml-auto">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableinfo" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Catégorie</th>
                                            <th>Référence</th>
                                            <th>Désignation</th>
                                            <th>Specificité</th>
                                            <th>Detenteur</th>
                                            <th>Division</th>
                                            <th>Etat</th>
                                            <th>Date début</th>
                                            <th>Date fin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if($valiny1) { ?>
                                            <?php  foreach ($valiny1 as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->LABEL_CAT;?></td>
                                                    <td><?php echo $row->REF;?></td>
                                                    <td><?php echo $row->DESIGN;?></td>
                                                    <td><?php echo $row->SPEC;?></td>
                                                    <td><?php echo $row->MATRICULE .' - ';if ($row->GENRE == 'M') {echo 'Mr ';} else { echo 'Mme ';}echo $row->NOM_UTIL_AG;?></td>
                                                    <td><?php echo $row->CODE_DIVISION;?></td>
                                                    <td><?php echo $row->ETAT;?></td>
                                                    <td><?php echo $row->DATYDEB;?></td>
                                                    <td><?php echo $row->DATYFIN;?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php  foreach ($valiny2 as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->LABEL_CAT;?></td>
                                                    <td><?php echo $row->REF_MAT;?></td>
                                                    <td><?php echo $row->DESIGN_MAT;?></td>
                                                    <td><?php echo $row->SPEC_MAT;?></td>
                                                    <td><?php echo $row->MATRICULE .' - ';if ($row->GENRE == 'M') {echo 'Mr ';} else { echo 'Mme ';}echo $row->NOM_UTIL_AG;?></td>
                                                    <td><?php echo $row->CODE_DIVISION;?></td>
                                                    <td><?php echo $row->ETAT_MAT;?></td>
                                                    <td><?php echo $row->DATYDEB;?></td>
                                                    <td><?php echo $date;?></td>
                                                </tr>
                                            <?php } ?>
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