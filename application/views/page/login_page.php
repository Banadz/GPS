<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GPS/Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet"
        href="<?php echo base_url();?>/bootstrap/login_assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/bootstrap/login_assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>/bootstrap/login_assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url();?>/bootstrap/images/2_1@300x.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="">
                                <img width="90%" src="<?php echo base_url();?>/bootstrap/images/CAMI1@300x.png"
                                    alt="logo">
                                <!-- <label style="font-size:12pt;">Comptabilité Administrative et des Matières Informatisées</label> -->
                            </div><br><br><br><br>
                            <h4>Bienvenu!</h4>
                            <h6 class="font-weight-light">Une authentification est requise pour se connecter!</h6>

                            <form class="pt-3" action="<?php echo base_url('LoginController/login');?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Nom d'utilisateur</label>
                                    <div class="input-group">
                                        <?php if (isset($_POST['nomutil'])) { ?>
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>

                                        <input type="text" value="<?php echo $_POST['nomutil'];?>"
                                            class="form-control form-control-lg border-left-0" name="nomutil"
                                            id="nomutil" placeholder="Nom en tant qu'utilisateur" required>

                                        <?php } elseif (isset($_GET['utilisateur'])){ ?>
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>

                                        <input type="text" class="form-control form-control-lg border-left-0"
                                            value="<?php echo $_GET['utilisateur'];?>" name="nomutil" id="nomutil"
                                            placeholder="Nom en tant qu'utilisateur" required>

                                        <?php }else{ ?>
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>

                                        <input type="text" class="form-control form-control-lg border-left-0"
                                            name="nomutil" id="nomutil" placeholder="Nom en tant qu'utilisateur"
                                            required>

                                        <?php   }?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Mot de passe</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" <?php if (isset($_SESSION['wrong'])) { ?>
                                            style="border: solid 2px red;"
                                            <?php }?>class="form-control form-control-lg border-left-0" id="password"
                                            name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SE CONNECTER</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end"></p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Sweet Alert -->
    <script src="<?php echo base_url('bootstrap/assets/js/plugin/sweetalert/sweetalert.min.js');?>"></script>
    <!-- plugins:js -->
    <script src="<?php echo base_url();?>/bootstrap/login_assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>/bootstrap/login_assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/login_assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/login_assets/js/template.js"></script>

    <?php if (isset($_SESSION['error'])) { ?>
    <script>
    $(document).ready(function() {
        swal("Echéc", "<?php echo $_SESSION['error']; ?>", {
            icon: "error",
            buttons: false
        });
        setTimeout(function() {
            swal.close();

        }, 3000);
    });
    </script>
    <?php }?>
    <?php if (isset($_SESSION['wrong'])) { ?>
    <script>
    $(document).ready(function() {
        swal("Echéc", "<?php echo $_SESSION['wrong']; ?>", {
            icon: "error",
            buttons: false
        });
        setTimeout(function() {
            swal.close();

        }, 3000);
    });
    </script>
    <?php }?>

    <!-- endinject -->
</body>

</html>