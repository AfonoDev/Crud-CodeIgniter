<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		permissionEx();
		$this->load->model("games_model");
		$this->load->model("user_model");

	}

	public function index()
	{
		$this->load->model("games_model");
		$data['games'] = $this->games_model->dashboard_index();
		$data["users"] = $this->user_model->dashboard_index();
		$data['title'] = "Dashboard - CodeIgniter 3 - Crud";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		
	}
	
	public function pesquisar()
	{
		$this->load->model("buscar_model");
		$data['title'] = "Resultado da pesquisa por *".$_POST['busca']."*";
		$data['result'] = $this->buscar_model->buscar($_POST);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/resultado', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		
	}
}
