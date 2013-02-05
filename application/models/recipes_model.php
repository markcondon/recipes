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
}