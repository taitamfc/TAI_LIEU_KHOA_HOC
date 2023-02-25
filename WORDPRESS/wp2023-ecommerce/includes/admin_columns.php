<?php
//Hiện thị các cột của postype sản phẩm
add_filter('manage_product_posts_columns','wp2023_admin_columns_product_filter_comlums');
function wp2023_admin_columns_product_filter_comlums($comlums){
    $comlums['product_price']       = 'Giá bán';
    $comlums['product_price_sale']  = 'Giá khuyến mãi';
    $comlums['product_stock']       = 'Số lượng';
    return $comlums;
}
// Hiển thị giá trị các cột ra
add_action('manage_product_posts_custom_column','wp2023_admin_columns_product_render_comlums',10,2);
function wp2023_admin_columns_product_render_comlums($column, $post_id){
    switch ($column) {
        case 'product_price':
            $product_price = get_post_meta($post_id,'product_price',true);
            echo number_format($product_price);
            break;
        case 'product_price_sale':
            $product_price_sale = get_post_meta($post_id,'product_price_sale',true);
            echo number_format($product_price_sale);
            break;
        case 'product_stock':
            echo get_post_meta($post_id,'product_stock',true);
            break;
    }
}

//Hiện thị các cột của taxonomy product_cat
add_filter('manage_edit-product_cat_columns','wp2023_admin_columns_taxonomy_filter_comlums');
function wp2023_admin_columns_taxonomy_filter_comlums($comlums){
    $comlums['image'] = 'Ảnh';
    return $comlums;
}
// Hiện thị giá trị cột image
add_action('manage_product_cat_custom_column','wp2023_admin_columns_taxonomy_render_comlums',10,3);
function wp2023_admin_columns_taxonomy_render_comlums($out, $column, $term_id){
    if( $column == 'image' ){
        $image = get_term_meta($term_id,'image',true);
        echo $image;
    }
}