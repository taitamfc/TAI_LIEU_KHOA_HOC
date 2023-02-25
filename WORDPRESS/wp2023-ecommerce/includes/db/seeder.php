<?php
global $wpdb;
$tbl_orders = $wpdb->prefix.'wp2023_orders';//wp_wp2023_orders
$tbl_order_detail = $wpdb->prefix.'wp2023_order_detail';//wp_wp2023_order_detail

// Chèn dữ liệu mẫu vào
$orders = [
    [
        'created' => '2023-02-06',
        'total'   => '20000',
        'status'  => 'pending',
        'payment_method'    => 'cod',
        'customer_name'     => 'NVA',
        'customer_phone'    => '0123456789',
        'customer_email'    => 'NVA@gmail.com',
        'customer_address'  => 'QT',
        'note'              => 'Giao nhanh',  
    ],
    [
        'created' => '2023-02-06',
        'total'   => '20000',
        'status'  => 'pending',
        'payment_method'    => 'cod',
        'customer_name'     => 'NVB',
        'customer_phone'    => '0123456789',
        'customer_email'    => 'NVB@gmail.com',
        'customer_address'  => 'QT',
        'note'              => 'Giao nhanh',  
    ],
    [
        'created' => '2023-02-06',
        'total'   => '20000',
        'status'  => 'pending',
        'payment_method'    => 'cod',
        'customer_name'     => 'NVC',
        'customer_phone'    => '0123456789',
        'customer_email'    => 'NVC@gmail.com',
        'customer_address'  => 'QT',
        'note'              => 'Giao nhanh',  
    ]
];
foreach( $orders as $order ){
    $wpdb->insert( $tbl_orders, $order );
}

$order_details = [
    [
        'order_id' => 1,
        'product_id' => 1,
        'quantity' => 1,
        'price' => 1000,
    ],
    [
        'order_id' => 1,
        'product_id' => 2,
        'quantity' => 1,
        'price' => 1000,
    ],
    [
        'order_id' => 2,
        'product_id' => 2,
        'quantity' => 1,
        'price' => 1000,
    ]
];

foreach( $order_details as $order_detail ){
    $wpdb->insert( $tbl_order_detail, $order_detail );
}