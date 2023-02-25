<?php
    global $post;
    $post_id = $post->ID;
    $post_categories = wp_get_post_categories( $post_id );
    $args = [
        'post_type' => 'post',
        'numberposts' => 3,
        'category ' => implode(',',$post_categories),
        'exclude'   => [$post_id]
    ];
    $related_posts = get_posts($args);
?>
<?php if( count($related_posts) ):?>
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Post You May Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach( $related_posts as $related_post ):?>
            <div class="col-lg-4 col-md-4 col-sm-6">
            <?php get_template_part('template-parts/post/content',null,[
                'post_id' => $related_post->ID
            ]);?>
            </div>
            <?php endforeach;?>
            
        </div>
    </div>
</section>
<?php endif;?>