<?php
    $objWp2023Order = new Wp2023Order();
    $result = $objWp2023Order->paginate(2);
    extract($result);
    /*
    items
    total_pages
    total_items
    */
    $action = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : '';
    if( $action == 'trash' ){
        $orderIds = $_REQUEST['post'];
        if( count( $orderIds ) ){
            foreach( $orderIds as $orderId ){
                $objWp2023Order->trash($orderId);
            }
        }
        wp2023_redirect('admin.php?page=wp2023-orders');
        exit();
    }

    if( isset( $_GET['order_id'] ) && $_GET['order_id'] != '' ){
        include WP2023_PATH.'includes/admin_pages/orders/edit.php';
    }else{
        include WP2023_PATH.'includes/admin_pages/orders/list.php';
    }
?>


