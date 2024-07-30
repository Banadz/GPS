<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleController extends CI_Controller
{

    // ==================================================================================================================
    
                                // PAGE CALL......................

// ==================================================================================================================
    public function page_insertArticle(){
        $this->load->model('ArticleModel');
        $nomenclat['nome'] = $this->ArticleModel->nomenclatureList();

        $this->load->view('template/head');    
        $this->load->view('page/page_article_insert', $nomenclat);

        $this->load->view('template/foot');
    }


    public function page_addArticle(){

        if(!empty($_GET)){
            
            $this->load->model('ArticleModel');
            $article['arts'] = $this->ArticleModel->getArticleBy($_GET['formule']);

            $service['servs'] = $this->ArticleModel->serviceList();
        }
        //  var_dump($article);
        
        $this->load->view('template/head', $service);
        $this->load->view('page/page_article_add', $article);
        $this->load->view('template/foot');
    }
        // it fills the stock data table.....

    public function page_dataArticle(){
        
        $this->load->model('ArticleModel');
        $artti['arti'] = $this->ArticleModel->showArticle();
        $service['servs'] = $this->ArticleModel->serviceList();

        $this->db->select('*');
        $this->db->from('COMPTE');
        $compte = $this->db->get();
        $count = $compte->result_array();

        $query=$this->db->query("SELECT TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_SORTIE,
        DEMANDE.UNITE, DEMANDE.QUANTITE_ACC, AGENT.GENRE,
        AGENT.PRENOM_AG, DIVISION.LABEL_DIVISION, SERVICE.CODE_SER FROM SERVICE,DIVISION,DEMANDE,AGENT 
        WHERE SERVICE.CODE_SER = DIVISION.CODE_SER AND DIVISION.CODE_DIVISION = AGENT.CODE_DIVISION 
        AND AGENT.MATRICULE = DEMANDE.MATRICULE AND DEMANDE.ETAT_DEMANDE = 'Validé'");
        $output['sortie'] = $query->result_array();
        

        $meta['metasy'] = array(
            'SER' => $service,
            'COU' => $count,
            'SORT'=> $output,
        );

        $this->load->view('template/head',$meta);
        $this->load->view('page/stock_page',$artti);
        $this->load->view('template/foot');

    }
    public function page_detailArticle(){
        if($_GET){
            $formule = $_GET['formule'];
            $query=$this->db->query("SELECT SERVICE.CODE_SER,SERVICE.LIBELLE, ORIGINE.QUANTITE_ORG, ORIGINE.PRIX_UNI_ORG, ORIGINE.MONTANT_ORG,
            TO_CHAR(ORIGINE.DATE_ORG, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_ORG,
             ARTICLE.DESIGNATION_ART , ARTICLE.SPECIFICITE_ART, ARTICLE.UNITE_ART
            FROM SERVICE, ORIGINE, ARTICLE where ORIGINE.CODE_SER = SERVICE.CODE_SER  AND ORIGINE.FORMULE = ARTICLE.FORMULE AND ORIGINE.FORMULE='$formule' ");

            $original = $query->result_array();
            $originel['origine'] = array(
                'FOR' => $formule,
                'ORG' => $original
            );
            //  var_dump($original);
            $this->load->view('template/head');
            $this->load->view('page/articleDetails',$originel);
            $this->load->view('template/foot');
        }
    }
    public function test(){
        $queryOUT=$this->db->query("SELECT TO_NUMBER(ORIGINE.ID_ORIGINE)AS NUMERO, TO_DATE(ORIGINE.DATE_ORG,'YYYY-MM-DD')  AS DATY, 
            TO_CHAR(ORIGINE.TIME_ORG,'HH24:MI:SS') AS LERA,
            TO_NUMBER(ORIGINE.QUANTITE_ORG)  AS QUANTITE, TO_NUMBER(ORIGINE.QUANTITE_STOCK) 
            AS STOCK,TO_CHAR(ORIGINE.CODE_SER) AS CODE FROM ORIGINE 
            UNION SELECT TO_NUMBER(DEMANDE.NUMEROTATION), TO_DATE(DEMANDE.DATE_CONFIRM,'YYYY-MM-DD'), TO_CHAR(DEMANDE.TIME_CONFIRM,'HH24:MI:SS'),
            TO_NUMBER(DEMANDE.QUANTITE_ACC),
            TO_NUMBER(DEMANDE.QUANTITE_STOCK), TO_CHAR(DEMANDE.MATRICULE)
            AS MATRI FROM DEMANDE WHERE FORMULE='1' ORDER BY LERA, DATY ASC ");

            
        $queryOUT=$this->db->query("SELECT TO_NUMBER(ORIGINE.ID_ORIGINE)AS NUMERO, TO_DATE(ORIGINE.DATE_ORG,'YYYY-MM-DD')  AS DATY, 
        TO_CHAR(ORIGINE.TIME_ORG,'HH24:MI:SS') AS LERA,
        TO_NUMBER(ORIGINE.QUANTITE_ORG)  AS QUANTITE, TO_NUMBER(ORIGINE.QUANTITE_STOCK) 
        AS STOCK,TO_CHAR(ORIGINE.CODE_SER) AS CODE FROM ORIGINE
        UNION SELECT TO_NUMBER(DEMANDE.NUMEROTATION), TO_DATE(DEMANDE.DATE_CONFIRM,'YYYY-MM-DD'), TO_CHAR(DEMANDE.TIME_CONFIRM,'HH24:MI:SS'),
        TO_NUMBER(DEMANDE.QUANTITE_ACC),
        TO_NUMBER(DEMANDE.QUANTITE_STOCK), TO_CHAR(DEMANDE.MATRICULE)
        AS MATRI FROM DEMANDE WHERE FORMULE='1' AND DATY BETWEEN TO_DATE('2023-04-10','YYYY-MM-DD') 
        AND TO_DATE('2023-04-17','YYYY-MM-DD') ORDER BY LERA, DATY ASC");

            
        $output = $queryOUT->result_array();
        foreach ($output as $var){
            echo "==============================================================================================================<br>";
            var_dump($var);
        }

    }
    public function page_ficheStock(){
        $formule = strip_tags($_GET['form']);
        $effectif = 0;
        if (!empty($_GET['debut']) && !empty($_GET['fin'])){
            $debut_encoded = $this->input->get('debut');
            $fin_encoded = $this->input->get('fin');
            // $debut = urldecode($debut_encoded);
            $debut = date('d-M-y', strtotime($debut_encoded));
            // $fin = urldecode($fin_encoded);
            $fin = date('d-M-y', strtotime($fin_encoded));

            $formule = strip_tags($_GET['form']);

            // $queryIN=$this->db->query("SELECT TO_CHAR(DATE_ORG, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATY, QUANTITE_ORG, CODE_SER,
            // QUANTITE_STOCK FROM ORIGINE WHERE TO_DATE(DATE_ORG,'YYYY-MM-DD') BETWEEN TO_DATE('$debut','YYYY-MM-DD') AND TO_DATE('$fin','YYYY-MM-DD') 
            // AND FORMULE = '$formule'");
            
            $queryOUT=$this->db->query("SELECT TO_NUMBER(ORIGINE.ID_ORIGINE) AS NUMERO, 
            TO_CHAR(ORIGINE.DATE_ORG, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH')  AS DATY,
            TO_DATE(ORIGINE.DATE_ORG,'DD/MM/YYYY') AS HIASA, 
            TO_CHAR(ORIGINE.TIME_ORG,'HH24:MI:SS') AS LERA,
            TO_NUMBER(ORIGINE.QUANTITE_ORG)  AS QUANTITE, 
            TO_NUMBER(ORIGINE.QUANTITE_STOCK) AS STOCK,
            TO_CHAR(ORIGINE.FORMULE) AS FORMULE,
            TO_CHAR(ORIGINE.CODE_SER) AS CODE
            FROM ORIGINE 
            WHERE ORIGINE.FORMULE= '$formule' AND 
            TO_DATE(ORIGINE.DATE_ORG,'YYYY-MM-DD') BETWEEN TO_DATE('$debut','YYYY-MM-DD')AND TO_DATE('$fin','YYYY-MM-DD')
            
            UNION 
            SELECT TO_NUMBER(DEMANDE.NUMEROTATION), 
            TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH'),
            TO_DATE(DEMANDE.DATE_CONFIRM,'DD/MM/YYYY') AS HIASA, 
            TO_CHAR(DEMANDE.TIME_CONFIRM,'HH24:MI:SS') AS LERA,
            TO_NUMBER(DEMANDE.QUANTITE_ACC)AS QUANTITE,
            TO_NUMBER(DEMANDE.QUANTITE_STOCK) AS STOCK,
            TO_CHAR(DEMANDE.FORMULE),
            TO_CHAR(DEMANDE.MATRICULE)AS MATRI 
            FROM DEMANDE 
            WHERE DEMANDE.FORMULE='$formule' AND DEMANDE.ETAT_DEMANDE = 'Validé' OR DEMANDE.ETAT_DEMANDE = 'Livré' AND
            TO_DATE(DEMANDE.DATE_CONFIRM,'YYYY-MM-DD') BETWEEN TO_DATE('$debut','YYYY-MM-DD') AND TO_DATE('$fin','YYYY-MM-DD') 
            ORDER BY LERA ASC");
        }else{
            $debut = 'Début';
            $fin = date('d-m-Y');
            $formule = strip_tags($_GET['form']);

            $queryOUT=$this->db->query("SELECT TO_NUMBER(ORIGINE.ID_ORIGINE) AS NUMERO, 
            TO_CHAR(ORIGINE.DATE_ORG, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH')  AS DATY,
            TO_DATE(ORIGINE.DATE_ORG,'DD/MM/YYYY') AS HIASA, 
            TO_CHAR(ORIGINE.TIME_ORG,'HH24:MI:SS') AS LERA,
            TO_NUMBER(ORIGINE.QUANTITE_ORG)  AS QUANTITE, 
            TO_NUMBER(ORIGINE.QUANTITE_STOCK) AS STOCK,
            TO_CHAR(ORIGINE.FORMULE) AS FORMULE,
            TO_CHAR(ORIGINE.CODE_SER) AS CODE
            FROM ORIGINE 
            WHERE ORIGINE.FORMULE= '$formule' 
            
            UNION 
            SELECT TO_NUMBER(DEMANDE.NUMEROTATION), 
            TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH'),
            TO_DATE(DEMANDE.DATE_CONFIRM,'DD/MM/YYYY') AS HIASA, 
            TO_CHAR(DEMANDE.TIME_CONFIRM,'HH24:MI:SS') AS LERA,
            TO_NUMBER(DEMANDE.QUANTITE_ACC)AS QUANTITE,
            TO_NUMBER(DEMANDE.QUANTITE_STOCK) AS STOCK,
            TO_CHAR(DEMANDE.FORMULE),
            TO_CHAR(DEMANDE.MATRICULE)AS MATRI 
            FROM DEMANDE 
            WHERE DEMANDE.FORMULE='$formule' AND DEMANDE.ETAT_DEMANDE = 'Validé' OR DEMANDE.ETAT_DEMANDE = 'Livré'
            ORDER BY LERA ASC");
        }
        
        
        $queryINFO=$this->db->query("SELECT COMPTE.DESIGNATION_CMPT, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART, ARTICLE.UNITE_ART FROM COMPTE,CATEGORIE,ARTICLE 
        WHERE COMPTE.NUM_CMPT = CATEGORIE.NUM_CMPT AND CATEGORIE.ID_CAT = ARTICLE.ID_CAT AND ARTICLE.FORMULE = '$formule'");
        
        $infoput['info'] = $queryINFO->result_array();
        $output['sortie'] = $queryOUT->result_array();
        
        if(!empty($output['sortie'])){
            
            $amounDaty=$output['sortie'][0]['HIASA'];
            $amounLera = $output['sortie'][0]['LERA'];
            $queryLAST=$this->db->query("SELECT TO_NUMBER(ORIGINE.ID_ORIGINE) AS NUMERO, 
            TO_CHAR(ORIGINE.DATE_ORG, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH')  AS DATY,
            TO_DATE(ORIGINE.DATE_ORG,'YYYY-MM-DD') AS HIASA, 
            TO_CHAR(ORIGINE.TIME_ORG,'HH24:MI:SS') AS LERA,
            TO_NUMBER(ORIGINE.QUANTITE_ORG)  AS QUANTITE, 
            TO_NUMBER(ORIGINE.QUANTITE_STOCK) AS STOCK,
            TO_CHAR(ORIGINE.FORMULE) AS FORMULE,
            TO_CHAR(ORIGINE.CODE_SER) AS CODE
            FROM ORIGINE 
            WHERE ORIGINE.FORMULE= '$formule' AND TO_DATE(ORIGINE.DATE_ORG,'YYYY-MM-DD') < TO_DATE('$amounDaty','YYYY-MM-DD')
            
            UNION 
            SELECT TO_NUMBER(DEMANDE.NUMEROTATION), 
            TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH'),
            TO_DATE(DEMANDE.DATE_CONFIRM,'YYYY-MM-DD') AS HIASA, 
            TO_CHAR(DEMANDE.TIME_CONFIRM,'HH24:MI:SS') AS LERA,
            TO_NUMBER(DEMANDE.QUANTITE_ACC)AS QUANTITE,
            TO_NUMBER(DEMANDE.QUANTITE_STOCK) AS STOCK,
            TO_CHAR(DEMANDE.FORMULE),
            TO_CHAR(DEMANDE.MATRICULE)AS MATRI 
            FROM DEMANDE 
            WHERE DEMANDE.FORMULE='$formule' AND DEMANDE.ETAT_DEMANDE = 'Validé' AND
            TO_DATE(DEMANDE.DATE_CONFIRM,'YYYY-MM-DD') < TO_DATE('$amounDaty','YYYY-MM-DD')
            ORDER BY LERA DESC");

            $lastput = $queryLAST->result_array();
            if (empty($lastput)){
                $effectif = 0;
            }else{
                $effectif = $lastput[0]['STOCK'];
            }
        }
        $fiche['fiches'] = array(
            'INFO' => $infoput,
            'OUT'=>$output,
            'DEB'=> $debut,
            'FIN'=> $fin,
            'EFF'=>$effectif
        );
        $this->load->view('page/page_ficheStock', $fiche);
    }


// ==================================================================================================================
    
                                // AJAX FUNCTION......................

// ==================================================================================================================
    
    public function seachCategorie(){
        if(!empty($_GET)){
            $compte = strip_tags($_GET['compte']);

            $this->db->select('ID_CAT, LABEL_CAT');
            $this->db->from('CATEGORIE');
            $this->db->where('NUM_CMPT', $compte);

            $arti = $this->db->get();

            $resulty= $arti->result_array();

            if(empty($resulty)){
                $resulty = array(
                    '0'=>array('Aucune catégorie enregistré à ce compte')
                );
                $data = array(
                    'success'=> true,
                    'categorie' => $resulty
                );
            }else{
                $data = array(
                    'success'=> true,
                    'categorie' => $resulty
                );
            }
            
            echo json_encode($data);
        }
    }

    public function getDesignation(){
        
        if(!empty($_GET)){
            $categored = strip_tags($_GET['compte']);

            // $this->db->query("SELECT DESIGNATION_ART FROM ARTICLE WHERE ID_CAT ='3' GROUP BY(ARTICLE.DESIGNATION_ART);");
            $this->db->select('*');
            $this->db->from('ARTICLE');
            $this->db->where('ID_CAT', $categored);

            $arti = $this->db->get();

            $resulty= $arti->result_array();

            $data = array(
                'success'=> true,
                'designation' => $resulty
            );               
            echo json_encode($data);
        }
    }

    public function getSpecificte(){
        
        if(!empty($_GET)){
            $designed = strip_tags($_GET['designation']);

            $this->db->select('*');
            $this->db->from('ARTICLE');
            $this->db->where('DESIGNATION_ART', $designed);

            $arti = $this->db->get();

            $results= $arti->result_array();

            $data = array(
                'success'=> true,
                'specificite' => $results
            );
                        
            echo json_encode($data);
        }
    }
    public function update(){
        if(!empty($_GET)){
            $designation = strip_tags($_GET['udesignation']);
            $cifici = strip_tags($_GET['uspecificite']);
            $nite = strip_tags($_GET['uunite']);
            $up_quantit = strip_tags($_GET['up_quantit']);
            $formule = strip_tags($_GET['id']);

            $this->db->set('DESIGNATION_ART',$designation);
            $this->db->set('SPECIFICITE_ART',$cifici);
            $this->db->set('UNITE_ART',$nite);
            $this->db->set('EFFECTIF_ART',$up_quantit);
            $this->db->where('FORMULE',$formule);
            $this->db->update('ARTICLE');
        
            $data = array(
                'success'=> true,
                'update' => 'Modification terminé'
            );
            
            echo json_encode($data);
        }else{
            $data = array(
                'error'=> 'Un erreur lors du transfert des données'
            );
            
            echo json_encode($data);
        }
    }


// *****************************************************************************************************************


                        // FORM VALIDATION.......

// =================================================================================================================
    public function isAjax(){
        return !empty ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest';
    }
    public function insertion(){
        
        if(!empty($_GET)){
            extract($_POST);
            // $nomec = strip_tags($nomenclature);
            $count = strip_tags($_GET['count']);
            $categ = strip_tags($_GET['categories']);
            $spec = strip_tags($_GET['specificite']);
            $unite = strip_tags($_GET['unite_art']);
            $design = strip_tags($_GET['designation']);
        }
        $this->load->model('ArticleModel');  
        //manual_increment  
        $formule = $this->ArticleModel->manual_increment('ARTICLE','FORMULE');      
        $article = array(
            'FORMULE'=>$formule,
            'DESIGNATION_ART' => $design,
            'SPECIFICITE_ART' => $spec,
            'EFFECTIF_ART' => 0,
            'CODE_SER' => $_SESSION['agent_ser']['0']['CODE_SER'],
            'UNITE_ART' => $unite,
            'DISPONIBILITE_ART' => 'dispo', 
            'ID_CAT' => $categ
        );

        $this->ArticleModel->insertArticle($article);

        $this->session->set_flashdata("operation_rapport", "L'article est inséré(e) sous le N° $formule");
        //     // redirect(base_url('article/insert'), "Refresh");
        if ($this->isAjax()){
            $reponse = array(
                'success'=>$_SESSION['operation_rapport'],
                'article' => $article
            );
            
            echo json_encode($reponse);
        }else{
            redirect(base_url('article/data'), "Refresh");
        }
    }
    public function addition(){

        // $this->load->library('form_validation');

        if(!empty($_GET)){
            $formule = strip_tags($_GET['id']);
            $gine = strip_tags($_GET['gine']);
            $tite = strip_tags($_GET['tite']);
            $taire = strip_tags($_GET['taire']);
            $tant = strip_tags($_GET['tant']);

            $this->load->model('ArticleModel'); //manual_increment  
            $id_origine = $this->ArticleModel->manual_increment('ORIGINE','ID_ORIGINE');

            $this->load->model('DemandeModel');
            $QteStock = $this->DemandeModel->QteStock($formule);

            // $this->load->helper('date');
            $date = date('Y-m-d');
            if ($_GET['description'] || !empty($_GET['description']) || $_GET['description'] !== ""){
                $description = strip_tags($_GET['description']);
                $origine = array(
                    'ID_ORIGINE' => $id_origine,
                    'CODE_SER' => $gine,
                    'FORMULE' => $formule,
                    'QUANTITE_ORG' => $tite,
                    'QUANTITE_STOCK' => $QteStock+$tite,
                    'PRIX_UNI_ORG' => $taire,
                    'MONTANT_ORG' => $tant,
                    'DATE_ORG' => $date,
                    'DESCIPTION' => $description
                );
            }else{
                $origine = array(
                    'ID_ORIGINE' => $id_origine,
                    'CODE_SER' => $gine,
                    'FORMULE' => $formule,
                    'QUANTITE_ORG' => $tite,
                    'QUANTITE_STOCK' => $QteStock+$tite,
                    'PRIX_UNI_ORG' => $taire,
                    'MONTANT_ORG' => $tant,
                    'DATE_ORG' => $date,
                    'DESCIPTION' => ''
                );
            }
            $this->load->model('ArticleModel');
            $this->ArticleModel->insertOrigine($origine);
            $new_qte = $this->ArticleModel->addArticle($formule, $tite);
            
            $this->session->set_flashdata("operation_rapport", "ajouté $tite à l'article N° $formule l'effectif est : $new_qte");
            if ($this->isAjax()){
                $reponse = array(
                    'success'=>$_SESSION['operation_rapport']
                );
                
                echo json_encode($reponse);
            }else{    
                redirect(base_url('article/data'), "Refresh");
            }
        }else{
            $this->session->set_flashdata("operation_rapport", "Veuillez réessayer de saisir les données");
            if($this->isAjax()){
                $reponse = array(
                    'error' => $_SESSION['operation_rapport']
                );
                echo json_encode($reponse);
            }else{
                redirect(base_url('article/addArticle'), "Refresh");
            }
        }
    }

    public function suppression(){
        if(!empty($_GET)){
            $formule = strip_tags($_GET['formule']);
            $this->db->select('*');
            $this->db->from('DEMANDE');
            $this->db->where('FORMULE',$formule);
            $demande = $this->db->get();
            
            $dem = $demande->row_array();

            if($dem['FORMULE']){
                $this->db->set('DISPONIBILITE_ART', 'non dispo');
                $this->db->where('FORMULE', $formule);
                $this->db->update('ARTICLE');

            }else{
                $this->db->where('FORMULE', $formule);
                $this->db->delete('ARTICLE');
            }
        }
        $this->session->set_flashdata("operation_rapport", "L'article N° $formule est supprimé");
        if ($this->isAjax()){
            $reponse = array(
                'success'=>$_SESSION['operation_rapport']
            );
            
            echo json_encode($reponse);
        }else{    
            redirect(base_url('article/data'), "Refresh");
        }
        // $this->page_dataArticle();
    }


// *****************************************************************************************************************

                        // REPARATION FUNCTION.......
    // public function setRecuperation(){
    //     $num = '';
    // }
    public function getRecuperation(){
        if (!empty($_GET)){
            $num = strip_tags($_GET['identifiant']);
            $section = strip_tags($_GET['section']);
            if ($section == 'entre' || $section !== 'sortie'){
                
                $arti = $this->db->query("SELECT ORIGINE.*, SERVICE.*, ARTICLE.* FROM ORIGINE, SERVICE, ARTICLE 
                WHERE ORIGINE.CODE_SER = SERVICE.CODE_SER AND ORIGINE.FORMULE = ARTICLE.FORMULE AND ORIGINE.FORMULE='$num'");
            }else{
                $arti = $this->db->query("SELECT DEMANDE.*, AGENT.*, ARTICLE.* FROM DEMANDE, AGENT, ARTICLE 
                WHERE DEMANDE.MATRICULE = AGENT.MATRICULE AND DEMANDE.FORMULE = ARTICLE.FORMULE");
            }
            $resulty= $arti->result_array();

            $data = array(
                'success'=> true,
                'designation' => $resulty
            );
                        
            echo json_encode($data);
        }
        
    }
// =================================================================================================================
}
?>