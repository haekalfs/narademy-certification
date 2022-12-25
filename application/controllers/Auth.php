<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->session->keep_flashdata('message');
	}

	public function index()
	{
		show_404();
	}

	public function register_user()
	{
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login_form');
		}

		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($this->auth_model->register($name,$username,$email,$password)){
			$this->session->set_flashdata('message', 'Successfully Register, Please continue to login...');
			redirect('auth/login');
		} else {
			$this->session->set_flashdata('message', 'Unknown Error, Failed to register!');
		}
	}

	public function login()
	{
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login_form');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->auth_model->login($username, $password)){
			redirect('admin');
		} elseif ($this->auth_model->login_user($username, $password)) {
			redirect('home');
		} else {
			$this->session->set_flashdata('message', 'Unknown Bad Request, Please try again...');
		}
		$data['floc'] = [
			'title' => "Login or Register",
		  ];
		$this->load->view('login_form', $data);
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}
}