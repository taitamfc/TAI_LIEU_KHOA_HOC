<?php global $theme_uri; ?>
    <?php get_header(); ?>

    <!-- Breadcrumb Section Begin -->
    <?php get_template_part('template-parts/page/breadcrumb');?>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <?php get_sidebar(); ?>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <!-- Start Loop -->
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <?php get_template_part('template-parts/post/content',null,['post_id'=>get_the_id()]);?>
                        </div>
                        <?php endwhile;?>
                        <!-- End loop -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <?= get_the_posts_pagination();?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <?php get_footer(); ?>