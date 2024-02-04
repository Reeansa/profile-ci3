<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    protected $dashboardBody = 'admin/dashboard';
    private $dashboardPartials = [ 
        'head'   => 'admin/_partials/head',
        'aside' => 'admin/_partials/aside',
        'navbar' => 'admin/_partials/navbar',
        'footer' => 'admin/_partials/footer',
    ];
    public function __construct()
    {
        parent::__construct();
        if ( empty( $this->session->userdata( 'username' ) ) ) {
            redirect( 'login' );
        }
        $this->load->model( 'Profile_model', 'profile' );
    }

    public function index() {
        $getId = $this->session->userdata( 'idaccounts' );
        $data = [
            'title' => 'Dashboard',
            'user'    => $this->profile->getProfile( $getId ),
            'content'  => 'admin/dashboard/home',
        ];

        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }
}