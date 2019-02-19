<?php 

class Catogaries extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Catogaries';
		$data['catogaries'] = $this->catogary_model->get_catogaries();

		$this->load->view('templates/header');
		$this->load->view('catogaries/index', $data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		// Check login
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$data['title'] = 'Create Catogary';

		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('catogaries/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->catogary_model->create_catogary();
			//Set message: session
			$this->session->set_flashdata('catogary_created','Your Catogary created successfully!');
			redirect('catogaries/index');
		}
	}
	public function posts($id)
	{	//This is another one, for showing by catogaries post.
		$data['title'] = $this->catogary_model->get_catogary($id)->name; 
		
		$data['posts'] = $this->post_model->get_post_by_catogary($id);
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
	}
	public function delete($id)
	{
		// Check login
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$this->catogary_model->delete_catogary($id);
		//Set message
		$this->session->set_flashdata('catogary_deleted','Your catogary has been deleted successfully!');
		redirect('catogaries');						//Redirect it blog page(posts/index) on the top.
	}
}


 ?>