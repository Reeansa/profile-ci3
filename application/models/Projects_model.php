<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Doing_model extends CI_Model {

    public function get() {
        return $this->db->get( 'projects' )->result_array();
    }

    public function getById( $id )
    {
        return $this->db->get_where( 'projects', [ 'id' => $id ] )->row_array();
    }
    
    public function getImages($idProjects) {
        return $this->db->get_where( 'images', [ 'idprojects' => $idProjects ] )->result_array();

    }
    public function getActive() {
        $this->db->select( 'iddoing, skills, icons, status' );
        $this->db->from( 'doing' );
        $this->db->where( 'status', 'active' );
        $this->db->order_by( 'iddoing', 'desc' );
        return $this->db->get()->result_array();
    }

    public function getNonActive() {
        $this->db->select( 'iddoing, skills, icons, status' );
        $this->db->from( 'doing' );
        $this->db->where( 'status', 'nonactive' );
        $this->db->order_by( 'iddoing', 'desc' );
        return $this->db->get()->result_array();
    }

    public function addDoing( $data )
    {
        $this->db->insert( 'doing', $data );
    }

    public function updateDoing( $idDoing, $data )
    {
        $this->db->where( 'iddoing', $idDoing );
        $this->db->update( 'doing', $data );
    }

    public function updateStatus( $idDoing, $newStatus )
    {
        $result = $this->db->set( 'status', $newStatus )
            ->where( 'iddoing', $idDoing )
            ->update( 'doing' );

        return $result;
    }

    public function deleteDoing( $idDoing )
    {
        $this->db->where( 'iddoing', $idDoing );
        $this->db->delete( 'doing' );
    }
}