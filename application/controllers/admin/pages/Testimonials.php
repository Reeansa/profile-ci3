<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Testimonials extends CI_Controller
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
        $this->load->model( 'Testimonials_model', 'testimonials' );
    }

    public function index()
    {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'title'   => 'Testimonials',
            'user'    => $this->profile->getProfile( $getId ),
            'testimonials' => $this->testimonials->getTestimonials(),
            'content' => 'admin/dashboard/pages/about/testimonials',
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_testimonials()
    {
        $data = [ 
            'title'   => 'Add Testimonials',
            'user'    => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'content' => 'admin/dashboard/pages/about/testimonials/add'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function add_process()
    {
        $this->form_validation->set_rules( 'name', 'Name', 'required' );
        $this->form_validation->set_rules( 'comments', 'Comments', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'About failed to add' );
            redirect( 'admin/pages/testimonials/add_testimonials' );
        }
        else {
            $config[ 'upload_path' ]   = './assets/images/testimonials/';
            $config[ 'allowed_types' ] = 'jpeg|jpg|png|svg';
            $config[ 'encrypt_name' ]    = TRUE;

            $this->load->library( 'upload', $config );

            if ( !$this->upload->do_upload( 'profile' ) ) {
                $error = array( 'error' => $this->upload->display_errors() );

                $this->load->view( 'upload_form', $error );
            }
            else {
                $data = [ 
                    'idprofile' => $this->session->userdata( 'idaccounts' ),
                    'nama'    => $this->input->post( 'name' ),
                    'images'     => $this->upload->data()[ 'file_name' ],
                    'komentar' => $this->input->post( 'comments' ),
                    'status'    => $this->input->post( 'status' ),
                ];
                $this->testimonials->addTestimonials( $data );
                $this->session->set_flashdata( 'success', 'About successfully added' );
                redirect( 'admin/pages/testimonials' );
            }

        }
    }

    public function edit_testimonials( $idTestimonials )
    {
        $data = [ 
            'title'       => 'edit testimonials',
            'user'        => $this->profile->getProfile( $this->session->userdata( 'idaccounts' ) ),
            'updateTestimonials' => $this->testimonials->getTestimonialsById( $idTestimonials ),
            'content'     => 'admin/dashboard/pages/about/testimonials/edit'
        ];
        $this->load->view( $this->dashboardBody, $this->dashboardPartials + $data );
    }

    public function edit_process( $idTestimonials )
    {
        $this->form_validation->set_rules( 'name', 'Name', 'required' );
        $this->form_validation->set_rules( 'comments', 'Comments', 'required' );
        $this->form_validation->set_rules( 'status', 'Status', 'required' );

        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata( 'error', 'About failed to update' );
            redirect( 'admin/pages/testimonials/edit_testimonials' );
        }
        else if (!empty( $_FILES[ 'profile' ][ 'name' ] ) ) {
            $config[ 'upload_path' ]   = './assets/images/testimonials/';
            $config[ 'allowed_types' ] = 'jpeg|jpg|png|svg';
            $config[ 'encrypt_name' ]  = TRUE;

            $this->load->library( 'upload', $config );

            $old_images = $this->testimonials->getTestimonialsById( $idTestimonials );
            if ( $old_images ) {
                $old_images_path = './assets/images/testimonials/' . $old_images[ 'images' ];
                if ( file_exists( $old_images_path ) ) {
                    unlink( $old_images_path );
                }
            }

            if ( !$this->upload->do_upload( 'profile' ) ) {
                $error = array( 'error' => $this->upload->display_errors() );
                $this->load->view( 'upload_form', $error );
            }
            else {
                $data = [
                    'images'    => $this->upload->data()[ 'file_name' ],
                ];
                $this->testimonials->updateTestimonials( $idTestimonials, $data );
                $this->session->set_flashdata( 'success', 'profile successfully updated' );
                redirect( 'admin/pages/testimonials' );
            }
        }
        $data = [ 
            'idprofile' => $this->session->userdata( 'idaccounts' ),
            'nama'      => $this->input->post( 'name' ),
            'komentar'  => $this->input->post( 'comments' ),
            'status'    => $this->input->post( 'status' ),
        ];
        $this->testimonials->updateTestimonials( $idTestimonials, $data );
        $this->session->set_flashdata( 'success', 'testimonials successfully updated' );
        redirect( 'admin/pages/testimonials' );
    }

    public function update_status( $idtestimonials )
    {
        $data   = $this->testimonials->getTestimonialsById( $idtestimonials );
        $status = '';
        if ( $data[ 'status' ] == 'active' ) {
            $status = 'nonactive';
        }
        else {
            $status = 'active';
        }
        $this->testimonials->updateStatus( $idtestimonials, $status );
        $this->session->set_flashdata( 'success', 'status success change to ' . $status );
        redirect( 'admin/pages/testimonials' );
    }

    public function delete_testimonials( $idtestimonials )
    {
        $testimonialsData = $this->testimonials->gettestimonialsById( $idtestimonials );
        if ( !$testimonialsData ) {
            $this->session->set_flashdata( 'error', 'About not found' );
            redirect( 'admin/pages/testimonials' );
        }

        $iconPath = './assets/images/testimonials/' . $testimonialsData[ 'images' ];
        if ( file_exists( $iconPath ) ) {
            unlink( $iconPath );
        }

        $this->testimonials->deleteTestimonials( $idtestimonials );

        $this->session->set_flashdata( 'success', 'testimonials successfully deleted' );
        redirect( 'admin/pages/testimonials' );
    }
}