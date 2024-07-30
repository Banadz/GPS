<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeController extends CI_Controller
{
    public function isAjax(){
        return !empty ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest';
    }

    public function page_demande(){
        
        $this->load->model('ArticleModel');
        $nomenclat['nome'] = $this->ArticleModel->nomenclatureList();

        $this->load->view('template/header');      
        $this->load->view('page/page_demande_form',$nomenclat);

        $this->load->view('template/footer');
    }

    public function all_demande(){
        $this->load->model('DemandeModel');
        $bigDemande['bigDemande'] = $this->DemandeModel->getDemande_data();
        $this->load->view('template/head');      
        $this->load->view('page/demandeCenter',$bigDemande);
        $this->load->view('template/foot');
    }

    public function demande_table(){

        $this->load->model('DemandeModel');

        $request['demande'] = $this->DemandeModel->getDemande_data();


        $this->load->view('template/header');
        $this->load->view('page/page_demande_table',$request);
        $this->load->view('template/footer');

    }

    public function formValidationDem($num){

        $this->load->model('DemandeModel');
        $check_array['constraint'] = $this->DemandeModel->checking($num);
        
        $this->load->view('template/header');
        $this->load->view('page/page_demande_validation',$check_array);
        $this->load->view('template/footer');
    }

    public function send_demande(){
            if(!empty($_POST)){
                $big_data = $this->input->post('big_data');

                
                $this->load->model('DemandeModel');
                $this->load->model('ArticleModel');
                $numList = array();
                foreach ($big_data as $ligne){
                    $formule = $ligne[0];//$this->DemandeModel->getformule($ligne[2], $ligne[3]);
                    $QteStock = $this->DemandeModel->QteStock($formule);

                    $num = $this->ArticleModel->manual_increment('DEMANDE', 'NUMEROTATION');
                    array_push($numList, $num);
                    $gnation = strip_tags($ligne[2]);
                    $ficite = strip_tags($ligne[3]);
                    $unite = strip_tags($ligne[5]);
                    $tite = $ligne[4];
                    $agenty = $this->session->userdata('agent');
                    $matricule = $agenty['MATRICULE'];
                    
                    $this->load->helper('date');
                    $date_demande = date('Y-m-d');
                    $heure_demande = date('H:i:s');
                    $etat = 'En attente';
                    $demande = array(
                        'NUMEROTATION' => $num,
                        'MATRICULE' => $matricule,
                        'FORMULE' => $formule,
                        'DATE_DEMANDE' => $date_demande,
                        'DATE_CONFIRM' => $date_demande,
                        'TIME_CONFIRM' => $heure_demande,
                        'QUANTITE' => $tite,
                        'QUANTITE_ACC' => 0,
                        'QUANTITE_STOCK' => $QteStock,
                        'UNITE' => $unite,
                        'ETAT_DEMANDE' => $etat
                    );
                    $this->db->query("INSERT INTO DEMANDE (NUMEROTATION, MATRICULE, FORMULE, 
                                                            DATE_DEMANDE, DATE_CONFIRM, TIME_CONFIRM, 
                                                            QUANTITE,  QUANTITE_ACC ,QUANTITE_STOCK,
                                                            UNITE, ETAT_DEMANDE
                                                            )
                                        VALUES(
                                            '$num', '$matricule','$formule',
                                            TO_DATE('$date_demande','YYYY-MM-DD'),
                                            TO_DATE('$date_demande','YYYY-MM-DD'),
                                            TO_DATE(TO_CHAR(SYSDATE,'HH24:MI:SS'),'HH24:MI:SS'),
                                            '$tite','0','$QteStock',
                                            '$unite','$etat'
                                        )
                                    ");

                    
                }
                $this->session->set_flashdata("sent", "Demande soumis et mise en attentte");
                    if ($this->isAjax()){
                        $reponse = array(
                            'success'=>$_SESSION['sent'],
                            'ListNum'=>$numList
                        );
                        
                        echo json_encode($reponse);
                    }
                
            }else{
                $this->session->set_flashdata("sent", "Une erreur s'est produit lors du trasfert de données");
                if ($this->isAjax()){
                    $reponse = array(
                        'error'=>$_SESSION['sent'],
                    );
                    
                    echo json_encode($reponse);
                }               
            }
                //  test to know if this article've specificity
                // if (!($this->input->post('ficite'))){
                //     //  make a constraint for specificity
                //     $query = $this->db->query("SELECT SPECIFICITE_ART FROM ARTICLE Where DESIGNATION_ART = '$gnation'");
                //     $testy = $query->row_array();
                //     if(!($testy)){
                //         $ficite = '';
                //     }else{
                //         $this->session->set_flashdata("ficite_err", "Le champs specificite est vide");
                //     }
                // }
                // var_dump($demande);
                    
                

                
        // }else{
        //         $this->session->set_flashdata("sent", "Les données nécessaire incompletes");
        //         $form_error = array(
        //             'designation' => form_error('gnation'),
        //             // 'specificite' => $_SESSION('ficite_art'),
        //             'unite' => form_error('unite_art'),
        //             'quantite' => form_error('tite')
        //         );
        //         if($this->isAjax()){
        //             $reponse = array(
        //                 'error' => $_SESSION['sent'],
        //                 'form_error'=> $form_error
        //             );
        //             echo json_encode($reponse);
        //         }else{
        //             redirect (base_url('demande/form'), "Refresh");
        //         }
        // }
    }
    public function acceptWarning(){
        if(!empty($_GET)){
            $num = strip_tags($_GET['num']);
            $inputQte = strip_tags($_GET['inputQte']);
            $formule = strip_tags($_GET['formule']);
            $this->accord($num, $inputQte, $formule); 
        }
    }

    public function accord($num, $inputQte, $formule){
        $this->load->model('DemandeModel');
        $newQte = $this->DemandeModel->validerDemande($num, $inputQte, $formule);
        $this->session->set_flashdata("valide_rapport", "La demande N° $num est validée avec succès. Stock: $newQte");
        if ($this->isAjax()){
            $reponse = array(
                'success'=>$_SESSION['valide_rapport'],
                'demande' => $num
            );
            echo json_encode($reponse);
        }else{
            redirect(base_url('demande/data'), "Refresh");
        }
    }
    public function validation(){
        if(!empty($_GET)){
            $num = strip_tags($_GET['num']);
            $inputQte = strip_tags($_GET['qte']);

            $this->load->model('DemandeModel');
            // first verify the qte....
            $check_array = $this->DemandeModel->checking($num);
            $formule = $check_array['ART']['0']['FORMULE'];
            $stockQte = $this->DemandeModel->marge_quantite($formule);

            if(($stockQte - $inputQte)<0){
                $reqQte = ($stockQte - $inputQte)*(-1);
                $this->session->set_flashdata("valide_rapport", "Le stock est insuffisant (voir $reqQte) pour la demande N° $num.");
                if ($this->isAjax()){
                    $reponse = array(
                        'error'=>$_SESSION['valide_rapport'],
                        'demande' => $num
                    );
                    echo json_encode($reponse);
                }else{
                    redirect(base_url('demande/data'), "Refresh");
                }
            }else{
                if(($stockQte - $inputQte)<10){
                    $this->session->set_flashdata("valide_rapport", "La marge de stock va être depasée pour la demande N° $num?.");
                    $demInfo = array([
                        'num' => $num,
                        'inputQte' => $inputQte,
                        'formule' => $formule
                    ]);
                    if ($this->isAjax()){
                        $reponse = array(
                            'warning'=>$_SESSION['valide_rapport'],
                            'info' => $demInfo
                        );
                        echo json_encode($reponse);
                    }else{
                        redirect(base_url('demande/data'), "Refresh");
                    }
                }else{
                    $this->accord($num, $inputQte, $formule);     
                }
            }
        }else{
            $this->session->set_flashdata("valide_rapport", "Une erreur persiste lors du transfert de données pour la demande N° $num");
            if ($this->isAjax()){
                $reponse = array(
                    'error'=>$_SESSION['valide_rapport'],
                    'demande' => $num
                );
                
                echo json_encode($reponse);
            }else{
                redirect(base_url('demande/data'), "Refresh");
            }
        }
    }

    public function refuse(){
        if(!empty($_GET)){
            $num = strip_tags($_GET['num']);
            $this->load->model('DemandeModel');
            $this->DemandeModel->refuserDemande($num);
            $this->session->set_flashdata("valide_rapport", "La demande N° $num est refusé");
            if ($this->isAjax()){
                $reponse = array(
                    'success'=>$_SESSION['valide_rapport'],
                    'demande' => $num
                );
                
                echo json_encode($reponse);
            }else{
                redirect(base_url('demande'), "Refresh");
            }
        }else{
            $this->session->set_flashdata("valide_rapport", "Une erreur persiste lors du transfert de donné pour la demande N° $num");
            if ($this->isAjax()){
                $reponse = array(
                    'error'=>$_SESSION['valide_rapport'],
                    'demande' => $num
                );
                
                echo json_encode($reponse);
            }else{
                redirect(base_url('demande/data'), "Refresh");
            }
        }
    }

    public function Recevoir(){
        if(!empty($_GET)){
            $num = strip_tags($_GET['num']);
            $this->load->model('DemandeModel');
            $this->DemandeModel->receiveArticleDem($num);
            $this->session->set_flashdata("valide_rapport", "L'objet de la demande est  livré. ( Réf: N° $num) ");
            if ($this->isAjax()){
                $reponse = array(
                    'success'=>$_SESSION['valide_rapport'],
                    'demande' => $num
                );
                
                echo json_encode($reponse);
            }else{
                redirect(base_url('demande'), "Refresh");
            }
        }else{
            $this->session->set_flashdata("valide_rapport", "Une erreur persiste lors du transfert de donné pour la demande");
            if ($this->isAjax()){
                $reponse = array(
                    'error'=>$_SESSION['valide_rapport'],
                    'demande' => 0,
                );
                
                echo json_encode($reponse);
            }else{
                redirect(base_url('demande'), "Refresh");
            }
        }
    }

    public function control_Quant(){
        
        if (!empty($_POST)){
            $formule = $this->input->post('formule');
            $qDem = $this->input->post('qDem');
            $this->load->model('DemandeModel');
            $effectif = $this->DemandeModel->QteStock($formule);

            // Traitement.....
            if ($effectif == 0){
                $this->session->set_flashdata("rapport", "Stock épuisé");
                $bol = false;
                
            }else{
                if (($effectif - $qDem) < 0){
                    $this->session->set_flashdata("rapport", "Stock Insuffisant");
                    $bol = false;
                }else{
                    $this->session->set_flashdata("rapport", "Accordé");
                    $bol = true;
                }
            }
        }else{
            $this->session->set_flashdata("rapport", "Accordé");
            $bol = false;
            
        }
        if ($this->isAjax()){
            $reponse = array(
                'success'=>$bol,
                'rapport' => $_SESSION['rapport']
            );   
            echo json_encode($reponse);
        }else{
            redirect(base_url('demande'), "Refresh");
        }

    }

    public function fullInfo_byNumDem(){
        if(($_GET)){
            $matricule = strip_tags($_GET['im']);
            $numerotation = strip_tags($_GET['num']);
            $this->load->model('UserModel');
            $this->load->model('DemandeModel');
            $check_array = $this->DemandeModel->checking($numerotation);
            
            $users = $this->UserModel->getAgentby_matricule($matricule);
            $reponse = array(
                'success'=>TRUE,
                'user' => $users,
                'array'=>$check_array
            );
            // var_dump($reponse);
            echo json_encode($reponse);
        }else{
            $reponse = array(
                'error'=>'Une erreur lors du transfert de donnée',
            );
            echo json_encode($reponse);
        }
    }

    public function printDemande(){
        
        $this->load->model('DemandeModel');
        $big_data['big_data'] = json_decode($_GET['big_data'],true);
        $listNum = json_decode($_GET['listNum'],true);
        $packetDemande = array();
        foreach ($listNum as $num){
            $packet = $this->DemandeModel->checking($num);
            array_push($packetDemande, $packet);
        }
        $packetDemande['packetsDemande']=array_filter($packetDemande);
        // foreach ($packetDemande as $packet){
        //     var_dump($packet['DEM']);
        //     echo "\n";
            
        // }
        
        $this->load->view('printPdf/ficheValidDem', $packetDemande);
    }
}
?>