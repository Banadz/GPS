
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
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Liste division</h4>
                                <button class="btn btn-danger btn-round ml-auto">
                                    <a href="<?php echo base_url().'division';?>" class="btn btn-danger btn-round ml-auto">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabledivision" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Code</th>
                                            <th>Label</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach ($DIVISION as $row) { ?>
                                            <tr id="<?php echo $row->CODE_DIVISION;?>">
                                                <td class="service"><?php echo $row->CODE_SER;?></td>
                                                <td class ="codedivision"><?php echo $row->CODE_DIVISION;?></td>
                                                <td class="labeldivision"><?php echo $row->LABEL_DIVISION;?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'affichdiv?division='.$row->CODE_DIVISION;?>" class="edit"><button id="" class="btn btn-link btn-success btn-lg" title="Modifier"><i class="fas fa-edit"></i></button></a>
                                                </td>
                                                <td>
                                                <button type="button" value="<?php echo $row->CODE_DIVISION;?>" class="btn btn-link btn-danger btn-lg supprimerdiv" title="Supprimer"><i class="fas fa-prescription-bottle"></i></button>
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