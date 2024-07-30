        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Profile utilisateur</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <a href="<?php echo base_url('Home');?>" class="btn-round ml-auto"
                                            id="backProfil">&times;
                                        </a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="modal fade" id="passModal" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Soyez informez que la session sera redémarrée pour
                                                        changer le mot de passe</p>
                                                    <form id="passform" action="" method="post" novalidate="novalidate">

                                                        <div class="row">
                                                            <div class="col-12">

                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Nouveau Mot de Passe</label>
                                                                    <input type="password" maxlength="8"
                                                                        placeholder="********" required
                                                                        class="form-control" id="newpass" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Confirmation</label>
                                                                    <input type="password" maxlength="8"
                                                                        class="form-control" required
                                                                        placeholder="Confirmer votre mot de passe"
                                                                        id="confpass" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="btn btn-success">Valider</button>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-12" id="xmonta">
                                                                <div class="form-group" >
                                                                </div>
                                                                
                                                            </div> -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="formEditUserprof"
                                        action="<?php echo base_url('UserController/modification');?>"
                                        enctype="multipart/form-data" method="post">

                                        <div class="row">
                                            <div class="col-3">
                                                <input type="file" id="backPhoto" name="photo"
                                                    class="file-upload-default back">

                                                <img id="idavatarprof"
                                                    src="<?php echo base_url(); ?>/bootstrap/images/profil/user.png"
                                                    class="rounded-circle file-upload-browse" width="150" alt=""
                                                    srcset="">
                                            </div>
                                            <div class="col-8">
                                                <h3 class="" id="idxnompof">
                                                </h3>
                                                <h3 class="" id="idxprenomprof">
                                                </h3>
                                                <h4 class="text-secondary">
                                                    <span class="text-success" id="idxdivprof">

                                                    </span> <br id="idxfonprof">

                                                </h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Nom</label>
                                                    <input type="text" value="" id='editNomprof' class="form-control"
                                                        name="nom_ag">
                                                    <input type="text" id="hideIdprof" class="form-control"
                                                        value="<?php echo($_SESSION['agent']['MATRICULE']); ?>"
                                                        name="matprof">
                                                    <input type="text" id="hideTypeprof" class="form-control"
                                                        value="<?php echo($_SESSION['agent']['TYPE_AG']); ?>"
                                                        name="type">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Prénom</label>
                                                    <input type="text" value="" id='editPrenomprof' class="form-control"
                                                        name="prenom_ag">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Nom utilisateur</label>
                                                        <input type="text" value="" id='editNomUtilprof'
                                                            class="form-control" name="nomutil_ag">
                                                    </div>
                                                </div>
                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="mail_ag" value="" id="editMailprof"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Adresse</label>
                                                    <input type="text" name="adresse_ag" value="" id="editAdressprof"
                                                        class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <label>Contact</label>
                                                    <input type="text" name="tel_ag" value="" id="editContactprof"
                                                        class="form-control">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Mot de passe</label>
                                                    <input type="text" name="pass_ag" value="" placeholder="***********"
                                                        id="editPassprof" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Modifier</button>
                                        </div>
                                    </form>
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


        <script src="<?php echo base_url();?>bootstrap/login_assets/js/file-upload.js"></script>

        <script src="<?php echo base_url('bootstrap/myapps/jquery/profil.js');?>"></script>