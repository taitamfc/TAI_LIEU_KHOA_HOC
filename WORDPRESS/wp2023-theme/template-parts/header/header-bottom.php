<?php
    global $theme_uri;
    $hero_class = 'hero-normal';
    if( is_front_page() ){
        $hero_class = '';
    }
?>
<section class="hero <?= $hero_class; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php get_template_part('template-parts/navigation/menu','categories');?>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <?php if(is_front_page() ):?>
                <div class="hero__item set-bg" data-setbg="<?= $theme_uri; ?>/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>