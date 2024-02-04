<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Home extends CI_Controller {
    protected $homeTemplate = 'home/home';

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Home_model', 'home' );
    }

    public function index() {
        $data = [
            'title' => 'Selamat datang di portfolio Raihan Febriyansah',
            'content' => 'home/pages/about',
            'profile' => $this->home->getProfile(),
            'about' => $this->home->getAbout(),
            'doing' => $this->home->getDoing(),
            'testimonials' => $this->home->getTestimonials(),
        ];
        $this->load->view($this->homeTemplate, $data);
        
    }
}