<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
        $this->load->model("user_model");
		$data['users'] = $this->user_model->index();
		$data['title'] = "User - CodeIgniter 3 - Crud";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/users', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		
	}
}
