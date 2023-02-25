<?php
//Đăng ký cấu hình
/*
    $option_group: wp2023_settings_page
    $option_name: wp2023_settings_options

    wp2023_settings_section_shop_info: Thông tin cửa hàng
        wp2023_settings_field_name: Tên cửa hàng
        wp2023_settings_field_phone: Số điện thoại
        wp2023_settings_field_email: Địa chỉ email
    wp2023_settings_section_payment: Thông tin cửa hàng
        wp2023_settings_field_bank_name: Tên ngân hàng
        wp2023_settings_field_bank_number: Số tài khoản
        wp2023_settings_field_bank_user: Chủ tài khoản
*/


add_action( 'admin_init', 'wp2023_settings_init' );
function wp2023_settings_init(){
    /*
    register_setting( 'wporg', 'wporg_options' );
    add_settings_section( string $id, string $title, callable $callback, string $page, array $args = array() )
    add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
    */
    register_setting('wp2023_settings_page','wp2023_settings_options');
    
    add_settings_section(
        'wp2023_settings_section_shop_info',
        'Thông tin cửa hàng',
        'wp2023_settings_section_shop_info_callback',
        'wp2023_settings_page'
    );
        add_settings_field(
            'wp2023_settings_field_name',
            'Tên cửa hàng',
            'wp2023_settings_field_render',
            'wp2023_settings_page',
            'wp2023_settings_section_shop_info',
            [
                'label_for' => 'wp2023_settings_field_name',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        add_settings_field(
            'wp2023_settings_field_phone',
            'Số điện thoại',
            'wp2023_settings_field_render',
            'wp2023_settings_page',
            'wp2023_settings_section_shop_info',
            [
                'label_for' => 'wp2023_settings_field_phone',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        add_settings_field(
            'wp2023_settings_field_email',
            'Email',
            'wp2023_settings_field_render',
            'wp2023_settings_page',
            'wp2023_settings_section_shop_info',
            [
                'label_for' => 'wp2023_settings_field_email',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
    add_settings_section(
        'wp2023_settings_section_payment',
        'Thông tin thanh toán',
        'wp2023_settings_section_payment_callback',
        'wp2023_settings_page'
    );
        add_settings_field(
            'wp2023_settings_field_bank_name',
            'Tên ngân hàng',
            'wp2023_settings_field_render',
            'wp2023_settings_page',
            'wp2023_settings_section_payment',
            [
                'label_for' => 'wp2023_settings_field_bank_name',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        add_settings_field(
            'wp2023_settings_field_bank_number',
            'Số tài khoản',
            'wp2023_settings_field_render',
            'wp2023_settings_page',
            'wp2023_settings_section_payment',
            [
                'label_for' => 'wp2023_settings_field_bank_number',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        add_settings_field(
            'wp2023_settings_field_bank_user',
            'Chủ tài khoản',
            'wp2023_settings_field_render',
            'wp2023_settings_page',
            'wp2023_settings_section_payment',
            [
                'label_for' => 'wp2023_settings_field_bank_user',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
}

function wp2023_settings_section_shop_info_callback(){
    echo '<p>Thông tin về cửa hàng của bạn</p>';
}

function wp2023_settings_section_payment_callback(){
    echo '<p>Thông tin về tài khoản ngân hàng</p>';
}

function wp2023_settings_field_render($args){
    $type = isset( $args['type'] ) ? $args['type'] : 'text';
    $options = get_option('wp2023_settings_options');

    switch ($type) {
        case 'text':
            ?>
            <input type="text" 
                name="wp2023_settings_options[<?= $args['label_for'];?>]" 
                value="<?= $options[$args['label_for']]; ?>" 
            >
            <?php
            break;
        case 'password':
            ?>
            <input type="password" 
                name="wp2023_settings_options[<?= $args['label_for'];?>]"
                value="<?= $options[$args['label_for']]; ?>" 
            >
            <?php
            break;
    }
}