<?php
    class HomeModel extends CI_Model{
        
// verifing agent type....
        public function get_type($agent_im){

            $query = $this->db->query("SELECT TYPE_AG FROM AGENT where MATRICULE = '$agent_im'");
            $type =  $query->result_array();

            if($type[0]['TYPE_AG'] != 'USER'){

                // dem total
                $som = $this->db->count_all('DEMANDE');

                // en attente
                $this->db->like('ETAT_DEMANDE', 'En attente');
                $this->db->from('DEMANDE');
                $wai = $this->db->count_all_results();

                // valide

                $this->db->like('ETAT_DEMANDE', 'Validé');
                $this->db->from('DEMANDE');
                $val = $this->db->count_all_results();

                // denied

                $this->db->like('ETAT_DEMANDE', 'Refusé');
                $this->db->from('DEMANDE');
                $den = $this->db->count_all_results();

                $brief = array(
                    'SOM' => $som,
                    'WAI' => $wai,
                    'VAL' => $val,
                    'DEN' => $den
                );

                return $brief;

            }else{

                // total demand sent
                $this->db->like('MATRICULE', $agent_im);
                $this->db->from('DEMANDE');
                $som = $this->db->count_all_results();

                // en attente
                $this->db->where('ETAT_DEMANDE', 'En attente');
                $this->db->where('MATRICULE', $agent_im);
                $this->db->from('DEMANDE');
                $wai = $this->db->count_all_results();

                // valide

                $this->db->like('ETAT_DEMANDE', 'Validé');
                $this->db->like('MATRICULE', $agent_im);
                $this->db->from('DEMANDE');
                $val = $this->db->count_all_results();

                // denied

                $this->db->like('ETAT_DEMANDE', 'Refusé');
                $this->db->like('MATRICULE', $agent_im);
                $this->db->from('DEMANDE');
                $den = $this->db->count_all_results();
                $brief = array(
                    'SOM' => $som,
                    'WAI' => $wai,
                    'VAL' => $val,
                    'DEN' => $den
                );

                return $brief;
            }

        }

        
    }