<?php
$datenow = date('d/m/Y');
$services = $_SESSION['agent_ser']['0']['CODE_SER'];
$requete = $this->db->query("SELECT AGENT.NOM_AG,AGENT.PRENOM_AG,AGENT.FONCTION_AG,AGENT.ADRESSE_AG,AGENT.CODE_DIVISION FROM AGENT,DIVISION,SERVICE WHERE AGENT.TYPE_AG = 'Admin' AND AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION AND DIVISION.CODE_SER = SERVICE.CODE_SER AND DIVISION.CODE_SER = '$services'");
$depositaire = $requete->row_array();


$matricule = $_GET['matricule'];

if (isset($matricule)) {
    $agreq = $this->db->query("SELECT DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION, AGENT.CODE_DIVISION, AGENT.PORTE_AG FROM DIVISION,AGENT WHERE AGENT.MATRICULE = '$matricule' AND DIVISION.CODE_DIVISION = AGENT.CODE_DIVISION");
    $info = $agreq->row_array();

    $matreq = $this->db->query("SELECT * FROM MATERIEL WHERE MATRICULE = '$matricule' AND SORTIE IS NULL");
    $resultat = $matreq->result();

    $nombre = $this->db->query("SELECT SUM(NOMBRE) AS SOMME FROM MATERIEL, DIVISION, SERVICE WHERE MATRICULE = '$matricule' AND DIVISION.CODE_SER = SERVICE.CODE_SER AND MATERIEL.CODE_DIVISION = DIVISION.CODE_DIVISION AND SERVICE.CODE_SER = '$services' AND MATERIEL.SORTIE IS NULL");
    $tot = $nombre->row_array();
    $affich = 0;
    if ($tot['SOMME'] < 10) {
        $affich = '0'.$tot['SOMME'];
    } else {
        $affich = $tot['SOMME'];
    }
    
}


function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(0=> 'Zéro',1 => 'Un',2 => 'Deux',3 => 'Trois',4 => 'Quatre',5 => 'cinq',6 => 'Six',7 => 'Sept',8 => 'Huit',9 => 'Neuf',10 => 'Dix',11 => 'Onze',12 => 'Douze',13 => 'Treize',14 => 'Quatorze',15 => 'Quinze',16 => 'Seize',17 => 'Dix-sept',18 => 'Dix-huit',19 => 'Dix-neuf',20 => 'Vingt',30 => 'Trente',40 => 'Quarante',50 => 'Cinquante',60 => 'Soixante',70 => 'Soixante-dix',80 => 'Quatre-vingt',90 => 'Quatre-vingt dix',100 => 'Cent',1000 => 'Mille',1000000 => 'Million',1000000000 => 'Milliard',1000000000000 => 'Billion');
    if (!is_numeric($number)) {
        return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
    
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));

                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }
    
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
    
        return $string;
    }
    $lettretot = convert_number_to_words($tot['SOMME']);

?>
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
<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">

    <body style="font-family:times; font-size:12pt; width: 100%">
        <style type="text/css">
        label {
            font-family: times;
            font-size: 12pt;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: #262735;
            font-size: 12pt;
            margin-left: 50px;
            margin-top: 10px;
            border-spacing: 0;
            border: 0.5px;
        }

        ;

        thead {
            font-family: times;
        }

        ;

        table {
            border-collapse: collapse;
            border: 0.5px;
        }

        th,
        td {
            border: 0.5px;
            padding: 8px;
            text-align: left;
        }

        th {
            border-top: 0.5px;
            padding: 8px;
        }

        div .ambony,
        .ambany {
            width: 83%;
            margin-left: 50px;
        }

        div .ambonygauche {
            margin-top: -18px;
            margin-left: 410px;
        }
        </style>
        <div style="text-align: justify;">
            <div class="ambony">
                <div>REPOBLIKAN'I MADAGASIKARA</div>
                <div class="ambonygauche">
                    <span>Model n°25 bis</span>
                    <p>Art: Instruction General du 22/07/1955</p>
                </div>
                <br>
                <div>
                    <span>REMIS A UN DETENTEUR EFFECTIF(d'inscription au carnet tenu dans les conditions indiquées à
                        l'article 24 de l'instruction)</span>
                    <p>
                        <span
                            class="depot"><?php echo $info['CODE_DIVISION'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="porte">Porte: <?php echo $info['PORTE_AG'];?></span>
                    </p>
                    <p>
                        <span>Nom, grade et fonctions du Dépositaire comptable
                            :</span><span><?php echo $depositaire['NOM_AG'];?> <?php echo $depositaire['PRENOM_AG'];?>,
                            <?php echo $depositaire['FONCTION_AG'];?></span>
                    <p><span>Adresse exacte : </span><span><?php echo $depositaire['ADRESSE_AG'];?></span></p>
                    </p>
                    <p>
                        <span>IM Detenteur : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><?php echo $matricule;?></span>
                    </p>
                </div>
            </div>
            <br>
            <div>
                <table id="mx-auto" class="mx-auto">
                    <thead>
                        <tr>
                            <th style="width: 15%">Nomenclature</th>
                            <th style="width: 40%">Désignation détaillée des objets</th>
                            <th style="width: 08%;text-align: center">Unité</th>
                            <th style="width: 10%;text-align: center">Nombre</th>
                            <th style="width: 10%">Qualité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultat as $row) {?>
                        <tr id="a">
                            <td style="text-align: center" class="nomenclature"><?php echo $row->ID_NOM;?></td>
                            <td class="designation"><?php echo $row->SPEC_MAT;?></td>
                            <td style="text-align: center" class="unite">nb</td>
                            <td style="text-align: right" class="nombre"><?php echo $row->NOMBRE;?></td>
                            <td style="text-align: center" class="qualite"><?php echo $row->ETAT_MAT;?></td>
                        </tr>
                        <?php } ?>
                        <tr class="b">
                            <td style="text-align: right; border-bottom: 0.5px solid black; border-collapse: separate;"
                                colspan="4" class="nombre2"><?php echo $tot['SOMME'];?></td>
                            <td style="text-align: center; border-bottom: 0.5px solid black; border-collapse: separate;"
                                class="total">Total</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="ambany">
                <div>
                    <span style="text-align: justify;">ARRETE le presente inventaire à
                        <?php echo $lettretot.' ('; echo $affich.')'?><?php if ($tot['SOMME'] <= 1) {  echo ' Article';} else if ($tot['SOMME'] >= 1){ echo ' Articles';};?>
                    </span>
                    <p>
                        <span>En cas de perte ou non réintégration, ces articles sont remboursées par le détenteur à
                            leur valeur de remplacement, les réparations de déteriorations sont également à la charge du
                            détenteur</span>
                    </p>
                    <p>
                        <span class="ambdate">Reconnu exacte en quantités et en qualité :
                        </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="date">A Fianarantsoa, le <?php echo $datenow;?></span>
                    </p>
                </div>
            </div>
        </div>
    </body>
</page>


<?php 
    ob_end_flush ();
    $content = ob_get_clean();

    require('html2pdf/html2pdf.class.php');
    try{
        $pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(10, 10, 10, 10));
        $pdf->writeHTML($content);
        $pdf->Output('Fiche detenteur.pdf');
    }catch(HTML2PDF_exception $e){
        die($e);
    }
?>

</html>


<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>/bootstrap/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url();?>/bootstrap/vendors/bootstrap/dist/js/bootstrap.min.js"></script>