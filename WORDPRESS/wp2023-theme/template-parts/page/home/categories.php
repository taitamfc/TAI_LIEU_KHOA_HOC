<?php global $theme_uri; ?>
<?php
    $product_cats = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
    ) );

?>
<?php if( count($product_cats) ):?>
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach( $product_cats as $product_cat ):?>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= $theme_uri;?>/img/categories/cat-1.jpg">
                        <h5><a href="<?= get_term_link($product_cat); ?>"><?= $product_cat->name; ?></a></h5>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif;?>