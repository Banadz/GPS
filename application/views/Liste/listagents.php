<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Fiche détenteur</h4>
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
                        <a href="#">Fiche détenteur</a>
                    </li>
                </ul>
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Liste des agents</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabledivision" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom et prénoms</th>
                                            <th>Division</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach ($AGENTS as $row) { ?>
                                            <tr id="<?php echo $row->MATRICULE;?>">
                                                <?php if ($row->MATRICULE == $_SESSION['agent']['MATRICULE']) { ?>
                                                    <td class="matr" style="font-weight:bold;"><?php echo $row->MATRICULE;?></td>
                                                    <td class ="noms" style="font-weight:bold;"><?php echo $row->NOM_AG .' '; echo $row->PRENOM_AG;?></td>
                                                    <td class="div" style="font-weight:bold;"><?php echo $row->CODE_DIVISION;?></td>
                                                <?php } else { ?>
                                                    <td class="matr"><?php echo $row->MATRICULE;?></td>
                                                    <td class ="noms"><?php echo $row->NOM_AG .' '; echo $row->PRENOM_AG;?></td>
                                                    <td class="div"><?php echo $row->CODE_DIVISION;?></td>
                                                <?php } ?>
                                                <td>
													<a href="<?php echo base_url().'fichedetenteur?matricule='.$row->MATRICULE;?>"><button type="button" class="btn btn-link btn-success btn-lg" title="Fiche détenteur"><i class="fa fa-print"></i></button></a>
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