<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Stock</h4>
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
                        <a href="<?php echo base_url()?>article/data">Article</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url()?>article/data">Stock</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Nouveau</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">Sortie</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div class="tab-pane fade" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <div class="card-body">
                                                    <hr>
                                                    <form id="add_form2"
                                                        action="<?php echo base_url('ArticleController/insertion'); ?>"
                                                        method="post" novalidate="novalidate">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Compte</label>
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control areaCompte"
                                                                            aria-label="Text input with dropdown button"
                                                                            placeholder="Choisir un compte...">
                                                                        <div class="input-group-append">
                                                                            <button
                                                                                class="btn btn-secondary btn-border selectCompte"
                                                                                type="button"><i
                                                                                    class="fas fa-align-justify"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="selectCompte" tabindex="-1"
                                                                    role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header no-bd">
                                                                                <h5 class="modal-title">
                                                                                    <span class="fw-mediumbold">
                                                                                        Selectionner</span>
                                                                                    <span class="fw-light">
                                                                                        un compte
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
                                                                                        <table id="add-rowcompte"
                                                                                            class="display table table-striped table-hover">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Compte</th>
                                                                                                    <th>Libellé compte
                                                                                                    </th>
                                                                                                    <th width="15%">
                                                                                                        Opération</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php   
                                                                                                        
                                                                                                            
                                                                                                        foreach  ($metasy['COU'] as $country){
                                                                                                        // if()
                                                                                                    ?>
                                                                                                <tr
                                                                                                    id="<?php echo $country['NUM_CMPT'];   ?>">
                                                                                                    <td><?php echo $country['NUM_CMPT'];   ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $country['DESIGNATION_CMPT'];   ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <div
                                                                                                            class="form-button-action">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                title="Choisir"
                                                                                                                class="btn btn-link btn-primary btn-lg chooseCmpt"
                                                                                                                data-original-title="Choose">
                                                                                                                <i
                                                                                                                    class="fas fa-location-arrow"></i>
                                                                                                            </button>
                                                                                                        </div>
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
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Categorie</label>
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control areaCategorie"
                                                                            aria-label="Text input with dropdown button"
                                                                            placeholder="Choisir une catégorie...">
                                                                        <div class="input-group-append">
                                                                            <button
                                                                                class="btn btn-secondary btn-border selectCategorie"
                                                                                type="button"><i
                                                                                    class="fas fa-align-justify"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="selectCategorie"
                                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-lg" role="document">
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
                                                                                        <table id="add-rowCategorie"
                                                                                            class="display table table-striped table-hover">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>N°</th>
                                                                                                    <th>Catégorie</th>
                                                                                                    <th width="15%">
                                                                                                        Opération</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="bodytableCtg">
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
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Designation</label>
                                                                    <input type="text" id="id_designation2"
                                                                        name="designation" class="form-control"
                                                                        style="background-color: rgba(255, 255, 255, 0.3);">
                                                                    <small><?php   echo form_error('designation');    ?></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Specificite</label>
                                                                    <input type="text" id="specification2"
                                                                        name="specificite" class="form-control"
                                                                        style="background-color: rgba(255, 255, 255, 0.3);">
                                                                    <small><?php   echo form_error('specificite');    ?></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Type d'Unité</label>
                                                                    <select name="unite_art" id="manchester"
                                                                        class="form-control"
                                                                        style="background-color: rgba(255, 255, 255, 0.3);">
                                                                        <option value="Nombre">Nombre</option>
                                                                        <option value="Litre">Litre</option>
                                                                        <option value="Mètre">Mètre</option>
                                                                        <option value="Boîte">Boîte</option>
                                                                    </select>
                                                                    <!-- <input type="text" name="unite_art" class="form-control" style="background-color: rgba(255, 255, 255, 0.3);">> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-success">Insérer</button>
                                                        </div>

                                                    </form>
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
                                                <div class="card-body">
                                                    <hr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="AdditionModal" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <ul style="position:absolute; margin-top:5px; margin-left:20%;"
                                                                            class="nav nav-pills nav-secondary nav-pills-no-bd"
                                                                            id="pills-tab-without-border"
                                                                            role="tablist">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active"
                                                                                    id="pills-modification-tab-nobd"
                                                                                    data-toggle="pill"
                                                                                    href="#pills-modification-nobd"
                                                                                    role="tab"
                                                                                    aria-controls="pills-modification-nobd"
                                                                                    aria-selected="true">Addition</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    id="pills-rectification-tab-nobd"
                                                                                    data-toggle="pill"
                                                                                    href="#pills-rectification-nobd"
                                                                                    role="tab"
                                                                                    aria-controls="pills-rectification-nobd"
                                                                                    aria-selected="false">Rectification</a>
                                                                            </li>
                                                                        </ul>
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="tab-content mt-2 mb-3"
                                                                        id="pills-without-border-tabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="pills-modification-nobd" role="tabpanel"
                                                                            aria-labelledby="pills-modification-tab-nobd">
                                                                            <form id="fournisform"
                                                                                action="<?php echo base_url('ArticleController/addition'); ?>"
                                                                                method="post" novalidate="novalidate">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label for="">Ajout
                                                                                            d'article</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label
                                                                                                for="">Origine</label>
                                                                                            <select class="form-control"
                                                                                                name="gine">

                                                                                                <?php
                                                                                                            foreach  ($metasy['SER']['servs'] as $service){ 
                                                                                                        ?>
                                                                                                <option
                                                                                                    value="<?php echo($service['CODE_SER']); ?>">
                                                                                                    <?php echo($service['CODE_SER']); ?>
                                                                                                    -
                                                                                                    <?php echo($service['LIBELLE']); ?>
                                                                                                </option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for=""
                                                                                                id="idQua">Quantité
                                                                                                <label
                                                                                                    id="labelUnicite"></label></label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="tite"
                                                                                                id="id_effectif"
                                                                                                required>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">

                                                                                            <label for="">Prix</label>
                                                                                            <select class="form-control"
                                                                                                id="type_prix">
                                                                                                <option value="yes">
                                                                                                    Unitaire</option>
                                                                                                <option value="No">
                                                                                                    Montant</option>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group"
                                                                                            id="xunitaire">
                                                                                            <!-- nome -->
                                                                                            <label for="">Prix
                                                                                                Unitaire</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="taire"
                                                                                                id="prix_uni">

                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-12" id="xmonta">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for="">Montant
                                                                                                total</label>
                                                                                            <input type="number"
                                                                                                id="id_montant"
                                                                                                class="form-control"
                                                                                                name="tant"
                                                                                                id="id_montant">

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="submit"
                                                                                        class="btn btn-success">Ajouter</button>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                            id="pills-rectification-nobd"
                                                                            role="tabpanel"
                                                                            aria-labelledby="pills-rectification-tab-nobd">
                                                                            <form id="restrictionform"
                                                                                action="<?php echo base_url('ArticleController/addition'); ?>"
                                                                                method="post" novalidate="novalidate">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label for="">Rectification en
                                                                                            cas d'erreur de saisie à
                                                                                            l'entrée</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for="">SOA</label>
                                                                                            <select class="form-control"
                                                                                                name="gine">

                                                                                                <?php
                                                                                                            foreach  ($metasy['SER']['servs'] as $service){ 
                                                                                                        ?>
                                                                                                <option
                                                                                                    value="<?php echo($service['CODE_SER']); ?>">
                                                                                                    <?php echo($service['CODE_SER']); ?>
                                                                                                    -
                                                                                                    <?php echo($service['LIBELLE']); ?>
                                                                                                </option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label
                                                                                                for="">Description</label>
                                                                                            <textarea
                                                                                                class="form-control"
                                                                                                cols="30" rows="2"
                                                                                                name="description">
                                                                                                    </textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for="">Quantité à
                                                                                                rectifier</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="tite"
                                                                                                id="id_effectifR"
                                                                                                required>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">

                                                                                            <label for="">Prix</label>
                                                                                            <select class="form-control"
                                                                                                id="restritype_prix">
                                                                                                <option value="yes">
                                                                                                    Unitaire</option>
                                                                                                <option value="No">
                                                                                                    Montant</option>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group"
                                                                                            id="restriunitaire">
                                                                                            <!-- nome -->
                                                                                            <label for="">Prix
                                                                                                Unitaire</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="taire"
                                                                                                id="prix_uniR">

                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-12"
                                                                                        id="restrimonta">
                                                                                        <div class="form-group">
                                                                                            <!-- nome -->
                                                                                            <label for="">Montant
                                                                                                total</label>
                                                                                            <input type="number"
                                                                                                id="id_montantR"
                                                                                                class="form-control"
                                                                                                name="tant"
                                                                                                id="id_montantR">

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="submit"
                                                                                        class="btn btn-success">Rectifier</button>
                                                                                </div>

                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="modal-footer no-bd">
                                                                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                            Modifier</span>
                                                                        <span class="fw-light">
                                                                            Article
                                                                        </span>
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form id="up_form"
                                                                        action="<?php echo base_url('ArticleController/update'); ?>"
                                                                        method="post" novalidate="novalidate">

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Designation</label>
                                                                                    <input type="text"
                                                                                        id="up_designation"
                                                                                        name="udesignation"
                                                                                        class="form-control"
                                                                                        style="background-color: rgba(255, 255, 255, 0.3);">
                                                                                    <small><?php   echo form_error('udesignation');    ?></small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Specification
                                                                                        technique</label>
                                                                                    <input type="text"
                                                                                        id="up_specificite"
                                                                                        name="uspecificite"
                                                                                        class="form-control"
                                                                                        style="background-color: rgba(255, 255, 255, 0.3);">
                                                                                    <small><?php   echo form_error('uspecificite');    ?></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for=""
                                                                                        id="labelQ">Quantité</label>
                                                                                    <input type="text" type="number"
                                                                                        id="up_quantit"
                                                                                        name="up_quantit"
                                                                                        class="form-control modifQuant">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Unité</label>
                                                                                    <input type="text" id="up_unite"
                                                                                        name="uunite"
                                                                                        class="form-control"
                                                                                        style="background-color: rgba(255, 255, 255, 0.3);">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                class="btn btn-success lunchupdate">Modifier</button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table id="lisetArticle"
                                                            class="display table table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>N°</th>
                                                                    <th>Categorie</th>
                                                                    <th>Designation</th>
                                                                    <th>Specificité</th>
                                                                    <th>Effectif</th>
                                                                    <th>Unité</th>
                                                                    <th>Opération</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php   
                                                                        
                                                                            
                                                                        foreach  ($arti as $artis){
                                                                        // if()
                                                                    ?>
                                                                <tr id="<?php echo $artis['FORMULE'];   ?>">

                                                                    <td><?php echo $artis['FORMULE'];   ?></td>
                                                                    <td><?php echo $artis['LABEL_CAT'];   ?></td>

                                                                    <td class="design"><?php
                                                                            echo $artis['DESIGNATION_ART'];   ?></td>
                                                                    <td class="cifici">
                                                                        <?php  echo $artis['SPECIFICITE_ART'];   ?></td>
                                                                    <td><?php    echo $artis['EFFECTIF_ART'];   ?></td>
                                                                    <td><?php    echo $artis['UNITE_ART'];   ?></td>
                                                                    <td>
                                                                        <div class="form-button-action">
                                                                            <button type="button" title="Ajouter"
                                                                                class="btn btn-link btn-primary btn-lg addArt"
                                                                                data-original-title="Edit Task">
                                                                                <i class="fas fa-plus-circle"></i>
                                                                            </button>
                                                                            <button type="button" title="Modifier"
                                                                                class="btn btn-link btn-secondary upDate"
                                                                                data-original-title="Remove">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>
                                                                            <button type="button" title="Supprimer"
                                                                                class="btn btn-link btn-danger btn-lg deleteArt"
                                                                                data-original-title="Edit Task">
                                                                                <i class="fa fa-times"></i>
                                                                            </button>
                                                                            <a href="<?php echo base_url('article/datail?formule='.$artis['FORMULE']);?>"
                                                                                title="Details"
                                                                                class="btn btn-link btn-secondary"
                                                                                data-original-title="Remove">
                                                                                <i class="fas fa-info-circle"></i>
                                                                            </a>
                                                                        </div>
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
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <div class="card-body">
                                                    <hr>
                                                    <div class="table-responsive">
                                                        <table id="add-row2"
                                                            class="display table table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Nom</th>
                                                                    <th>Division</th>
                                                                    <th>Quantité</th>
                                                                    <th>Unité</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php   
                                                                    
                                                                        
                                                                        foreach  ($metasy['SORT']['sortie'] as $artis){
                                                                        // if()
                                                                    ?>

                                                                <tr id="<?php //echo $artis['FORMULE'];   ?>">

                                                                    <td><?php echo $artis['DATE_SORTIE'];   ?></td>
                                                                    <td>
                                                                        <?php if ($artis['GENRE'] ==='M'){ ?>
                                                                        Mr
                                                                        <?php }else{?>
                                                                        Mme
                                                                        <?php }?>
                                                                        <?php echo ($artis['PRENOM_AG']);?>
                                                                    </td>

                                                                    <td class="design">
                                                                        <?php echo $artis['CODE_SER'];   ?> -
                                                                        <?php echo $artis['LABEL_DIVISION'];   ?></td>
                                                                    <td class="cifici">
                                                                        <?php  echo $artis['QUANTITE'];   ?></td>
                                                                    <td><?php    echo $artis['UNITE'];   ?></td>
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
<!-- Navigation -->
<script src="<?php echo base_url('bootstrap/myapps/navigation/navigation.js');?>"></script>
<!-- insert a new Article -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/insertion_art.js');?>"></script>
<!-- delete an Article -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/delete_art.js');?>"></script>
<!-- upadete an Article -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/update_art.js');?>"></script>
<!-- add a new Article -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/add_art.js');?>"></script>
<!-- selection -->
<script src="<?php echo base_url('bootstrap/myapps/navigation/selection.js');?>"></script>
<script>
$(document).ready(function() {
    $('#lisetArticle').DataTable();
})
</script>