<?php

    class GetController extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model("ModelSelection"); 
            $this->load->model('ModelInsertion');
            $this->load->model('ModelModification');
        }
        public function afficheassets()
        {
            if (!empty($_GET['reference'])) {
                $refmat = $_GET['reference'];
                $this->load->view('template/head');
                $affich = new ModelSelection;
                $data['AFFICHE'] = $affich->affichassets($refmat);

                $this->load->view('page/affichassets', $data);
                $this->load->view('template/foot');
            }
        }
        public function affichcat()
        {
            $idcat = $_GET['categorie'];
            if (isset($idcat)) {
                $nomenclature = new ModelSelection;
                $data1['NOMCOMPTE'] = $nomenclature->selectNomCompte($idcat);
                $this->load->view('template/head', $data1);
                $cat = new ModelSelection;
                $data['CATEGORIE'] = $cat->selectCat($idcat);
    
                $this->load->view('page/page_affichcat', $data);
                $this->load->view('template/foot');
            }else {
                $this->load->view('category');
            }
        }
        public function affichnom()
        {
            $idnom = $_GET['nomenclature'];
            if (isset($idnom)) {
                $this->load->view('template/head');
                $cat = new ModelSelection;
                $data['NOMENCLATURE'] = $cat->selectallNom($idnom);
    
                $this->load->view('page/page_affichnom', $data);
                $this->load->view('template/foot');
            }else {
                $this->load->view('listenomenclature');
            }
        }
        public function affichcmpt()
        {
            $numcmpt = $_GET['compte'];
            if (isset($numcmpt)) {
                $this->load->view('template/head');
                $cat = new ModelSelection;
                $data['COMPTE'] = $cat->selectCmpt($numcmpt);
    
                $this->load->view('page/page_affichcmpt', $data);
                $this->load->view('template/foot');
            }else {
                $this->load->view('listecompte');
            }
        }
        public function affichdiv()
        {
            $codediv = $_GET['division'];
            if (isset($codediv)) {
                $this->load->view('template/head');
                $division = new ModelSelection;
                $data['DIVISION'] = $division->selectDiv($codediv);
    
                $this->load->view('page/page_affichdiv', $data);
                $this->load->view('template/foot');
            }else {
                $this->load->view('division');
            }
        }
        public function affichser()
        {
            $codeser = $_GET['service'];
            if (isset($codeser)) {
                $this->load->view('template/head');
                $service = new ModelSelection;
                $data['SERVICE'] = $service->selectSer($codeser);
    
                $this->load->view('page/page_affichser', $data);
                $this->load->view('template/foot');
            }else {
                $this->load->view('listeservice');
            }
        }
        
        public function affichmat()
        {
            $refmat = $_GET['referencemat'];
            if(isset($refmat)){
                $this->load->view('template/head');
                $modelmat = new ModelSelection;
                $materiel['MATERIEL'] = $modelmat->selectunmateriel("SELECT * FROM MATERIEL WHERE REF_MAT = '$refmat'");

                $this->load->view('page/materiel', $materiel);
                $this->load->view('template/foot');
            }else{
                redirect(base_url('assets'));
            }
            // $this->load->view('page/materiel');
        }

        public function informations()
        {
            $materiel = $_GET['materiel'];
            if(isset($materiel)){
                $this->load->view('template/head');
                $this->load->view('Liste/listinfo');
                $this->load->view('template/foot');
            }else{
                redirect(base_url('assets'));
            }
        }

        public function Categorie()
        {
            if(!empty($_GET)){
                $compte = strip_tags($_GET['compte']);
    
                $requete = $this->db->query("SELECT CATEGORIE.ID_CAT,CATEGORIE.LABEL_CAT,COMPTE.DESIGNATION_CMPT FROM CATEGORIE,COMPTE WHERE COMPTE.NUM_CMPT = CATEGORIE.NUM_CMPT AND CATEGORIE.NUM_CMPT = '$compte' GROUP BY CATEGORIE.NUM_CMPT,CATEGORIE.ID_CAT,CATEGORIE.LABEL_CAT,COMPTE.DESIGNATION_CMPT ORDER BY CATEGORIE.LABEL_CAT ASC");
                
                $resulty= $requete->result_array();
    
                $data = array(
                    'success'=> true,
                    'categorie' => $resulty
                );
                
                echo json_encode($data);
            }
        }
    }
?>