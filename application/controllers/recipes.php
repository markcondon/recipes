<?php

class Recipes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('recipes_model');
	}

	public function index(){
		$data['recipe_item'] = $this->recipes_model->get_recipes();
		print_r($data['recipe_item']);
	}

	public function name($recipeName = FALSE){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->view('templates/head');
		
		$data['recipe_item'] = $this->recipes_model->get_recipes('name', $recipeName);

		$data['comments'] = $this->recipes_model->get_comments($data['recipe_item'][0]['recipe_id']);
		
		$this->form_validation->set_rules('rating', 'Rating', 'required');
		$this->form_validation->set_rules('comment', 'Comment', 'required');

		
		if ($this->form_validation->run() === FALSE)
		{

			$this->load->view('recipes/name', $data);

			
		}
		else
		{
			$name = $this->recipes_model->set_comment();
			$this->load->view('', $data);
 
		}
		
	}

	public function sort($sortBy = FALSE, $sortName = False){
		
		$data['recipe_item'] = $this->recipes_model->get_recipes($sortBy, $sortName);
		$this->load->view('recipes/sort', $data);
	}

	public function create()
	{

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('templates/head');

		$this->form_validation->set_rules('name', 'Recipe Name', 'required|is_unique[recipes.name]');
		$this->form_validation->set_rules('ingredients', 'Recipe Ingredients ', 'required');
		$this->form_validation->set_rules('steps', 'Recipe Steps',  'required');
		$this->form_validation->set_rules('user_id', 'User', 'required');
		$this->form_validation->set_rules('category', 'Recipe Category', 'required');
		$this->form_validation->set_rules('prep', 'Prep Time', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{

			//$this->load->view('templates/recipe_failure');
			$this->load->view('recipes/create');

			
		}
		else
		{
			$this->recipes_model->set_recipe();
			
			//$this->load->view('templates/recipe_add_success');
			$this->load->view('recipes/create');
		}
	}
}