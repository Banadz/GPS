		<div class="main-panel">
		    <div class="content">
		        <div class="page-inner">
		            <div class="page-header">
		                <h4 class="page-title">Liste des Agents</h4>
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
		                        <a href="<?php echo base_url()?>user/data">Agents</a>
		                    </li>
		                </ul>
		            </div>
		            <div class="row">

		                <div class="col-md-12">
		                    <div class="card">
		                        <div class="card-header">
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
		                            </ul>
		                            <!-- <div class="d-flex align-items-center">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#userAdModal">
											<i class="fa fa-plus"></i>
											Nouveau
										</button>
									</div> -->
		                        </div>
		                        <div class="card-body">
		                            <!-- Modal -->
		                            <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-hidden="true">
		                                <div class="modal-dialog modal-lg" role="document">
		                                    <div class="modal-content">
		                                        <div class="modal-header no-bd">
		                                            <div class="row">
		                                                <div class="col-md-4">

		                                                    <div class="avatar avatar-xxl">
		                                                        <img id="idavatar"
		                                                            src="<?php echo base_url(); ?>/bootstrap/images/profil/user.png"
		                                                            class="avatar-img rounded-circle" width="150">
		                                                    </div>
		                                                </div>
		                                                <div class="col-md-8">
		                                                    <h3 class="" id="idxnom">
		                                                    </h3>
		                                                    <h3 class="" id="idxprenom">
		                                                    </h3>
		                                                    <h4 class="text-secondary">
		                                                        <span class="text-success" id="idxdiv">

		                                                        </span> <br id="idxfon">

		                                                    </h4>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="modal-body">
		                                            <form id="formEditUser"
		                                                action="<?php echo base_url('UserController/modificationProf');?>"
		                                                method="post">

		                                                <div class="row">
		                                                    <div class="col-4">
		                                                        <div class="form-group">
		                                                            <label for="">Matricule</label>
		                                                            <input type="text" id="idim" class="form-control" disabled
		                                                                value="">
		                                                            <input type="text" id="hideId" class="form-control"
		                                                                value="" name="mat">
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-8">
		                                                        <div class="form-group">
		                                                            <label for="">Nom</label>
		                                                            <input type="text" value="" id='editNom'
		                                                                class="form-control" disabled name="nom_ag">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group">
		                                                    <div class="row">
		                                                        <div class="col-6">
		                                                            <div class="form-group">
		                                                                <label for="">Prénom</label>
		                                                                <input type="text" value="" id='editPrenom'
		                                                                    class="form-control" name="prenom_ag" disabled>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-6">

		                                                            <div class="form-group">
		                                                                <label>Division</label>
		                                                                <select class="form-control" id="editDivision"
		                                                                    name="division">

		                                                                </select>
		                                                            </div>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group">
		                                                    <div class="row">
		                                                        <div class="col-6">
		                                                            <label>Fonction</label>
		                                                            <input type="text" value="" id="editFon"
		                                                                class="form-control" name="fonction_ag">
		                                                        </div>
		                                                        <div class="col-6">
		                                                            <label>Type</label>
		                                                            <select name="type_ag" id="editType" class="form-control">

		                                                            </select>

		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group">
		                                                    <div class="row">
		                                                        <div class="col-6">
		                                                            <label>Email</label>
		                                                            <input type="text" name="mail_ag" disabled value=""
		                                                                id="editMail" class="form-control">

		                                                        </div>
		                                                        <div class="col-6">
		                                                            <label>Contact</label>
		                                                            <input type="text" name="tel_ag" disabled value=""
		                                                                id="editContact" class="form-control">

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
		                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
		                                <div class="tab-pane fade" id="pills-home" role="tabpanel"
		                                    aria-labelledby="pills-home-tab">
		                                    <div class="row">
		                                        <div class="table-responsive">
		                                            <form id="addUserfrom"
		                                                action="<?php echo base_url('UserController/insertion');?>"
		                                                method="POST" enctype="multipart/form-data">
		                                                <div class="modal-body">
		                                                    <div class="row s1">
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Nom</label>
		                                                                <input type="text" class="form-control"
		                                                                    name="fistname" id="uname"
		                                                                    value="<?php if(isset($_POST['fistname'])){     echo ($_POST['fistname']);  }?>"
		                                                                    placeholder="Entrez votre nom...." required
		                                                                    maxlength="50">
		                                                                <small><?php   echo form_error('fistname');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Prénom</label>
		                                                                <input type="text" class="form-control" name="surname"
		                                                                    value="<?php if(isset($_POST['surname'])){     echo ($_POST['surname']);  }?>"
		                                                                    placeholder="Entrez votre prénom....">
		                                                                <small><?php   echo form_error('surname');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-6">
		                                                            <div class="form-group">
		                                                                <label>Adresse</label>
		                                                                <input type="text" id="uadress" class="form-control"
		                                                                    name="address"
		                                                                    value="<?php if(isset($_POST['phone'])){     echo ($_POST['address']);  }?>"
		                                                                    placeholder="Adresse physique">
		                                                                <small><?php   echo form_error('address');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-6">
		                                                            <div class="form-group">
		                                                                <label for="gender"
		                                                                    class="label-default">Genre:</label>
		                                                                <select class="form-control" name="gender">
		                                                                    <option value="M">Masculin</option>
		                                                                    <option value="F">Feminin</option>
		                                                                </select>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12" style="margin-bottom: 80px;">
		                                                        </div>
		                                                    </div>
		                                                    <div class="row s2">
		                                                        <div class="col-6">
		                                                            <div class="form-group">
		                                                                <label>Matricule</label>
		                                                                <input type="text" id="im" class="form-control"
		                                                                    name="matri"
		                                                                    value="<?php if(isset($_POST['matri'])){     echo ($_POST['matri']);    }?>"
		                                                                    placeholder="N°" required maxlength="6">

		                                                            </div>
		                                                        </div>
		                                                        <div class="col-6">
		                                                            <div class="form-group">
		                                                                <label>Porte</label>
		                                                                <input type="text" placeholder="Porte N°01" id="porte"
		                                                                    class="form-control" name="porte"
		                                                                    value="<?php if(isset($_POST['porte'])){     echo ($_POST['porte']);    }?>"
		                                                                    required maxlength="5">

		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Service</label>
		                                                                <select class="form-control" name="service"
		                                                                    id="id_service" required>
		                                                                    <?php   if($_SESSION['agent']['TYPE_AG'] == "Admin"){  ?>
		                                                                    <option
		                                                                        value="<?php  echo ($_SESSION['agent_ser']['0']['CODE_SER']);  ?>">
		                                                                        <?php  echo ($_SESSION['agent_ser']['0']['LIBELLE']);  ?>
		                                                                    </option>
		                                                                    <?php   }else{ ?>
		                                                                    <?php   foreach  ($vice as $service){ ?>
		                                                                    <option
		                                                                        value="<?php  echo ($service['CODE_SER']);  ?>">
		                                                                        <?php  echo ($service['LIBELLE']);  ?>
		                                                                    </option>
		                                                                    <?php   }  ?>
		                                                                    <?php  } ?>
		                                                                    <!-- <option value="SRSPHM">Service Regional de la Solde et des Pensions HAUTE MATSIATRA</option> -->
		                                                                </select>
		                                                                <small><?php   echo form_error('service');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Division</label>
		                                                                <select class="form-control" name="division"
		                                                                    id="id_division" required>

		                                                                </select>
		                                                                <small><?php   echo form_error('division');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-6">
		                                                            <div class="form-group">
		                                                                <label>Fonction</label>
		                                                                <input text="text" class="form-control" id="ufunction"
		                                                                    name="function"
		                                                                    value="<?php if(isset($_POST['function'])){     echo ($_POST['function']);  }?>"
		                                                                    placeholder="Votre fonction dans cette division...."
		                                                                    required maxlength="200">
		                                                                <small><?php   echo form_error('function');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-6">
		                                                            <div class="form-group">
		                                                                <label>Type</label>
		                                                                <select class="form-control" name="type" required>
		                                                                    <?php   if($_SESSION['agent']['TYPE_AG'] == "Admin"){  ?>
		                                                                    <option value="USER">Détenteur</option>
		                                                                    <?php   }else{ ?>
		                                                                    <option value="Admin">Dépositaire</option>
		                                                                    <option value="USER">Détenteur</option>
		                                                                    <?php  } ?>
		                                                                </select>
		                                                            </div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="row s3">

		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Nom en tant qu'Utilisateur</label>
		                                                                <input type="text" class="form-control" name="usename"
		                                                                    id="username"
		                                                                    value="<?php if(isset($_POST['surname'])){     echo ($_POST['usename']);  }?>"
		                                                                    placeholder="Un titre de votre profil...."
		                                                                    required maxlength="50">
		                                                                <small><?php   echo form_error('usename');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Mail</label>
		                                                                <input type="text" class="form-control" name="mail"
		                                                                    id="uemail"
		                                                                    value="<?php if(isset($_POST['mail'])){     echo ($_POST['mail']);  }?>"
		                                                                    placeholder="email@gmail.com" required
		                                                                    maxlength="50">
		                                                                <small><?php   echo form_error('mail');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Téléphone</label>
		                                                                <input type="text" class="form-control" name="phone"
		                                                                    id="uphone"
		                                                                    value="<?php if(isset($_POST['phone'])){     echo ($_POST['phone']);  }?>"
		                                                                    placeholder="+261 34" required maxlength="17">
		                                                                <small><?php   echo form_error('phone');    ?></small>
		                                                            </div>
		                                                        </div>
		                                                        <div class="col-md-12">
		                                                            <div class="form-group">
		                                                                <label>Photo</label>
		                                                                <input type="FILE" class="form-control" name="photo">
		                                                                <!-- <small><?php  //if(isset($im_error)){echo ($im_error);}    ?></small> -->
		                                                            </div>
		                                                        </div>
		                                                        <!-- <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Password</label>
                                                                        <input type="password" id ="idpass" class="form-control" name="password" placeholder="*******" required maxlength ="8">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Confirm Password</label>
                                                                        <input type="password" class="form-control" name="conf_password" id="cpassId" placeholder="" maxlength="8" required>
                                                                        
                                                                    </div> -->
		                                                        <!-- </div> -->
		                                                    </div>
		                                                    <div class="row text-align-center"
		                                                        style="position:absolute; margin-left:45%">
		                                                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd"
		                                                            id="pills-tab" role="tablist">
		                                                            <li class="nav-item">
		                                                                <a class="nav-link numerotation1 active" id="">1</a>
		                                                            </li>
		                                                            <li class="nav-item">
		                                                                <a class="nav-link numerotation2 next"
		                                                                    id="next1">2</a>
		                                                            </li>
		                                                            <li class="nav-item">
		                                                                <a class="nav-link numerotation3" id="">3</a>
		                                                            </li>
		                                                        </ul>
		                                                    </div>
		                                                </div>
		                                                <div class="modal-footer col-12 s1" style="margin-top:5%;">
		                                                    <button type="button" id="cancel1"
		                                                        class="btn btn-danger cancel">Annuler
		                                                    </button>
		                                                    <button type="button" id="next1"
		                                                        class="btn btn-primary next">Suivant
		                                                    </button>
		                                                </div>
		                                                <div class="modal-footer col-12 s2" style="margin-top:5%;">
		                                                    <button type="button" id="previous1"
		                                                        class="btn btn-danger previous">Précédent
		                                                    </button>
		                                                    <button type="button" id="next2"
		                                                        class="btn btn-primary next">Suivant
		                                                    </button>

		                                                </div>
		                                                <div class="modal-footer col-12 s3" style="margin-top:5%;">
		                                                    <button type="button" id="previous2"
		                                                        class="btn btn-danger previous">Précédent
		                                                    </button>
		                                                    <button type="submit" id="submit" class="btn btn-primary"
		                                                        name="validate">Enregistrer
		                                                    </button>

		                                                </div>
		                                            </form>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
		                                    aria-labelledby="pills-profile-tab">
		                                    <div class="row">
		                                        <div class="table-responsive">
		                                            <table id="add-User" class="display table table-striped table-hover">
		                                                <thead>
		                                                    <tr>
		                                                        <th>N°</th>
		                                                        <th>Nom</th>
		                                                        <th>Prénom</th>
		                                                        <th>Fonction</th>
		                                                        <th>Division</th>
		                                                        <th>Contacts</th>
		                                                        <th></th>
		                                                    </tr>
		                                                </thead>
		                                                <tfoot>
		                                                    <tr>
		                                                        <th>N°</th>
		                                                        <th>Nom</th>
		                                                        <th>Prénom</th>
		                                                        <th>Fonction</th>
		                                                        <th>Division</th>
		                                                        <th>Contacts</th>
		                                                        <th></th>
		                                                    </tr>
		                                                </tfoot>
		                                                <tbody>
		                                                    <?php        
                                                                foreach  ($user as $us ){
                                                            ?>
		                                                    <tr id="<?php echo $us['MATRICULE'];   ?>"
		                                                        <?php if ($us['ACTIVATION'] == "DESACTIVED"){?>
		                                                        class="font-weight-bold text-danger" <?php } ?>>
		                                                        <td><?php echo $us['MATRICULE'];   ?></td>
		                                                        <td><?php echo $us['NOM_AG'];   ?></td>
		                                                        <td><?php echo $us['PRENOM_AG'];   ?></td>
		                                                        <td class="design"><?php echo $us['FONCTION_AG'];   ?></td>
		                                                        <td><?php echo $us['LABEL_DIVISION'];   ?></td>
		                                                        <td>
		                                                            <?php echo $us['MAIL_AG'];   ?><br>
		                                                            <?php echo $us['TEL_AG'];   ?>
		                                                        </td>
		                                                        <td>
		                                                            <?php if ($us['ACTIVATION'] == "DESACTIVED"){?>
		                                                            <a href="#" title="Débloquer"
		                                                                class="btn btn-link btn-danger btnDislock"
		                                                                data-original-title="Activer">
		                                                                <i class="fas fa-lock-open"></i>
		                                                            </a>
		                                                            <?php }else{ ?>
		                                                            <a href="#" title="Modifier"
		                                                                class="btn btn-link btn-secondary btnEdit"
		                                                                data-original-title="Modifier">
		                                                                <i class="fas fa-pen"></i>
		                                                            </a>
		                                                            <a href="#" id="bloc_id" title="Bloquer"
		                                                                class="btn btn-link btn-danger btnBlock"
		                                                                data-original-title="Bloquer">
		                                                                <i class="fas fa-lock"></i>
		                                                            </a>
		                                                            <a href="#" id="reboot_id" title="Réinitialiser"
		                                                                class="btn btn-link btn-warning btnBoot"
		                                                                data-original-title="Réinitialiser">
		                                                                <i class="fas fa-undo"></i>
		                                                            </a>
		                                                            <?php } ?>
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
		<script src="<?php echo base_url()?>bootstrap/myapps/navigation/Register.js"></script>
		<script>
$(document).ready(function() {

    $('#addUserfrom').on('submit', function(evm) {
        evm.preventDefault();
        nom = $('#uname').val();
        nomutil = $('#username').val();
        phone = $('#uphone').val();
        pass = $('#idpass').val();
        if ((!(nom)) || (!(nomutil)) || (!(phone))) {
            if (!(nom)) {
                var messageAl = "Le champs nom est obligatoire";
            } else {
                if (!(nomutil)) {
                    var messageAl = "Le champs nomutil est obligatoire";
                } else {
                    var messageAl = "L'addresse téléphonique est obligatoire";
                }
            }
            swal("Echéc", messageAl, {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            });
            // console.log(messageAl);
        } else {
            // if (!(pass)){
            // 	swal("Echéc", "Le champs mot de passe est obligatoire", {
            // 		icon : "error",
            // 		buttons: {        			
            // 			confirm: {
            // 				className : 'btn btn-danger'
            // 			}
            // 		},
            // 	});
            // }else{
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                url: url,
                type: 'POST',
                data: userdata,
                dataType: 'json',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(answer, status) {

                    if (answer.error) {
                        swal("Echéc", answer.error, {
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-danger'
                                }
                            },
                        });
                        // console.log(answer.error);
                    } else {
                        if (answer.success) {
                            // console.log(answer.success);
                            swal("Succés", answer.success, {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success',

                                    }
                                },
                            })
                        }
                    }
                }
            })
            // }
        }
    });
    $('#hideId').hide();
    var modifier = $('.btnEdit');
    $(modifier).each(function() {
        $(this).on('click', function(evnm) {
            evnm.preventDefault();
            $('#hideId').hide();
            $('.label').each(function() {
                $(this).remove();
            });
            $('#idavatar').attr('src',
                '<?php echo base_url('bootstrap/images/profil/user.png'); ?>');
            $('#idavatar').attr('width', '500');
            $('#userEditModal').modal('show');
            var im = $(this).closest('tr').attr('id');
            $.ajax({
                url: '<?php echo base_url('User/getUser')?>',
                type: 'GET',
                data: "im=" + im,
                dataType: 'json',
                success: function(reponse, status) {
                    console.log(reponse);
                    if (reponse.success) {
                        $('#idim').attr('value', reponse.user[0]['MATRICULE']);
                        $('#hideId').attr('value', reponse.user[0]['MATRICULE']);
                        $('#hideId').hide();
                        if (reponse.user[0]['PHOTO']) {
                            $('#idavatar').attr('src',
                                '<?php echo base_url('bootstrap/images/profil/'); ?>' +
                                reponse.user[0]['PHOTO']);
                            $('#idavatar').attr('width', '500');
                        }
                        $('#idxnom').append('<label class="label" >' + reponse.user[
                            0]['NOM_AG'] + '</label>');
                        $('#idxprenom').append('<label class="label" >' + reponse
                            .user[0]['PRENOM_AG'] + '</label>');
                        $('#idxdiv').append('<label class="label">' + reponse.user[
                            0]['LABEL_DIVISION'] + '</label>');
                        $('#idxfon').after('<label class="label" id="labfon">' +
                            reponse.user[0]["FONCTION_AG"] + '</label>');
                        if (reponse.user[0]['TYPE_AG'] != 'USER') {
                            if (reponse.user[0]['TYPE_AG'] == 'Admin') {
                                $('#labfon').after(
                                    ' <span class="badge badge-pill badge-danger label">Admin</span>'
                                );
                            } else {
                                $('#labfon').after(
                                    ' <span class="badge badge-pill badge-danger label"><i class="ti-star">Admin</i></span>'
                                );
                            }
                        }
                        $('#editNom').attr('value', reponse.user[0]['NOM_AG']);
                        $('#editPrenom').attr('value', reponse.user[0][
                            'PRENOM_AG'
                        ]);
                        $('#editDivision').append('<option class="label" value=' +
                            reponse.user[0]['CODE_DIVISION'] + '>' + reponse
                            .user[0]['LABEL_DIVISION'] + '</option>');
                        $('#editFon').attr('value', reponse.user[0]['FONCTION_AG']);
                        <?php  if($_SESSION['agent']['TYPE_AG'] == 'Admin Principal'){ ?>
                        if (reponse.user[0]['TYPE_AG'] == 'USER') {
                            value = "Détenteur";
                            choix1 =
                                '<option class=label value="Admin" id="twice">Dépositaire</option>';
                            choix2 =
                                '<option class=label value="Admin Pricipal" id="three">Super Admin</option>';
                        } else {
                            if (reponse.user[0]['TYPE_AG'] == 'Admin') {
                                value = "Dépositaire";
                                choix1 =
                                    '<option class=label value="Admin Pricipal" id="twice">Super Admin</option>';
                                choix2 =
                                    '<option class=label value="USER" id="three">Détenteur</option>';
                            } else {
                                value = 'Super Admin';
                                choix1 =
                                    '<option class=label value="Admin" id="twice">Dépositaire</option>';
                                choix2 =
                                    '<option class=label value="USER" id="hree">Détenteur</option>';
                            }
                        }
                        console.log(value);
                        $('#editType').append('<option class=label value="' +
                            reponse.user[0]['TYPE_AG'] + '" id="prime">' +
                            value + '</option>');
                        $('#prime').after(choix1);
                        $('#twice').after(choix2);
                        <?php  }else{ ?>
                        if (reponse.user[0]['TYPE_AG'] == 'USER') {
                            value = "Détenteur";
                            // choix1 = '<option value="Admin" id="twice">Dépositaire</option>';
                            // choix2 = '<option value="Admin Pricipal" id="three">Super Admin</option>';
                        } else {
                            if (reponse.user[0]['TYPE_AG'] == 'Admin') {
                                value = "Dépositaire";
                                // choix1 = '<option value="Admin Pricipal" id="twice">Super Admin</option>';
                                // choix2 = '<option value="USER" id="three">Détenteur</option>';
                            } else {
                                value = 'Super Admin';
                                // choix1 = '<option value="Admin" id="twice">Dépositaire</option>';
                                // choix2 = '<option value="USER" id="hree">Détenteur</option>';
                            }
                        }
                        console.log(value);
                        $('#editType').append('<option value="' + reponse.user[0][
                            'TYPE_AG'
                        ] + '" id="prime">' + value + '</option>');
                        // $('#prime').after(choix1);
                        // $('#twice').after(choix2);
                        <?php  }?>

                        $('#editMail').attr('value', reponse.user[0]['MAIL_AG']);
                        $('#editContact').attr('value', reponse.user[0]['TEL_AG']);
                    } else {
                        swal("Echéc", reponse.error, {
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-danger'
                                }
                            },
                        });
                    }
                }
            })
        });
    });

    $('#formEditUser').on('submit', function(prv) {
        prv.preventDefault();
        swal({
            title: "Attention",
            text: 'Voullez-vous vraiment valider le(s) modification(s)?',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Oui',
                    className: 'btn btn-warning'
                },
                cancel: {
                    visible: true,
                    text: 'Annuler',
                    className: 'btn'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                var data = $('#formEditUser').serialize();
                url = $('#formEditUser').attr('action');
                key = $('#hideId').val();
                // alert(key);
                // console.log(data);
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: 'key=' + key + '&&' + data,
                    dataType: 'json',
                    success: function(reponse, status) {
                        console.log(reponse);
                        if (reponse.error) {
                            swal("Echéc", reponse.error, {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-danger'
                                    }
                                },
                            });
                            console.log(reponse.error);
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
            } else {
                swal.close();
            }
        });
    });
    var bloquer = $('.btnBlock');
    $(bloquer).each(function() {
        $(this).on('click', function(ev) {
            ev.preventDefault();
            var im = $(this).closest('tr').attr('id');
            swal({
                title: "Vous êtes sure?",
                text: 'Le compte référant au matricule ' + im + ' va être bloqué',
                icon: 'warning',
                buttons: {
                    confirm: {
                        text: 'Continuer',
                        className: 'btn btn-warning'
                    },
                    cancel: {
                        visible: true,
                        text: 'Annuler',
                        className: 'btn'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: '<?php echo base_url('User/block')?>',
                        type: 'GET',
                        data: "im=" + im,
                        dataType: 'json',
                        success: function(reponse, status) {
                            console.log(reponse);
                            if (reponse.error) {
                                swal("Echéc", reponse.error, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-danger'
                                        }
                                    },
                                });
                                console.log(reponse.error);
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
                                            window.location
                                                .reload();
                                        }

                                    });
                                }

                            }
                        }
                    })
                }
            });
        });
    });

    var reboot = $('.btnBoot');
    $(reboot).each(function() {
        $(this).on('click', function(ev) {
            ev.preventDefault();
            var im = $(this).closest('tr').attr('id');
            swal({
                title: "Vous êtes sure?",
                text: 'Le compte référant au matricule ' + im + ' va être réinitialisé',
                icon: 'warning',
                buttons: {
                    confirm: {
                        text: 'Continuer',
                        className: 'btn btn-warning'
                    },
                    cancel: {
                        visible: true,
                        text: 'Annuler',
                        className: 'btn'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: '<?php echo base_url('User/boot')?>',
                        type: 'GET',
                        data: "im=" + im,
                        dataType: 'json',
                        success: function(reponse, status) {
                            console.log(reponse);
                            if (reponse.error) {
                                swal("Echéc", reponse.error, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-danger'
                                        }
                                    },
                                });
                                console.log(reponse.error);
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
                                            window.location
                                                .reload();
                                        }

                                    });
                                }

                            }
                        }
                    })
                }
            });
        });
    });

    var debloquer = $('.btnDislock');
    $(debloquer).each(function() {
        $(this).on('click', function(ev) {
            ev.preventDefault();
            var im = $(this).closest('tr').attr('id');
            swal({
                title: "Attention",
                text: 'Le compte référant au matricule ' + im + ' aller être activé',
                icon: 'warning',
                buttons: {
                    confirm: {
                        text: 'Continuer',
                        className: 'btn btn-warning'
                    },
                    cancel: {
                        visible: true,
                        text: 'Annuler',
                        className: 'btn'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: '<?php echo base_url('User/unblock')?>',
                        type: 'GET',
                        data: "im=" + im,
                        dataType: 'json',
                        success: function(reponse, status) {
                            console.log(reponse);
                            if (reponse.error) {
                                swal("Echéc", reponse.error, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-danger'
                                        }
                                    },
                                });
                                console.log(reponse.error);
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
                                            window.location
                                                .reload();
                                        }

                                    });
                                }

                            }
                        }
                    })
                }
            });
        });
    });

});
		</script>