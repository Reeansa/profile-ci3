<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<?php
if ( $this->session->flashdata( 'error' ) ) {
    echo '<div class="alert alert-danger shadow">' . $this->session->flashdata( 'error' ) . '</div>';
}
else {
    if ( $this->session->flashdata( 'success' ) ) {
        echo '<div class="alert alert-success shadow">' . $this->session->flashdata( 'success' ) . '</div>';
    }
}
?>
<div class="card">
    <h5 class="card-header">testimonials</h5>
    <div class="card-body">
        <button type="button" class="btn btn-primary"
            onclick="location.href='<?= site_url( 'admin/pages/testimonials/add_testimonials' ) ?>';">
            <span class="tf-icons bx bx-plus-circle"></span>&nbsp; add </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>profile</th>
                    <th>name</th>
                    <th>comments</th>
                    <th>created</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ( $testimonials as $t ): ?>
                    <tr>
                        <td>
                            <div style="width: 50px">
                                <img src="<?= base_url( 'assets/images/testimonials/' . $t[ 'images' ] ) ?>"
                                    style="object-fit: cover; object-position: center; width: 100%; height: 100%" alt="">
                            </div>
                        </td>
                        <td>
                            <?= $t[ 'nama' ] ?>
                        </td>
                        <td class="text-wrap">
                            <?= $t[ 'komentar' ] ?>
                        </td>
                        <td>
                            <?= $t[ 'created_at' ] = date('d - m - Y') ?>
                        </td>
                        <td>
                            <?php if ( $t[ 'status' ] == 'active' ): ?>
                                <?php $badge_success = 'badge bg-label-primary me-1';
                                $badge         = $badge_success;
                                ?>
                            <?php else: ?>
                                <?php $badge_warning = 'badge bg-label-danger me-1';
                                $badge         = $badge_warning ?>
                            <?php endif ?>
                            <span class="<?= $badge ?>">
                                <?= $t[ 'status' ] ?>
                            </span>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/testimonials/edit_testimonials/' . $t[ 'idtestimonials' ] ) ?>"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/testimonials/update_status/' . $t[ 'idtestimonials' ] ) ?>"><i
                                            class="bx bx-transfer me-1"></i> Change Status
                                    </a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/testimonials/delete_testimonials/' . $t[ 'idtestimonials' ] ) ?>"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>