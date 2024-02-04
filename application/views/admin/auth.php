<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view($head) ?>
<body>
    <!-- Content -->
    <div class="container-xxl">
        <?php $this->load->view($content) ?>
    </div>

    <!-- / Content -->

    <?php $this->load->view($footer) ?>
</body>

</html>