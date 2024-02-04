<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); 


class Education extends CI_Controller {

    protected $dashboardBody = 'admin/dashboard';
    private $dashboardPartials = [ 
        'head'   => 'admin/_partials/head',
        'aside'  => 'admin/_partials/aside',
        'navbar' => 'admin/_partials/navbar',
        'footer' => 'admin/_partials/footer',
    ];
    public function __construct() {
        parent::__construct();
        $this->load->model( 'Profile_model', 'profile' );
        $this->load->model( 'Education_model', 'education' );
    }
    
    public function index() {
        $getId = $this->session->userdata( 'idaccounts' );
        $data = [ 
            'user'    => $this->profile->getProfile( $getId ),
            'title' => 'Education',
            'educationActive'   => $this->education->getActive(),
            'educationNonActive' => $this->education->getNonActive(),
            'content' => 'admin/dashboard/pages/resume/education',
        ];
        $this->load->view($this->dashboardBody, $this->dashboardPartials + $data);
    }

    public function add() {
        $getId = $this->session->userdata( 'idaccounts' );
        $data = [ 
            'user'    => $this->profile->getProfile( $getId ),
            'title' => 'Add Education',
            'content' => 'admin/dashboard/pages/resume/education/add',
        ];
        $this->load->view($this->dashboardBody, $this->dashboardPartials + $data);
    }

    public function add_process() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dateStart', 'Date', 'required|trim');
        $this->form_validation->set_rules('dateEnd', 'Date', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'Education failed to add' );
            redirect( 'admin/pages/education/add' );
        }
        else {
            $data = [ 
                'idprofile'   => $this->session->userdata( 'idaccounts' ),
                'name' => $this->input->post( 'name' ),
                'date_start' => $this->input->post( 'dateStart' ),
                'date_end' => $this->input->post( 'dateEnd' ),
                'description' => $this->input->post( 'description' ),
                'status' => $this->input->post( 'status' ),
            ];
            $this->education->addEducation( $data );
            $this->session->set_flashdata( 'success', 'Education has been added' );
            redirect( 'admin/pages/education' );
        }
    }

    public function edit($idEducation) {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'user'    => $this->profile->getProfile( $getId ),
            'education' => $this->education->getEducationById($idEducation),
            'title'   => 'Add Education',
            'content' => 'admin/dashboard/pages/resume/education/edit',
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function update_status( $idEducation)
    {
        $data   = $this->education->getEducationById($idEducation);
        $status = '';
        if ( $data[ 'status' ] == 'active' ) {
            $status = 'nonactive';
        }
        else {
            $status = 'active';
        }
        $this->education->updateStatus( $idEducation, $status );
        $this->session->set_flashdata( 'success', 'status success change to ' . $status );
        redirect( 'admin/pages/education' );
    }

    public function delete( $idEducation )
    {
        $data = $this->education->getEducationById( $idEducation );
        if ( !$data ) {
            $this->session->set_flashdata( 'error', 'About not found' );
            redirect( 'admin/pages/education' );
        }

        $this->education->deleteEducation( $idEducation );

        $this->session->set_flashdata( 'success', 'About successfully deleted' );
        redirect( 'admin/pages/education' );
    }
}
?>