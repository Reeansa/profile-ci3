<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Testimonials_model extends CI_Model
{

    public function getTestimonials()
    {
        return $this->db->get( 'testimonials' )->result_array();
    }

    public function getTestimonialsById( $idTestimonials )
    {
        return $this->db->get_where( 'testimonials', [ 'idtestimonials' => $idTestimonials ] )->row_array();
    }

    public function addTestimonials( $data )
    {
        $this->db->insert( 'testimonials', $data );
    }

    public function updateTestimonials( $idTestimonials, $data )
    {
        $this->db->where( 'idtestimonials', $idTestimonials );
        $this->db->update( 'testimonials', $data );
    }

    public function updateStatus( $idTestimonials, $newStatus )
    {
        $result = $this->db->set( 'status', $newStatus )
            ->where( 'idtestimonials', $idTestimonials )
            ->update( 'testimonials' );

        return $result;
    }

    public function deleteTestimonials( $idTestimonials )
    {
        $this->db->where( 'idtestimonials', $idTestimonials );
        $this->db->delete( 'testimonials' );
    }
}