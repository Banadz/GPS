<?php

    class ListController extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
        }
        public function listecompte()
        {
           $this->load->view('template/head');
           $this->load->view('Liste/compte_liste');
           $this->load->view('template/foot');
        }
        public function listecategorie()
        {
           $this->load->view('template/head');
           $this->load->view('Liste/categorie_liste');
           $this->load->view('template/foot');
        }

        public function listedivision()
        {

            $this->load->model('ModelSelection');
            $modeldiv = new ModelSelection;
            $services = $_SESSION['agent_ser']['0']['CODE_SER'];
            $division['DIVISION'] = $modeldiv->selectdivparser("SELECT * FROM DIVISION WHERE CODE_SER = '$services'");

            $this->load->view('template/head');
            $this->load->view('Liste/division_liste', $division);
            $this->load->view('template/foot');
        }

        public function listenomenclature()
        {
           $this->load->view('template/head');
           $this->load->view('Liste/nomenclature_liste');
           $this->load->view('template/foot');
        }
        public function listeservice()
        {
           $requete = $this->db->query("SELECT * FROM SERVICE WHERE CODE_SER != 'ADMIN'");
           $service['SERVICE'] = $requete->result();

           $this->load->view('template/head');
           $this->load->view('Liste/service_liste', $service);
           $this->load->view('template/foot');
        }
    }
?>