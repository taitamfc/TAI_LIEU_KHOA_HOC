<?php
// Product Screen: Màn hình chỉnh sửa/thêm mới sản phẩm
//Đăng ký meta box cho sản phẩm
add_action( 'add_meta_boxes', 'wp2023_meta_box_product' );

// Can thiệp vào hành động lưu bài viết
add_action( 'save_post', 'wp2023_save_post_product' );

function wp2023_save_post_product($post_id){
    if( $_REQUEST['post_type'] == 'product' ){
        // var_dump($post_id);die();
        if( isset($_REQUEST['product_price']) ){
            $product_price      = $_REQUEST['product_price'];
            update_post_meta($post_id,'product_price',$product_price);
        }
        if( isset($_REQUEST['product_price_sale']) ){
            $product_price_sale      = $_REQUEST['product_price_sale'];
            update_post_meta($post_id,'product_price_sale',$product_price_sale);
        }
        if( isset($_REQUEST['product_stock']) ){
            $product_stock      = $_REQUEST['product_stock'];
            update_post_meta($post_id,'product_stock',$product_stock);
        }
    }
}

function wp2023_meta_box_product(){
    add_meta_box(
        'wp2023_product_info',
        'Thông tin sản phẩm',
        'wp2023_meta_box_product_html',
        'product'
    );
}

function wp2023_meta_box_product_html(){
    include_once WP2023_PATH.'includes/templates/meta_boxe_product.php';
}

//Category screen
// Thêm ô input vào form add
add_action('product_cat_add_form_fields','wp2023_form_fields_add');
function wp2023_form_fields_add(){
    include_once WP2023_PATH.'includes/templates/meta_box_product_cat_add.php';
}
// Thêm ô input vào form edit
add_action('product_cat_edit_form_fields','wp2023_form_fields_edit',10,2);
function wp2023_form_fields_edit($tag,$taxonomy){
    include_once WP2023_PATH.'includes/templates/meta_box_product_cat_edit.php';
}
// Xử lý lưu term: save_term, insert_term, delete_term, get_term
add_action('saved_term','wp2023_product_cat_saved_term',10,1);
function wp2023_product_cat_saved_term($term_id){
    $image = $_REQUEST['image'];
    update_term_meta($term_id,'image',$image);
}