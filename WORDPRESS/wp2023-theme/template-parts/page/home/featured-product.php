<?php global $theme_uri; ?>
<?php 
$lasted_products = get_posts([
    'post_type' => 'product',
    'numberposts' => '8'
]);
?>
<?php if( count($lasted_products) ):?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach( $lasted_products as $lasted_product ):?>
                    <?php
                        $price = get_post_meta($lasted_product->ID,'product_price',true);
                        $price_sale = get_post_meta($lasted_product->ID,'product_price_sale',true);
                        $thumbnail_id = (int)get_post_meta( $lasted_product->ID, '_thumbnail_id', true );//int
                        $product_image = wp_get_attachment_image_url( $thumbnail_id );
                    ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= $product_image;?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?= get_the_permalink($lasted_product->ID);?>"><?= get_the_title($lasted_product->ID);?></a></h6>
                            <h5><?= number_format($price); ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </section>
<?php endif;?>