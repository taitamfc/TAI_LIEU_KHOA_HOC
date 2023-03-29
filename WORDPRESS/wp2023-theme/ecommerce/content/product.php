<?php
$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_id();
$product_image = wp_get_attachment_image_url( get_post_thumbnail_id($post_id) );
$price      = get_post_meta($post_id,'product_price',true);

?>
<div class="product__item">
    <div class="product__item__pic set-bg" data-setbg="<?= $product_image;?>">
        <ul class="product__item__pic__hover">
            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
    </div>
    <div class="product__item__text">
        <h6>
            <a href="<?= get_the_permalink($post_id);?>">
                <?= get_the_title($post_id);?>
            </a>
        </h6>
        <h5><?= number_format($price);?></h5>
    </div>
</div>