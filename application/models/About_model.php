<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class About_model extends CI_Model
{

    public function getAbout()
    {
        return $this->db->get( 'about' )->result_array();
    }

    public function getAboutId($idAbout) {
        return $this->db->get_where('about', ['idabout' => $idAbout])->row_array();
    }

    public function getAboutActive()
    {
        $this->db->select( 'idabout, body_text, status' );
        $this->db->from( 'about' );
        $this->db->where( 'status', 'active' );
        $this->db->order_by( 'idabout', 'desc' );
        return $this->db->get()->result_array();
    }
    public function getAboutNonActive()
    {
        $this->db->select( 'idabout, body_text, status' );
        $this->db->from( 'about' );
        $this->db->where( 'status', 'nonactive' );
        $this->db->order_by( 'idabout', 'desc' );
        return $this->db->get()->result_array();
    }

    public function addAbout( $data )
    {
        $this->db->insert( 'about', $data );
    }

    public function updateAbout($idAbout, $data) {
        $this->db->where('idabout', $idAbout);
        $this->db->update('about', $data);
    }

    public function updateStatus( $idAbout, $newStatus )
    {
        $result = $this->db->set( 'status', $newStatus )
            ->where( 'idabout', $idAbout )
            ->update( 'about' );

        return $result;
    }

    public function deleteAbout( $idAbout )
    {
        $this->db->where( 'idabout', $idAbout );
        $this->db->delete( 'about' );
    }
}