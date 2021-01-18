<?php

class Games_model extends CI_Model {
    //METODO DE EXIBIR NA TELA OS DADOS DO BANCO 
    public function index(){
        return $this->db->get('tb_games')->result_array();
    }
    //METODO QUE DA SELECT NO BANCO TRAZENDO OS 5 ULTIMOS DADOS E EXIBINDO NA TELA, PARA O TELA DESHBOARD
    public function dashboard_index()
    {
        $this->db->order_by("id", "DESC");
        $this->db->limit(5);
        return $this->db->get("tb_games")->result_array();
    }
    //METODO DE INSERIRI DADOS NO BANCO 
    public function store($game){
        $this->db->insert('tb_games',$game);
    }
    //METODO PEGANDO O ID DO CARA PARA MOSTRAR NA HORA DE EDITAR EXEMPLO NA URL /GAMES/EDIT/ID OU 1
    public function show($id){
        return $this->db->get_where('tb_games',array(
            "id" => $id
        ))->row_array();
    }
    //METODO FAZENDO UM WHERE NO BANCO COM O ID DO JOGO E FAZENDO UPDATE DE DADOS
    public function update($id, $game){
        $this->db->where('id', $id);
        return $this->db->update('tb_games',$game);
    }
    //METODO PARA DELETAR UM DADO USANDO O WHERE PARA PEGAR O ID DO JOGO
    public function destroy($id){
        $this->db->where('id', $id);
        return $this->db->delete('tb_games');
    }
    public function mygames_index(){
        
        $this->db->where("user_id", $_SESSION["logged_user"]["id"]);
        $this->db->order_by("id", "DESC");
        return $this->db->get("tb_games")->result_array();
    }
}