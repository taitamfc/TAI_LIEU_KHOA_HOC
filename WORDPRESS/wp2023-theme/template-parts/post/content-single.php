<?php
$post_id = get_the_id();
?>
<div class="blog__details__text">
    <div class="blog__details__img">
        <?= get_the_post_thumbnail($post_id, 'large'); ?>
    </div>
    <div class="blog__details__description">
        <?= get_the_content();?>
    </div>
</div>
<div class="blog__details__content">
    <div class="row">
        <div class="col-lg-6">
            <div class="blog__details__author">
                <div class="blog__details__author__pic">
                <img src="<?= get_avatar_url( get_the_author_meta('ID') );?>" alt="">
                </div>
                <div class="blog__details__author__text">
                    <h6><?= get_the_author_meta('display_name');?></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="blog__details__widget">
                
                <ul>
                    <li>
                        <span>Categories:</span> 
                        <?php
                        $post_categories = get_the_category( $post_id );
                        foreach( $post_categories as $category ) {
                            echo '<a class="post-term" href="'.get_term_link($category).'">'.$category->name.'</a>';
                        }
                        ?>
                    </li>
                    <li>
                        <span>Tags:</span> 
                        <?php
                        $post_tags = wp_get_post_tags( $post_id );
                        foreach( $post_tags as $tag ) {
                            echo '<a class="post-term" href="'.get_term_link($tag).'">'.$tag->name.'</a>';
                        }
                        ?>
                    </li>
                </ul>
                <!-- <div class="blog__details__social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div> -->
            </div>
        </div>
    </div>
</div>