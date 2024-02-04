<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<aside class="col-12 col-md-12 col-xl-3">
    <div class="sidebar box-outer sticky-column">
        <!-- My photo -->
        <div class="sidebar__base-info">
            <figure class="avatar-box">
                <img src="<?= base_url('assets/images/profile/'.$profile['photo_profile']) ?>" alt="<?= $profile[ 'first_name' ] . ' ' . $profile[ 'last_name' ] ?>">
            </figure>

            <div class="text-xl-center text-capitalize">
                <h3 class="title title--h3 sidebar__name"><?= $profile['first_name'].' '. $profile[ 'last_name' ] ?></h3>
                <div class="badge"><?= $profile['jobdesk'] ?></div>
            </div>

            <button class="btn btn--small btn--icon-right sidebar__btn js-btn-toggle"><span>Show Contacts</span><i
                    class="feathericon-chevron-down"></i></button>
        </div>

        <div class="sidebar__additional-info js-show">
            <div class="separation"></div>
            <ul class="details-info">
                <!-- Email -->
                <li class="details-info__item">
                    <span class="box icon-box"><i class="font-icon icon-envelope"></i></span>
                    <div class="contacts-block__info">
                        <span class="overhead">Email</span>
                        <a class="text-overflow" href="mailto:<?= $profile['email'] ?>"
                            title="<?= $profile['email'] ?>"><?= $profile['email'] ?></a>
                    </div>
                </li>
                <!-- Phone -->
                <li class="details-info__item">
                    <span class="box icon-box"><i class="font-icon icon-phone"></i></span>
                    <div class="contacts-block__info">
                        <span class="overhead">Phone</span>
                        <span class="text-overflow" title="+62 <?= $profile[ 'no_hp' ] ?>">+62 <?= $profile[ 'no_hp' ] ?></span>
                    </div>
                </li>
                <!-- Birthday -->
                <li class="details-info__item">
                    <span class="box icon-box"><i class="font-icon icon-calendar"></i></span>
                    <div class="contacts-block__info">
                        <span class="overhead">Birthday</span>
                        <span class="text-overflow" title="<?= $profile[ 'birthday' ] ?>"><?= $profile[ 'birthday' ] ?></span>
                    </div>
                </li>
                <!-- Location -->
                <li class="details-info__item">
                    <span class="box icon-box"><i class="font-icon icon-location"></i></span>
                    <div class="contacts-block__info">
                        <span class="overhead">Location</span>
                        <span class="text-overflow" title="San-Francisco, USA"><?= $profile[ 'location' ] ?></span>
                    </div>
                </li>
            </ul>
            <div class="separation d-xl-none"></div>

            <!-- Social -->
            <div class="social">
                <a class="social__link" href="https://www.linkedin.com/in/raihanfebriyansah/"><i class="feathericon-linkedin"></i></a>
                <a class="social__link" href="https://www.instagram.com/raihanfebriyansah"><i class="feathericon-instagram"></i></a>
            </div>
        </div>
    </div>
</aside>