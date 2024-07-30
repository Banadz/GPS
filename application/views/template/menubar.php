<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="<?php echo base_url();?>Home" class="logo">
                    <img src="<?php echo base_url();?>bootstrap/images/1@300x.png" width="40%" alt="navbar brand"
                        class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <?php if  ($_SESSION['agent']['TYPE_AG'] == 'Admin Principal')	{?>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                            </a>
                            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                <div class="quick-actions-header">
                                    <span class="title mb-1">Espace de Managements</span>
                                </div>
                                <div class="quick-actions-scroll scrollbar-outer">
                                    <div class="quick-actions-items">
                                        <div class="row m-0">
                                            <a class="col-6 col-md-4 p-0" href="<?php echo base_url();?>service">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-diagram"></i>
                                                    <span class="text">Service</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="<?php echo base_url();?>division">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-technology-1"></i>
                                                    <span class="text">Division</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="<?php echo base_url();?>user/data">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-user-5"></i>
                                                    <span class="text">Agents</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="<?php echo base_url();?>nomenclature">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-inbox"></i>
                                                    <span class="text">Nomenclature</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="<?php echo base_url();?>compte">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-technology"></i>
                                                    <span class="text">Compte</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="<?php echo base_url();?>category">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file"></i>
                                                    <span class="text">Catégorie</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <?php	}	?>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <?php if (!isset($_SESSION['agent']['PHOTO'])){?>
                                    <img src="<?php echo base_url(); ?>/bootstrap/images/profil/user.png"
                                        alt="image profile" class="avatar-img rounded-circle profilPhoto">
                                    <?php }else{?>
                                    <img src="<?php echo base_url('bootstrap/images/profil/'.$_SESSION['agent']['PHOTO']); ?>"
                                        alt="image profile" class="avatar-img rounded-circle profilPhoto">
                                    <?php }?>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <?php if (!isset($_SESSION['agent']['PHOTO'])){?>
                                                <img src="<?php echo base_url(); ?>/bootstrap/images/profil/user.png"
                                                    alt="image profile" class="avatar-img rounded-circle profilPhoto">
                                                <?php }else{?>
                                                <img src="<?php echo base_url('bootstrap/images/profil/'.$_SESSION['agent']['PHOTO']); ?>"
                                                    alt="image profile" class="avatar-img rounded-circle profilPhoto">
                                                <?php }?>
                                            </div>
                                            <div class="u-text">
                                                <h4><?php echo($_SESSION['agent']['NOM_UTIL_AG']);?></h4>
                                                <p class="text-muted"><?php echo($_SESSION['agent']['FONCTION_AG']);?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                            href="<?php echo  base_url(); ?>user/profil">Profile</a>
                                        <a class="dropdown-item" id="deconnecter" href="#">Se déconnecter</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <?php if (!isset($_SESSION['agent']['PHOTO'])){?>
                            <img src="<?php echo base_url(); ?>/bootstrap/images/profil/user.png" alt="image profile"
                                class="avatar-img rounded-circle profilPhoto">
                            <?php }else{?>
                            <img src="<?php echo base_url('bootstrap/images/profil/'.$_SESSION['agent']['PHOTO']); ?>"
                                alt="image profile" class="avatar-img rounded-circle profilPhoto">
                            <?php }?>
                        </div>
                        <div class="info">
                            <a href="<?php echo base_url();?>user/profil" aria-expanded="true">
                                <span>
                                    <?php echo($_SESSION['agent']['NOM_UTIL_AG']);?>
                                    <span class="user-level"><?php echo($_SESSION['agent']['FONCTION_AG']);?></span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="<?php echo base_url();?>Home" class="collapsed">
                                <i class="fas fa-home"></i>
                                <p>Accueil</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">ARTICLE & STOCK</h4>
                        </li>
                        <?php if  ($_SESSION['agent']['TYPE_AG'] !== 'USER')	{?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>article/data">
                                <i class="fab fa-accusoft"></i>
                                <p>Article</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <?php	}	?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>demande">
                                <i class="fas fa-paper-plane"></i>
                                <p>Demande</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">MATERIELS & PATRIMOINE</h4>
                        </li>
                        <?php if  ($_SESSION['agent']['TYPE_AG'] !== 'USER')	{?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>assets">
                                <i class="fas fa-laptop"></i>
                                <p>Matériels</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <?php	}	?>

                        <?php if ($_SESSION['agent']['TYPE_AG'] == 'USER') {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'user/materiel';?>">
                                <i class="far fa-clipboard"></i>
                                <p>Fiche détenteur</p>
                                <span class="caret"></span>
                            </a>
                            <!-- <a
                                href="<?php //echo base_url().'fichedetenteur?matricule='.$_SESSION['agent']['MATRICULE'];?>">
                                <i class="far fa-clipboard"></i>
                                <p>Fiche détenteur</p>
                                <span class="caret"></span>
                            </a> -->
                        </li>
                        <?php } elseif ($_SESSION['agent']['TYPE_AG'] == 'Admin' || $_SESSION['agent']['TYPE_AG'] == 'Admin Principal') { ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'sesagents';?>">
                                <i class="far fa-clipboard"></i>
                                <p>Fiche détenteur</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if  ($_SESSION['agent']['TYPE_AG'] == 'Admin Principal')	{?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>config">
                                <i class="icon-settings"></i>
                                <p>Configuration</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                        <?php	}	?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="modal" id="presentation">
            <div class="modal-dialog" style="height:100%;" role="document">
                <div class="modal-content" style="height:75%;">
                    <div class="modal-header no-bd" style="margin-bottom:5%;">
                        <h5 class="modal-title">
                            <span style="font-size:14pt; font-weight:bold;" id="presenttitre">
                                Bienvenu!
                            </span>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <p id="lettrePresent">

                        </p>
                    </div>
                    <div class="modal-footer no-bd" id="pied">
                        <button type="button" id="oui" class="btn btn-warning">Oui</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('bootstrap/myapps/jquery/assets.js');?>"></script>
        <?php if  ($_SESSION['agent']['PASSWORD'] == '0000' || $_SESSION['agent']['PASSWORD'] == 'default' )	{?>
        <script>
        $(document).ready(function() {
            if (window.location.href !== 'http://192.168.88.40/GPS/user/profil' && window.location.href !==
                'http://192.168.88.40/GPS/Home') {
                window.location.href = 'http://192.168.88.40/GPS/user/profil'
            }
        })
        </script>
        <?php }?>