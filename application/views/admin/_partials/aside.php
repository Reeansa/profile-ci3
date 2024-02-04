<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link justify-content-center">
            <img width="35%" src="<?= base_url('assets/images/logo/logo.png') ?>" alt="Brand Logo" class="img-fluid">
        </a>

        <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item text-capitalize <?= ( $this->uri->segment( 2 ) == 'dashboard' ) ? 'active' : ''; ?>">
            <a href="<?= site_url('admin/dashboard') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">pages</span>
        </li>
        <li class="menu-item text-capitalize <?= ( in_array( $this->uri->segment( 3 ), array( 'about', 'doing', 'testimonials' ) ) ) ? 'active open' : '' ?>">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Account Settings text-capitalize">about</div>
            </a>
            <ul class="menu-sub text-capitalize">
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'about' ) ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/pages/about') ?>" class="menu-link">
                        <div data-i18n="about">about me</div>
                    </a>
                </li>
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'doing' ) ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/pages/doing') ?>" class="menu-link">
                        <div data-i18n="Notifications">What I'm Doing</div>
                    </a>
                </li>
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'testimonials' ) ? 'active' : '' ?>">
                    <a href="<?= site_url( 'admin/pages/testimonials' ) ?>" class="menu-link">
                        <div data-i18n="Connections">Testimonials</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item text-capitalize <?= ( in_array( $this->uri->segment( 3 ), array( 'education', 'work_experience', 'organization_experience' ) ) ) ? 'active open' : '' ?>">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Account Settings text-capitalize">resume</div>
            </a>
            <ul class="menu-sub text-capitalize">
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'education' ) ? 'active' : '' ?>">
                    <a href="<?= site_url( 'admin/pages/education' ) ?>" class="menu-link">
                        <div data-i18n="about">education</div>
                    </a>
                </li>
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'work_experience' ) ? 'active' : '' ?>">
                    <a href="<?= site_url( 'admin/pages/work_experience' ) ?>" class="menu-link">
                        <div data-i18n="about">work experience</div>
                    </a>
                </li>
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'organization_experience' ) ? 'active' : '' ?>">
                    <a href="<?= site_url( 'admin/pages/organization_experience' ) ?>" class="menu-link">
                        <div data-i18n="about">organization experience</div>
                    </a>
                </li>
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'projects' ) ? 'active' : '' ?>">
                    <a href="<?= site_url( 'admin/pages/projects' ) ?>" class="menu-link">
                        <div data-i18n="about">projects</div>
                    </a>
                </li>
                <li class="menu-item <?= ( $this->uri->segment( 3 ) == 'Achievements' ) ? 'active' : '' ?>">
                    <a href="<?= site_url( 'admin/pages/Achievements' ) ?>" class="menu-link">
                        <div data-i18n="about">Achievements</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>