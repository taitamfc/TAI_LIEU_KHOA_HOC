<?php
add_shortcode('wp2023_page_cart','wp2023_shortcode_wp2023_page_cart');
function wp2023_shortcode_wp2023_page_cart(){
    global $theme_dir;
    ob_start();
    include_once $theme_dir.'/ecommerce/inc/shortcodes/wp2023_page_cart.php';
    return ob_get_clean();
}
