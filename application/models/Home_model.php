<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); 

class Home_model extends CI_Model {

    public function getProfile() {
        return $this->db->get( 'profile' )->row_array();
    }
    public function getAbout() {
        return $this->db->get( 'about' )->row_array();
    }
    public function getDOing() {
        return $this->db->get( 'doing' )->result_array();
    }
    public function getTestimonials() {
        return $this->db->get( 'testimonials' )->result_array();
    }
}

?>