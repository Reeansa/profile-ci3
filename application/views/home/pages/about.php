<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>
<!-- About -->
<div class="pb-0 pb-sm-2">
    <h1 class="title title--h1 title__separate">About Me</h1>
    <p><?= $about['body_text'] ?></p>
</div>

<!-- What -->
<h2 class="title title--h2 mt-3">Skills</h2>
<div class="row text-capitalize">
    <!-- Case Item -->
    <?php foreach ($doing as $d): ?>
    <div class="col-12 col-lg-6">
        <div class="case-item box box-inner">
            <img class="case-item__icon" src="<?= base_url('assets/images/icons/'.$d['icons']) ?>" alt="" />
            <div>
                <h3 class="title title--h3"><?= $d['skills'] ?></h3>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Testimonials -->
<div class="testimonials">
    <h2 class="title title--h2 mt-3">Testimonials</h2>

    <div class="swiper-container js-carousel-review">
        <div class="swiper-wrapper">
            <!-- Item review -->
            <?php foreach ($testimonials as $t): ?>
            <div class="swiper-slide review-item box box-inner js-open-review" data-mfp-src="#review-<?= $t['idtestimonials'] ?>"
                data-effect="mfp-zoom-out">
                <figure class="box box-avatar">
                    <img src="<?= base_url('assets/images/testimonials/'.$t['images']) ?>" width="80" height="80" alt="Daniel Lewis" style="border-radius: 18px; object-fit: cover; object-position: center;">
                </figure>
                <h4 class="title title--h3 text-capitalize"><?= $t['nama'] ?></h4>
                <p class="review-item__caption"><?= substr( $t[ 'komentar' ], 0, 100).'...' ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</div>