<?php global $theme_uri; ?>
<section class="breadcrumb-section set-bg" data-setbg="<?= $theme_uri; ?>/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= get_the_title();?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= home_url();?>">Home</a>
                        <span><?= get_the_title();?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>