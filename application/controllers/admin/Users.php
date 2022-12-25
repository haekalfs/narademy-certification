<?php

class Users extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('user_model');
		$this->load->model('auth_model');
		$data['current_user'] = $this->auth_model->current_user();
		if($data['current_user']->role !== '1104'){
			redirect('home');
		}
	}

	public function index()
    {
		$data['current_user'] = $this->auth_model->current_user();
            
        $data['users'] = $this->user_model->list();
		$this->load->view('admin/users.php', $data);
    }

	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->user_model->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'User was deleted');
			redirect('admin/users');
		}
	}
}