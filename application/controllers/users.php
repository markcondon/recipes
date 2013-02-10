<?php

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('recipes_model');
	}

	public function signup($data = NULL){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('templates/head');

		$this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[15]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		

		$validate = $this->form_validation->run();
		
		if($validate == 1){
			$this->users_model->set_user();
			$this->load->helper('url'); 

			$userID = $this->users_model->get_user('username', $this->session->userdata['username']);
			$this->session->set_userdata('user_id', $userID[0]['user_id']);

			redirect('/users/dashboard', 'refresh');
			
		}else if ($validate === FALSE)
		{
			$this->load->view('users/signup');
		}
	}

	public function login($data = NULL){
		echo "login";
	}

	public function dashboard($data = NULL){
		
		if($this->session->userdata('logged_in') == true){
			
			//preceed as normal

			echo $this->session->userdata('username').'\'s Recipes <br />';
			$recipes['foo'] = $this->recipes_model->get_recipes('user_id', $this->session->userdata('user_id')); 
			
			print_r($recipes['foo']);

		}else{ 
			$this->load->helper('url'); 
			redirect('/', 'refresh');	
		}
	}

	public function logout($data = NULL){
		echo "logout";
	}
}