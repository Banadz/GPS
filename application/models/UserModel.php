<?php
    class UserModel extends CI_Model{

        public function dataAgent(){
            $type_ag = $_SESSION['agent']['TYPE_AG'];

            if ($type_ag == 'Admin'){
                $ser_ag = $_SESSION['agent_ser']['0']['CODE_SER'];
                $query = $this->db->query("SELECT AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG, AGENT.MAIL_AG,
                                            AGENT.TEL_AG, AGENT.ACTIVATION,DIVISION.LABEL_DIVISION, SERVICE.LIBELLE FROM AGENT, DIVISION, SERVICE
                                        WHERE (DIVISION.CODE_SER = SERVICE.CODE_SER) AND (AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION) 
                                        AND (SERVICE.CODE_SER = '$ser_ag') AND (AGENT.TYPE_AG='USER')");
            }else{
                $query = $this->db->query("SELECT AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG, AGENT.MAIL_AG,
                                         AGENT.TEL_AG, AGENT.ACTIVATION ,DIVISION.LABEL_DIVISION, SERVICE.LIBELLE FROM AGENT, DIVISION, SERVICE
                                        WHERE DIVISION.CODE_SER = SERVICE.CODE_SER AND AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION");
            
            }
            return $query->result_array();
        }

        public function getAgentby_matricule($matricule){

            $query = $this->db->query("SELECT AGENT.MATRICULE, AGENT.NOM_AG, AGENT.PRENOM_AG, AGENT.FONCTION_AG, AGENT.MAIL_AG,
                                         AGENT.TEL_AG, AGENT.ACTIVATION ,AGENT.ADRESSE_AG,AGENT.PHOTO, AGENT.NOM_UTIL_AG, AGENT.TYPE_AG,DIVISION.CODE_DIVISION,
                                         DIVISION.LABEL_DIVISION, SERVICE.CODE_SER,SERVICE.LIBELLE FROM AGENT, DIVISION, SERVICE
                                        WHERE DIVISION.CODE_SER = SERVICE.CODE_SER AND AGENT.CODE_DIVISION = DIVISION.CODE_DIVISION AND AGENT.MATRICULE = '$matricule'");
            return $query->result_array();

        }
        public function allService(){
            // $ser_ag = $_SESSION['agent_ser']['0'][''];
            $query = $this->db->query("SELECT * FROM SERVICE");
            return $query->result_array();
        }
        public function add_data($data){
            $this->db->insert('AGENT', $data);
        }

        public function control_Im($matri){
            $query = $this->db->query("SELECT COUNT(NOM_AG) as EFFECT FROM AGENT where MATRICULE = '$matri'");
            $count = $query->result_array();
            
            return $count[0]['EFFECT'];
        }
        public function control_Mail($mail){
            $query = $this->db->query("SELECT COUNT(MAIL_AG) as EFFECT FROM AGENT where MAIL_AG = '$mail'");
            $count = $query->result_array();
            
            return $count[0]['EFFECT'];
        }

        public function updating_ag($key, $update_value){
            
            $this->db->where('MATRICULE',$key);
            $this->db->update('AGENT', $update_value);
        }

        public function block_operation($matricule){
            $this->db->set('ACTIVATION', 'DESACTIVED');
            $this->db->where('MATRICULE',$matricule);
            $this->db->update('AGENT');
        }
        public function reboot_operation($matricule){
            $this->db->set('PASSWORD', '0000');
            $this->db->where('MATRICULE',$matricule);
            $this->db->update('AGENT');
        }

        public function active_operation($matricule){
            $this->db->set('ACTIVATION', 'ACTIVATED');
            $this->db->where('MATRICULE',$matricule);
            $this->db->update('AGENT');
        }
        public function checkPass($ima,$oldpass){
            $query = $this->db->query("SELECT COUNT(MATRICULE) as EFFECT FROM AGENT where MATRICULE = '$ima' AND PASSWORD='$oldpass'");
            $count = $query->result_array();
            return $count[0]['EFFECT'];
        }

        public function changePass($ima,$pass){
            $this->db->set('PASSWORD',$pass);
            $this->db->where('MATRICULE',$ima);
            $this->db->update('AGENT');
            return true;
        }
    }
?>