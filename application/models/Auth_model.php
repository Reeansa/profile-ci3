<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Auth_model extends CI_Model
{

    public function checkUsername( $username )
    {
        // Mencari apakah username yang ada pada database
        return $this->db->get_where( 'accounts', [ 'username' => $username ] )->num_rows() > 0;
    }

    public function login( $username, $password )
    {
        $user = $this->db->get_where( 'accounts', [ 'username' => $username ] )->row_array();
        if ( $user ) {
            if ( password_verify( $password, $user[ 'password' ] ) ) {
                return [ 
                    'idaccounts'   => $user[ 'idaccounts' ],
                    'username'     => $user[ 'username' ],
                    'role'         => $user[ 'role' ],
                ];

            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}