<?php
class recipes_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_recipes($sort = FALSE, $slug = FALSE)
	{
		if ($sort === FALSE)
		{
			$query = $this->db->get('recipes');
			return $query->result_array();
		}
		if(is_array($slug)){
			$slug = $slug['name'];
		}
		$slug = urldecode($slug);
		$query = $this->db->get_where('recipes', array($sort => $slug));
		return $query->result_array();
	}

	public function set_recipe()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'ingredients' => $this->input->post('ingredients'),
			'steps' => $this->input->post('steps'),
			'user_id' => $this->input->post('user_id'),
			'category' => $this->input->post('category'),
			'prepTime' => $this->input->post('prep')
		);

		$data['steps'] = "\n".$data['steps'];
		$data['ingredients'] = "\n".$data['ingredients'];
		
		return $this->db->insert('recipes', $data);
	}
	public function set_comment(){
		$data = array(
			'rating' => $this->input->post('rating'),
			'review' => $this->input->post('comment'),
			'user_id' => $this->input->post('user_id'),
			'recipe_id' => $this->input->post('recipe_id')
		);
		$name = $this->input->post('name');
		
		$this->db->insert('review', $data);
		
		return $data = array('name' => $name);
		//return $this->db->insert('review', $data);
	}

	public function get_comments($recipe_id){
		
		$this->db->select('*');
		$this->db->from('review');
		$this->db->where('recipe_id', $recipe_id); 
		$this->db->join('users', 'users.user_id = review.user_id');

		$query = $this->db->get();

		return $query->result_array();
	}
}