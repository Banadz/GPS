<?php
class ModelInsertion extends CI_Model{
    public function insertNomencl($query){
        $this->db->query($query);
    }
    public function insertCmpt($query){
        $this->db->query($query);
    }
    public function insertCat($query){
        $this->db->query($query);
    }
    public function insertSer($query){
        $this->db->query($query);
    }
    public function insertDivision($query){
        $this->db->query($query);
    }
    public function insertOrigineliste($query){
        $this->db->query($query);
    }
    public function insertAsset($materielsdata){
        $this->db->insert('MATERIELS',$materielsdata);
    }
    public function insertAssets($query){
        $this->db->query($query);
    }
    public function insertOrigine($query){
        $this->db->query($query);
    }

    public function insertOrg($query){
        $this->db->query($query);
    }

    public function insertmate($query){
        $this->db->query($query);
    }

    public function insertsort($query){
        $this->db->query($query);
    }
}
?>