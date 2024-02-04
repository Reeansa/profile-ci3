<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Profile extends CI_Controller
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
    }

    public function index()
    {
        $getId = $this->session->userdata( 'idaccounts' );
        $data  = [ 
            'title'   => 'My Profile',
            'user'    => $this->profile->getProfile( $getId ),
            'content' => 'admin/dashboard/pages/accounts/profile',
        ];
        $this->load->view( $this->dashboardBody, array_merge( $data, $this->dashboardPartials ) );
    }

    public function update_process( $idProfile )
    {
        // Jika form update di-submit
        if ( $this->input->post() ) {
            $data = array(
                'first_name' => $this->input->post( 'firstName' ),
                'last_name'  => $this->input->post( 'lastName' ),
                'email'      => $this->input->post( 'email' ),
                'no_hp'      => $this->input->post( 'phoneNumber' ),
                'location'   => $this->input->post( 'address' ),
                'birthday'   => $this->input->post( 'birthday' ),
            );

            // Get the old icon path to delete later
            $old_photoProfile = $this->profile->getProfile( $idProfile )['photo_profile'];
            // Cek apakah gambar kosong atau tidak
            if ( !empty( $_FILES[ 'uploadProfile' ][ 'name' ] ) ) {
                
                // Konfigurasi upload gambar
                $config[ 'upload_path' ]   = './assets/images/profile/';
                $config[ 'allowed_types' ] = 'jpg|jpeg|png|gif';
                $config[ 'max_size' ]      = '2048';
                $config['encrypt_name']    = TRUE;

                $this->load->library( 'upload', $config );

                if ( $this->upload->do_upload( 'uploadProfile' ) ) {
                    $upload_data             = $this->upload->data();
                    $data[ 'photo_profile' ] = $upload_data[ 'file_name' ];
                }
                else {
                    $this->session->set_flashdata( 'error', $this->upload->display_errors() );
                    redirect( 'admin/pages/profile' );
                }
                if ( $old_photoProfile && file_exists( './assets/images/profile/' . $old_photoProfile ) ) {
                    unlink( './assets/images/profile/' . $old_photoProfile );
                }
            }

            // Panggil method update_profiles dari model
            $this->profile->updateProfile( $idProfile, $data );

            // Redirect kembali ke halaman profile
            $this->session->set_flashdata( 'success', 'data berhasil diupdate' );
            redirect( 'admin/pages/profile' );
        }
        $this->session->set_flashdata( 'error', 'data tidak berhasil diupdate' );
        redirect( 'admin/pages/profile' );
    }

    public function change_password($idProfile) {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[validationPassword]', [
            'required'   => 'Password harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches'    => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('validationPassword', 'Validation Password', 'required|trim|min_length[8]|matches[password]', [
            'required'   => 'Password harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches'    => 'Password tidak sama'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata( 'error', 'password failed to change' );
            redirect( 'admin/pages/profile' );
        }

        $data = [
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        $this->profile->changePassword( $idProfile, $data );
        $this->session->set_flashdata( 'success', 'password berhasil diubah' );
        $this->session->sess_destroy();
        redirect( 'login' );
    }
}