<?php
    class ArticleModel extends CI_Model{

        public function nomenclatureList(){
            $this->db->select('*');
            $this->db->from('NOMENCLATURE');
            $nomenclature = $this->db->get();
            return $nomenclature->result_array();
        }

        public function insertArticle($article){
            $this->db->insert('ARTICLE',$article);
        }

        public function manual_increment($table, $id){

            $query = $this->db->query("SELECT $id FROM $table");
            
            $last = $query->last_row();
            if ((isset($last))){
                $num = $last->$id;
            } 

            if ((!isset($num))  || (!isset($last)) || ($num == 0) ){
                $num = 1;
            }else{
                $num = $num + 1;
            }

            return $num;

        }
        public function getArticleBy($formule){
            $bigquery = $this->db->query("SELECT NOMENCLATURE.ID_NOM, NOMENCLATURE.DETAIL_NOM,
                                    COMPTE.ID_CMPT, COMPTE.DESIGNATION_CMPT, COMPTE.NUM_CMPT,
                                    CATEGORIE.ID_CAT, CATEGORIE.LABEL_CAT,  ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART,
                                    ARTICLE.SPECIFICITE_ART, ARTICLE.ID_ORIGINE, ARTICLE.UNITE_ART,
                                    ARTICLE.PRIX_UNI, ARTICLE.MONTANT_ART, ARTICLE.DATE_ACQUIS 
                                    FROM  NOMENCLATURE, COMPTE, CATEGORIE, ARTICLE
                                    WHERE NOMENCLATURE.ID_NOM = COMPTE.ID_NOM
                                    AND COMPTE.ID_CMPT = CATEGORIE.ID_CMPT
                                    AND CATEGORIE.ID_CAT = ARTICLE.ID_CAT
                                    AND ARTICLE.FORMULE = $formule");
            

            // $this->db->select('*');
            // $this->db->from('blogs');
            // $this->db->join('comments', 'comments.id = blogs.id');
            // $this->db->select('*');
            // $this->db->from('ARTICLE');
            // $article = $this->db->get();
            return $bigquery->result_array();
        }
        public function serviceList(){
            $service = $this->db->query("SELECT * FROM SERVICE WHERE CODE_SER != 'ADMIN'");
            return $service->result_array();
        }

        public function addArticle($formule,$quantite){
            $query = $this->db->query("SELECT EFFECTIF_ART FROM ARTICLE Where FORMULE = '$formule'");
            $form = $query->result_array();
            $effectif_art = $form['0']['EFFECTIF_ART'];
            $qte = $effectif_art + $quantite;

            $this->db->query("UPDATE ARTICLE set EFFECTIF_ART = '$qte' WHERE FORMULE ='$formule'");
            
            return $qte;
        }

        public function insertOrigine($origine){
            $id = $origine['ID_ORIGINE'];
            $code_ser = $origine['CODE_SER'];
            $formule = $origine['FORMULE'];
            $quantite = $origine['QUANTITE_ORG'];
            $quantite_stock = $origine['QUANTITE_STOCK'];
            $prix = $origine['PRIX_UNI_ORG'];
            $montant = $origine['MONTANT_ORG'];
            $descripion = $origine['DESCIPTION'];
            $date = date('Y-m-d');

            $this->db->query("INSERT INTO ORIGINE (ID_ORIGINE, CODE_SER, FORMULE, QUANTITE_ORG, QUANTITE_STOCK, PRIX_UNI_ORG, MONTANT_ORG, 
            DATE_ORG, TIME_ORG,RECU_ORG, DESCIPTION)
                                VALUES (
                                    '$id','$code_ser','$formule','$quantite', '$quantite_stock','$prix','$montant',TO_DATE('$date','YYYY-MM-DD'),
                                    TO_DATE(TO_CHAR(SYSDATE,'HH24:MI:SS'),'HH24:MI:SS'),'', '$descripion'
                                )    
                            ");
            
        }

        public function showArticle(){
            $ser = $_SESSION['agent_ser'][0]['CODE_SER'];
            $query=$this->db->query("SELECT ARTICLE.FORMULE, ARTICLE.DESIGNATION_ART, ARTICLE.SPECIFICITE_ART, ARTICLE.EFFECTIF_ART, ARTICLE.UNITE_ART
                                    ,CATEGORIE.LABEL_CAT FROM ARTICLE,CATEGORIE where (ARTICLE.ID_CAT = CATEGORIE.ID_CAT)
                                    and (ARTICLE.DISPONIBILITE_ART = 'dispo') and (CODE_SER='$ser')");
            return $query->result_array();
        }

        public function information($num){

            // checking request content....

            $query = $this->db->query("SELECT * FROM ORIGINE WHERE ID_ORG = '$num'");
            $origine = $query->result_array();

            $code_ser = $origne['0']['FORMULE'];
            $query2 =  $this->db->query("SELECT * FROM ARTICLE WHERE FORMULE = '$formule'");
            $article =  $query2->result_array();

            $id_cat = $article['0']['ID_CAT'];
            $query6 =  $this->db->query("SELECT * FROM CATEGORIE WHERE ID_CAT = '$id_cat'");
            $categorie =  $query6->result_array();

            $id_cmpt = $categorie['0']['ID_CMPT'];
            $query7 =  $this->db->query("SELECT * FROM COMPTE WHERE ID_CMPT = '$id_cmpt'");
            $compte =  $query7->result_array();

            $code_ser = $origne['0']['CODE_SER'];
            $query5 =   $this->db->query("SELECT * FROM SERVICE WHERE CODE_SER = '$code_ser'");
            $service =  $query5->result_array();

            $check_array = array(
                'ORG' => $origine,
                'ART' => $article,
                'CAT' => $categorie,
                'CMPT' => $compte,
                'SER' => $service
            );

            return $check_array;
        }
    }
?>