<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<!-- Menu -->
<div class="nav-container">
    <ul class="nav">
        <li class="nav__item"><a class="<?= $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= site_url('/') ?>">About</a></li>
        <li class="nav__item"><a class="<?= $this->uri->segment(1) == 'resume' ? 'active' : '' ?>" href="resume.html">Resume</a></li>
        <li class="nav__item"><a class="<?= $this->uri->segment(1) == 'portfolio' ? 'active' : '' ?>" href="portfolio.html">Portfolio</a></li>
    </ul>
</div>