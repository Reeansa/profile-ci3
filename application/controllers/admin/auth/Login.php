<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Login extends CI_Controller
{
    protected $authBody = 'admin/auth';
    private $authPartials = [ 
        'head'   => 'admin/_partials/head',
        'footer' => 'admin/_partials/footer_auth',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'Auth_model', 'auth' );
    }
    public function index()
    {

        $data = [ 
            'title' => 'Login',
            'content'  => 'admin/auth/login'
        ];
        $this->load->view( $this->authBody, $this->authPartials + $data );
    }

    

    public function login_process()
    {

        $this->form_validation->set_rules( 'username', 'Username', 'required|trim' );
        $this->form_validation->set_rules( 'password', 'Password', 'required|trim' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->session->set_flashdata( 'error', validation_errors() );
            redirect( 'login' );
        }
        else {
            $username = $this->input->post( 'username' );
            $password = $this->input->post( 'password' );
            $auth     = $this->auth->login( $username, $password );
            if ( $auth ) {
                $this->session->set_userdata( $auth );
                $this->session->set_flashdata( 'success', 'Selamat datang');
                redirect( 'admin/dashboard' );
            }
            else {
                $user_exists = $this->auth->checkUsername( $username );
                if ( $user_exists ) {
                    $this->session->set_flashdata( 'error', 'Password salah' );
                }
                else {
                    $this->session->set_flashdata( 'error', 'Username tidak ditemukan' );
                }
            }
            
            redirect( 'login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata( 'success', 'Berhasil logout' );
        redirect( 'login' );
    }
}