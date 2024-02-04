<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Organization_experience extends CI_Controller {

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
        $this->load->model( 'Organization_model', 'organization' );
    }
    
    public function index() {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'title'        => 'Organization experience',
            'user'         => $this->profile->getProfile( $getId ),
            'organizationActive' => $this->organization->getActive(),
            'organizationNonActive' => $this->organization->getNonActive(),
            'content'      => 'admin/dashboard/pages/resume/organization_experience',
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add() {
        $data = [ 
            'title'   => 'Add organization experience',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'content' => 'admin/dashboard/pages/resume/organization_experience/add'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_process() {
        $this->form_validation->set_rules( 'name', 'Name', 'required' );
        $this->form_validation->set_rules( 'dateStart', 'Date start', 'required' );
        $this->form_validation->set_rules( 'dateEnd', 'Date end', 'required' );
        $this->form_validation->set_rules( 'description', 'Description', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'organization experience failed to add' );
            redirect( 'admin/pages/organization_experience/add' );
        }
        $data = [ 
            'idprofile' => $this->session->userdata( 'idaccounts' ),
            'name'      => $this->input->post( 'name' ),
            'date_start'    => $this->input->post('dateStart'),
            'date_end'    => $this->input->post('dateEnd'),
            'description'  => $this->input->post( 'description' ),
            'status'    => $this->input->post( 'status' ),
        ];
        $this->organization->insert( $data );
        $this->session->set_flashdata( 'success', 'data successfully added' );
        redirect( 'admin/pages/organization_experience' );
    }

    public function edit( $id )
    {
        $data = [ 
            'title'   => 'update organization experience',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'update'  => $this->organization->getById( $id ),
            'content' => 'admin/dashboard/pages/resume/organization_experience/edit'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function update_process( $id )
    {
        $this->form_validation->set_rules( 'name', 'Name', 'required' );
        $this->form_validation->set_rules( 'dateStart', 'Date start', 'required' );
        $this->form_validation->set_rules( 'dateEnd', 'Date end', 'required' );
        $this->form_validation->set_rules( 'description', 'Description', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'organization experience failed to update' );
            redirect( 'admin/pages/organization_experience/update' );
        }
        $data = [ 
            'idprofile'   => $this->session->userdata( 'idaccounts' ),
            'name'        => $this->input->post( 'name' ),
            'date_start'  => $this->input->post( 'dateStart' ),
            'date_end'    => $this->input->post( 'dateEnd' ),
            'description' => $this->input->post( 'description' ),
            'status'      => $this->input->post( 'status' ),
        ];
        $this->organization->update( $id, $data );
        $this->session->set_flashdata( 'success', 'organization successfully update' );
        redirect( 'admin/pages/organization_experience' );
    }



    public function update_status( $id )
    {
        $data   = $this->organization->getById( $id );
        $status = '';
        if ( $data[ 'status' ] == 'active' ) {
            $status = 'nonactive';
        }
        else {
            $status = 'active';
        }
        $this->organization->updateStatus( $id, $status );
        $this->session->set_flashdata( 'success', 'status success change to ' . $status );
        redirect( 'admin/pages/organization_experience' );
    }

    public function delete( $id )
    {
        if ( empty( $id ) ) {
            $this->session->set_flashdata( 'error', 'organization experience not found' );
            redirect( 'admin/pages/organization_experience' );
        }
        $this->organization->delete( $$id );
        redirect( 'admin/pages/organization_experience' );
    }
}

?>