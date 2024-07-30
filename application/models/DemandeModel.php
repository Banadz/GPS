<?php
    class DemandeModel extends CI_Model{

        public function getformule($gnation, $ficite){

            if ($ficite == null){
                $query = $this->db->query("SELECT FORMULE FROM ARTICLE Where DESIGNATION_ART = '$gnation' and SPECIFICITE_ART IS NULL");
            }else{
                $query = $this->db->query("SELECT FORMULE FROM ARTICLE Where DESIGNATION_ART = '$gnation' and SPECIFICITE_ART = '$ficite'");

            }
            $form = $query->row_array();
            return $form['FORMULE'];
        }

        public function getDemande_data(){

            $tp = $_SESSION['agent']['TYPE_AG'];
            $ser = $_SESSION['agent_ser']['0']['CODE_SER'];
            if ($tp !='USER'){
                $queryW=$this->db->query("SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION, SERVICE WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION)  AND  (DIVISION.CODE_SER=SERVICE.CODE_SER) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (SERVICE.CODE_SER = '$ser')
                AND (DEMANDE.ETAT_DEMANDE='En attente') ORDER BY(DEMANDE.NUMEROTATION) DESC");

                $queryR=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, 
                TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_CONFIRM,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION, SERVICE WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION)  AND  (DIVISION.CODE_SER=SERVICE.CODE_SER) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (SERVICE.CODE_SER = '$ser') 
                AND (DEMANDE.ETAT_DEMANDE='Refusé') ORDER BY(DEMANDE.NUMEROTATION) DESC");

                $queryLi=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE,DEMANDE.FORMULE,
                TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_CONFIRM,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION, SERVICE WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION)  AND  (DIVISION.CODE_SER=SERVICE.CODE_SER) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (SERVICE.CODE_SER = '$ser') 
                AND (DEMANDE.ETAT_DEMANDE='Validé') ORDER BY(DEMANDE.NUMEROTATION) DESC");

                $queryL=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION, SERVICE WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION)  AND  (DIVISION.CODE_SER=SERVICE.CODE_SER) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (SERVICE.CODE_SER = '$ser') 
                AND (DEMANDE.ETAT_DEMANDE='Livré') ORDER BY(DEMANDE.NUMEROTATION) DESC");
                
            }else{
                    
                $matri = $_SESSION['agent']['MATRICULE'];
                $queryW=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION) AND (DEMANDE.FORMULE=ARTICLE.FORMULE)
                AND (DEMANDE.ETAT_DEMANDE='En attente') AND (AGENT.MATRICULE='$matri')ORDER BY(DEMANDE.NUMEROTATION) DESC");

                $queryR=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (DEMANDE.ETAT_DEMANDE='Refusé') AND (AGENT.MATRICULE='$matri')ORDER BY(DEMANDE.NUMEROTATION) DESC");

                $queryLi=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, 
                TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_CONFIRM,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (DEMANDE.ETAT_DEMANDE='Validé') AND (AGENT.MATRICULE='$matri')ORDER BY(DEMANDE.NUMEROTATION) DESC");

                $queryL=$this->db->query(" SELECT DEMANDE.NUMEROTATION, DEMANDE.MATRICULE, DEMANDE.FORMULE, 
                TO_CHAR(DEMANDE.DATE_DEMANDE, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_DEMANDE,
                TO_CHAR(DEMANDE.DATE_CONFIRM, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATE_CONFIRM,
                DEMANDE.QUANTITE, DEMANDE.QUANTITE_ACC, DEMANDE.UNITE, DEMANDE.ETAT_DEMANDE, AGENT.MATRICULE, AGENT.NOM_AG, AGENT.NOM_UTIL_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG,
                DIVISION.CODE_DIVISION, DIVISION.LABEL_DIVISION,
                ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART
                FROM DEMANDE, AGENT, ARTICLE, DIVISION WHERE (DEMANDE.MATRICULE=AGENT.MATRICULE) 
                AND (AGENT.CODE_DIVISION=DIVISION.CODE_DIVISION) AND (DEMANDE.FORMULE=ARTICLE.FORMULE) 
                AND (DEMANDE.ETAT_DEMANDE='Livré') AND (AGENT.MATRICULE='$matri')ORDER BY(DEMANDE.NUMEROTATION) DESC");
            }
                
            // $this->db->select('*');
            // $this->db->from('CATEGORIE');
            $queryKAT = $this->db->query(" SELECT CATEGORIE.ID_CAT, CATEGORIE.LABEL_CAT FROM CATEGORIE, ARTICLE 
                                            WHERE CATEGORIE.ID_CAT = ARTICLE.ID_CAT GROUP BY CATEGORIE.ID_CAT, CATEGORIE.LABEL_CAT");
            // $compte = $this->db->get();
            // $count = $compte->result_array();

            $demandeData = array(
                'W' => $queryW->result_array(),
                'R' => $queryR->result_array(),
                'Li' => $queryLi->result_array(),
                'L' => $queryL->result_array(),
                'KATEGORY' => $queryKAT->result_array()
            );
            return $demandeData;
        }
        public function checking($num){

            // checking request content....

            $query = $this->db->query("SELECT * FROM DEMANDE WHERE NUMEROTATION = '$num'");
            $demande = $query->result_array();

            $formule = $demande['0']['FORMULE'];
            $query2 =  $this->db->query("SELECT * FROM ARTICLE WHERE FORMULE = '$formule'");
            $article =  $query2->result_array();

            $id_cat = $article['0']['ID_CAT'];
            $query6 =  $this->db->query("SELECT * FROM CATEGORIE WHERE ID_CAT = '$id_cat'");
            $categorie =  $query6->result_array();

            $id_cmpt = $categorie['0']['NUM_CMPT'];
            $query7 =  $this->db->query("SELECT * FROM COMPTE WHERE NUM_CMPT = '$id_cmpt'");
            $compte =  $query7->result_array();

            $matricule = $demande['0']['MATRICULE'];
            $query3 =  $this->db->query("SELECT * FROM AGENT WHERE MATRICULE = '$matricule'");
            $personnel =  $query3->result_array();

            $code_div = $personnel['0']['CODE_DIVISION'];
            $query4 =   $this->db->query("SELECT * FROM DIVISION WHERE CODE_DIVISION = '$code_div'");
            $division =  $query4->result_array();

            $code_ser = $division['0']['CODE_SER'];
            $query5 =   $this->db->query("SELECT * FROM SERVICE WHERE CODE_SER = '$code_ser'");
            $service =  $query5->result_array();

            $check_array = array(
                'DEM' => $demande,
                'ART' => $article,
                'CAT' => $categorie,
                'CMPT' => $compte,
                'AGT' => $personnel,
                'DIV' => $division,
                'SER' => $service
            );

            return $check_array;
        }

        public function QteStock($form){

            // checking request content....

            $query = $this->db->query("SELECT EFFECTIF_ART FROM ARTICLE WHERE FORMULE = '$form'");
            $demande = $query->result_array();
            $formule = $demande['0']['EFFECTIF_ART'];

            return $formule;
        }

        public function marge_quantite($formule){
            $query2 =  $this->db->query("SELECT * FROM ARTICLE WHERE FORMULE = '$formule'");
            $article =  $query2->result_array();
            return $article[0]['EFFECTIF_ART'];
        }

        public function validerDemande($num, $inputQte, $formule){

            $query2 =  $this->db->query("SELECT * FROM ARTICLE WHERE FORMULE = '$formule'");
            $article =  $query2->result_array();

            $this->db->set('EFFECTIF_ART', $article['0']['EFFECTIF_ART']- $inputQte);
            $this->db->where('FORMULE', $formule);
            $this->db->update('ARTICLE');

            $daty = date('Y-m-d');
            $fst = $article['0']['EFFECTIF_ART']- $inputQte;
            $lera = "TO_DATE (TO_CHAR(SYSDATE,'HH24:MI:SS'),'HH24:MI:SS')";
            $this->db->query("UPDATE DEMANDE SET ETAT_DEMANDE='Validé',
                            DATE_CONFIRM=TO_DATE('$daty','YYYY-MM-DD'), 
                            QUANTITE_ACC='$inputQte', QUANTITE_STOCK='$fst',
                            TIME_CONFIRM = TO_DATE(TO_CHAR(SYSDATE,'HH24:MI:SS'),'HH24:MI:SS') 
                            WHERE NUMEROTATION = '$num'
                            ");
            return $article['0']['EFFECTIF_ART']- $inputQte;
        }
        public function receiveArticleDem($num){
            $daty = date('Y-m-d');
            $lera = date('H-i-s');

            $this->db->query("UPDATE DEMANDE SET ETAT_DEMANDE='Livré',
             DATE_CONFIRM=TO_DATE('$daty', 'YYYY-MM-DD'), TIME_CONFIRM = TO_DATE(TO_CHAR(SYSDATE,'HH24:MI:SS'),'HH24:MI:SS') WHERE NUMEROTATION = '$num'");

        }

        public function refuserDemande($num){
            $daty = date('Y-m-d');
            $lera = date('H-i-s');

            $this->db->query("UPDATE DEMANDE SET ETAT_DEMANDE='Refusé',
             DATE_CONFIRM=TO_DATE('$daty', 'YYYY-MM-DD'), TIME_CONFIRM = TO_DATE(TO_CHAR(SYSDATE,'HH24:MI:SS'),'HH24:MI:SS') WHERE NUMEROTATION = '$num'");

        }

    }
?>