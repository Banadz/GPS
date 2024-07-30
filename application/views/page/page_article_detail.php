<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card" style="background-color: rgba(255, 255, 255, 0.9);">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                            
                                        <strong class="card-title">Details</strong>
                                    </div>
                                    <div class="col-1">
                                        <a href="<?php echo base_url()?>article/fiche?form=<?php echo $origine['FOR'];?>">
                                            <button class="btn btn-warning"  id="idAfficher" style="border-radius:10px;">
                                                <i class="ti-printer"> Fiche</i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="<?php  echo (base_url('article/data')) ?>">
                                            <button class="btn btn-primary" style="border-radius:10px;"><strong>Retour</strong></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php   if (    isset($_SESSION['valide_rapport'])    ) {   ?>

                                    <div class="alert alert-warning">
                                        <?php   echo  ($_SESSION['valide_rapport']);    ?>
                                    </div>

                                <?php   }   ?>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
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
                                                <td><?php echo $gine['LIBELLE'];   ?> (<?php echo $gine['CODE_SER'];   ?>)</td>
                                                <td><?php    echo $gine['DESIGNATION_ART'];   ?> <?php    echo $gine['SPECIFICITE_ART'];   ?></td>
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
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal fade" id="Afficher" tablindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">
                        <img src="<?php echo base_url(); ?>bootstrap/images/64/002-tool.png" width="75" class="user-avatar rounded-circle" alt="" srcset="">
                        Fiche de Stock
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    

                    <!-- Modal body -->
                    <div class="login-form">
                        <form id ="Afficherform" action="<?php echo base_url('ArticleController/addition'); ?>" method="post" novalidate="novalidate">
                                
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- nome -->
                                        <label for="">Date</label>
                                        <input type="date" class="form-control col-md-6" name= "tite" id="ddebut">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control col-md-6" name= "tite" id="dfin">
                                            
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

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script>
        $(document).ready(function(){
            $('#idAfficher').on('click', function(def){
                def.preventDefault();
                $("#Afficher").modal('show');
                $("#Afficherform").on('submit', function(de){
                    de.preventDefault();
                    debut = $("#ddebut").val();
                    fin = $("#dfin").val();
                    // alert(debut+' au '+ fin);
                    var debut_encoded = encodeURIComponent(debut);
                    var fin_encoded = encodeURIComponent(fin);
                    var url = '<?php echo base_url()?>article/fiche?form=<?php echo $origine['FOR'];?>&&debut='+debut_encoded+'&&fin='+fin_encoded; 
                    window.location.href = url;

                })
            });
        });
    </script>


    


</html>