<?php
// Tạo bảng
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//dbDelta( $sql );
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$tbl_orders = $wpdb->prefix.'wp2023_orders';//wp_wp2023_orders
$tbl_order_detail = $wpdb->prefix.'wp2023_order_detail';//wp_wp2023_order_detail

$sql = "
CREATE TABLE `$tbl_orders` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `created` date DEFAULT NULL,
    `total` double NOT NULL,
    `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `payment_method` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `customer_name` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `customer_phone` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `customer_email` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `customer_address` text COLLATE utf8mb4_unicode_520_ci,
    `note` text COLLATE utf8mb4_unicode_520_ci,
    `deleted` tinyint(4) DEFAULT '0',
    PRIMARY KEY  (id)
  ) ". $charset_collate .";" ;

dbDelta( $sql );

$sql = "CREATE TABLE `$tbl_order_detail` (
    `id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `order_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `price` double NOT NULL,
    PRIMARY KEY  (id)
    ) ". $charset_collate .";" ;
dbDelta( $sql );