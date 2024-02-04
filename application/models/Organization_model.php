<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); 

class Organization_model extends CI_Model {

    public function get() {
        return $this->db->get('organization')->result_array();
    }

    public function getById($id) {
        return $this->db->get_where( 'organization', [ 'id' => $id ] )->row_array();
    }

    public function getActive()
    {
        $this->db->select( 'id, name, date_start, date_end, description, status' );
        $this->db->from( 'organization' );
        $this->db->where( 'status', 'active' );
        $this->db->order_by( 'id', 'desc' );
        return $this->db->get()->result_array();
    }
    public function getNonActive()
    {
        $this->db->select( 'id, name, date_start, date_end, description, status' );
        $this->db->from( 'organization' );
        $this->db->where( 'status', 'nonactive' );
        $this->db->order_by( 'id', 'desc' );
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        return $this->db->insert('organization', $data);
    }

    public function update( $id, $data )
    {
        return $this->db->where( 'id', $id )
            ->update( 'organization', $data );
    }
    public function updateStatus( $id, $newStatus )
    {
        $result = $this->db->set( 'status', $newStatus )
            ->where( 'id', $id )
            ->update( 'organization' );

        return $result;
    }

    public function delete($id) {
        $this->db->where('id', $id );
        $this->db->delete(' organization');
    }
}

?>