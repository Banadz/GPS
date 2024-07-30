<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function menu(){

        $this->load->model('HomeModel');
        $mod = new HomeModel;
        $stat_dem['dash'] = $mod->get_type($_SESSION['agent']['MATRICULE']);

        $this->load->view('template/head');
        $this->load->view('page/Home',$stat_dem);
        $this->load->view('template/foot');
    }
    public function assets()
    {
        $service = $_SESSION['agent_ser']['0']['CODE_SER'];
        $this->load->model('ModelSelection');
        $model = new ModelSelection;
        $matériel['ENTRES'] = $model->selectentres("SELECT CATEGORIE.LABEL_CAT,MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT,MATERIEL.ETAT_MAT,MATERIEL.ID_ORIGINE FROM MATERIEL,CATEGORIE,ORIGINE WHERE MATERIEL.ID_CAT = CATEGORIE.ID_CAT AND MATERIEL.ID_ORIGINE = ORIGINE.ID_ORIGINE AND MATRICULE IS NULL AND CODE_DIVISION IS NULL AND SORTIE IS NULL AND MATERIEL.CODE_SER = '$service' ORDER BY MATERIEL.ID_ORIGINE DESC");
        $utilises['UTILISES'] = $model->selectutiles("SELECT MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT,MATERIEL.ETAT_MAT,MATERIEL.DATE_DEB,MATERIEL.CODE_DIVISION,MATERIEL.SORTIE,TO_CHAR(MATERIEL.DATE_DEB, 'DD mon YYYY',  'NLS_DATE_LANGUAGE = FRENCH') AS DATYDEB,AGENT.MATRICULE,AGENT.NOM_AG,AGENT.NOM_UTIL_AG,AGENT.GENRE FROM MATERIEL,AGENT,DIVISION WHERE MATERIEL.MATRICULE = AGENT.MATRICULE AND MATERIEL.CODE_DIVISION = DIVISION.CODE_DIVISION AND MATERIEL.CODE_SER = '$service' AND MATERIEL.SORTIE IS NULL ORDER BY MATERIEL.REF_MAT DESC");
        $this->load->view('template/head', $matériel);
        $this->load->view('page/page_assets', $utilises);
        $this->load->view('template/foot');
    }
    public function nomenclature()
    {
        $this->load->view('template/head');
        $this->load->view('page/page_nomenclature');
        $this->load->view('template/foot');
    }
    public function compte()
    {
        $this->load->view('template/head');
        $this->load->view('page/page_compte');
        $this->load->view('template/foot');
    }
    public function category()
    {
        $this->load->view('template/head');
        $this->load->view('page/page_category');
        $this->load->view('template/foot');
    }
    public function service()
    {
        $this->load->view('template/head');
        $this->load->view('page/page_service');
        $this->load->view('template/foot');
    }

    public function fichedetenteur()
    {
        $this->load->view('page/fichedetenteur');
    }

    public function sesagents()
    {
        $service = $_SESSION['agent_ser']['0']['CODE_SER'];
        $requete = $this->db->query("SELECT AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG, AGENT.CODE_DIVISION FROM AGENT,DIVISION,SERVICE WHERE AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION AND DIVISION.CODE_SER = SERVICE.CODE_SER AND SERVICE.CODE_SER = '$service'");
        $ag['AGENTS'] = $requete->result();

        $this->load->view('template/head', $ag);
        $this->load->view('Liste/listagents');
        $this->load->view('template/foot');
    }

    public function division()
    {
        
        $this->load->model('UserModel');
        $model = new UserModel;
        $service['vice'] = $model->allService();


        $this->load->view('template/head', $service);
        $this->load->view('page/page_division');
        $this->load->view('template/foot');
    }
    public function affichmat()
    {
        $this->load->model('ModelSelection');
        $this->load->model('UserModel');
        $model = new UserModel;
        $service['vice'] = $model->allService();


        $modeldiv = new ModelSelection;
        $services = $_SESSION['agent_ser']['0']['CODE_SER'];
        $division['DIVISION'] = $modeldiv->selectdivparser("SELECT * FROM DIVISION WHERE CODE_SER = '$services'");

        $this->load->view('template/head', $service);
        $this->load->view('page/division', $division);
        $this->load->view('template/foot');
    }
    public function salutation(){
        
        if ($this->isAjax()){
            $reponse = array(
                'success'=>$_SESSION['agent']
            );
            
            echo json_encode($reponse);
        }else{    
            redirect(base_url('Home'), "Refresh");
        }
    }


    public function disconnect(){

        unset($_SESSION);
        session_destroy();
        redirect(base_url('Login'));
    }

}
?>