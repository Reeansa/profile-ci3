<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class About extends CI_Controller
{

    protected $dashboardBody = 'admin/dashboard';
    private $dashboardPartials = [ 
        'head'   => 'admin/_partials/head',
        'aside'  => 'admin/_partials/aside',
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
        $this->load->model( 'About_model', 'about' );
    }

    public function index()
    {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'title'   => 'About',
            'user'    => $this->profile->getProfile( $getId ),
            'aboutActive'   => $this->about->getAboutActive(),
            'aboutNonActive'   => $this->about->getAboutNonActive(),
            'content' => 'admin/dashboard/pages/about/about_me',
        ];

        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_about() {
        $data = [
            'title' => 'Add About',
            'user' => $this->profile->getProfile($this->session->userdata('idaccounts')),
            'content' => 'admin/dashboard/pages/about/aboutme/add'
        ];
        $this->load->view($this->dashboardBody, $this->dashboardPartials + $data);
    }

    public function add_process() {
        $this->form_validation->set_rules('body_text', 'About', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'About failed to add');
            redirect('admin/pages/about/add_about');
        } else {
            $data = [
                'idprofile' => $this->session->userdata('idaccounts'),
                'body_text' => $this->input->post('body_text'),
                'status' => $this->input->post('status')
            ];
            $this->about->addAbout($data);
            $this->session->set_flashdata('success', 'About successfully added');
            redirect('admin/pages/about');
        }
    }

    public function edit_about($idAbout) {
        $data = [
            'title' => 'Edit About',
            'user' => $this->profile->getProfile($this->session->userdata('idaccounts')),
            'about' => $this->about->getAboutId($idAbout),
            'content' => 'admin/dashboard/pages/about/aboutme/edit'
        ];
        $this->load->view($this->dashboardBody, $this->dashboardPartials + $data);
    }

    public function edit_process($idAbout) {
        $this->form_validation->set_rules('body_text', 'About', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'About failed to edit');
            redirect('admin/pages/about/edit_about/'.$idAbout);
        } else {
            $data = [
                'body_text' => $this->input->post('body_text'),
                'status' => $this->input->post('status')
            ];
            $this->about->updateAbout($idAbout, $data);
            $this->session->set_flashdata('success', 'About successfully edited');
            redirect('admin/pages/about');
        }
    }

    public function update_status($idAbout)
    {
        $data = $this->about->getAboutId($idAbout);
        $status = '';
        if ( $data[ 'status' ] == 'active' ) {
            $status = 'nonactive';
        } else {
            $status = 'active';
        }
        $this->about->updateStatus($idAbout, $status);
        $this->session->set_flashdata( 'success', 'status success change to '. $status );
        redirect('admin/pages/about');
    }

    public function delete_about($idAbout)
    {
        if ( empty( $idAbout ) ) {
            redirect( 'admin/pages/about' );
        }
        $this->about->deleteAbout($idAbout);
        redirect('admin/pages/about');
    }
}