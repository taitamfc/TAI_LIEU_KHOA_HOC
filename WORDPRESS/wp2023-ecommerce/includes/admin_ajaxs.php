<?php
// Khi đã đăng nhập
add_action( 'wp_ajax_wp2023_order_change_status', 'wp2023_order_change_status' );
// Khi chưa đăng nhập
add_action( 'wp_ajax_nopri_wp2023_order_change_status', 'wp2023_order_change_status' );

function wp2023_order_change_status(){
    $order_id = $_REQUEST['order_id'];
    $status = $_REQUEST['status'];
    $nonce = $_REQUEST['_wpnonce'];

    // check_ajax_referer('wp2023_update_order_status');

    if( wp_verify_nonce($nonce,'wp2023_update_order_status') ){
        $objWp2023Order = new Wp2023Order();
        $objWp2023Order->change_status($order_id,$status);
        $res = [
            'success' => true
        ];
    }else{
        $res = [
            'success' => false
        ];
    }
    echo json_encode($res);
    die();
}