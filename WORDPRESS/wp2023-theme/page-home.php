<?php 
/* 
Template Name: Trang chủ
*/
?>
<?php global $theme_uri; ?>
<?php get_header(); ?>
 
    <!-- Categories Section Begin -->
    <?php get_template_part('template-parts/page/home/categories');?>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <?php get_template_part('template-parts/page/home/featured-product');?>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <?php get_template_part('template-parts/page/home/banner');?>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <?php //get_template_part('template-parts/page/home/latest-product');?>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <?php get_template_part('template-parts/page/home/blog');?>
    <!-- Blog Section End -->
<?php get_footer(); ?>