<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class LoginController extends CI_Controller {

        public function comeLogin()
        {
            $this->load->model('LoginModel');
            $this->LoginModel->create_admin();
            
            $this->load->view('page/login_page');
        }
        public function login(){
               
            $username = $_POST['nomutil'];
            $password = $_POST['password'];


            $query = $this->db->query("SELECT * FROM AGENT where NOM_UTIL_AG = '$username'");

            $user = $query->row();
            if ($user){
                $query = $this->db->query("SELECT * FROM AGENT where NOM_UTIL_AG = '$username' and PASSWORD = '$password'");
                $users = $query->row();

                if($users){
                    $log = $query->row_array();
                    if($log['ACTIVATION'] != 'ACTIVATED'){
                        $this->session->set_flashdata("error", "Votre compte est bloqué ☹");
                        redirect(base_url('Login'), "refresh");
                    }else{
                        $users = $query->result_array();
                        $code_div = $users['0']['CODE_DIVISION'];

                        $this->session->agent = $query->row_array();

                        $query_div = $this->db->query("SELECT * FROM DIVISION where CODE_DIVISION = '$code_div'");
                        $division = $this->session->agent_div = $query_div->result_array();

                        $code_ser = $division['0']['CODE_SER'];

                        $query_ser = $this->db->query("SELECT * FROM SERVICE where CODE_SER = '$code_ser'");
                        $this->session->agent_ser = $query_ser->result_array();
                        // if ($users['0']['TYPE_AG'] !== "")
                        redirect(base_url('Home'), "refresh");
                    }
                }else{
                    $this->session->set_flashdata("wrong", "Le mot de passe est incorrect☹");
                    redirect(base_url('Login?utilisateur='.$username), "refresh");    
                }
            
            }else{
                $this->session->set_flashdata("error", "Aucun compte correspondant trouvé☹");
                redirect(base_url('Login'), "refresh");
            }
            
        }
    }
?>