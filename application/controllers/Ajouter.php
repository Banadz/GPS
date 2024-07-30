<?php

    class Ajouter extends CI_Controller
    {
        public function isAjax(){
            return !empty ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest';
        }
        public function __construct()
        {
            parent::__construct(); 
            $this->load->model('ModelInsertion');  
        }
        public function ajoutassets()
        {
            $ref_mat = $_POST['ref_mat'];
            $id_nom = $_POST['id_nom'];
            $id_cmpt = $_POST['id_cmpt'];
            $id_cat = $_POST['id_cat'];
            $design_mat = $_POST['design_mat'];
            $spec_mat = $_POST['spec_mat'];
            $etat_mat = $_POST['etat_mat'];
            $origine = $_POST['origine'];
            $attestation = $_POST['attestation'];
            $montant = $_POST['montant'];
            $date_org = $_POST['date_org'];
            $qte = $_POST['quantite'];
            $ser = $_SESSION['agent_ser']['0']['CODE_SER'];

            
            $this->db->query("INSERT INTO ORIGINE(ID_ORIGINE,CODE_SER,QUANTITE_ORG,MONTANT_ORG,DATE_ORG,RECU_ORG) VALUES(
                ID_ORIGINE.nextval,
                '$origine',
                '$qte',
                '$montant',
                TO_DATE('$date_org','YYYY-MM-DD'),
                '$attestation'
            )");
            $reqid = $this->db->query("SELECT ID_ORIGINE FROM ORIGINE ORDER BY ID_ORIGINE DESC");
            $resulat1 = $reqid->row_array();
            $idorig = $resulat1['ID_ORIGINE'];

            $this->db->query("INSERT INTO MATERIEL(REF_MAT,DESIGN_MAT,SPEC_MAT,ETAT_MAT,ID_NOM,NUM_CMPT,ID_CAT,ID_ORIGINE,SORTIE,CODE_SER) VALUES(
            '$ref_mat',
            '$design_mat',
            '$spec_mat',
            '$etat_mat',
            '$id_nom',
            '$id_cmpt',
            '$id_cat',
            '$idorig',
            NULL,
            '$ser'
            )");
            
            $this->session->set_flashdata("materiel", "Un nouveau matériel entré");
            redirect(base_url()."assets", "refresh");
            
        }
        public function ajoutcmpt_nom()
        {
            if (isset($_POST)) {
                $id_nom = $_POST['id_nom'];
                $detail_nom = $_POST['detail_nom'];

                $nomencl = new ModelInsertion;
                $nomencl->insertNomencl("INSERT INTO NOMENCLATURE VALUES('$id_nom',q'[$detail_nom]')");
                $this->session->set_flashdata("nomenclature", "Nomenclature bien enregistré");
                if ($this->isAjax()){
                    $reponse = array(
                        'success'=>$_SESSION['compte'],
                        'num'=>$num_cmpt
                    );
                    
                    echo json_encode($reponse);
                }else{
                    redirect(base_url()."nomenclature");
                }
            }
        }
        public function ajoutCompte(){
            if ($_POST){
                $num_cmpt = $_POST['num_cmpt'];
                $des_cmpt = $_POST['designation_cmpt'];
                $compte = new ModelInsertion;
                $compte->insertCmpt("INSERT INTO COMPTE VALUES('$num_cmpt',q'[$des_cmpt]')");
                $this->session->set_flashdata("compte", "Compte $num_cmpt bien enregistré");
                if ($this->isAjax()){
                    $reponse = array(
                        'success'=>$_SESSION['compte'],
                        'num'=>$num_cmpt
                    );
                    
                    echo json_encode($reponse);
                }
                else{
                    redirect(base_url()."compte");
                }
            }else{
                $this->session->set_flashdata("compte", "Erreur de la réception de données");
                if ($this->isAjax()){
                    $reponse = array(
                        'error'=>$_SESSION['compte'],
                    );
                    
                    echo json_encode($reponse);
                }
                else{
                    redirect(base_url()."compte");
                }
            }
        }
        public function ajoutcat()
        {
            
            $this->load->model('ArticleModel');
            
            $id_cmpt = $this->ArticleModel->manual_increment('CATEGORIE', 'ID_CAT');
            $num_cmpt = strip_tags($_POST['id_cmpts']);
            $label_cat = strip_tags($_POST['label_cat']);


            $categorie = new ModelInsertion;
            $categorie->insertCat("INSERT INTO CATEGORIE VALUES($id_cmpt,q'[$label_cat]','$num_cmpt')");

            $query = $this->db->query("SELECT CATEGORIE.ID_CAT,CATEGORIE.LABEL_CAT,COMPTE.DESIGNATION_CMPT 
                                        FROM CATEGORIE,COMPTE WHERE CATEGORIE.LABEL_CAT = '$label_cat' AND COMPTE.NUM_CMPT = CATEGORIE.NUM_CMPT 
                                        GROUP BY CATEGORIE.ID_CAT,CATEGORIE.LABEL_CAT,COMPTE.DESIGNATION_CMPT");
            $res = $query->row();
            if ($res) {
                $designation = $res->DESIGNATION_CMPT;
                $idcat = $res->ID_CAT;
            }
            $reponse = array(
                'success' => true,
                'idcat' => $idcat,
                'label' => $label_cat,
                'designation' => $designation
            );
            echo json_encode($reponse);exit;
        }
        public function ajoutser()
        {
            
            if (isset($_POST['save_ser'])) {
                $this->form_validation->set_rules('code_ser','Service code','required');
                $this->form_validation->set_rules('libelle','Label','required');
                $this->form_validation->set_rules('sigle','Sigle','required');
                $this->form_validation->set_rules('ville','City centre','required');
                $this->form_validation->set_rules('adresse','Address','required');
                $this->form_validation->set_rules('contact','Contact','required');

                if ($this->form_validation->run() == TRUE)
                {
                    $code_ser = $_POST['code_ser'];
                    $libelle = $_POST['libelle'];
                    $entete1 = $_POST['entete1'];
                    $entete2 = $_POST['entete2'];
                    $entete3 = $_POST['entete3'];
                    $entete4 = $_POST['entete4'];
                    $entete5 = $_POST['entete5'];
                    $sigle = $_POST['sigle'];
                    $ville = $_POST['ville'];
                    $adresse = $_POST['adresse'];
                    $contact = $_POST['contact'];

                    $service = new ModelInsertion;
                    $service->insertSer("INSERT INTO SERVICE VALUES ('$code_ser',q'[$libelle]',q'[$entete1]',q'[$entete2]',q'[$entete3]',q'[$entete4]',q'[$entete5]',q'[$sigle]','$ville','$adresse','$contact')");
                    $this->session->set_flashdata("service", "Service bien enregistré");
                    redirect(base_url()."service","refresh");
                }else {
                    $this->load->view('template/header');
                    $this->load->view('page/service');
                    $this->load->view('template/footer');
                }
            }
        }
        public function ajoutdiv()
        {
            $codeser =strip_tags($_POST['codeser']);
            $codediv =strip_tags($_POST['codediv']);
            $labeldiv =strip_tags($_POST['labeldiv']);

            $division = new ModelInsertion;
            $division->insertDivision("INSERT INTO DIVISION VALUES('$codediv','$codeser',q'[$labeldiv]')");
            $resultat = array(
                'success' => true,
                'codeser' => $codeser,
                'codediv' => $codediv,
                'labeldiv' => $labeldiv
            );
            echo json_encode($resultat);
        }

        public function ajoutorig()
        {
            $codeser = $_POST['codeser'];
            $labelorig = $_POST['labelorig'];

            $origine = new ModelInsertion;
            $origine->insertOrigineliste("INSERT INTO LISTEORIGINE VALUES(AUTO_ORIG.nextval,q'[$labelorig]','$codeser')");
            $this->session->set_flashdata("statuts", "Origine bien enregistrée");
            redirect(base_url()."origine");
        }
    }
?>