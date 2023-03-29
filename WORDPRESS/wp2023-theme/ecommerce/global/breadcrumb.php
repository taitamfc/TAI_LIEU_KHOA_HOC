<?php global $theme_uri;?>
<?php
    $page_name = 'Cửa hàng';
    if( is_tax() ){
        $term = get_queried_object();
        $page_name = $term->name;
    }
?>
<section class="breadcrumb-section set-bg" 
    data-setbg="<?= $theme_uri; ?>/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $page_name; ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= home_url();?>">Trang chủ</a>
                        <span><?= $page_name; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>