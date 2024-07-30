<?php

    class AnyController extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model("ModelSelection"); 
            $this->load->model('ModelInsertion');
            $this->load->model('ModelModification');
        }
        public function detailassets($matricule)
        {
            $this->load->view('template/header');
            $detail = new ModelSelection;
            $data['DETAIL'] = $detail->selectdetail($matricule);

            $this->load->view('page/detailassets', $data);
            $this->load->view('template/footer');
        }
        public function updateassets()
        {

            
            //Update POST
            $ref_mat=$_POST['ref_mat'];
            $design_mat=$_POST['design_mat'];
            $spec_mat=$_POST['spec_mat'];
            $origine=$_POST['origine'];
            $etat_mat=$_POST['etat_mat'];
            $statut=$_POST['statut'];
            $nombre=$_POST['nombre'];
            $date_deb=$_POST['date_deb'];
            $id_nom=$_POST['id_nom'];
            $id_cmpt=$_POST['id_cmpt'];
            $id_cat=$_POST['id_cat'];
            $matricule=$_POST['matricule'];
            $codediv=$_POST['codediv'];


            //Insert POST
            
            $org_taloha = $_POST['org_taloha'];
            $nbr_taloha = $_POST['nbr_taloha'];
            $etat_taloha = $_POST['etat_taloha'];
            $statut_taloha = $_POST['statut_taloha'];
            $matr_taloha =  $_POST['matr_taloha'];
            $datedeb_taloha =  $_POST['datedeb_taloha'];
            $date_fin = $_POST['date_deb'];


            $service = new ModelModification;
            $service->editAssets_code("UPDATE MATERIEL set DESIGN_MAT='$design_mat',SPEC_MAT='$spec_mat',ORIGINE='$origine',ETAT_MAT=q'[$etat_mat]',STATUT='$statut',NOMBRE='$nombre',DATE_DEB=TO_DATE('$date_deb','YYYY-MM-DD'),ID_NOM='$id_nom',ID_CMPT='$id_cmpt',ID_CAT='$id_cat',MATRICULE='$matricule',CODE_DIVISION='$codediv' WHERE REF_MAT = '$ref_mat'");
            
            $asset = new ModelInsertion;
            $asset->insertAssets("INSERT INTO MATERIELS(REF_MAT,DESIGN_MAT,SPEC_MAT,ORIGINE,ETAT_MAT,STATUT,NOMBRE,DATE_DEB,DATE_FIN,ID_NOM,ID_CMPT,ID_CAT,MATRICULE,CODE_DIVISION) VALUES(
                REF_MAT.nextval,
                '$design_mat',
                '$spec_mat',
                '$org_taloha',
                q'[$etat_taloha]',
                '$statut_taloha',
                '$nbr_taloha',
                TO_DATE('$datedeb_taloha', 'YYYY-MM-DD'),
                TO_DATE('$date_fin', 'YYYY-MM-DD'),
                '$id_nom',
                '$id_cmpt',
                '$id_cat',
                '$matr_taloha',
                '$codediv'
                )");
            redirect(base_url().'assets');
        }
        public function Modifiercat($idcat)
        {
            $data = [
                'NUM_CMPT' => $_POST['id_cmpts'],
                'LABEL_CAT'=>$_POST['label_cat']
            ];
    
            $category = new ModelModification;
            $category->Categorymodif($data, $idcat);

            $this->session->set_flashdata("catmod", "Catégorie bien modifiée");
            redirect(base_url().'category');
        }
        public function Modifiercmpt($numcmpt)
        {
            $data = [
                'NUM_CMPT' => $_POST['num_cmpt'],
                'DESIGNATION_CMPT'=> $_POST['designation_cmpt']
            ];
    
            $compte = new ModelModification;
            $compte->Comptemodif($data, $numcmpt);
            $this->session->set_flashdata("comptemod", "Compte bien modifié");
            redirect(base_url().'listecompte');
        }
        public function Modifiernom($idnom)
        {
            $detailnom = $_POST['detail_nom'];
            $nomenclature = new ModelModification;
            $nomenclature->Nomenclaturemodif("UPDATE NOMENCLATURE SET DETAIL_NOM = q'[$detailnom]' WHERE ID_NOM = '$idnom'");
            $this->session->set_flashdata("nomenclmod", "Nomenclature bien modifié");
            redirect(base_url().'listenomenclature');
        }
        public function Modifierdiv($codediv)
        {
            $labeldiv = $_POST['labeldiv'];
            $division = new ModelModification;
            $division->Divisionmodif("UPDATE DIVISION SET LABEL_DIVISION = q'[$labeldiv]' WHERE CODE_DIVISION = '$codediv'");
            
            $this->session->set_flashdata("divisionmod", "Division bien modifiée");

            redirect(base_url().'listedivision');
        }
        public function Modifierser($codeser)
        {
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

            $service = new ModelModification;
            $service->Servicemodif("UPDATE SERVICE SET LIBELLE = q'[$libelle]', ENTETE1 = q'[$entete1]', ENTETE2 = q'[$entete2]', ENTETE3 = q'[$entete3]', ENTETE4 = q'[$entete4]', ENTETE5 = q'[$entete5]', SIGLE = q'[$sigle]', VILLE = '$ville', ADRESSE = '$adresse', CONTACT = '$contact' WHERE CODE_SER = '$codeser'");
            $this->session->set_flashdata("servmod", "Service bien modifié");
            redirect(base_url().'listeservice');
        }
    }

?>