<?php
add_action('customize_register','wp2023_customize_register');
function wp2023_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'header_section', array(
        'title' => __( 'Header Setting','wp2023-theme' ),
        'priority' => 10
    ) );    
        wp2023_custom_add_input($wp_customize,'header_top_left','header_section','Header top left','textarea');
        wp2023_custom_add_input($wp_customize,'header_top_social','header_section','Header top social','textarea');

    $wp_customize->add_section( 'contact_section', array(
        'title' => __( 'Contact Setting','wp2023-theme' ),
        'priority' => 11
    ) );
        wp2023_custom_add_input($wp_customize,'contact_phone','contact_section','Contact phone');
        wp2023_custom_add_input($wp_customize,'contact_email','contact_section','Contact email');
        wp2023_custom_add_input($wp_customize,'contact_open_time','contact_section','Contact open time');
        wp2023_custom_add_input($wp_customize,'contact_address','contact_section','Contact address');

}

function wp2023_custom_add_input($wp_customize,$setting_id,$section_id,$label,$type = 'text'){
    $wp_customize->add_setting( $setting_id, array(
        'default' => '',
    ));
    $wp_customize->add_control($setting_id,[
        'section' => $section_id,
        'settings' => $setting_id,
        'label' => __( $label,'wp2023-theme' ),
        'type' => $type,
    ]);
    return $wp_customize;
}