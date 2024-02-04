<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Education_model extends CI_Model
{

    public function getEducation()
    {
        return $this->db->get( 'education' )->result_array();
    }

    public function getEducationById( $idEducation )
    {
        return $this->db->get_where( 'education', [ 'ideducation' => $idEducation ] )->row_array();
    }

    public function getActive()
    {
        $this->db->select( 'ideducation, name, date_start, date_end, description, status' );
        $this->db->from( 'education' );
        $this->db->where( 'status', 'active' );
        $this->db->order_by( 'ideducation', 'desc' );
        return $this->db->get()->result_array();
    }
    public function getNonActive()
    {
        $this->db->select( 'ideducation, name, date_start, date_end, description, status' );
        $this->db->from( 'education' );
        $this->db->where( 'status', 'nonactive' );
        $this->db->order_by( 'ideducation', 'desc' );
        return $this->db->get()->result_array();
    }

    public function updateEducation( $idEducation, $data )
    {
        $this->db->where( 'ideducation', $idEducation );
        $this->db->update( 'education', $data );
    }

    public function updateStatus( $idEducation, $newStatus )
    {
        $result = $this->db->set( 'status', $newStatus )
            ->where( 'ideducation', $idEducation )
            ->update( 'education' );

        return $result;
    }

    public function addEducation( $data )
    {
        $this->db->insert( 'education', $data );
    }

    public function deleteEducation( $idEducation )
    {
        $this->db->where( 'ideducation', $idEducation );
        $this->db->delete( 'education' );
    }
}
?>