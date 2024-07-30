<?php
    class ModelModification extends CI_Model
    {
        public function editAssets_code($query){
            $this->db->query($query);
        }
        public function modifiercat($query){
            $this->db->query($query);
        }
        public function modifierdiv($query){
            $this->db->query($query);
        }
        public function Categorymodif($data, $idcat)
        {
            return $this->db->update('CATEGORIE', $data, ['ID_CAT' => $idcat]);
        }
        public function Comptemodif($data, $numcmpt)
        {
            return $this->db->update('COMPTE', $data, ['NUM_CMPT' => $numcmpt]);
        }
        public function Nomenclaturemodif($query)
        {
            $this->db->query($query);
        }
        public function Divisionmodif($query)
        {
            $this->db->query($query);
        }
        public function Servicemodif($query)
        {
            $this->db->query($query);
        }
        public function modifiermateriel($query)
        {
            $this->db->query($query);
        }
        public function modifsortie($query)
        {
            $this->db->query($query);
        }
    }
?>