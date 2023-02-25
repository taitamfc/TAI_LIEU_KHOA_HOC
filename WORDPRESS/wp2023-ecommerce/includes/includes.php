<?php
// Tạo ra các funtions hỗ trợ
include_once WP2023_PATH.'includes/functions.php';

// Đăng ký post_types và taxonomy
include_once WP2023_PATH.'includes/post_types.php';

// Đăng ký metaboxes
include_once WP2023_PATH.'includes/metaboxes.php';

//Thêm các cột vào custom postype và custom taxonomy
include_once WP2023_PATH.'includes/admin_columns.php';

// Tạo menu cho admin
include_once WP2023_PATH.'includes/admin_menus.php';

// Làm việc với CSDL trong wordpress
include_once WP2023_PATH.'includes/classes/Wp2023Order.php';

// Sử dụng ajax trong php
include_once WP2023_PATH.'includes/admin_ajaxs.php';

// Tạo trang settings cho admin
include_once WP2023_PATH.'includes/admin_settings.php';

// Tạo api trong wordpress
include_once WP2023_PATH.'includes/apis.php';

