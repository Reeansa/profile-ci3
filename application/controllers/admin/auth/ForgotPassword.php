<?php defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{
    protected $authBody = 'admin/auth';
    private $authPartials = [
        'head' => 'admin/_partials/head',
        'footer' => 'admin/_partials/footer-auth',
    ];

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'Forgot Password',
            'content' => 'admin/auth/forgot-password'
        ];
        $this->load->view($this->authBody, $this->authPartials + $data);
    }
}