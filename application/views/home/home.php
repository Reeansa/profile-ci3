<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view( 'home/_partials/head' ) ?>

<body>
    <main class="main">
        <div class="container gutter-top gutter-bottom">
            <div class="row sticky-parent">
                <!-- Sidebar -->
                <?php $this->load->view('home/_partials/sidebar') ?>

                <!-- Content -->
                <?php $this->load->view('home/content') ?>
                <!-- Content -->
            </div><!-- sticky-parent -->
        </div><!-- container -->
    </main>

    <div class="back-to-top"></div>
    <?php $this->load->view('home/_partials/modal') ?>
    <!-- JavaScripts -->
	<script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugins.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/common.js') ?>"></script>
</body>

</html>