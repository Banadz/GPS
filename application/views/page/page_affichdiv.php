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
                            <?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>
                            <strong class="card-title mb-3">Division</strong>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url().'updtdiv/'.$DIVISION['CODE_DIVISION'];?>" method="POST" id="formdiv">
                                <div class="form-group">
                                    <label>Service</label>
                                    <input type="text" class="form-control" value="<?php echo $DIVISION['CODE_SER'];?>"  name="codeser" id="codeser">
                                </div>
                                <div class="form-group">
                                    <label>Code division</label>
                                    <input type="text" class="form-control" value="<?php echo $DIVISION['CODE_DIVISION'];?>"  name="codediv" id="codediv">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Label</label>
                                    <textarea type="text" class="form-control" rows="2" name="labeldiv" id="labeldiv"><?php echo $DIVISION['LABEL_DIVISION'];?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="save_cat" style="opacity: 0.8; border-radius: 2%;"><i class="fa fa-refresh"></i>  Mettre à jour</button>
                                <a href="<?php echo base_url().'division';?>"><button type="button" class="btn btn-danger btn-flat m-b-30 m-t-30" name="cancel" style="opacity: 0.8; border-radius: 2%;">  Annuler</button></a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>