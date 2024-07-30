<?php
    class ModelSuppression extends CI_Model
    {
        public function supprimercat($idcat){
            return $this->db->delete('CATEGORIE',['ID_CAT' => $idcat]);
        }
        public function supprimerdiv($codediv){
            return $this->db->delete('DIVISION',['CODE_DIVISION' => $codediv]);
        }
        public function supprimerser($codeser){
            return $this->db->delete('SERVICE',['CODE_ser' => $codeser]);
        }
    }
?>