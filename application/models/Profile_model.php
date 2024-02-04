<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function getProfile( $idProfile )
    {
        $this->db->select( '*' );
        $this->db->from( 'profile' );
        $this->db->join( 'accounts', 'accounts.idaccounts = profile.idaccounts' );
        $this->db->where( 'idprofile', $idProfile );
        $result = $this->db->get()->row_array();

        return $result;
    }


    public function updateProfile($idProfile, $data)
    {
        $this->db->where('idprofile', $idProfile);
        $this->db->update('profile', $data);
    }

    public function changePassword($idProfile, $data) {
        $this->db->where( 'idaccounts', $idProfile );
        $this->db->update('accounts', $data);
    }
}