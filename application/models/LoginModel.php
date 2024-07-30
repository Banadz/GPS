<?php
    class LoginModel extends CI_Model{

        public function create_admin(){
            // verification......
            $this->db->select('CODE_SER');
            $this->db->from('SERVICE');
            $this->db->where('CODE_SER','ADMIN');
            $query_veri = $this->db->get();
            $result = $query_veri->result_array();

            $this->db->select('CODE_DIVISION');
            $this->db->from('DIVISION');
            $this->db->where('CODE_DIVISION','AUTEUR');
            $query_veri2 = $this->db->get();
            $result2 = $query_veri2->result_array();

            $this->db->select('MATRICULE');
            $this->db->from('AGENT');
            $this->db->where('MATRICULE','000001');
            $query_veri3 = $this->db->get();
            $result3 = $query_veri3->result_array();

            if ( !isset ($result['0']['CODE_SER'])) {

                $this->db->query("INSERT INTO SERVICE (CODE_SER, LIBELLE, ENTETE1, ENTETE2, ENTETE3, ENTETE4, ENTETE5, SIGLE, VILLE, ADRESSE, CONTACT) VALUES ('ADMIN', 
                'LES ADMINISTRATEURS PRINCIPALS', '' , '' , '' , '', '','ADMIN/ADMIN', 'Fianarantsoa','Fianarantsoa','+261 34 38 079 86')");

                $this->db->query("INSERT INTO DIVISION (CODE_DIVISION, CODE_SER, LABEL_DIVISION) VALUES ('AUTEUR', 'ADMIN', 
                'ADMINISTRATEUR')");
                
                $najoro = array(
                    'MATRICULE' => '000001',
                    'FONCTION_AG' => 'Développeur',
                    'MAIL_AG' => 'xandrianajorobanadz@gmail.com',
                    'NOM_AG' => 'NOMENJANAHARY',
                    'NOM_UTIL_AG' => 'Andrianajoro',
                    'TYPE_AG' => 'Admin Principal',
                    'PRENOM_AG' => 'Pierre Andrianajoro',
                    'ADRESSE_AG' => 'Fianarantsoa',
                    'TEL_AG' => '+261 34 38 079 86',
                    'PASSWORD' => 'Xbanadz',
                    'PHOTO' => '000001_-_sanganasa.png',
                    'GENRE' => 'M',
                    'ACTIVATION' => 'ACTIVATED',
                    'CODE_DIVISION' => 'AUTEUR'
                );
                
                $nasandratra = array(
                    'MATRICULE' => '000002',
                'FONCTION_AG' => 'Développeur',
                'MAIL_AG' => 'nasandratraniavo06@gmail.com',
                'NOM_AG' => 'NASANDRATRINIAVO',
                'PRENOM_AG' => 'Andriambololoniaina',
                'ADRESSE_AG' => 'Lot 0307/530 Soanierana Fianarantsoa',
                'NOM_UTIL_AG' => 'Nasandratra',
                'TEL_AG' => '+261 34 53 520 40',
                'PASSWORD' => 'NASA2112',
                'TYPE_AG' => 'Admin Principal',
                'PHOTO' => '000002_-_nasa.jpg',
                'GENRE' => 'M',
                'ACTIVATION' => 'ACTIVATED',
                'CODE_DIVISION' => 'AUTEUR'
                );
                $this->db->insert('AGENT', $najoro);
                
                $this->db->insert('AGENT', $nasandratra);
            }else{
                if( !isset ($result2['0']['CODE_DIVISION']) ){
                    $this->db->query("INSERT INTO DIVISION (CODE_DIVISION, CODE_SER, LABEL_DIVISION) VALUES ('AUTEUR', 'ADMIN', 
                    'ADMINISTRATEUR')");
                    
                    $najoro = array(
                        'MATRICULE' => '000001',
                        'FONCTION_AG' => 'Développeur',
                        'MAIL_AG' => 'xandrianajorobanadz@gmail.com',
                        'NOM_AG' => 'NOMENJANAHARY',
                        'NOM_UTIL_AG' => 'Andrianajoro',
                        'TYPE_AG' => 'Admin Principal',
                        'PRENOM_AG' => 'Pierre Andrianajoro',
                        'ADRESSE_AG' => 'Fianarantsoa',
                        'TEL_AG' => '+261 34 38 079 86',
                        'PASSWORD' => 'Xbanadz',
                        'PHOTO' => '000001_-_sanganasa.png',
                        'GENRE' => 'M',
                        'ACTIVATION' => 'ACTIVATED',
                        'CODE_DIVISION' => 'AUTEUR'
                    );
                    
                    $nasandratra = array(
                        'MATRICULE' => '000002',
                    'FONCTION_AG' => 'Développeur',
                    'MAIL_AG' => 'nasandratraniavo06@gmail.com',
                    'NOM_AG' => 'NASANDRATRINIAVO',
                    'PRENOM_AG' => 'Andriambololoniaina',
                    'ADRESSE_AG' => 'Lot 0307/530 Soanierana Fianarantsoa',
                    'NOM_UTIL_AG' => 'Nasandratra',
                    'TEL_AG' => '+261 34 53 520 40',
                    'PASSWORD' => 'NASA2112',
                    'TYPE_AG' => 'Admin Principal',
                    'PHOTO' => '000002_-_nasa.jpg',
                    'GENRE' => 'M',
                    'ACTIVATION' => 'ACTIVATED',
                    'CODE_DIVISION' => 'AUTEUR'
                    );
                    $this->db->insert('AGENT', $najoro);
                    
                    $this->db->insert('AGENT', $nasandratra);                  
                }else{
                    if ( !isset ($result3['0']['MATRICULE'])){
                        $najoro = array(
                            'MATRICULE' => '000001',
                            'FONCTION_AG' => 'Développeur',
                            'MAIL_AG' => 'xandrianajorobanadz@gmail.com',
                            'NOM_AG' => 'NOMENJANAHARY',
                            'NOM_UTIL_AG' => 'Andrianajoro',
                            'TYPE_AG' => 'Admin Principal',
                            'PRENOM_AG' => 'Pierre Andrianajoro',
                            'ADRESSE_AG' => 'Fianarantsoa',
                            'TEL_AG' => '+261 34 38 079 86',
                            'PASSWORD' => 'Xbanadz',
                            'PHOTO' => '',
                            'GENRE' => 'M',
                            'ACTIVATION' => 'ACTIVATED',
                            'CODE_DIVISION' => 'AUTEUR'
                        );
                        
                        $nasandratra = array(
                            'MATRICULE' => '000002',
                        'FONCTION_AG' => 'Développeur',
                        'MAIL_AG' => 'nasandratraniavo06@gmail.com',
                        'NOM_AG' => 'NASANDRATRINIAVO',
                        'PRENOM_AG' => 'Andriambololoniaina',
                        'ADRESSE_AG' => 'Lot 0307/530 Soanierana Fianarantsoa',
                        'NOM_UTIL_AG' => 'Nasandratra',
                        'TEL_AG' => '+261 34 53 520 40',
                        'PASSWORD' => 'NASA2112',
                        'TYPE_AG' => 'Admin Principal',
                        'PHOTO' => '',
                        'GENRE' => 'M',
                        'ACTIVATION' => 'ACTIVATED',
                        'CODE_DIVISION' => 'AUTEUR'
                        );
                        $this->db->insert('AGENT', $najoro);
                        
                        $this->db->insert('AGENT', $nasandratra);
                    }
                }
            }
        }

    } 
?>