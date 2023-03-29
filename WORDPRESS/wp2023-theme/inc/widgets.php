<?php
global $theme_dir;
include_once $theme_dir.'/inc/widgets/WP2023_Recent_News.php';
include_once $theme_dir.'/inc/widgets/WP2023_Tags.php';
include_once $theme_dir.'/inc/widgets/WP2023_ProductCategories.php';
include_once $theme_dir.'/inc/widgets/WP2023_ProductFilterPrice.php';
include_once $theme_dir.'/inc/widgets/WP2023_LastProduct.php';

add_action( 'widgets_init', 'wp2023_register_widgets' );

function wp2023_register_widgets(){
    // Đăng ký sidebar
    register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar','wp2023-theme' ),
			'description'   => __( 'A short description of the sidebar.','wp2023-theme' ),
			'before_widget' => '<div id="%1$s" class="blog__sidebar__item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Footer 1 Sidebar','wp2023-theme' ),
			'description'   => __( 'A short description of the sidebar.','wp2023-theme' ),
			'before_widget' => '<div class="footer__widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-footer-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Footer 2 Sidebar','wp2023-theme' ),
			'description'   => __( 'A short description of the sidebar.','wp2023-theme' ),
			'before_widget' => '<div class="footer__widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'Footer 3 Sidebar','wp2023-theme' ),
			'description'   => __( 'A short description of the sidebar.','wp2023-theme' ),
			'before_widget' => '<div class="footer__widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'wp2023-theme' ),
		'id'            => 'shop-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wp2023-theme' ),
		'before_widget' => '<div id="%1$s" class="sidebar__item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	) );

    register_widget( 'WP2023_Recent_News' );
    register_widget( 'WP2023_Tags' );
    register_widget( 'WP2023_ProductCategories' );
    register_widget( 'WP2023_ProductFilterPrice' );
    register_widget( 'WP2023_LastProduct' );
}