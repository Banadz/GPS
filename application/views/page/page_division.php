<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Espace Managements</h4>
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
                        <a href="#">Division</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Division</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url().'Ajouter/ajoutdiv'?>" method="POST" id="formdiv">
                                <div class="form-group">
                                    <label>Service</label>
                                    <select class="form-control" name="codeser" id="codeser">
                                        <?php   if($_SESSION['agent']['TYPE_AG'] != "Admin Principal"){  ?>
                                            <option value="<?php  echo ($_SESSION['agent_ser']['0']['CODE_SER']);  ?>"><?php  echo ($_SESSION['agent_ser']['0']['LIBELLE']);  ?></option>
                                        <?php   }else{ ?>
                                                    <?php   foreach  ($vice as $service){ ?>
                                                        <option value="<?php  echo ($service['CODE_SER']);  ?>"><?php  echo ($service['LIBELLE']);  ?></option>           
                                                    <?php   }  ?>
                                        <?php  } ?>
                                    <!-- <option value="SRSPHM">Service Regional de la Solde et des Pensions HAUTE MATSIATRA</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Code division</label>
                                    <input type="text" class="form-control" placeholder="Code de la division"  name="codediv" id="codediv" required>
                                    <small id="divcode" style="display: none;"></small>
                                </div>
                                <div class="form-group">
                                    <label>Label</label>
                                    <textarea type="text" class="form-control" placeholder="Label" rows="2" name="labeldiv" id="labeldiv" required></textarea>
                                    <small id="labdiv" style="display: none;"></small>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="<?php echo base_url('listedivision');?>" style="color: #00aced; text-decoration-line: underline;">Voir les listes</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 save_div" id="save_div" name="save_div" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-download"></i>  Enregistrer</button>            
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>

<!-- verification -->
<script src="<?php echo base_url('bootstrap/myapps/jquery/verification.js');?>" defer></script>