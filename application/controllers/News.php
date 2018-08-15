<?php
  class News extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('newsmodel');
      $this->load->helper('url_helper');
    }

    public function index()
    {
      $data['news'] = $this->newsmodel->get_news();
      $data['title'] = 'All New Articles';
      // $data['text'] = "Hello this is new item :)";

      $this->load->view('templates/header', $data);
      $this->load->view('news/index', $data);
      $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
      $data['news_item'] = $this->newsmodel->get_news($slug);
      if (empty($data['news_item']))
      {
        show_404();
      }

      $data['title'] = $data['news_item']['title'];
      $this->load->view('templates/header', $data);
      $this->load->view('news/view', $data);
      $this->load->view('templates/footer');
    }

    public function create()
    {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = 'Create a news item';

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('text', 'Text', 'required');

      if ($this->form_validation->run() === FALSE)
      {
        $this->load->view('templates/header', $data);
        $this->load->view('news/create');
        $this->load->view('templates/footer');

      } else {
        $this->newsmodel->set_news();
        $this->load->view('news/success');
      }
    } 
}