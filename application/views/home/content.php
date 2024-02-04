<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<div class="col-12 col-md-12 col-xl-9">
    <div class="box-outer">
        <?php $this->load->view( 'home/_partials/menu' ) ?>

        <?php $this->load->view($content) ?>
        
    </div><!-- box-outer -->
</div>