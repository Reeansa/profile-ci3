<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); 

class Work_model extends CI_Model {

    public function getWork() {
        return $this->db->get('work')->result_array();
    }

    public function getWorkById($idwork) {
        return $this->db->get_where( 'work', [ 'idwork' => $idwork ] )->row_array();
    }

    public function getActive()
    {
        $this->db->select( 'idwork, name, date_start, date_end, description, position, status' );
        $this->db->from( 'work' );
        $this->db->where( 'status', 'active' );
        $this->db->order_by( 'idwork', 'desc' );
        return $this->db->get()->result_array();
    }
    public function getNonActive()
    {
        $this->db->select( 'idwork, name, date_start, date_end, description, position, status' );
        $this->db->from( 'work' );
        $this->db->where( 'status', 'nonactive' );
        $this->db->order_by( 'idwork', 'desc' );
        return $this->db->get()->result_array();
    }

    public function create($data) {
        return $this->db->insert('work', $data);
    }

    public function update($idwork, $data) {
        return $this->db->where( 'idwork', $idwork )
            ->update( 'work', $data );
    }

    public function updateStatus( $idWork, $newStatus )
    {
        $result = $this->db->set( 'status', $newStatus )
            ->where( 'idwork', $idWork )
            ->update( 'work' );

        return $result;
    }

    public function delete($idWork) {
        $this->db->where('idwork', $idWork );
        $this->db->delete(' work');
    }
}

?>