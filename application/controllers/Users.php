<?php
class Users extends CI_Controller
{
	// Register User
	public function register()
	{
		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('password2','Confirm Password','matches[password]');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			// die('continue');
			//Encrypt Password:	We can put it in user_model as well, it's own prefference
			$enc_password = md5($this->input->post('password'));

			//Set message
			$this->session->set_flashdata('user_registered','You are registered successfully!');

			$this->user_model->register($enc_password);
			redirect('posts');
		}
	}
	// Login User
	public function login()
	{
		$data['title'] = 'Sign In';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			// Login User
			// Get Username
			$username = $this->input->post('username');
			// Get and encrypt password
			$password = md5($this->input->post('password'));
			// Login User
			$user_id = $this->user_model->login($username, $password);

			if($user_id)	//if username and password has matched
			{
				// Create Session
				$user_data = array(
						'user_id' => $user_id,
						'username'=> $username,
						'logged_in'=> true 
				);
				// Now we can use $user_data, wherever we want to use
				$this->session->set_userdata($user_data);	
				// Set message
			$this->session->set_flashdata('user_loggedin','You are logged in!');
			redirect('posts');
			}
			else
			{
				// Set message
			$this->session->set_flashdata('login_failed','Login Invalid!');
			redirect('users/login');
			}
		}
	}
	// User Logout
	public function logout()
	{
		// Unset User data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		//Set message
		$this->session->set_flashdata('user_logged_out','You are logged out!');
		redirect('users/login');
	}
	// Check if username exists. 
	public function check_username_exists($username)
	{
			$this->form_validation->set_message('check_username_exists','This username is taken, please choose a different one');
			if($this->user_model->check_username_exists($username))
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	// Check if email exists. 
	public function check_email_exists($email)
	{
			$this->form_validation->set_message('check_email_exists','This email is taken, please choose a different one');
			if($this->user_model->check_email_exists($email))
			{
				return true;
			}
			else
			{
				return false;
			}
	}
}

?>