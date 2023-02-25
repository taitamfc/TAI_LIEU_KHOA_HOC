<?php
// Xóa CSDL
global $wpdb;
$tbl_orders = $wpdb->prefix.'wp2023_orders';//wp_wp2023_orders
$tbl_order_detail = $wpdb->prefix.'wp2023_order_detail';//wp_wp2023_order_detail

$sql = "DROP TABLE IF EXISTS $tbl_order_detail";
$wpdb->query( $sql );

$sql = "DROP TABLE IF EXISTS $tbl_orders";
$wpdb->query( $sql );