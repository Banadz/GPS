<?php

    class AjaxController extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct(); 
            $this->load->model('ModelModification');
            $this->load->model('ModelInsertion'); 
            $this->load->model('ModelSuppression');
            $this->load->model('ModelSelection'); 
            $this->load->model('ArticleModel'); 
        }

        public function verification()
        {
            // ASSETS
            if (isset($_GET['valref'])) {
                $refmat = strip_tags($_GET['valref']);
                $requete = $this->db->query("SELECT REF_MAT FROM MATERIEL WHERE REF_MAT = '$refmat'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'refemat' => $reponse
                    );
                }else{
                    $data = array(
                        'success'=> true,
                        'refemat' => $reponse
                    );
                }

                echo json_encode($data);
            }

            // CATEGORIE

            if (isset($_GET['valcat']) && isset($_GET['cmpt'])) {
                $cmpt = strip_tags($_GET['cmpt']);
                $valcat = strip_tags($_GET['valcat']);
                $uppercase = strtoupper($valcat);
                $requete = $this->db->query("SELECT LABEL_CAT FROM CATEGORIE WHERE NUM_CMPT = '$cmpt' AND (LABEL_CAT = '$valcat' OR LABEL_CAT = '$uppercase')");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'labelcat' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'labelcat' => $reponse
                    );
                }

                echo json_encode($data);
            }

            // COMPTE
            if (isset($_GET['compte'])) {
                $compte = strip_tags($_GET['compte']);
                $requete = $this->db->query("SELECT NUM_CMPT FROM COMPTE WHERE NUM_CMPT = '$compte'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'numcmpt' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'numcmpt' => $reponse
                    );
                }

                echo json_encode($data);
            }

            if (isset($_GET['des'])) {
                $des = strip_tags($_GET['des']);
                $requete = $this->db->query("SELECT DESIGNATION_CMPT FROM COMPTE WHERE DESIGNATION_CMPT = '$des'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'descmpt' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'descmpt' => $reponse
                    );
                }

                echo json_encode($data);
            }

            // NOMENCLATURE

            if (isset($_GET['idnomencl'])) {
                $idnomencl = strip_tags($_GET['idnomencl']);
                $requete = $this->db->query("SELECT ID_NOM FROM NOMENCLATURE WHERE ID_NOM = '$idnomencl'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'numnomencl' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'numnomencl' => $reponse
                    );
                }

                echo json_encode($data);
            }

            if (isset($_GET['det'])) {
                $det = strip_tags($_GET['det']);
                $requete = $this->db->query("SELECT DETAIL_NOM FROM NOMENCLATURE WHERE DETAIL_NOM = '$det'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'detnomencl' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'detnomencl' => $reponse
                    );
                }

                echo json_encode($data);
            }

            // DIVISION

            if (isset($_GET['codediv'])) {
                $division = strip_tags($_GET['codediv']);
                $requete = $this->db->query("SELECT CODE_DIVISION, CODE_SER FROM DIVISION WHERE CODE_DIVISION = '$division'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'codediv' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'codediv' => $reponse
                    );
                }

                echo json_encode($data);
            }

            // SERVICE

            if (!empty($_GET['codeser'])) {
                $codeser = strip_tags($_GET['codeser']);
                $requete = $this->db->query("SELECT CODE_SER FROM SERVICE WHERE CODE_SER = '$codeser'");
                $reponse = $requete->result_array();

                if(empty($reponse)){
                    $reponse = array(
                        '0'=>array('vide')
                    );
                    $data = array(
                        'success'=> true,
                        'codeser' => $reponse
                    );
                }
                else{
                    $data = array(
                        'success'=> true,
                        'codeser' => $reponse
                    );
                }

                echo json_encode($data);
            }

        }

        public function supprimercat($idcat)
        {

            $suppcat = new ModelSuppression;
            $suppcat->supprimercat($idcat);
            $valiny = array(
                'success' => true,
                'id' => $idcat,
            );
            echo json_encode($valiny);
            redirect(base_url('category'));
        }
        public function supprimerdiv($codediv)
        {

            $suppdiv = new ModelSuppression;
            $suppdiv->supprimerdiv($codediv);
            $valiny = array(
                'success' => true,
                'id' => $codediv,
            );
            echo json_encode($valiny);
            redirect(base_url('division'));
        }
        
        public function supprimerser($codeser)
        {

            $suppser = new ModelSuppression;
            $suppser->supprimerser($codeser);
            $valiny = array(
                'success' => true,
                'id' => $codeser,
            );
            echo json_encode($valiny);
            redirect(base_url('listeservice'));
        }
        public function modifierdiv()
        {
           if (!empty($_POST)) 
           {
            $id = strip_tags($_POST['id']);
            $label = strip_tags($_POST['labeldivision']);

            $modif = new ModelModification;
            $modif->modifierdiv("UPDATE DIVISION SET LABEL_DIVISION = '$label' WHERE CODE_DIVISION = '$id'");
            $valiny = array(
                'success' => true,
                'labeldivision' => $label 
            );
            echo json_encode($valiny);
           }
        }
        public function entres()
        {
            $model = new ModelSelection;
            $matériel['ENTRES'] = $model->selectentres("SELECT CATEGORIE.LABEL_CAT,MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT FROM MATERIEL,CATEGORIE WHERE MATERIEL.ID_CAT = CATEGORIE.ID_CAT AND MATRICULE IS NULL AND CODE_DIVISION IS NULL ORDER BY LABEL_CAT ASC");
            $utilises['UTILISES'] = $model->selectutiles("SELECT CATEGORIE.LABEL_CAT,MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT,MATERIEL.MATRICULE,MATERIEL.CODE_DIVISION FROM MATERIEL,CATEGORIE,AGENT,DIVISION WHERE MATERIEL.ID_CAT = CATEGORIE.ID_CAT AND MATERIEL.MATRICULE = AGENT.MATRICULE AND MATERIEL.CODE_DIVISION = DIVISION.CODE_DIVISION ORDER BY LABEL_CAT ASC");
            $this->load->view('template/header', $utilises);
            $this->load->view('Liste/entres', $matériel);
            $this->load->view('template/footer');
        }

        public function getdivision()
        {
            if (isset($_GET['matricule'])) {
                $matricule = strip_tags($_GET['matricule']);
                $requete = $this->db->query("SELECT DIVISION.CODE_DIVISION,DIVISION.LABEL_DIVISION FROM AGENT,DIVISION WHERE AGENT.MATRICULE = '$matricule' AND AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION");
                $valiny = $requete->result_array();

                $data = array(
                    'success'=>true,
                    'division'=>$valiny
                );
                echo json_encode($data);
            }
        }
        public function updatemateriel()
        {
            $detenteur = strip_tags($_POST['detenteur']);
            $division = strip_tags($_POST['codediv']);
            $referencemat = strip_tags($_POST['referencemat']);
            $datedebut = strip_tags($_POST['date_debut']);
            $nombre=1;
            $modelmodif = new ModelModification;
            $requete=$modelmodif->modifiermateriel("UPDATE MATERIEL set NOMBRE='$nombre',DATE_DEB=TO_DATE('$datedebut','YYYY-MM-DD'),MATRICULE='$detenteur',CODE_DIVISION='$division' WHERE REF_MAT = '$referencemat'");
            
            $this->session->set_flashdata("assets", "Matériel ".$referencemat." détenu par l\'agent qui porte N° matricule ".$detenteur."!");
            redirect(base_url('assets'));

        }
        public function comptermateriel()
        {
            if (isset($_GET['service'])) {
                $codeser = strip_tags($_GET['service']);
                $requete = $this->db->query("SELECT COUNT(materiel.ref_mat) AS TOTAL_SERV FROM MATERIEL,SERVICE,DIVISION WHERE DIVISION.CODE_SER=SERVICE.CODE_SER AND MATERIEL.CODE_DIVISION=DIVISION.CODE_DIVISION AND SERVICE.CODE_SER='$codeser'");
                $nombre = $requete->result_array();

                $data = array(
                    'success'=> true,
                    'nombre'=> $nombre
                );

                echo json_encode($data);
            }
        }

        public function updateassets()
        {

            
            //Update POST
            $ref_mat=strip_tags($_POST['referencemat']);
            $date_deb=strip_tags($_POST['date_deb']);
            $matricule=strip_tags($_POST['det']);
            $serv=strip_tags($_POST['service']);

            $all = $this->db->query("SELECT * FROM MATERIEL WHERE REF_MAT = '$ref_mat'");
            $valiny = $all->row_array();

            //Insert POST
            $design_mat = $valiny['DESIGN_MAT'];
            $spec_mat = $valiny['SPEC_MAT'];
            $org_taloha = $valiny['ID_ORIGINE'];
            $nbr_taloha = $valiny['NOMBRE'];
            $etat_taloha = $valiny['ETAT_MAT'];
            $matr_taloha =  $valiny['MATRICULE'];
            $datedeb_taloha = $valiny['DATE_DEB'];
            $date_fin = strip_tags($_POST['date_deb']);
            $id_nom = $valiny['ID_NOM'];
            $id_cmpt = $valiny['NUM_CMPT'];
            $id_cat = $valiny['ID_CAT'];
            $codediv = $valiny['CODE_DIVISION'];

            $this->db->query("INSERT INTO HISTORIQUE(AUTO_MAT,REF,DESIGN,SPEC,ID_ORIGINE,ETAT,NBR,DATEDEB,DATEFIN,ID_NOM,NUM_CMPT,ID_CAT,MATRICULE,CODE_DIVISION,SORTIE,CODE_SER) VALUES(
                AUTO_MAT.nextval,
                '$ref_mat',
                '$design_mat',
                q'[$spec_mat]',
                '$org_taloha',
                q'[$etat_taloha]',
                '$nbr_taloha',
                TO_DATE('$datedeb_taloha', 'YYYY-MM-DD'),
                TO_DATE('$date_fin', 'YYYY-MM-DD'),
                '$id_nom',
                '$id_cmpt',
                '$id_cat',
                '$matr_taloha',
                '$codediv',
                NULL,
                '$serv'
                )"
            );

        

            $service = new ModelModification;
            $service->editAssets_code("UPDATE MATERIEL SET DATE_DEB=TO_DATE('$date_deb','YYYY-MM-DD'),MATRICULE='$matricule' WHERE REF_MAT = '$ref_mat'");


            

            // echo json_encode($ref_mat);

            $this->session->set_flashdata("assets", "Matériel ".$ref_mat." détenu par l\'agent qui porte N° matricule ".$matricule."!");
            redirect(base_url('assets'));
        }

        public function materielmodifie()
        {
            if (isset($_GET['referencemate'])) {
                $referencemate = strip_tags($_GET['referencemate']);
                $requete = $this->db->query("SELECT MATERIEL.REF_MAT,MATERIEL.DESIGN_MAT,MATERIEL.SPEC_MAT,MATERIEL.ETAT_MAT,TO_CHAR(MATERIEL.DATE_DEB, 'YYYY-MM-DD') AS DATYDEB FROM MATERIEL WHERE REF_MAT = '$referencemate'");
                $valiny = $requete->result_array();

                $data = array(
                    'success'=>true,
                    'materiel'=>$valiny
                );
                echo json_encode($data);
            }
        }

        public function modifymateriel()
        {
            $nouvetat = strip_tags($_POST['nouvetat']);
            $specificite = strip_tags($_POST['specificite']);
            $designation = strip_tags($_POST['designation']);
            $referencemat = strip_tags($_POST['reference']);
            $modelmodif = new ModelModification;
            $requete=$modelmodif->modifiermateriel("UPDATE MATERIEL set ETAT_MAT=q'[$nouvetat]', DESIGN_MAT='$designation', SPEC_MAT=q'[$specificite]' WHERE REF_MAT = '$referencemat'");
            $data = array(
                'success' => true 
            );

            echo json_encode($data);

        }
        public function modifymateriel2()
        {
            $nouvetat = strip_tags($_POST['nouvetat1']);
            $specificite = strip_tags($_POST['specificite1']);
            $designation = strip_tags($_POST['designation1']);
            $referencemat = strip_tags($_POST['reference1']);
            $datedebv = strip_tags($_POST['date_deb']);
            $modelmodif = new ModelModification;
            $requete=$modelmodif->modifiermateriel("UPDATE MATERIEL set ETAT_MAT=q'[$nouvetat]', DESIGN_MAT='$designation', SPEC_MAT=q'[$specificite]', DATE_DEB=TO_DATE('$datedebv', 'YYYY-MM-DD') WHERE REF_MAT = '$referencemat'");
            $data = array(
                'success' => true 
            );

            echo json_encode($data);

        }

        public function sortir()
        {
            $reference = strip_tags($_POST['refmatsort']);
            $statut = strip_tags($_POST['statut']);
            $date_sort = strip_tags($_POST['date_sort']);
            $ref_sort = strip_tags($_POST['ref_sort']);
            $observation = strip_tags($_POST['observation']);
            $serv = $_SESSION['agent_ser']['0']['CODE_SER'];

            $modelinsert = new ModelInsertion;
            $requete=$modelinsert->insertsort("INSERT INTO SORTIE(ID_SORTIE,STATUT,DATE_SORT,REF_SORT,MOTIF_SORT,REF_MAT,CODE_SER) VALUES
            (ID_SORTIE.nextval,q'[$statut]',TO_DATE('$date_sort', 'YYYY-MM-DD'),'$ref_sort',q'[$observation]','$reference','$serv')");
            
            $this->db->query("UPDATE MATERIEL SET SORTIE = 'OK' WHERE REF_MAT = '$reference'");

            $all = $this->db->query("SELECT * FROM MATERIEL WHERE REF_MAT = '$reference'");
            $valiny = $all->row_array();

            //Insert POST
            $design_mat = $valiny['DESIGN_MAT'];
            $spec_mat = $valiny['SPEC_MAT'];
            $org_taloha = $valiny['ID_ORIGINE'];
            $nbr_taloha = $valiny['NOMBRE'];
            $etat_taloha = $valiny['ETAT_MAT'];
            $matr_taloha =  $valiny['MATRICULE'];
            $datedeb_taloha = $valiny['DATE_DEB'];
            $date_fin = strip_tags($_POST['date_sort']);
            $id_nom = $valiny['ID_NOM'];
            $id_cmpt = $valiny['NUM_CMPT'];
            $id_cat = $valiny['ID_CAT'];
            $codediv = $valiny['CODE_DIVISION'];

            $this->db->query("INSERT INTO HISTORIQUE(AUTO_MAT,REF,DESIGN,SPEC,ID_ORIGINE,ETAT,NBR,DATEDEB,DATEFIN,ID_NOM,NUM_CMPT,ID_CAT,MATRICULE,CODE_DIVISION,SORTIE,CODE_SER) VALUES(
                AUTO_MAT.nextval,
                '$reference',
                '$design_mat',
                q'[$spec_mat]',
                '$org_taloha',
                q'[$etat_taloha]',
                '$nbr_taloha',
                TO_DATE('$datedeb_taloha', 'YYYY-MM-DD'),
                TO_DATE('$date_fin', 'YYYY-MM-DD'),
                '$id_nom',
                '$id_cmpt',
                '$id_cat',
                '$matr_taloha',
                '$codediv',
                'OK',
                '$serv'
                )"
            );

            $data = array(
                'success' => true 
            );

            echo json_encode($data);

        }

        public function sortaseho()
        {
            if (isset($_GET['refmat'])) {
                $referencemate = strip_tags($_GET['refmat']);
                $requete = $this->db->query("SELECT ID_SORTIE,STATUT,TO_CHAR(DATE_SORT, 'YYYY-MM-DD') AS DATY,REF_SORT,MOTIF_SORT FROM SORTIE WHERE REF_MAT = '$referencemate'");
                $valiny = $requete->result_array();

                $data = array(
                    'success'=>true,
                    'sortie'=>$valiny
                );
                echo json_encode($data);
            }
        }
        public function sortmodif()
        {
            $statut = strip_tags($_POST['statut']);
            $date_sort = strip_tags($_POST['date_sort']);
            $ref_sort = strip_tags($_POST['ref_sort']);
            $observation = strip_tags($_POST['observation']);
            $id_sort = strip_tags($_POST['id_sort']);
            $modelmodif = new ModelModification;
            $modelmodif->modifsortie("UPDATE SORTIE set STATUT=q'[$statut]', DATE_SORT=TO_DATE('$date_sort', 'YYYY-MM-DD'), REF_SORT='$ref_sort',MOTIF_SORT=q'[$observation]' WHERE ID_SORTIE = '$id_sort'");
            $data = array(
                'success' => true 
            );

            echo json_encode($data);
        }

        public function condmatentres()
        {
            $reference = strip_tags($_POST['refmatentres']);
            $statut = strip_tags($_POST['statut']);
            $date_sort = strip_tags($_POST['date_sort']);
            $ref_sort = strip_tags($_POST['ref_sort']);
            $observation = strip_tags($_POST['observation']);
            $serv = $_SESSION['agent_ser']['0']['CODE_SER'];

            $modelinsert = new ModelInsertion;
            $requete=$modelinsert->insertsort("INSERT INTO SORTIE(ID_SORTIE,STATUT,DATE_SORT,REF_SORT,MOTIF_SORT,REF_MAT,CODE_SER) VALUES
            (ID_SORTIE.nextval,q'[$statut]',TO_DATE('$date_sort', 'YYYY-MM-DD'),'$ref_sort',q'[$observation]','$reference','$serv')");
            
            $this->db->query("UPDATE MATERIEL SET SORTIE = 'OK' WHERE REF_MAT = '$reference'");

            $all = $this->db->query("SELECT * FROM MATERIEL WHERE REF_MAT = '$reference'");
            $valiny = $all->row_array();

            //Insert POST
            $design_mat = $valiny['DESIGN_MAT'];
            $spec_mat = $valiny['SPEC_MAT'];
            $org_taloha = $valiny['ID_ORIGINE'];
            $nbr_taloha = $valiny['NOMBRE'];
            $etat_taloha = $valiny['ETAT_MAT'];
            $matr_taloha =  $valiny['MATRICULE'];
            $datedeb_taloha = $valiny['DATE_DEB'];
            $date_fin = strip_tags($_POST['date_sort']);
            $id_nom = $valiny['ID_NOM'];
            $id_cmpt = $valiny['NUM_CMPT'];
            $id_cat = $valiny['ID_CAT'];
            $codediv = $valiny['CODE_DIVISION'];

            $this->db->query("INSERT INTO HISTORIQUE(AUTO_MAT,REF,DESIGN,SPEC,ID_ORIGINE,ETAT,NBR,DATEDEB,DATEFIN,ID_NOM,NUM_CMPT,ID_CAT,MATRICULE,CODE_DIVISION,SORTIE,CODE_SER) VALUES(
                AUTO_MAT.nextval,
                '$reference',
                '$design_mat',
                q'[$spec_mat]',
                '$org_taloha',
                q'[$etat_taloha]',
                NULL,
                NULL,
                TO_DATE('$date_fin', 'YYYY-MM-DD'),
                '$id_nom',
                '$id_cmpt',
                '$id_cat',
                NULL,
                NULL,
                'OK',
                '$serv'
                )"
            );

            $data = array(
                'success' => true 
            );

            echo json_encode($data);

        }

        public function detenteur()
        {
            $serv = $_SESSION['agent_ser']['0']['CODE_SER'];
            $val = strip_tags($_POST['val']);
            $all = $this->db->query("SELECT AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG, COUNT(AGENT.MATRICULE) AS LIGNE FROM AGENT,DIVISION,SERVICE WHERE AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION AND SERVICE.CODE_SER = DIVISION.CODE_SER AND SERVICE.CODE_SER = '$serv' AND  AGENT.CODE_DIVISION != 'AUTEUR' AND (LOWER(AGENT.NOM_AG) LIKE '%$val%' OR LOWER(AGENT.PRENOM_AG) LIKE '%$val%' OR LOWER(AGENT.MATRICULE) LIKE '%$val%') GROUP BY AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG");
            
            $valiny = $all->result_array();

            $data = array(
                'success' => true,
                'agent' => $valiny
            );

            echo json_encode($data);
        }

        public function getdet()
        {
            $serv = $_SESSION['agent_ser']['0']['CODE_SER'];
            $matr = strip_tags($_POST['matr']);
            $all = $this->db->query("SELECT AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG FROM AGENT,DIVISION,SERVICE WHERE AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION AND SERVICE.CODE_SER = DIVISION.CODE_SER AND SERVICE.CODE_SER = '$serv' AND  AGENT.CODE_DIVISION != 'AUTEUR' AND AGENT.MATRICULE = '$matr'");
            
            $valiny = $all->result_array();

            $data = array(
                'success' => true,
                'agent' => $valiny
            );

            echo json_encode($data);
        }

    }

   
?>