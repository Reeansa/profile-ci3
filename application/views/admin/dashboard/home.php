<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<?php
if ( $this->session->flashdata( 'success' ) ) {
    echo '<div class="alert alert-success shadow text-capitalize">' . $this->session->flashdata( 'success' ) .' '. $user['first_name'].' '.$user['last_name'] . '</div>';
}
?>