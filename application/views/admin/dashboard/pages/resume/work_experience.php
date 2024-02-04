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
            onclick="location.href='<?= site_url( 'admin/pages/work_experience/add' ) ?>';">
            <span class="tf-icons bx bx-plus-circle"></span>&nbsp; add </button>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>no</th>
                <th>name</th>
                <th>date start</th>
                <th>date end</th>
                <th>description</th>
                <th>position</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $no = 1; ?>
            <?php foreach ( $workActive as $a ): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                        <p>
                            <?= $a[ 'name' ] ?>
                        </p>
                    </td>
                    <td><?= $a['date_start'] ?></td>
                    <td><?= $a['date_end'] ?></td>
                    <td><?= $a['description'] ?></td>
                    <td><?= $a['position'] ?></td>
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
                                    href="<?= site_url( 'admin/pages/work_experience/edit/' . $a[ 'idwork' ] ) ?>"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item"
                                    href="<?= site_url( 'admin/pages/work_experience/update_status/' . $a[ 'idwork' ] ) ?>"><i
                                        class="bx bx-transfer me-1"></i> Change Status
                                </a>
                                <a class="dropdown-item"
                                    href="<?= site_url( 'admin/pages/work_experience/delete/' . $a[ 'idwork' ] ) ?>"><i
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
            <th>no</th>
                <th>name</th>
                <th>date start</th>
                <th>date end</th>
                <th>description</th>
                <th>position</th>
                <th>status</th>
                <th>action</th>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $no = 1; ?>
            <?php foreach ( $workNonActive as $n ): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                        <p>
                            <?= $n[ 'name' ] ?>
                        </p>
                    </td>
                    <td><?= $n[ 'date_start' ] ?>
                        </td>
                        <td>
                            <?= $n[ 'date_end' ] ?>
                        </td>
                        <td>
                            <?= $n[ 'description' ] ?>
                        </td>
                        <td>
                            <?= $n[ 'position' ] ?>
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
                                    href="<?= site_url( 'admin/pages/work_experience/edit/' . $n[ 'idwork' ] ) ?>"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item"
                                        href="<?= site_url( 'admin/pages/work_experience/update_status/' . $n[ 'idwork' ] ) ?>"><i
                                            class="bx bx-transfer me-1"></i> Change Status
                                    </a>
                                    <a class="dropdown-item" href="<?= site_url( 'admin/pages/work_experience/delete/' . $n[ 'idwork' ] ) ?>"><i
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