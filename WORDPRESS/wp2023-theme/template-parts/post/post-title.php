<?php global $theme_uri;?>
<section class="blog-details-hero set-bg" data-setbg="<?= $theme_uri;?>/img/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?= get_the_title();?></h2>
                    <ul>
                        <li>By <?= get_the_author_meta('display_name');?></li>
                        <li><?= get_the_date();?></li>
                        <li><?= get_comments_number();?> Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>