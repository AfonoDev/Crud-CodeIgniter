<?php
    class Buscar_model extends CI_Model{
        public function buscar($buscar){
            if(empty($buscar)){
                return array();
            }

            $buscar = $_POST['busca'];
            $this->db->like('name',$buscar);
            return $this->db->get('tb_games')->result_array();
        }
    }