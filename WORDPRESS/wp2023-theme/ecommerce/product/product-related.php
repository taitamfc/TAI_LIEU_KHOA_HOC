<?php
    global $post;
    //Lấy các term của bài viết hiện tại
    $cat_ids = wp_get_post_terms($post->ID,'product_cat',['fields'=>'ids']);
    //Tìm các sản phẩm thuộc term đó, 
    //và ko phải là id hiện tại
    $post_id = $post->ID;
    $args = [
        'numberposts' => 4,
        'post_type' => 'product',
        'tax_query' => [
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $cat_ids
        ],
        'exclude'   => [$post_id]
    ];
    $related_products = get_posts($args);
?>
<?php if($related_products):?>
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm tương tự</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach( $related_products as $related_product ):?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <?php get_template_part('ecommerce/content/product',null,['post_id' => $related_product->ID]);?>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</section>
<?php endif;?>