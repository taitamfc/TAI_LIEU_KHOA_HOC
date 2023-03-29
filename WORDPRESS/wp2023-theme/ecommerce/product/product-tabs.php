<?php
global $post;
$number_comments = get_comments_number($post->ID);
?>
<div class="product__details__tab">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                aria-selected="true">Mô tả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                aria-selected="false">Đánh giá <span>(<?= $number_comments;?>)</span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="product__details__tab__desc">
                <h6>Mô tả</h6>
                <div class="text">
                    <?= get_the_content();?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tabs-2" role="tabpanel">
            <div class="product__details__tab__desc">
                <h6>Đánh giá</h6>
                
            </div>
        </div>
    </div>
</div>