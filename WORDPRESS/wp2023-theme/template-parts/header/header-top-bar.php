<?php global $theme_uri; ?>
<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header__top__left">
                    <?= get_theme_mod('header__top__left');?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="header__top__right">
                    <div class="header__top__right__social">
                        <?= get_theme_mod('header_top_social');?>
                    </div>
                    <div class="header__top__right__language">
                        <img src="<?= $theme_uri; ?>/img/language.png" alt="">
                        <div>English</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#">Spanis</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                    <div class="header__top__right__auth">
                        <a href="#"><i class="fa fa-user"></i> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>