<?php
    class ModelSelection extends CI_Model
    {
        public function selectdetail($matricule)
        {
            $result = $this->db->get_where('MATERIEL', ['MATRICULE' => $matricule]);
            return $result->result_array();
        }
        public function affichassets($refmat)
        {
            $result = $this->db->get_where('MATERIEL', ['REF_MAT' => $refmat]);
            return $result->row();
        }
        public function selectCat($idcat)
        {
            $result = $this->db->query("SELECT * FROM CATEGORIE WHERE ID_CAT = '$idcat'");
            return $result->row_array();
        }
        public function selectallNom($idnom)
        {
            $result = $this->db->query("SELECT * FROM NOMENCLATURE WHERE ID_NOM = '$idnom'");
            return $result->row_array();
        }
        public function selectNomCompte($idcat)
        {
            $compte = $this->db->query("SELECT COMPTE.NUM_CMPT,COMPTE.DESIGNATION_CMPT FROM COMPTE,CATEGORIE WHERE CATEGORIE.ID_CAT = '$idcat' AND CATEGORIE.NUM_CMPT = COMPTE.NUM_CMPT AND CATEGORIE.ID_CAT = '$idcat'");
            return $compte->row_array();
            // var_dump($valiny);
        }
        
        public function selectCmpt($numcmpt)
        {
            $compte = $this->db->query("SELECT * FROM COMPTE WHERE NUM_CMPT = '$numcmpt'");
            return $compte->row_array();
        }
        public function selectDiv($codediv)
        {
            $division = $this->db->query("SELECT * FROM DIVISION WHERE CODE_DIVISION = '$codediv'");
            return $division->row_array();
        }
        public function selectSer($codeser)
        {
            $service = $this->db->query("SELECT * FROM SERVICE WHERE CODE_SER = '$codeser'");
            return $service->row_array();
        }
        public function selectunmateriel($query)
        {
            $materiel = $this->db->query($query);
            return $materiel->result_array();
        }

        public function selectdivparser($query)
        {
            $result = $this->db->query($query);
            return $result->result();
        }

        public function selectorigparser($query)
        {
            $result = $this->db->query($query);
            return $result->result();
        }

        public function selectentres($query)
        {
            $result = $this->db->query($query);
            return $result->result();
        }

        public function selectutiles($query)
        {
            $result = $this->db->query($query);
            return $result->result();
        }
        public function selectbyrefmat($query)
        {
            $result = $this->db->query($query);
            return $result->result();
        }
    }
?>