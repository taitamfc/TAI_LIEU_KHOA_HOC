<?php
//Định nghĩa hành động khi plugin bị gỡ
// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}
// Xóa CSDL
include_once WP2023_PATH.'includes/db/migration-rollback.php';
// Xóa option
delete_option('wp2023_settings_options');
