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
  <h5 class="card-header">skills</h5>
  <h5 class="card-header">status active</h5>
  <div class="card-body">
    <button type="button" class="btn btn-primary"
      onclick="location.href='<?= site_url( 'admin/pages/doing/add_doing' ) ?>';">
      <span class="tf-icons bx bx-plus-circle"></span>&nbsp; add </button>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>icons</th>
          <th>skills</th>
          <th>Users</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php foreach ( $doing as $d ): ?>
          <tr>
            <td>
              <div style="width: 50px">
                <img src="<?= base_url( 'assets/images/icons/' . $d[ 'icons' ] ) ?>"
                  style="object-fit: cover; object-position: center; width: 100%; height: 100%" alt="">
              </div>
            </td>
            <td>
              <?= $d[ 'skills' ] ?>
            </td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                  class="avatar avatar-xs pull-up" title="<?= $user[ 'first_name' ] . ' ' . $user[ 'last_name' ] ?>"
                  data-bs-original-title="<?= $user[ 'first_name' ] . ' ' . $user[ 'last_name' ] ?>">
                  <img src="<?= base_url( 'assets/images/profile/' . $user[ 'photo_profile' ] ) ?>" alt="Avatar"
                    class="rounded-circle" style="object-fit: cover; object-position: center;"><span class="mx-1">
                    <?= $user[ 'first_name' ] . ' ' . $user[ 'last_name' ] ?>
                  </span>
                </li>
              </ul>
            </td>
            <td>
              <?php if ( $d[ 'status' ] == 'active' ): ?>
                <?php $badge_success = 'badge bg-label-primary me-1';
                $badge         = $badge_success;
                ?>
              <?php else: ?>
                <?php $badge_warning = 'badge bg-label-danger me-1';
                $badge         = $badge_warning ?>
              <?php endif ?>
              <span class="<?= $badge ?>">
                <?= $d[ 'status' ] ?>
              </span>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= site_url( 'admin/pages/doing/edit_doing/' . $d[ 'iddoing' ] ) ?>"><i
                      class="bx bx-edit-alt me-1"></i>
                    Edit</a>
                  <a class="dropdown-item"
                    href="<?= site_url( 'admin/pages/doing/update_status/' . $d[ 'iddoing' ] ) ?>"><i
                      class="bx bx-transfer me-1"></i> Change Status
                  </a>
                  <a class="dropdown-item"
                    href="<?= site_url( 'admin/pages/doing/delete_doing/' . $d[ 'iddoing' ] ) ?>"><i
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
          <th>icons</th>
          <th>skills</th>
          <th>Users</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php foreach ( $unDoing as $u ): ?>
          <tr>
            <td>
              <div style="width: 50px">
                <img src="<?= base_url( 'assets/images/icons/' . $u[ 'icons' ] ) ?>"
                  style="object-fit: cover; object-position: center; width: 100%; height: 100%" alt="">
              </div>
            </td>
            <td>
              <?= $u[ 'skills' ] ?>
            </td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                  class="avatar avatar-xs pull-up" title="<?= $user[ 'first_name' ] . ' ' . $user[ 'last_name' ] ?>"
                  data-bs-original-title="<?= $user[ 'first_name' ] . ' ' . $user[ 'last_name' ] ?>">
                  <img src="<?= base_url( 'assets/images/profile/' . $user[ 'photo_profile' ] ) ?>" alt="Avatar"
                    class="rounded-circle" style="object-fit: cover; object-position: center;"><span class="mx-1">
                    <?= $user[ 'first_name' ] . ' ' . $user[ 'last_name' ] ?>
                  </span>
                </li>
              </ul>
            </td>
            <td>
              <?php if ( $u[ 'status' ] == 'active' ): ?>
                <?php $badge_success = 'badge bg-label-primary me-1';
                $badge         = $badge_success;
                ?>
              <?php else: ?>
                <?php $badge_warning = 'badge bg-label-danger me-1';
                $badge         = $badge_warning ?>
              <?php endif ?>
              <span class="<?= $badge ?>">
                <?= $u[ 'status' ] ?>
              </span>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= site_url( 'admin/pages/doing/edit_doing/' . $u[ 'iddoing' ] ) ?>"><i
                      class="bx bx-edit-alt me-1"></i>
                    Edit</a>
                  <a class="dropdown-item"
                    href="<?= site_url( 'admin/pages/doing/update_status/' . $u[ 'iddoing' ] ) ?>"><i
                      class="bx bx-transfer me-1"></i> Change Status
                  </a>
                  <a class="dropdown-item"
                    href="<?= site_url( 'admin/pages/doing/delete_doing/' . $u[ 'iddoing' ] ) ?>"><i
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