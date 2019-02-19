<?php
class Catogary_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function create_catogary()
	{
		$data = array(
					'name' => $this->input->post('name'),
					'user_id' => $this->session->userdata('user_id')	// add user id if they are logged in 
		);
		return $this->db->insert('catogaries',$data);
	}
	public function get_catogaries()
	{
		$this->db->order_by('name','ASC');
		$query = $this->db->get('catogaries');
		return $query->result_array();
	}
	public function get_catogary($id)
	{
		$query = $this->db->get_where('catogaries', array('id'=>$id));
		return $query->row();
	}
	public function delete_catogary($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('catogaries');
		return true;
	}
}

?>