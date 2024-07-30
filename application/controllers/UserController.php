<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class UserController extends CI_Controller
    {
        public function isAjax(){
            return !empty ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest';
        }
        public function getUserby_matri(){
            if(($_GET)){
                $matricule = strip_tags($_GET['im']);
                $this->load->model('UserModel');
                $users = $this->UserModel->getAgentby_matricule($matricule);
                $reponse = array(
                    'success'=>TRUE,
                    'user' => $users
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
        public function page_dataUser(){

            $this->load->model('UserModel');
            $utilisateur['user'] = $this->UserModel->dataAgent();
            $service['vice'] = $this->UserModel->allService();
            
            $this->load->view('template/head',$service);
            $this->load->view('page/userRegister',$utilisateur);
            $this->load->view('template/foot');
        }
        public function page_profilUser(){

            $matricule = strip_tags($_SESSION['agent']['MATRICULE']);
            $this->load->model('UserModel');
            $agent['agent_pro'] = $this->UserModel->getAgentby_matricule($matricule);


            $this->load->view('template/head');
            $this->load->view('page/userProfil',$agent);
            $this->load->view('template/foot');

        }
        public function modificationProf(){
            if(!empty($_GET)){
                $key = strip_tags($_GET['key']);
                $division = strip_tags($_GET['division']);
                $fonction_ag = strip_tags($_GET['fonction_ag']);
                $type_ag = strip_tags($_GET['type_ag']);
                $update_value = array(
                        'CODE_DIVISION' => $division,
                        'FONCTION_AG' => $fonction_ag,
                        'TYPE_AG' => $type_ag

                );
                $this->load->model('UserModel');
                $this->UserModel->updating_ag($key, $update_value);
                $this->session->set_flashdata("Insertion_rapport", "Le donnée du matricule $key ont été modifié avec succées");
                if ($this->isAjax()){
                    $reponse = array(
                        'success'=> $_SESSION['Insertion_rapport'],
                        'matricule'=> $key
                    );
                    
                    echo json_encode($reponse);
                }else{    
                    redirect(base_url('user/data'), "refresh");
                }
            }else{
                if ($this->isAjax()){
                    $reponse = array(
                        'error'=>"Un problème lié au transfert de donné"
                    );
                    
                    echo json_encode($reponse);
                }else{    
                    redirect(base_url('user/data'), "Refresh");
                }
            }
        }

        public function modification(){
            if(!empty($_POST)){
                extract($_POST);
                $key = $_SESSION['agent']['MATRICULE'];
                $nom_ag = strip_tags($nom_ag);
                $prenom_ag = strip_tags($prenom_ag);
                $nomutil_ag = strip_tags($nomutil_ag);
                $mail_ag = strip_tags($mail_ag);
                $adresse_ag = strip_tags($adresse_ag);
                $tel_ag = strip_tags($tel_ag);


                $ori_filename = $_FILES['photo']['name'];
                
                if (!empty($ori_filename)){
                    $im = $key;
                    $new_name = $im.'_-_'.$ori_filename;
                    $repertoire = 'http://localhost/GPS/bootstrap/images/profil/'.$new_name;

                    if (file_exists($repertoire)){
                        unlink($repertoire);
                    }
                    $config = [
                        'upload_path' => './bootstrap/images/profil',
                        'allowed_types' => 'gif|jpg|png',
                        'max_size' => 10000,
                        'file_name' => $new_name
                    ];

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('photo'))
                    {
                            $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                            if($this->isAjax()){
                                $reponse = array(
                                    'error' => $image_error
                                );
                                echo json_encode($reponse);
                            }else{
                                redirect (base_url('user/data'));
                            }
                            // var_dump ($image_error['im_error']);
                    }
                    else
                    {
                        $photo = $this->upload->data('file_name');
                    }    
                }else{
                    $photo = $_SESSION['agent']['PHOTO'];
                }

                $update_value = array(
                        'NOM_AG' => $nom_ag,
                        'PRENOM_AG' => $prenom_ag,
                        'NOM_UTIL_AG' => $nomutil_ag,
                        'MAIL_AG' => $mail_ag,
                        'ADRESSE_AG' => $adresse_ag,
                        'TEL_AG' => $tel_ag,
                        'PHOTO' => $photo

                );
                $this->load->model('UserModel');
                $this->UserModel->updating_ag($key, $update_value);

                // remplacer le session..........
                // $this->session->unset_userdata('agent');
                unset($_SESSION['agent']);

                $query = $this->db->query("SELECT * FROM AGENT where MATRICULE = '$key' ");
                $this->session->agent = $query->row_array();
                // $this->session->set_userdata($data);


                $this->session->set_flashdata("Insertion_rapport", "Le donnée du matricule $key ont été modifié avec succées");
                if ($this->isAjax()){
                    $reponse = array(
                        'success'=> $_SESSION['Insertion_rapport'],
                        'matricule'=> $key
                    );
                    
                    echo json_encode($reponse);
                }else{    
                    redirect(base_url('user/data'), "refresh");
                }
            }else{
                if ($this->isAjax()){
                    $reponse = array(
                        'error'=>"Un problème lié au transfert de donné"
                    );
                    
                    echo json_encode($reponse);
                }else{    
                    redirect(base_url('user/data'), "Refresh");
                }
            }
        }
        public function im_control(){
            $matricule = strip_tags($_GET['im']);
            $this->load->model("UserModel");
            $ans = $this->UserModel->control_Im($matricule);
            if ($ans != '0'){
                $this->session->set_flashdata("Insertion_rapport", "Un compte est déjà enrigistré à ce matricule");
                // echo ($_SESSION['Insertion_rapport']);
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('user/data'));
                }
            }else{
                $this->session->set_flashdata("Insertion_rapport", "Autorisé");
                // echo ($_SESSION['Insertion_rapport']);
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('user/data'));
                }
            }
        }

        public function mail_control(){
            $mail = strip_tags($_GET['mail']);
            $this->load->model("UserModel");
            $ans = $this->UserModel->control_Mail($mail);
            if ($ans != '0'){
                $this->session->set_flashdata("Insertion_rapport", "Le mail est déja enregisré et utilisé");
                // echo ($_SESSION['Insertion_rapport']);
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('user/data'));
                }
            }else{
                $this->session->set_flashdata("Insertion_rapport", "Autorisé");
                // echo ($_SESSION['Insertion_rapport']);
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('user/data'));
                }
            }
        }


        public function insertion(){
            
            if(!empty($_POST)){
                extract($_POST);
                // $nomec = strip_tags($nomenclature);
                $matricule = strip_tags($matri);
                $porte = strip_tags($porte);
                $fonction = strip_tags($function);
                $fname = strip_tags($fistname);
                $uname = strip_tags($usename);
                $utype = strip_tags($type);
                $umail = strip_tags($mail);
                $sname = strip_tags($surname);
                $uadrs = strip_tags($address);
                $uphone = strip_tags($phone);
                // $upass = strip_tags($password);
                $ugender = strip_tags($gender);
                $division = strip_tags($division);
                
                // uploading.....
                    $ori_filename = $_FILES['photo']['name'];
                if (!empty($ori_filename)){
                    $im = $matricule;
                    $new_name = $im.'_-_'.$ori_filename;
                    $config = [
                        'upload_path' => './bootstrap/images/profil',
                        'allowed_types' => 'gif|jpg|png',
                        'max_size' => 1000,
                        'file_name' => $new_name
                    ];

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('photo'))
                    {
                            $image_error['im_error'] = array('imageError' => $this->upload->display_errors());
                            if($this->isAjax()){
                                $reponse = array(
                                    'error' => $image_error
                                );
                                echo json_encode($reponse);
                            }else{
                                redirect (base_url('user/data'));
                            }
                            // var_dump ($image_error['im_error']);
                    }
                    else
                    {
                        $photo = $this->upload->data('file_name');
                    }    
                }else{
                    $photo = null;
                }
                $getvalue = array(
                    'MATRICULE' => $matricule,
                    'FONCTION_AG' => $fonction,
                    'PORTE_AG' => $porte,
                    'MAIL_AG' => $umail,
                    'NOM_AG' => $fname,
                    'NOM_UTIL_AG' => $uname,
                    'TYPE_AG' => $type,
                    'PRENOM_AG' => $sname,
                    'ADRESSE_AG' => $uadrs,
                    'TEL_AG' => $uphone,
                    'PASSWORD' => '0000',
                    'PHOTO' => $photo,
                    'GENRE' => $ugender,
                    'ACTIVATION' => 'ACTIVATED',
                    'CODE_DIVISION' => $division
                );
                $matric = $matricule;
                
                // var_dump ($getvalue);
                $this->load->model('UserModel');
                $this->UserModel->add_data($getvalue);
                $this->session->set_flashdata("Insertion_rapport", "Un compte est enregistré réfèrant au matricule N° $matricule");
                if($this->isAjax()){
                    $reponsy = array(
                        'success'=>$_SESSION['Insertion_rapport'],
                        'user' => $matricule
                    );
                    
                    echo json_encode($reponsy);
                }else{
                    redirect (base_url('user/data'));
                }  
            }else{
                $this->session->set_flashdata("Insertion_rapport", "Une erreur persiste au transfert de donnée");
                // echo ($_SESSION['Insertion_rapport']);
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect (base_url('user/data'));
                }
            }
            
        }

        public function block_user(){
            if (!empty($_GET)){
                $loged_id = $_SESSION['agent']['MATRICULE'];

                $matricule = strip_tags($_GET['im']);

                if ( $matricule == $loged_id){
                    $this->session->set_flashdata("Insertion_rapport", "Echéc, Vous pouvez pas bloquer votre propre compte");
                    if($this->isAjax()){
                        $reponse = array(
                            'error' => $_SESSION['Insertion_rapport']
                        );
                        echo json_encode($reponse);
                    }else{
                        redirect(base_url('user/data'), "Refresh");
                    }
                }else{
                    $this->load->model('UserModel');
                    $this->UserModel->block_operation($matricule);
                    $this->session->set_flashdata("Insertion_rapport", "Le matricule N° $matricule est bloqué");
                    if($this->isAjax()){
                        $reponse = array(
                            'success' => $_SESSION['Insertion_rapport']
                        );
                        echo json_encode($reponse);
                    }else{
                        redirect(base_url('user/data'), "Refresh");
                    }
                }
            }else{
                $this->session->set_flashdata("Insertion_rapport", "Impossible de terminer le transfert de donnée");
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect(base_url('user/data'), "Refresh");
                }
            }
            
        }

        public function reboot_user(){
            if (!empty($_GET)){
                $loged_id = $_SESSION['agent']['MATRICULE'];

                $matricule = strip_tags($_GET['im']);

                if ( $matricule == $loged_id){
                    $this->session->set_flashdata("Insertion_rapport", "Echéc, Vous pouvez pas réinitialiser votre propre compte");
                    if($this->isAjax()){
                        $reponse = array(
                            'error' => $_SESSION['Insertion_rapport']
                        );
                        echo json_encode($reponse);
                    }else{
                        redirect(base_url('user/data'), "Refresh");
                    }
                }else{
                    $this->load->model('UserModel');
                    $this->UserModel->reboot_operation($matricule);
                    $this->session->set_flashdata("Insertion_rapport", "Le matricule N° $matricule est réinitialisé");
                    if($this->isAjax()){
                        $reponse = array(
                            'success' => $_SESSION['Insertion_rapport']
                        );
                        echo json_encode($reponse);
                    }else{
                        redirect(base_url('user/data'), "Refresh");
                    }
                }
            }else{
                $this->session->set_flashdata("Insertion_rapport", "Impossible de terminer le transfert de donnée");
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect(base_url('user/data'), "Refresh");
                }
            }
            
        }
        public function active_user(){
            if (!empty($_GET)){
                    
                $matricule = strip_tags($_GET['im']);
                $this->load->model('UserModel');
                $this->UserModel->active_operation($matricule);
                $this->session->set_flashdata("Insertion_rapport", "Le matricule $matricule est à nouveau activé");
                if($this->isAjax()){
                    $reponse = array(
                        'success' => $_SESSION['Insertion_rapport'],
                        'matricule' => $matricule
                    );
                    echo json_encode($reponse);
                }else{
                    redirect(base_url('user/data'), "Refresh");
                }
                        
            }else{
                $this->session->set_flashdata("Insertion_rapport", "Impossible de terminer le transfert de donnée");
                if($this->isAjax()){
                    $reponse = array(
                        'error' => $_SESSION['Insertion_rapport']
                    );
                    echo json_encode($reponse);
                }else{
                    redirect(base_url('user/data'), "Refresh");
                }
            }
        }
        public function getDivision(){
            if($_GET){
                $service = strip_tags( $_GET['service']);
                $query = $this->db->query("SELECT * FROM DIVISION where CODE_SER='$service'");
                $result =  $query->result_array();
                $data = array(
                    'success'=> true,
                    'division' => $result
                );
                echo json_encode($data);
            }
        }
        public function passControl(){
            if(!empty($_GET)){
                $ima = strip_tags($_GET['ima']);
                $oldpass = strip_tags($_GET['oldpass']);
                $this->load->model('UserModel');
                $res = $this->UserModel->checkPass($ima,$oldpass);
                if($res != 0){
                    if ($this->isAjax()){
                        $reponse = array(
                            'success' => TRUE
                        );
                        echo json_encode($reponse);
                    }
                }else{
                    if ($this->isAjax()){
                        $reponse = array(
                            'error' => TRUE,
                            'resu' => $_GET
                        );
                        echo json_encode($reponse);
                    }
                }
            }
        }

        public function changePass(){
            if(!empty($_GET)){
                $ima = strip_tags($_GET['ima']);
                $newpass = strip_tags($_GET['newpass']);
                $this->load->model('UserModel');
                $res = $this->UserModel->changePass($ima,$newpass);
                if($res= true){
                    if ($this->isAjax()){
                        $reponse = array(
                            'success' => TRUE
                        );
                        echo json_encode($reponse);
                    }
                }else{
                    if ($this->isAjax()){
                        $reponse = array(
                            'error' => TRUE,
                            'resu' => $_GET
                        );
                        echo json_encode($reponse);
                    }
                }
            }
        }
    }
?>