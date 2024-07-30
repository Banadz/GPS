        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Details de l'Article</h4>
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
                                <a href="#">Tables</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Datatables</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="col-1">
                                            <a
                                                href="<?php echo base_url()?>article/fiche?form=<?php echo $origine['FOR'];?>">
                                                <button class="btn btn-warning btn-round ml-auto" id="idAfficher">
                                                    <i class="fa fa-plus"></i>
                                                    Fiche
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="<?php  echo (base_url('article/data')) ?>">
                                                <button class="btn btn-primary btn-round ml-auto">
                                                    <i class="fa fa-plus"></i>
                                                    Retour
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-detail" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Service</th>
                                                    <th>Article</th>
                                                    <th>Quantité</th>
                                                    <th>Unité</th>
                                                    <th>Prix unitaire</th>
                                                    <th>Montant</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php   
                                            
                                                
                                                foreach  ($origine['ORG'] as $gine){
                                                // if()
                                            ?>

                                                <tr>
                                                    <td><?php echo $gine['DATE_ORG'];   ?></td>
                                                    <td><?php echo $gine['LIBELLE'];   ?>
                                                        (<?php echo $gine['CODE_SER'];   ?>)</td>
                                                    <td><?php    echo $gine['DESIGNATION_ART'];   ?>
                                                        <?php    echo $gine['SPECIFICITE_ART'];   ?></td>
                                                    <td><?php    echo $gine['QUANTITE_ORG'];   ?></td>
                                                    <td><?php    echo $gine['UNITE_ART'];   ?></td>
                                                    <td><?php    echo $gine['PRIX_UNI_ORG'];   ?></td>
                                                    <td><?php    echo $gine['MONTANT_ORG'];   ?></td>
                                                </tr>

                                                <?php  }   ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="Afficher" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                    Fiche de</span>
                                <span class="fw-light">
                                    Stock
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="Afficherform" action="<?php echo base_url('ArticleController/addition'); ?>"
                                method="post" novalidate="novalidate">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <!-- nome -->
                                            <label for="">Date du début</label>
                                            <input type="date" class="form-control col-md-12" name="tite" id="ddebut">
                                            <label for="">Date de la fin</label>
                                            <input type="date" class="form-control col-md-12" name="tite" id="dfin">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">

                                GPS

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
        </div>

        <script>
$(document).ready(function() {
    $('#add-detail').DataTable();
    $('#idAfficher').on('click', function(def) {
        def.preventDefault();
        $("#Afficher").modal('show');
        $("#Afficherform").on('submit', function(de) {
            de.preventDefault();
            debut = $("#ddebut").val();
            fin = $("#dfin").val();
            // alert(debut+' au '+ fin);
            var debut_encoded = encodeURIComponent(debut);
            var fin_encoded = encodeURIComponent(fin);
            var url =
                '<?php echo base_url()?>article/fiche?form=<?php echo $origine['FOR'];?>&debut=' +
                debut_encoded + '&fin=' + fin_encoded;
            window.location.href = url;

        })
    });
});
        </script>