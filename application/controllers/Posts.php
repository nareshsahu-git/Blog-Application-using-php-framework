 <?php
class Posts extends CI_Controller
{
	public function index()
	{		
		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->post_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}
	public function view($slug = NULL)
	{
		$data['post'] = $this->post_model->get_posts($slug);
		//Grab the dcomments data for showing the comments in view
		$post_id = $data['post']['id'];
		$data['comments'] = $this->comment_model->get_comments($post_id);

		if(empty($data['post']))
		{
			show_404();
		}
		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		// Check User Logged in or not, they should not be get access of any page
		// Check login
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}

		$data['title'] = 'Create Post';
		$data['catogaries'] = $this->post_model->get_catogaries();	//Get categories from database

		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('body','Body','trim|required');

		if($this->form_validation->run() === FALSE)	//If it doesn't run
		{
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{	//If it does run
			//Upload Image
			$config['upload_path'] 		= './assets/images/posts';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '2000';
			$config['max_height'] 		= '2000';
			
			$this->load->library('upload', $config);
		
			if (!$this->upload->do_upload('userfile')) //If file not uploaded
			{
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
  			}
			else
			{	//If file uploaded
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}
			$this->post_model->create_post($post_image);
			// Set Flashdata post created 
			//Set message
			$this->session->set_flashdata('post_created','Your post has been created successfully! Now login.');
			redirect('posts');						//Redirect it blog page(posts/index) on the top.
		}
	}
	public function delete($id)
	{
		// Check login
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$this->post_model->delete_post($id);
		//Set message
		$this->session->set_flashdata('post_deleted','Your post has been deleted successfully!');
		redirect('posts');						//Redirect it blog page(posts/index) on the top.
	}
	public function edit($slug)
	{
		// Check login
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$data['post'] = $this->post_model->get_posts($slug);
		// Check user before edit
		if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id'])
		{
			redirect('posts');
		}
		$data['catogaries'] = $this->post_model->get_catogaries();
		if(empty($data['post']))
		{
			show_404();
		}
		$data['title'] = 'Edit Post';


		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		// Check login
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$this->post_model->update_post();
		//Set message
		$this->session->set_flashdata('post_updated','Your post has been updated successfully!');
		redirect('posts');
	}
}

?>