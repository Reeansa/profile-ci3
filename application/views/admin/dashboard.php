<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<!DOCTYPE html>
<html lang="en">

<?php $this->load->view( $head ) ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php $this->load->view( $aside ) ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php $this->load->view( $navbar ) ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <!-- Layout Demo -->
                        <?php $this->load->view( $content ) ?>
                        <!--/ Layout Demo -->
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php $this->load->view( $footer ) ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url( 'assets/js/jquery-3.7.1.min.js' ) ?>"></script>
    <script src="<?= base_url( 'assets/js/popper.js' ) ?>"></script>
    <script src="<?= base_url( 'assets/js/bootstrap.js' ) ?>"></script>
    <script type="module" src="<?= base_url( 'assets/js/perfect-scrollbar.js' ) ?>"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script type="module" src="<?= base_url( 'assets/js/menu.js' ) ?>"></script>

    <!-- Main JS -->
    <script type="module" src="<?= base_url( 'assets/js/main.js' ) ?>"></script>
    <script src="<?= base_url( 'node_modules/datatables.net/js/jquery.dataTables.min.js' ) ?>"></script>
    <!-- Page JS -->
</body>

</html>