<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Doing extends CI_Controller
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
        $this->load->model( 'Doing_model', 'doing' );
    }

    public function index()
    {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'title'   => 'Doing',
            'user'    => $this->profile->getProfile( $getId ),
            'doing'   => $this->doing->getDoingActive(),
            'unDoing'   => $this->doing->getDoingNonactive(),
            'content' => 'admin/dashboard/pages/about/doing',
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_doing() {
        $data = [ 
            'title'   => 'Add Doing',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'content' => 'admin/dashboard/pages/about/doing/add'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_process()
    {
        $this->form_validation->set_rules( 'skills', 'Skills', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'About failed to add' );
            redirect( 'admin/pages/doing/add_doing' );
        }
        else {
            $config[ 'upload_path' ]   = './assets/images/icons/';
            $config[ 'allowed_types' ] = 'jpeg|jpg|png|svg';
            $config['encrypt_name']     = TRUE;

            $this->load->library( 'upload', $config );

            if ( !$this->upload->do_upload( 'icons' ) ) {
                $error = array( 'error' => $this->upload->display_errors() );

                $this->load->view( 'upload_form', $error );
            }
            else {
                $data = [ 
                    'idprofile' => $this->session->userdata( 'idaccounts' ),
                    'skills' => $this->input->post( 'skills' ),
                    'icons' => $this->upload->data()[ 'file_name' ] ,
                    'status'    => $this->input->post( 'status' ),
                ];
                $this->doing->addDoing( $data );
                $this->session->set_flashdata( 'success', 'About successfully added' );
                redirect( 'admin/pages/doing' );
            }
            
        }
    }

    public function edit_doing($idDoing) {
        $data = [ 
            'title'   => 'Add Doing',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'updateDoing' => $this->doing->getDoingById( $idDoing ),
            'content' => 'admin/dashboard/pages/about/doing/edit'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function edit_process($idDoing)
    {
        $this->form_validation->set_rules( 'skills', 'Skills', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'About failed to update' );
            redirect( 'admin/pages/doing/edit_doing' );
        }
        else {
            $config[ 'upload_path' ]   = './assets/images/icons/';
            $config[ 'allowed_types' ] = 'jpeg|jpg|png|svg';
            $config[ 'encrypt_name' ]  = TRUE;

            $this->load->library( 'upload', $config );

            // Delete the old icon if it exists
            $old_icon = $this->doing->getDoingById( $idDoing );
            if ( $old_icon ) {
                $old_icon_path = './assets/images/icons/' . $old_icon[ 'icons' ];
                if ( file_exists( $old_icon_path ) ) {
                    unlink( $old_icon_path );
                }
            }

            if ( !$this->upload->do_upload( 'icons' ) ) {
                $error = array( 'error' => $this->upload->display_errors() );

                $this->load->view( 'upload_form', $error );
            }
            else {
                $data = [ 
                    'idprofile' => $this->session->userdata( 'idaccounts' ),
                    'skills'    => $this->input->post( 'skills' ),
                    'icons'     => $this->upload->data()[ 'file_name' ],
                    'status'    => $this->input->post( 'status' ),
                ];
                $this->doing->updateDoing( $idDoing, $data );
                $this->session->set_flashdata( 'success', 'About successfully updated' );
                redirect( 'admin/pages/doing' );
            }
        }
    }

    public function update_status( $idDoing )
    {
        $data   = $this->doing->getDoingById( $idDoing );
        $status = '';
        if ( $data[ 'status' ] == 'active' ) {
            $status = 'nonactive';
        }
        else {
            $status = 'active';
        }
        $this->doing->updateStatus( $idDoing, $status );
        $this->session->set_flashdata( 'success', 'status success change to ' . $status );
        redirect( 'admin/pages/doing' );
    }

    public function delete_doing( $idDoing )
    {
        $doingData = $this->doing->getDoingById( $idDoing );
        if ( !$doingData ) {
            $this->session->set_flashdata( 'error', 'About not found' );
            redirect( 'admin/pages/doing' );
        }

        $iconPath = './assets/images/icons/' . $doingData[ 'icons' ];
        if ( file_exists( $iconPath ) ) {
            unlink( $iconPath );
        }

        $this->doing->deleteDoing( $idDoing );

        $this->session->set_flashdata( 'success', 'About successfully deleted' );
        redirect( 'admin/pages/education' );
    }
}