        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Demande</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="<?php echo base_url()?>Home">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url()?>Demande">Demande</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-home-tab" data-toggle="pill"
                                                href="#pills-home" role="tab" aria-controls="pills-home"
                                                aria-selected="true">Nouveau</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">
                                                En attente
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-refuse-tab" data-toggle="pill"
                                                href="#pills-refuse" role="tab" aria-controls="pills-refuse"
                                                aria-selected="false">Refusé</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-livring-tab" data-toggle="pill"
                                                href="#pills-livring" role="tab" aria-controls="pills-livring"
                                                aria-selected="false">En attente de livraison</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-livred-tab" data-toggle="pill"
                                                href="#pills-livred" role="tab" aria-controls="pills-livred"
                                                aria-selected="false">Livré</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                        <div class="tab-pane fade" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="" id="adding">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Catégorie</label>
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                    class="form-control zoneCategorie"
                                                                                    aria-label="Text input with dropdown button"
                                                                                    placeholder="Choisir un catégorie.........">
                                                                                <div class="input-group-append">
                                                                                    <button
                                                                                        class="btn btn-secondary btn-border selectCat"
                                                                                        type="button"><i
                                                                                            class="fas fa-align-justify"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal fade" id="selectCat" tabindex="-1"
                                                                        role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog  modal-lg"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header no-bd">
                                                                                    <h5 class="modal-title">
                                                                                        <span class="fw-mediumbold">
                                                                                            Selectionner</span>
                                                                                        <span class="fw-light">
                                                                                            une catégorie
                                                                                        </span>
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="table-responsive">
                                                                                            <table
                                                                                                id="add-rowCategories"
                                                                                                class="display table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>N°</th>
                                                                                                        <th>Catégorie
                                                                                                        </th>
                                                                                                        <th width="15%">
                                                                                                            Opération
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php foreach ($bigDemande['KATEGORY'] as $catego) {?>
                                                                                                    <tr
                                                                                                        id="<?=($catego['ID_CAT']);?>">
                                                                                                        <td><?=($catego['ID_CAT']);?>
                                                                                                        </td>
                                                                                                        <td><?=($catego['LABEL_CAT']);?>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div
                                                                                                                class="form-button-action">
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    title="Choisir"
                                                                                                                    class="btn btn-link btn-primary btn-lg titihieKategory"
                                                                                                                    data-original-title="Choose">
                                                                                                                    <i
                                                                                                                        class="fas fa-location-arrow"></i>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <?php }?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Article</label>
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                    class="form-control zoneArticle"
                                                                                    aria-label="Text input with dropdown button"
                                                                                    placeholder="Article...">
                                                                                <div class="input-group-append">
                                                                                    <button
                                                                                        class="btn btn-secondary btn-border selectArt"
                                                                                        type="button"><i
                                                                                            class="fas fa-align-justify"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal fade" id="selectArt" tabindex="-1"
                                                                        role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog  modal-lg"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header no-bd">
                                                                                    <h5 class="modal-title">
                                                                                        <span class="fw-mediumbold">
                                                                                            Selectionner</span>
                                                                                        <span class="fw-light">
                                                                                            un Artcile
                                                                                        </span>
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="table-responsive">
                                                                                            <table
                                                                                                id="add-rowCategoriesie"
                                                                                                class="display table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Formule</th>
                                                                                                        <th>Désignation
                                                                                                        </th>
                                                                                                        <th>Spécificition
                                                                                                        </th>
                                                                                                        <th>Unité</th>
                                                                                                        <th width="15%">
                                                                                                            Opération
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <th>N°</th>
                                                                                                        <th>Désignation
                                                                                                        </th>
                                                                                                        <th>Spécificition
                                                                                                        </th>
                                                                                                        <th>Unité</th>
                                                                                                        <th>Opération
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </tfoot>
                                                                                                <tbody
                                                                                                    id="bodytableArtcile">

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Quantité</label>
                                                                            <div class="input-group">
                                                                                <input type="number"
                                                                                    class="form-control zoneQuant"
                                                                                    id="quantitDem"
                                                                                    aria-label="Text input with dropdown button"
                                                                                    placeholder="Entrez le quantité">
                                                                                <div class="input-group-append">
                                                                                    <button
                                                                                        class="btn btn-secondary btn-border quantico"
                                                                                        type="button">Unité</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <button class="btn btn-primary addedd"
                                                                                id="addDemande" type="button"><i
                                                                                    class="fas fa-plus-circle"></i>
                                                                                Ajouter</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="modal fade" id="editDem" tabindex="-1"
                                                                    role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header no-bd">
                                                                                <h5 class="modal-title">
                                                                                    <span class="fw-mediumbold">
                                                                                        Modifier</span>
                                                                                    <span class="fw-light">
                                                                                        Demande
                                                                                    </span>
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="up_demande" action=""
                                                                                    method="post"
                                                                                    novalidate="novalidate">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="">Artilce</label>
                                                                                                <textarea name="" id=""
                                                                                                    cols="50" rows="2"
                                                                                                    name="dem_articlce"
                                                                                                    class="form-control dem_articlce"
                                                                                                    style="background-color: rgba(255, 255, 255, 0.3);"></textarea>
                                                                                                <!-- <input type="text" id="" name="dem_articlce" class="form-control dem_articlce" style="background-color: rgba(255, 255, 255, 0.3);"> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="">Quantité</label>
                                                                                                <div
                                                                                                    class="input-group">
                                                                                                    <input type="number"
                                                                                                        class="form-control up_DemQuant"
                                                                                                        id="up_DemQuant"
                                                                                                        aria-label="Text input with dropdown button"
                                                                                                        placeholder="Entrez le quantité">
                                                                                                    <div
                                                                                                        class="input-group-append">
                                                                                                        <button
                                                                                                            class="btn btn-secondary btn-border up_quantico"
                                                                                                            type="button">Unité</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <button type="submit"
                                                                                            class="btn btn-success lunchupdate">Modifier</button>
                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                            <!-- <div class="modal-footer no-bd">
                                                                                <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-button-action">

                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table id="add-rowDemandeList"
                                                                        class="display table table-striped table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Numérotation</th>
                                                                                <!-- <th style="display:none;">id_Cat</th> -->
                                                                                <th>Catégorie</th>
                                                                                <th>Designation</th>
                                                                                <th>Specification</th>
                                                                                <th>Quantité</th>
                                                                                <th>Unité</th>
                                                                                <th>Option</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="bodyAddingDEm">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <button class="btn btn-success validDemande"
                                                                            id="validDemande" type="button"><i
                                                                                class="fas fa-check-circle"></i>
                                                                            Valider</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">

                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="validationModal" tabindex="-1"
                                                                role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header no-bd">
                                                                            <h5 class="modal-title">
                                                                                <span class="fw-mediumbold">
                                                                                    Valider</span>
                                                                                <span class="fw-light">
                                                                                    Demande
                                                                                </span>
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="accDemForm" method="post"
                                                                                novalidate="novalidate">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label>Agent</label>
                                                                                            <textarea type="number"
                                                                                                class="form-control Agent"
                                                                                                name="ag"
                                                                                                id=""></textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label>Structure</label>
                                                                                            <textarea type="number"
                                                                                                class="form-control structure"
                                                                                                name="st"
                                                                                                id=""></textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label>Article</label>
                                                                                            <textarea type="number"
                                                                                                class="form-control article"
                                                                                                name="ar"
                                                                                                id=""></textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for="">Quantité
                                                                                                demandé</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="tite"
                                                                                                id="requestQ">

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for="">Quantité à
                                                                                                accorder</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="tite" id="acceptQ"
                                                                                                required>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="submit"
                                                                                        id="validationDem"
                                                                                        class="btn btn-success">Ajouter</button>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                        <!-- <div class="modal-footer no-bd">
                                                                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table id="add-row2"
                                                                    class="display table table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Matricule</th>
                                                                            <th>Nom</th>
                                                                            <th>Division</th>
                                                                            <th>Article</th>
                                                                            <th>Quantité</th>
                                                                            <th>Unité</th>
                                                                            <th>Date</th>
                                                                            <th>Etat</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        foreach  ($bigDemande['W'] as $request){
                                                                        // if()
                                                                    ?>
                                                                        <tr id="<?=($request['NUMEROTATION']);?>">
                                                                            <td><?=($request['MATRICULE']);?></td>
                                                                            <td><?=($request['NOM_UTIL_AG']);?></td>
                                                                            <td><?=($request['CODE_DIVISION']);?></td>
                                                                            <td><?=($request['DESIGNATION_ART']);?>
                                                                                <?=($request['SPECIFICITE_ART']);?></td>
                                                                            <td><?=($request['QUANTITE']);?></td>
                                                                            <td><?=($request['UNITE']);?></td>
                                                                            <td><?=($request['DATE_DEMANDE']);?></td>

                                                                            <td>
                                                                                <?php  if($_SESSION['agent']['TYPE_AG'] != 'USER' ){ ?>
                                                                                <?php if ($request['ETAT_DEMANDE'] == "En attente"){?>
                                                                                <!-- <a href="<?php //echo base_url('request/valide/'.$request['NUMEROTATION']);?>" title = "Valide" class="btn btn-primary">
                                                                                                <i class="ti-check-box"></i>
                                                                                            </a> -->
                                                                                <div class="form-button-action">

                                                                                    <button title="Accepter"
                                                                                        data-toggle="tooltip"
                                                                                        class="btn btn-icon btn-round btn-primary tovalide"
                                                                                        data-original-title="Edit Task">
                                                                                        <i class="fa fa-check"></i>
                                                                                    </button>
                                                                                    <a href="<?php echo base_url('demade/refuse/'.$request['NUMEROTATION']);?>"
                                                                                        class=" refusebtn">
                                                                                        <button title="Refuser"
                                                                                            class="btn btn-icon btn-round btn-danger"
                                                                                            data-toggle="tooltip"
                                                                                            class=""
                                                                                            data-original-title="Remove">
                                                                                            <i class="fas fa-times"></i>
                                                                                        </button>
                                                                                    </a>
                                                                                </div>
                                                                                <?php  }else{  ?>
                                                                                <h6 <?php if ($request['ETAT_DEMANDE'] == "Validé"){?>
                                                                                    class="font-weight-bold text-primary"
                                                                                    <?php }else{    
                                                                                                if($request['ETAT_DEMANDE'] == "Refusé"){?>
                                                                                    class="font-weight-bold text-danger"
                                                                                    <?php } }?>>

                                                                                    <?php    echo $request['ETAT_DEMANDE'];   ?>

                                                                                </h6>
                                                                                <?php   } ?>


                                                                                <?php  }else{ ?>
                                                                                <h6 <?php if ($request['ETAT_DEMANDE'] == "Validé"){?>
                                                                                    class="font-weight-bold text-primary"
                                                                                    <?php }else{    
                                                                                                if($request['ETAT_DEMANDE'] == "Refusé"){?>
                                                                                    class="font-weight-bold text-danger"
                                                                                    <?php }}?>>

                                                                                    <?php    echo $request['ETAT_DEMANDE'];   ?>

                                                                                </h6>
                                                                                <?php  } ?>
                                                                            </td>
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
                                        <div class="tab-pane fade" id="pills-refuse" role="tabpanel"
                                            aria-labelledby="pills-refuse-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <div class="d-flex align-items-center">
                                                            </div>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                <table id="add-row3"
                                                                    class="display table table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Matricule</th>
                                                                            <th>Nom</th>
                                                                            <th>Division</th>
                                                                            <th>Article</th>
                                                                            <th>Quantité</th>
                                                                            <th>Unité</th>
                                                                            <th>Date de validation</th>
                                                                            <th>Etat</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php   
                                                                    foreach  ($bigDemande['R'] as $request){
                                                                    // if()
                                                                ?>
                                                                        <tr id="<?=($request['NUMEROTATION']);?>">
                                                                            <td><?=($request['MATRICULE']);?></td>
                                                                            <td><?=($request['NOM_UTIL_AG']);?></td>
                                                                            <td><?=($request['LABEL_DIVISION']);?></td>
                                                                            <td><?=($request['DESIGNATION_ART']);?>
                                                                                <?=($request['SPECIFICITE_ART']);?></td>
                                                                            <td><?=($request['QUANTITE_ACC']);?></td>
                                                                            <td><?=($request['UNITE']);?></td>
                                                                            <td><?=($request['DATE_CONFIRM']);?></td>

                                                                            <td>
                                                                                <?php  if($_SESSION['agent']['TYPE_AG'] != 'USER' ){ ?>
                                                                                <?php if ($request['ETAT_DEMANDE'] == "En attente"){?>
                                                                                <!-- <a href="<?php //echo base_url('request/valide/'.$request['NUMEROTATION']);?>" title = "Valide" class="btn btn-primary">
                                                                                            <i class="ti-check-box"></i>
                                                                                        </a> -->
                                                                                <a href="<?php echo base_url('demade/validation/'.$request['NUMEROTATION']);?>"
                                                                                    title="Accepter"
                                                                                    class="btn btn-secondary">
                                                                                    <i class="ti-check-box"></i>
                                                                                </a>
                                                                                <a href="<?php echo base_url('demade/refuse/'.$request['NUMEROTATION']);?>"
                                                                                    title="Refuser"
                                                                                    class="btn btn-danger refusebtn">
                                                                                    <i class="fa fa-minus-square-o"></i>
                                                                                </a>
                                                                                <?php  }else{  ?>
                                                                                <h6 <?php if ($request['ETAT_DEMANDE'] == "Validé"){?>
                                                                                    class="font-weight-bold text-primary"
                                                                                    <?php }else{    
                                                                                            if($request['ETAT_DEMANDE'] == "Refusé"){?>
                                                                                    class="font-weight-bold text-danger"
                                                                                    <?php } }?>>

                                                                                    <?php    echo $request['ETAT_DEMANDE'];   ?>

                                                                                </h6>
                                                                                <?php   } ?>


                                                                                <?php  }else{ ?>
                                                                                <h6 <?php if ($request['ETAT_DEMANDE'] == "Validé"){?>
                                                                                    class="font-weight-bold text-primary"
                                                                                    <?php }else{    
                                                                                            if($request['ETAT_DEMANDE'] == "Refusé"){?>
                                                                                    class="font-weight-bold text-danger"
                                                                                    <?php }}?>>

                                                                                    <?php    echo $request['ETAT_DEMANDE'];   ?>

                                                                                </h6>
                                                                                <?php  } ?>
                                                                            </td>
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
                                        <div class="tab-pane fade" id="pills-livring" role="tabpanel"
                                            aria-labelledby="pills-livring-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <div class="d-flex align-items-center">

                                                            </div>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                <table id="add-row4"
                                                                    class="display table table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Matricule</th>
                                                                            <th>Nom</th>
                                                                            <th>Division</th>
                                                                            <th>Article</th>
                                                                            <th>Quantité</th>
                                                                            <th>Unité</th>
                                                                            <th>Date validation</th>
                                                                            <th>Etat</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php   
                                                                    foreach  ($bigDemande['Li'] as $request){
                                                                    // if()
                                                                ?>
                                                                        <tr id="<?=($request['NUMEROTATION']);?>">
                                                                            <td><?=($request['MATRICULE']);?></td>
                                                                            <td><?=($request['NOM_UTIL_AG']);?></td>
                                                                            <td><?=($request['CODE_DIVISION']);?></td>
                                                                            <td><?=($request['DESIGNATION_ART']);?>
                                                                                <?=($request['SPECIFICITE_ART']);?></td>
                                                                            <td><?=($request['QUANTITE']);?></td>
                                                                            <td><?=($request['UNITE']);?></td>
                                                                            <td><?=($request['DATE_CONFIRM']);?></td>

                                                                            <td>
                                                                                <?php  if($_SESSION['agent']['TYPE_AG'] === 'USER' ){ ?>
                                                                                <!-- <a href="<?php //echo base_url('request/valide/'.$request['NUMEROTATION']);?>" title = "Valide" class="btn btn-primary">
                                                                                                <i class="ti-check-box"></i>
                                                                                            </a> -->
                                                                                <div class="form-button-action">

                                                                                    <button title="Réçu"
                                                                                        data-toggle="tooltip"
                                                                                        class="btn btn-icon btn-round btn-primary toreceive"
                                                                                        data-original-title="Edit Task">
                                                                                        <i class="fas fa-receipt"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <?php  }else{  ?>
                                                                                <h6 class="font-weight-bold">
                                                                                    En attente de livraison
                                                                                </h6>
                                                                                <?php   } ?>
                                                                            </td>
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
                                        <div class="tab-pane fade" id="pills-livred" role="tabpanel"
                                            aria-labelledby="pills-livred-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="add-row5"
                                                                    class="display table table-striped table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Matricule</th>
                                                                            <th>Nom</th>
                                                                            <th>Division</th>
                                                                            <th>Article</th>
                                                                            <th>Quantité</th>
                                                                            <th>Unité</th>
                                                                            <th>Date de la livraison</th>
                                                                            <th>Etat</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php   
                                                                    foreach  ($bigDemande['L'] as $request){
                                                                    // if()
                                                                ?>
                                                                        <tr id="<?=($request['NUMEROTATION']);?>">
                                                                            <td><?=($request['MATRICULE']);?></td>
                                                                            <td><?=($request['NOM_UTIL_AG']);?></td>
                                                                            <td><?=($request['CODE_DIVISION']);?></td>
                                                                            <td><?=($request['DESIGNATION_ART']);?>
                                                                                <?=($request['SPECIFICITE_ART']);?></td>
                                                                            <td><?=($request['QUANTITE_ACC']);?></td>
                                                                            <td><?=($request['UNITE']);?></td>
                                                                            <td><?=($request['DATE_DEMANDE']);?></td>

                                                                            <td>
                                                                                <?php  if($_SESSION['agent']['TYPE_AG'] != 'USER' ){ ?>
                                                                                <?php if ($request['ETAT_DEMANDE'] == "En attente"){?>
                                                                                <!-- <a href="<?php //echo base_url('request/valide/'.$request['NUMEROTATION']);?>" title = "Valide" class="btn btn-primary">
                                                                                            <i class="ti-check-box"></i>
                                                                                        </a> -->
                                                                                <a href="<?php echo base_url('demade/validation/'.$request['NUMEROTATION']);?>"
                                                                                    title="Accepter"
                                                                                    class="btn btn-secondary">
                                                                                    <i class="ti-check-box"></i>
                                                                                </a>
                                                                                <a href="<?php echo base_url('demade/refuse/'.$request['NUMEROTATION']);?>"
                                                                                    title="Refuser"
                                                                                    class="btn btn-danger refusebtn">
                                                                                    <i class="fa fa-minus-square-o"></i>
                                                                                </a>
                                                                                <?php  }else{  ?>
                                                                                <h6 <?php if ($request['ETAT_DEMANDE'] == "Validé"){?>
                                                                                    class="font-weight-bold text-primary"
                                                                                    <?php }else{    
                                                                                            if($request['ETAT_DEMANDE'] == "Refusé"){?>
                                                                                    class="font-weight-bold text-danger"
                                                                                    <?php } }?>>

                                                                                    <?php    echo $request['ETAT_DEMANDE'];   ?>

                                                                                </h6>
                                                                                <?php   } ?>


                                                                                <?php  }else{ ?>
                                                                                <h6 <?php if ($request['ETAT_DEMANDE'] == "Validé"){?>
                                                                                    class="font-weight-bold text-primary"
                                                                                    <?php }else{    
                                                                                            if($request['ETAT_DEMANDE'] == "Refusé"){?>
                                                                                    class="font-weight-bold text-danger"
                                                                                    <?php }}?>>

                                                                                    <?php    echo $request['ETAT_DEMANDE'];   ?>

                                                                                </h6>
                                                                                <?php  } ?>
                                                                            </td>
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
        </div>

        <script>
$(document).ready(function() {

    $('#postDem').on('submit', function(e) {
        e.preventDefault();
        // alert('mlay bro');
        var donne = $(this).serialize();
        url = $(this).attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: donne,
            dataType: 'json',
            success: function(reponse, status) {
                console.log(reponse);
                // alert('ts ay');

                if (reponse.error) {
                    if (reponse.form_error.designation) {
                        var error = reponse.form_error.designation;
                    } else {
                        if (reponse.form_error.specificite) {
                            var error = reponse.form_error.specificite;
                        } else {
                            if (reponse.form_error.quantite) {
                                var error = reponse.form_error.quantite;
                            } else {
                                if (reponse.form_error.unite) {
                                    var error = reponse.form_error.unite;
                                } else {
                                    var error = reponse.error;
                                }
                            }
                        }
                    }
                    swal("Echèc", error, {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger'
                            }
                        },
                    });
                    console.log(error);
                } else {
                    if (reponse.success) {
                        swal("Succés", reponse.success, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success',

                                }
                            },
                        }).then((Delete) => {
                            if (Delete) {
                                window.location.reload();
                            }

                        });

                    }
                }
            }
        })

    })
});
        </script>
        <!-- selection -->
        <script src="<?php echo base_url('bootstrap/myapps/navigation/newDemande.js');?>"></script>
        <script src="<?php echo base_url('bootstrap/myapps/navigation/demande.js');?>"></script>
        <script src="<?php echo base_url('bootstrap/myapps/navigation/presentation.js');?>"></script>