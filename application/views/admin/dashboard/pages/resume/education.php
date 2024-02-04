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
    <h5 class="card-header">education</h5>
    <h5 class="card-header">status active</h5>
    <div class="card-body">
        <button type="button" class="btn btn-primary"
            onclick="location.href='<?= site_url( 'admin/pages/education/add' ) ?>';">
            <span class="tf-icons bx bx-plus-circle"></span>&nbsp; add </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>name</th>
                    <th>date</th>
                    <th>description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ( $educationActive as $a ): ?>
                    <tr>
                        <td>
                            <?= $a['name'] ?>
                        </td>
                        <td>
                            <?= date( 'Y', strtotime( $a[ 'date_start' ] ) ) . ' - ' . date( 'Y', strtotime( $a[ 'date_end' ] ) ) ?>

                        </td>
                        <td>
                            <?= $a['description'] ?>
                        </td>
                        <td>
                            <?php if ( $a[ 'status' ] == 'active' ): ?>
                                <?php $badge_success = 'badge bg-label-primary me-1';
                                $badge         = $badge_success;
                                ?>
                            <?php else: ?>
                                <?php $badge_warning = 'badge bg-label-danger me-1';
                                $badge         = $badge_warning ?>
                            <?php endif ?>
                            <span class="<?= $badge ?>">
                                <?= $a[ 'status' ] ?>
                            </span>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/education/edit/' . $a[ 'ideducation' ] ) ?>"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/education/update_status/' . $a[ 'ideducation' ] ) ?>"><i
                                            class="bx bx-transfer me-1"></i> Change Status
                                    </a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/education/delete/' . $a[ 'ideducation' ] ) ?>"><i
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
<div class="card mt-5">
    <h5 class="card-header">status non-active</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>name</th>
                    <th>date</th>
                    <th>description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ( $educationNonActive as $n ): ?>
                    <tr>
                        <td>
                            <?= $n['name'] ?>
                        </td>
                        <td>
                            <?= date( 'Y', strtotime( $n[ 'date_start' ] ) ) . ' - ' . date( 'Y', strtotime( $n[ 'date_end' ] ) ) ?>
                        </td>
                        <td>
                            <?= $n['description'] ?>
                        </td>
                        <td>
                            <?php if ( $n[ 'status' ] == 'active' ): ?>
                                <?php $badge_success = 'badge bg-label-primary me-1';
                                $badge         = $badge_success;
                                ?>
                            <?php else: ?>
                                <?php $badge_warning = 'badge bg-label-danger me-1';
                                $badge         = $badge_warning ?>
                            <?php endif ?>
                            <span class="<?= $badge ?>">
                                <?= $n[ 'status' ] ?>
                            </span>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/education/edit/' . $n[ 'name' ] ) ?>"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/education/update_status/' . $n[ 'ideducation' ] ) ?>"><i
                                            class="bx bx-transfer me-1"></i> Change Status
                                    </a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/education/delete/' . $n[ 'ideducation' ] ) ?>"><i
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