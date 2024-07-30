<?php
    $query = $this->db->query("SELECT COMPTE.NUM_CMPT, COMPTE.DESIGNATION_CMPT FROM COMPTE");
?>
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
                        <a href="#">Compte</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Liste compte</h4>
                                <button class="btn btn-danger btn-round ml-auto">
                                    <a href="<?php echo base_url().'compte';?>" class="btn btn-danger btn-round ml-auto">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablecompte" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Compte</th>
                                            <th>Libellé</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach ($query->result() as $row) { ?>
                                            <tr>
                                                <td><?php echo $row->NUM_CMPT;?></td>
                                                <td><?php echo $row->DESIGNATION_CMPT;?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'affichcmpt?compte='.$row->NUM_CMPT;?>" class="edit"><button id="" class="btn btn-link btn-success btn-lg" title="Modifier"><i class="fas fa-edit"></i></button></a>
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
</div>