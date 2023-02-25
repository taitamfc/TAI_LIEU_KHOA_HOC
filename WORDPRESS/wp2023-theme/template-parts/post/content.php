<?php
$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_id();
?>
<div class="blog__item">
    <div class="blog__item__pic">
        <?= get_the_post_thumbnail( $post_id,'medium' );?>
    </div>
    <div class="blog__item__text">
        <ul>
            <li><i class="fa fa-calendar-o"></i> <?= get_the_date('',$post_id);?></li>
            <li><i class="fa fa-comment-o"></i> <?= get_comments_number($post_id);?></li>
        </ul>
        <h5><a href="<?= get_the_permalink($post_id);?>"><?= get_the_title($post_id);?></a></h5>
        <p><?= get_the_excerpt($post_id);?></p>
        <a href="<?= get_the_permalink($post_id);?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
    </div>
</div>