<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> Account</a>
            </li>
        </ul>
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
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
                <?= form_open_multipart( 'admin/pages/profile/update_process/' . $user[ 'idprofile' ], 'id="formAccountSettings"' ) ?>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <div style="max-height: 12.75rem; height: 10vw; width: 15%; z-index: 1;">
                        <img src="<?= base_url( 'assets/images/profile/' . $user[ 'photo_profile' ] ) ?>"
                            alt="user-avatar" class="d-block"
                            style="object-fit: cover; object-position: center; height: 100%; width: 100%; border-radius: 0.375rem;"
                            id="uploadedProfile" />
                    </div>
                    <div class="button-wrapper">
                        <label for="uploadProfile" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="uploadProfile" name="uploadProfile" class="account-file-input" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input class="form-control" type="text" id="firstName" name="firstName"
                            value="<?= $user[ 'first_name' ] ?>" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName"
                            value="<?= $user[ 'last_name' ] ?>" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input class="form-control" type="date" name="birthday" id="birthday"
                            value="<?= $user[ 'birthday' ] ?>" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" value="<?= $user[ 'email' ] ?>"
                            placeholder="ex@example.com" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                placeholder="08xxxxx" value="<?= $user[ 'no_hp' ] ?>" />
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Kota, Negara"
                            value="<?= $user[ 'location' ] ?>" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="specialist" class="form-label">professional specialist</label>
                        <input type="text" class="form-control" id="specialist" name="specialist"
                            placeholder="Ex : Developer" value="<?= $user[ 'specialist' ] ?>" />
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= form_open_multipart( 'admin/pages/profile/change_password/' . $user[ 'idprofile' ] ) ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">password</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="***"
                            required />
                        <h1><?= form_error( 'password' ) ?></h1>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="validationPassword" class="form-label">validation password</label>
                        <input class="form-control" type="password" name="validationPassword" id="validationPassword"
                            placeholder="***" required />
                        <h1><?= form_error( 'validationPassword' ) ?></h1>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">change password</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>