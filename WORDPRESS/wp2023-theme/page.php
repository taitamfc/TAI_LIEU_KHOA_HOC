<?php global $theme_uri; ?>
<?php get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('template-parts/page/breadcrumb');?>

    <section class="page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
<?php get_footer(); ?>