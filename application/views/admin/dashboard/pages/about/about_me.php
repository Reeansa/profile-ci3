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
    <h5 class="card-header">about me</h5>
    <h5 class="card-header">active</h5>
    <div class="card-body">
        <button type="button" class="btn btn-primary"
            onclick="location.href='<?= site_url( 'admin/pages/about/add_about' ) ?>';">
            <span class="tf-icons bx bx-plus-circle"></span>&nbsp; add </button>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>no</th>
                <th>about me</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $no = 1; ?>
            <?php foreach ( $aboutActive as $a ): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                        <p>
                            <?= $a[ 'body_text' ] ?>
                        </p>
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
                                    href="<?= site_url( 'admin/pages/about/edit_about/' . $a[ 'idabout' ] ) ?>"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item"
                                    href="<?= site_url( 'admin/pages/about/update_status/' . $a[ 'idabout' ] ) ?>"><i
                                        class="bx bx-transfer me-1"></i> Change Status
                                </a>
                                <a class="dropdown-item"
                                    href="<?= site_url( 'admin/pages/about/delete_about/' . $a[ 'idabout' ] ) ?>"><i
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
<div class="card mt-5">
    <h5 class="card-header">non-active</h5>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>no</th>
                <th>about me</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $no = 1; ?>
            <?php foreach ( $aboutNonActive as $n ): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                        <p>
                            <?= $n[ 'body_text' ] ?>
                        </p>
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
                                    href="<?= site_url( 'admin/pages/about/edit_about/' . $n[ 'idabout' ] ) ?>"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item"
                                    href="<?= site_url( 'admin/pages/about/update_status/' . $n[ 'idabout' ] ) ?>"><i
                                        class="bx bx-transfer me-1"></i> Change Status
                                </a>
                                <a class="dropdown-item"
                                    href="<?= site_url( 'admin/pages/about/delete_about/' . $n[ 'idabout' ] ) ?>"><i
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