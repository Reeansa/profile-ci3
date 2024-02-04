<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
        <!-- Register -->
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
            <div class="card-body">
                <!-- Logo -->
                <!-- <div class="app-brand justify-content-center">
                            
                        </div> -->
                <!-- /Logo -->
                <h4 class="mb-2 text-capitalize">welcome to reean! 👋</h4>
                <p class="mb-4 text-capitalize">please sign-in to access your dashboard</p>

                <form id="formAuthentication" class="mb-3" action="<?= site_url('login/login-process') ?>" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter your username" autofocus />
                    </div>
                    <div class="mb-3 form-password-toggle text-capitalize">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">password</label>
                            <a href="<?= site_url('login/forgot-password') ?>">
                                <small>forgot password?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="Enter your password" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Register -->
    </div>
</div>