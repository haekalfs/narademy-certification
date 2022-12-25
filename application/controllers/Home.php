<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('feedback_model');
        $this->load->model('course_model');
        $this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
    }
    
    public function index()
    {
      $this->load->library('pagination');
    
      $config['base_url'] = site_url('/course');
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->course_model->get_published_count();
      $config['per_page'] = 9;
    
      $config['full_tag_open'] = '<div class="pagination justify-content-center">';
      $config['full_tag_close'] = '</div>';
  
      $this->pagination->initialize($config);
      $limit = $config['per_page'];
      $offset = html_escape($this->input->get('per_page'));
    
      $data['current_user'] = $this->auth_model->current_user();
      $data['courses'] = $this->course_model->get_published($limit, $offset);
      $data['floc'] = [
        'title' => "Browse All Courses",
      ];
      if(count($data['courses']) > 0){
            $this->load->view('home', $data);
        } else {
        ///
        }
    }

    public function contact()
    {
    $data['meta'] = [
        'title' => 'Contact Us',
    ];
    $this->load->library('form_validation');

    if ($this->input->method() === 'post') {
        $this->load->model('feedback_model');

        $rules = $this->feedback_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
        return $this->load->view('contact', $data);
        }

        $feedback = [
        'id' => uniqid('', true),
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'message' => $this->input->post('message')
        ];

        $feedback_saved = $this->feedback_model->insert($feedback);

        if ($feedback_saved) {
        return $this->load->view('contact_thanks');
        }
    }
    $data['floc'] = [
        'title' => "Contact Us",
      ];
    $this->load->view('contact', $data);
    }

  public function show($slug = null)
  {
    // jika gak ada slug di URL tampilkan 404
    if (!$slug) {
      show_404();
    }

    // ambil artikel dengan slug yang diberikan
    $data['course'] = $this->course_model->find_by_slug($slug);

    // jika artikel tidak ditemuakn di database tampilkan 404
    if (!$data['course']) {
      show_404();
    }

    // tampilkan artikel
    $data['floc'] = [
      'title' => "Courses / $slug",
    ];
    $this->load->view('courses/show_courses.php', $data);
  }

}