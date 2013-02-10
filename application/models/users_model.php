<?php
class users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function set_user()
	{
		
		$data = array(
			'username' => $this->input->post('username'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$newdata = array(
	       	'username'  => $data['username'],
	       	'email'     => $data['email'],
	       	'logged_in' => TRUE
       	);

		$this->session->set_userdata($newdata);
		return $this->db->insert('users', $data);

	}
	public function get_user($sort = FALSE, $slug = FALSE){
		//this is the multipurpose tool. Used to get any information needed about a user
		// $sort is used to specify the where parameter, $slug is used to specify what it's searching for. By default we're just looking for all we've got

		if ($sort === FALSE)
		{
			$query = $this->db->get('users');
			return $query->result_array();
		}else{

			$slug = urldecode($slug);

			$query = $this->db->get_where('users', array($sort => $slug));
			
			return $query->result_array();
		}
	}
}