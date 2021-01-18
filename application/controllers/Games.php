<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function __construct(){
		parent::__construct();
		permissionEx();
		$this->load->model("games_model");

	}
	//FUNÇÃO PARA CRIAR A PAGINA ADICIONANDO HEADER FOOTER NAV POR COMPONENTES
	public function index()
	{
		$data['games'] = $this->games_model->index();
		$data['title'] = "Games - CodeIgniter 3 - Crud";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	//FUNCÃO SO PARA CRIAR O FORMULARIO
	public function new(){
		$data['title'] = "Games - CodeIgniter 3 - Crud";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
	//FUNÇÃO PARA INSERIR NO BANCO DE DADOS UM NOVO GAME
	public function store(){
		$game = $_POST;
		$game['user_id'] = '1';
		$this->load->model('games_model');
		$this->games_model->store($game);
		redirect('dashboard');
	}
	//FUNÇÃO PARA criar a pagina que vai receber os dados do banco no edit
	public function edit($id){
		$data['game'] = $this->games_model->show($id);
		$data['title'] = "Editar Game - CodeIgniter 3 - Crud";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
	//FUNÇÃO DE FAZER O UPDATE NO BANCO DE DADOS
	public function update($id){
		$this->load->model('games_model');
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect('games');

	}
	//FUNÇÃO PARA DELETAR UM ITEM NO BANCO 
	public function delete($id){
		$this->load->model('games_model');
		$this->games_model->destroy($id);
		redirect('games');
	}

	public function mygames(){
		
		$data['games'] = $this->games_model->mygames_index();
		$data['title'] = "My Games - CodeIgniter 3 - Crud";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/mygames', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
