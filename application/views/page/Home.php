<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Accueil</h2>
                        <h5 class="text-white op-7 mb-2">Gestion du Patrimoine et de Stock</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Briefing de votre demande posté</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">En attente</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Validé</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Refusé</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="salutation">
            <div class="modal-dialog" style="height:100%;" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd" style="margin-bottom:5%;">
                        <h5 class="modal-title">
                            <span style="font-size:14pt; font-weight:bold;" id="titre">
                                Bienvenu!
                            </span>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <p id="lettreSalut">

                        </p>
                    </div>
                    <div class="modal-footer no-bd" id="pied">
                        <a href="http://192.168.88.40/GPS/user/profil">
                            <button type="button" id="oui" class="btn btn-warning">Oui</button>
                        </a>
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


<!-- Chart Circle -->
<script>
$(document).ready(function() {
    var placementFrom = 'top';
    var placementAlign = 'center';
    var state = 'success';
    var style = 'withicon';
    var content = {};

    content.message =
        'Bonjours <?php if ($_SESSION['agent']['GENRE']=='M'){ echo 'Mr';}else{echo 'Mme';} ?> <?php echo($_SESSION['agent']['NOM_UTIL_AG']);?>';
    content.title = 'Vous êtes connecté';
    if (style == "withicon") {
        content.icon = 'fa fa-bell';
    } else {
        content.icon = 'none';
    }
    content.url = '<?php echo base_url();?>Home';
    content.target = '_blank';

    $.notify(content, {
        type: state,
        placement: {
            from: placementFrom,
            align: placementAlign
        },
        time: 3000,
        delay: 3000,
    });
});
</script>
<script src="<?php echo base_url();?>bootstrap/assets/js/plugin/chart-circle/circles.min.js"></script>
<script>
Circles.create({
    id: 'circles-1',
    radius: 45,
    value: <?php echo $dash['WAI'];?>,
    maxValue: <?php echo $dash['SOM'];?>,
    width: 7,
    text: <?php echo $dash['WAI'];?>,
    colors: ['#f1f1f1', '#efe00c'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
})

Circles.create({
    id: 'circles-2',
    radius: 45,
    value: <?php echo $dash['VAL'];?>,
    maxValue: <?php echo $dash['SOM'];?>,
    width: 7,
    text: <?php if($dash['VAL'] !=0){echo $dash['VAL'];}else{ $zero = 0; echo ('0');}?>,
    colors: ['#f1f1f1', '#1c28d6'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
})

Circles.create({
    id: 'circles-3',
    radius: 45,
    value: <?php echo $dash['DEN'];?>,
    maxValue: <?php echo $dash['SOM'];?>,
    width: 7,
    text: <?php echo $dash['DEN'];?>,
    colors: ['#f1f1f1', '#d70000'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
});
</script>

<script src="<?php echo base_url();?>bootstrap/myapps/navigation/salutation.js"></script>