<?php
// require_once APPPATH . 'third_party/PhpSpreadSheet/SpreadSheet.php';
defined('BASEPATH') OR exit('No direct script access allowed');

    class AdminController extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('AdminModel');
            // $this->load->library('PhpSpreadsheet/Spreadsheet');
        }
        public function isAjax(){
            return !empty ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest';
        }

        public function page(){
            $this->load->view('template/head');
            $this->load->view('page/page_admin');
            $this->load->view('template/foot');
        }

        public function insertionDIVISION(){
            $config['upload_path'] = './bootstrap/archive';
            $config['allowed_types'] = 'csv|xlsx';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('division')){
                $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $image_error
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $file_path =  $data['upload_data']['full_path'];
                
                $nombreDiv = $this->AdminModel->insertData($file_path);
                unlink($file_path);
                $this->session->set_flashdata("Insertion_rapport", "Insertion de $nombreDiv divisions réussie");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }
        }

        public function insertionAGENT(){
            $config['upload_path'] = './bootstrap/archive';
            $config['allowed_types'] = 'csv|xlsx';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('agent')){
                $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $image_error
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $file_path =  $data['upload_data']['full_path'];
                
                $nombreAgent = $this->AdminModel->insertAgent($file_path);
                unlink($file_path);
                $this->session->set_flashdata("Insertion_rapport", "Insertion de $nombreAgent agents réussie");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION["Insertion_rapport"]
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }
        }

        public function insertionNOMENCLATURE(){
            $config['upload_path'] = './bootstrap/archive';
            $config['allowed_types'] = 'csv|xlsx';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('nomenclature')){
                $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $image_error
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $file_path =  $data['upload_data']['full_path'];
                
                $nombreNomenclature = $this->AdminModel->insertNomenclature($file_path);
                unlink($file_path);
                $this->session->set_flashdata("Insertion_rapport", "Insertion de $nombreNomenclature Nomenclatures réussie");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION["Insertion_rapport"]
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }
        }

        public function insertionCOMPTE(){
            $config['upload_path'] = './bootstrap/archive';
            $config['allowed_types'] = 'csv|xlsx';
            $config['max_size'] = 1000;

            $this->load->library('upload', $config);

            if (!($this->upload->do_upload('compte'))){
                $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $image_error
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $file_path =  $data['upload_data']['full_path'];
                
                $nombreCompte = $this->AdminModel->insertCompte($file_path);
                unlink($file_path);
                $this->session->set_flashdata("Insertion_rapport", "Insertion de $nombreCompte Comptes réussie");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION["Insertion_rapport"]
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }
        }

        public function insertionCATEGORIE(){
            $config['upload_path'] = './bootstrap/archive';
            $config['allowed_types'] = 'csv|xlsx';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('categorie')){
                $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $image_error
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $file_path =  $data['upload_data']['full_path'];
                
                $nombreCategorie = $this->AdminModel->insertCategorie($file_path);
                unlink($file_path);
                $this->session->set_flashdata("Insertion_rapport", "Insertion de $nombreCategorie Categories réussie");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION["Insertion_rapport"]
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }
        }

        public function insertionARTICLE(){
            $config['upload_path'] = './bootstrap/archive';
            $config['allowed_types'] = 'csv|xlsx';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('article')){
                $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $image_error
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }else{
                $data = array('upload_data' => $this->upload->data());
                $file_path =  $data['upload_data']['full_path'];
                $nombreArticle = $this->AdminModel->insertArticle($file_path);
                unlink($file_path);
                $this->session->set_flashdata("Insertion_rapport", "Insertion de $nombreArticle Articles réussie");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION["Insertion_rapport"]
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('config'));
                }
            }
        }
        //  public function insertionAGENT(){
        //     $this->load->database();
        //     $this->load->dbutil();
        //     $this->load->helper('file');
        //     $this->load->database('default');
        //     $this->load->library('oracle_loader');


            
        //     $ori_filename = $_FILES['division']['name'];
        //     if (!empty($ori_filename)){
        //         // $config['upload_path'] = './tmp/';
        //         $config['upload_path'] = './bootstrap/archive';
        //         $config['allowed_types'] = 'csv|xlsx';    
        //         $this->load->library('upload', $config);
            
        //         if ( $this->upload->do_upload('division')){
        //             $upload_data = $this->upload->data();
        //             $chemin = $upload_data['full_path'];
        //             // section INsertion..........

        //             $table = 'DIVISION';
        //             $option = array(
        //                 'delimiter' => ',',
        //                 'enclosure' => '"',
        //                 'escape' => '\\',
        //                 'skip' => '1',
        //                 'field' => array('CODE_DIVISION', 'CODE_SER', 'LABEL_DIVISION')
        //             );
        //             $this->oracle_loader->load($chemin, $table, $option);
                    
        //             if ($this->oracle_loader->load($chemin, $table, $option)){
        //                 $this->session->set_flashdata("Insertion_rapport", "Insertion réussie");
        //                 if($this->isAjax()){
        //                     $reponse = array(
        //                         'success' => $_SESSION['Insertion_rapport']
        //                     );
        //                     echo json_encode($reponse);
        //                 }else{
        //                     redirect (base_url('config'));
        //                 }
        //             }else{
        //                 $image_error['im_error'] = array('imageError' => "Erreur dans l'insertion");
        //                 if($this->isAjax()){
        //                     $reponse = array(
        //                         'error' => $image_error
        //                     );
        //                     echo json_encode($reponse);
        //                 }else{
        //                     redirect (base_url('config'));
        //                 }
        //             }

                    
        //         }else{
                    
        //             $image_error['im_error'] = array('imageError'=> "Erreur dans l'upload");
        //             if($this->isAjax()){
        //                 $reponse = array(
        //                     'error' => $image_error
        //                 );
        //                 echo json_encode($reponse);
        //             }else{
        //                 redirect (base_url('config'));
        //             }
        //         }
        //     }else{
                
        //         $image_error['im_error'] = array('imageError'=> "Vous n'avez pas selectionné le fichier à inserér");
        //         if($this->isAjax()){
        //             $reponse = array(
        //                 'error' => $image_error
        //             );
        //             echo json_encode($reponse);
        //         }else{
        //             redirect (base_url('config'));
        //         }
        //     }
            
        // }
    }
?>