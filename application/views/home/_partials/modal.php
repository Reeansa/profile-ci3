<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<!-- Full review 1 -->
<?php foreach ($testimonials as $testi) {
    # code...
} ?>
<div id="review-<?= $testi['idtestimonials'] ?>" class="popup mfp-hide mfp-with-anim">
    <div class="row">
        <div class="col-12 col-sm-2 full-rewiew-con-avatar">
            <figure class="box box-avatar">
                <img src="<?= base_url('assets/images/testimonials/'. $testi[ 'images' ]) ?>" width="80" height="80" alt="<?= $testi[ 'nama' ] ?>" style="border-radius: 18px; object-fit: cover; object-position: center;">
            </figure>
            <div class="review-icon-quote"></div>
        </div>
        <div class="col-12 col-sm-10 full-rewiew-con-text">
            <h2 class="title title--h2 mb-1 text-capitalize"><?= $testi[ 'nama' ] ?></h2>
            <span class="review-date"><?= date( 'd M Y', strtotime( $testi['created_at'] ) ) ?></span>
            <p><?= $testi[ 'komentar' ] ?></p>
        </div>
    </div>
</div>