
    

    <html>
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home_page</title>
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
    <body style="font-family:dejavuserif; font-size:9pt;">
        <style type="text/css">
            label{font-family:dejavuserif; font-size:10pt;}
            table {width: 100%; color:#262735; font-size:11pt; margin-left:50px;margin-top:10px;border-spacing:0;};
            thead{font-family:times;};
            
            /* td,tr,th,thead,tbody{
                border-bottom:solid 0.5px #b6baf7;
                padding:5px;
            } */
            table {
                border-collapse: collapse;
            }
            th, td {
                border-bottom: 0.5px solid black;
                padding: 8px;
                text-align: left;
            }
            th{
                border-top: 0.5px solid black;
                padding: 8px;
            }
            .en2,.en1{
                display:inline;
            }
        </style>
        <div>
            <div class="row">
                
                <?php
                    if(strtotime($fiches['DEB']) !== false){
                        $debdaty = ucfirst(strftime('%d %B %Y', strtotime($fiches['DEB'])));
                    } else{
                        $debdaty = $fiches['DEB'];
                    }
                ?>
                <div class="col-8 page-title en1 " style="font-family:dejavuserif;margin-top:40px;margin-left:50px;position:relative;">
                    <label style="font-family:dejavuserifb; font-size:11pt; margin-left:420px;">FICHE DE STOCK</label><br><br>
                    <label>Compte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $fiches['INFO']['info'][0]['DESIGNATION_CMPT']; ?></label><br>
                    
                    <label>Désigantion: <?php echo $fiches['INFO']['info'][0]['DESIGNATION_ART']; ?></label><br>
                    <label>Date: <?php echo $debdaty ;?> au <?php echo ucfirst(strftime('%d %B %Y', strtotime($fiches['FIN']))) ;?></label><br>

                    <label>Spécificité&nbsp;&nbsp;: <?php echo $fiches['INFO']['info'][0]['SPECIFICITE_ART'] ;?></label>
                </div>
                <div class="en2" style="font-family:dejavuserif;margin-left:750px; margin-top:95px;position:absolute;">
                    <label>Folio N° </label><br>
                    <label>Espèce de l'unité: <?php echo $fiches['INFO']['info'][0]['UNITE_ART'] ;?></label>
                </div>
            </div>
            <div class="col-md-12">
                <table>
                    <thead>
                        <tr>
                            <th style="width=15%;" rowspan='2'>Date d'Entrée <br> et Sortie</th>
                            <th style="width=28%;" style="text-align:center;" colspan='2'>ENTREES</th>
                            <th style="width=28%;" style="text-align:center;" colspan='2'>SORTIE</th>
                            <th style="width=10%;" style="text-align:center;"  rowspan='2'>STOCKS</th>
                            <th style="width=10%;" style="text-align:center;" rowspan='2'>Structure <br> Agent</th>
                        </tr>
                        <tr>
                            <td style="width=14%;">Quantité</td>
                            <td style="width=14%;">Cumulé</td>
                            <td style="width=14%;">Quantité</td>
                            <td style="width=14%;">Cumulé</td>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td style="width=14%;">
                                    <?php echo $debdaty ;?>
                                </td>
                                <td style="width=14%;" style="text-align:center;"></td>
                                <td style="width=14%;" style="text-align:center;"></td>
                                <td style="width=14%;"></td>
                                <td style="width=14%;"></td>
                                <td style="width=10%;" style="text-align:center;"><?php echo $fiches['EFF'] ;?></td>
                                <td style="width=10%;" style="text-align:center;"></td>
                            </tr>
                        <?php
                            $i=0;
                            $u=0;
                            foreach  ($fiches['OUT']['sortie'] as $ent){ 
                        ?> 
                            <?php  if (preg_match('/[a-zA-Z]/', $ent['CODE'])){ ?>
                                <?php  $i +=  $ent['QUANTITE'];?>
                            <tr>
                                <td style="width=14%;"><?=($ent['DATY']); ?></td>
                                <td style="width=14%;" style="text-align:center;"><?=($ent['QUANTITE']); ?></td>
                                <td style="width=14%;" style="text-align:center;"><?=($i); ?></td>
                                <td style="width=14%;"></td>
                                <td style="width=14%;"></td>
                                <td style="width=10%;" style="text-align:center;"><?=($ent['STOCK']); ?></td>
                                <td style="width=10%;" style="text-align:center;"><?=($ent['CODE']); ?></td>
                            </tr>
                            <?php  }else{ ?>
                                <?php  $u +=  $ent['QUANTITE'];?>
                            <tr>
                                <td style = "width=14%"><?=($ent['DATY']); ?></td>
                                <td style = "width=14%"></td>
                                <td style = "width=14%"></td>
                                <td style = "width=14%" style="text-align:center;"><?=($ent['QUANTITE']); ?></td>
                                <td style = "width=14%" style="text-align:center;"><?=($u); ?></td>
                                <td style = "width=10%" style="text-align:center;"><?=($ent['STOCK']); ?></td>
                                <td style = "width=10%" style="text-align:center;"><?=($ent['CODE']); ?></td>
                            </tr>
                            <?php  } ?>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        
        </div>
        
    </body>
</page>
<?php 
    ob_end_flush ();
    $content = ob_get_clean();

    require('html2pdf/html2pdf.class.php');
    try{
        $pdf = new HTML2PDF('L','A4','fr', true);
        // $pdf->pdf->SetDisplayMode('fullpage');
        $pdf->writeHTML($content);
        $pdf->Output('Fiche de Stock.pdf');
    }catch(HTML2PDF_exception $e){
        die($e);
    }
?>
</html>

