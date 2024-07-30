
    

    <html>
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PrintDemande</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="">

        <link rel="stylesheet" href="<?php echo base_url('bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css');?>">
        
        
        <script src="<?php echo base_url('bootstrap/assets/js/loader.js');?>" defer></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    </head>
    <?php  
        ob_start() ;
        
    ?>
<page  backleft="10mm" backright="10mm" backbottom="30mm">
    <body style="font-family:dejavuserif; font-size:10pt;">
        <style type="text/css">
            /* label{font-family:dejavuserif; font-size:10pt;} */
            .fixeo {width: 50%; color:#262735; font-size:11pt; margin-left:20px;margin-top:400px;border-spacing:0;
                position: absolute; border-collapse: collapse;}
            .tbFoot{width: 50%; color:#262735; font-size:11pt; margin-left:20px;margin-top:40px;border-spacing:0;
                position: absolute; border-collapse: collapse;}
            .tbFooter{width: 100%; color:#262735; font-size:8pt; font-weight:bold; margin-left:40px;margin-top:5px;}
            .headbordure{font-family:times;};
            
            .cellbordure,.tred,.headbordure,.theaded,.tboded{
                border-bottom:solid 0.5px #b6baf7;
                padding:5px;
            }
            .headbordure, .cellbordure {
                font-size:9pt;
                border: 0.5px solid black;
                padding: 8px;
                text-align: center;
            }
            .headbordure{
                font-size:9pt;
                text-align: center;
                border: 0.5px solid black;
                padding: 8px;
            }
            .en2,.en1, .en0,.en01{
                display:inline;
            }
            .foot{
                position:absolute;
                margin-top:750px;
            }
            .footer{
                position:absolute;
                margin-top:1000px;
            }
            .Heading{
                position:absolute;
                margin-top:250px;
            }
            .header{
                position:absolute;
                margin-top:10px;
            }
            .logo{
                margin-left:280px;
            }
            .Entete{
                position:absolute;
                width: 345px;
                margin-top:120px;
                display:flex;
                justify-content:center;
                align-items:center;
            }
        </style>
        <div>
            <div class="row header">
                <div class="logo">
                    <img src="http://localhost/GPS/bootstrap/images/RPIM_logo.jpg" style="width:160px;" alt="" srcset="">
                </div>
                <div class="Entete" style="margin-left:40px;">
                    <p style="text-align: center;">
                        <?=($_SESSION['agent_ser'][0]['ENTETE1']);?><br>
                        <?=($_SESSION['agent_ser'][0]['ENTETE2']);?><br>
                        <?=($_SESSION['agent_ser'][0]['ENTETE3']);?><br>
                        <?=($_SESSION['agent_ser'][0]['ENTETE4']);?><br>
                        <?=($_SESSION['agent_ser'][0]['ENTETE5']);?>
                    </p>
                </div>
            </div>
            <div class="row Heading" >
                
                <div class="col-8 page-title en1 " style="font-family:dejavuserif;margin-top:40px;margin-left:50px;position:relative;">
                    <label style="font-family:dejavuserifb; font-size:14pt; margin-left:250px;">BON POUR</label><br><br>
                    <label style="text-decoration:underline; font-weight:bold;">Structure:</label>    <?=($_SESSION['agent_div'][0]['LABEL_DIVISION']);?> (<?=($_SESSION['agent_div'][0]['CODE_DIVISION']);?>) <br>
                    
                </div>
            </div>
            <div class="col-md-12">
                <table class="fixeo">
                    <thead class="theaded">
                        <tr class="tred">
                            <th class="headbordure" style = "width=5%;">N°</th>
                            <!-- <th class="headbordure" style= "width=30%;">Compte</th>
                            <th class="headbordure" style= "width=25%;">Catégorie</th> -->
                            <th class="headbordure" style= "width=80%;">Désignation</th>
                            <th class="headbordure" style= "width=18%;">STOCK</th>
                            <th class="headbordure" style= "width=18%;">Unité</th>
                            <th class="headbordure" style= "width=20%;">Quantité demandé</th>
                            <th class="headbordure" style= "width=20%;">Quantité accordé</th>
                            <th class="headbordure" style= "width=20%;">Quantité livré</th>
                        </tr>
                    </thead>
                    <tbody class="tboded">
                        <?php
                            $decompte = 0;
                            $packDemande = array_filter($packetsDemande);
                            foreach  ($packDemande as $packet){
                                $decompte+=1
                        ?>
                            <tr class="tred">
                                <td class="cellbordure" style= "width=5%;"><?=($decompte); ?></td>
                                <td class="cellbordure" style= "width=80%;" style="text-align:center;"><?=($packet['ART']['0']['DESIGNATION_ART']); ?> <?=($packet['ART']['0']['SPECIFICITE_ART']); ?></td>
                                <td class="cellbordure" style= "width=18%;" style="text-align:center;"><?=($packet['ART']['0']['EFFECTIF_ART']); ?></td>
                                <td class="cellbordure" style= "width=18%;" style="text-align:center;"><?=($packet['DEM']['0']['UNITE']); ?></td>
                                <td class="cellbordure" style= "width=25%;" style="text-align:center;"><?=($packet['DEM']['0']['QUANTITE']); ?></td>
                                <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
            <div class="row foot">
                <label style="font-family:dejavuserifb; font-size:11pt; margin-left:300px;">Signature</label><br><br>
                <table class="tbFoot">
                    <thead class="theaded">
                        <tr clss="tred">
                            <th class="headbordure" style = "width=75%;" colspan="2">Demande</th>
                            <th class="headbordure" style= "width=20%;">Validation</th>
                            <th class="headbordure" style= "width=72%;"colspan="2">Livraison</th>
                        </tr>
                    </thead>
                    <tbody class="tboded">
                            <tr class="tred">
                                <td class="cellbordure" style= "width=30%;padding-bottom:90px;">Le demandeur</td>
                                <td class="cellbordure" style= "width=30%;padding-bottom:90px;">Le Dépositaire Comptable</td>
                                <td class="cellbordure" style= "width=45%;padding-bottom:90px;" style="text-align:center;">Chef (<?=($_SESSION['agent_ser'][0]['CODE_SER']); ?>)</td>
                                <td class="cellbordure" style= "width=30%;padding-bottom:90px;" style="text-align:center;">Le Dépositaire Comptable</td>
                                <td class="cellbordure" style= "width=30%;padding-bottom:90px;" style="text-align:center;">Agent</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="row footer col-12" style="width:100%;">
                <table class="tbFooter">
                    <tbody>
                            <tr>
                                <td style="width:90%;text-align:center;border-bottom:solid 2px black;"></td>
                            </tr>
                            <tr>
                                <td style="width:90%;text-align:center;border-top:0.5px solid black;padding-top:5px;"><?=($_SESSION['agent_ser'][0]['LIBELLE']);?> - <?=($_SESSION['agent_ser'][0]['ADRESSE']);?><br></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"> Tel: <?=($_SESSION['agent_ser'][0]['CONTACT']);?> Email: srsp.hautematsiatra@mef.gov.mg<br></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        
        </div>
        
    </body>
    
</page>
<?php 
    ob_end_flush ();
    $content = ob_get_clean();
    $date = date("d-m-Y");
    $heure = date("H-i-s");

    require('html2pdf/html2pdf.class.php');
    try{
        $pdf = new HTML2PDF('P','A4','fr', true);
        // $pdf->pdf->SetDisplayMode('fullpage');
        $pdf->writeHTML($content);
        $pdf->Output($date .'-'. $heure . ' Demande_'. $_SESSION['agent']['MATRICULE'] .'.pdf');
    }catch(HTML2PDF_exception $e){
        die($e);
    }
?>
</html>

