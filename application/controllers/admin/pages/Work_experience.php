<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Work_experience extends CI_Controller {

    protected $dashboardBody = 'admin/dashboard';
    private $dashboardPartials = [ 
        'head'   => 'admin/_partials/head',
        'aside'  => 'admin/_partials/aside',
        'navbar' => 'admin/_partials/navbar',
        'footer' => 'admin/_partials/footer',
    ];
    public function __construct() {
        parent::__construct();
        if ( empty( $this->session->userdata( 'username' ) ) ) {
            redirect( 'login' );
        }
        $this->load->model( 'Profile_model', 'profile' );
        $this->load->model( 'Work_model', 'work' );
    }
    
    public function index() {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'title'        => 'Work experience',
            'user'         => $this->profile->getProfile( $getId ),
            'workActive' => $this->work->getActive(),
            'workNonActive' => $this->work->getNonActive(),
            'content'      => 'admin/dashboard/pages/resume/work_experience',
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add() {
        $data = [ 
            'title'   => 'Add work experience',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'content' => 'admin/dashboard/pages/resume/work_experience/add'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_process() {
        $this->form_validation->set_rules( 'name', 'Name', 'required' );
        $this->form_validation->set_rules( 'dateStart', 'Date start', 'required' );
        $this->form_validation->set_rules( 'dateEnd', 'Date end', 'required' );
        $this->form_validation->set_rules( 'description', 'Description', 'required' );
        $this->form_validation->set_rules( 'position', 'Position', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'work experience failed to add' );
            redirect( 'admin/pages/work_experience/add' );
        }
        $data = [ 
            'idprofile' => $this->session->userdata( 'idaccounts' ),
            'name'      => $this->input->post( 'name' ),
            'date_start'    => $this->input->post('dateStart'),
            'date_end'    => $this->input->post('dateEnd'),
            'description'  => $this->input->post( 'description' ),
            'position'  => $this->input->post( 'position' ),
            'status'    => $this->input->post( 'status' ),
        ];
        $this->work->create( $data );
        $this->session->set_flashdata( 'success', 'About successfully added' );
        redirect( 'admin/pages/work_experience' );
    }

    public function edit($idwork) {
        $data = [ 
            'title'   => 'update work experience',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'update'  => $this->work->getWorkById($idwork),
            'content' => 'admin/dashboard/pages/resume/work_experience/edit'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function update_process($idwork) {
        $this->form_validation->set_rules( 'name', 'Name', 'required' );
        $this->form_validation->set_rules( 'dateStart', 'Date start', 'required' );
        $this->form_validation->set_rules( 'dateEnd', 'Date end', 'required' );
        $this->form_validation->set_rules( 'description', 'Description', 'required' );
        $this->form_validation->set_rules( 'position', 'Position', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'work experience failed to update' );
            redirect( 'admin/pages/work_experience/update' );
        }
        $data = [ 
            'idprofile'   => $this->session->userdata( 'idaccounts' ),
            'name'        => $this->input->post( 'name' ),
            'date_start'  => $this->input->post( 'dateStart' ),
            'date_end'    => $this->input->post( 'dateEnd' ),
            'description' => $this->input->post( 'description' ),
            'position'    => $this->input->post( 'position' ),
            'status'      => $this->input->post( 'status' ),
        ];
        $this->work->update($idwork, $data );
        $this->session->set_flashdata( 'success', 'About successfully added' );
        redirect( 'admin/pages/work_experience' );
    }

    public function update_status( $idWork )
    {
        $data   = $this->work->getWorkById( $idWork );
        $status = '';
        if ( $data[ 'status' ] == 'active' ) {
            $status = 'nonactive';
        }
        else {
            $status = 'active';
        }
        $this->work->updateStatus( $idWork, $status );
        $this->session->set_flashdata( 'success', 'status success change to ' . $status );
        redirect( 'admin/pages/work_experience' );
    }

    public function delete( $idWork )
    {
        if ( empty( $idWork ) ) {
            $this->session->set_flashdata( 'error', 'work experience not found' );
            redirect( 'admin/pages/work_experience' );
        }
        $this->work->delete( $idWork );
        redirect( 'admin/pages/work_experience' );
    }
}

?>