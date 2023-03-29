<?php
//pre_get_posts: filter, action
add_filter('pre_get_posts','wp2023_theme_pre_get_posts');
function wp2023_theme_pre_get_posts($query){

    if( $query->is_main_query() && is_tax('product_cat') ){
        $order_by = isset( $_GET['order_by'] ) ? $_GET['order_by'] : 'id_desc';
        switch ($order_by) {
            case 'id_asc':
                $query->set('ordeby','ID');
                $query->set( 'order', 'ASC' );
                break;
            case 'price_asc':
                $query->set( 'orderby', 'meta_value_num' );
                $query->set( 'meta_key', 'product_price' );
                $query->set( 'order', 'ASC' );
                break;
            case 'price_desc':
                $query->set( 'orderby', 'meta_value_num' );//sắp xếp dựa vào meta
                $query->set( 'meta_key', 'product_price' );
                $query->set( 'order', 'DESC' );
                break;
            default:
                # code...
                break;
        }
    }

    return $query;
}