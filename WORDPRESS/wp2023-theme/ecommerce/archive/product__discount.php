<?php
    $term = get_queried_object();
    $product__discounts = get_posts([
        'post_type'     => 'product',
        'numberposts'   => 6,
        'post_status'   => 'publish',
        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => [$term->term_id]
            ]
        ],
        'meta_query' => [
            [
                'key' => 'product_price_sale',//meta_key > 0
                'value' => 0,
                'compare' => '>'
            ]
        ]
    ]);
?>
<div class="product__discount">
    <div class="section-title product__discount__title">
        <h2>Sale Off</h2>
    </div>
    <div class="row">
        <div class="product__discount__slider owl-carousel">
            <?php foreach( $product__discounts as $product__discount ):?>
            <div class="col-lg-4">
                <?php get_template_part('ecommerce/content/product',null,['post_id' => $product__discount->ID ]);?>
            </div>
            <?php endforeach; ?>    
        </div>
    </div>
</div>