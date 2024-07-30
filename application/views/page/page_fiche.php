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
                                <h4 class="card-title">Liste des matériels détenus</h4>
                                <a href="<?php echo base_url().'fichedetenteur?matricule='.$_SESSION['agent']['MATRICULE'];?>"
                                    class="btn btn-success btn-round ml-auto" title="Imprimer">
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablefichu" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomenclature</th>
                                            <th>Désignation détaillée des objets</th>
                                            <th>Unité</th>
                                            <th>Nombre</th>
                                            <th>Qualité</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $total;?></td>
                                            <td>Total</td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($resultat as $row) {?>
                                        <tr>
                                            <td>
                                                <?php echo $row->ID_NOM;?></td>
                                            <td><?php echo $row->SPEC_MAT;?></td>
                                            <td>nb</td>
                                            <td><?php echo $row->NOMBRE;?></td>
                                            <td>
                                                <?php echo $row->ETAT_MAT;?>
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
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">

                        CAMI

                    </li>

                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">

                        <?=($_SESSION['agent_ser'][0]['CODE_SER']);?>

                    </li>

                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">

                        <?=($_SESSION['agent_div'][0]['CODE_DIVISION']);?>

                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2022, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Andrianajoro</a>
            </div>
        </div>
    </footer>
</div>