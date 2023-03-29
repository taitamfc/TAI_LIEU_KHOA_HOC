<?php
    global $wp_the_query;
    $countPosts = $wp_the_query->post_count;
    $order_by = isset( $_GET['order_by'] ) ? $_GET['order_by'] : 'id_desc';
?>
<div class="filter__item">
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="filter__sort">
                <form action="" method="get">
                    <span>Sort By</span>
                    <select name="order_by" onchange="this.form.submit()">
                        <option <?= $order_by == 'id_desc' ? 'selected' : ''; ?> value="id_desc">Mới nhất</option>
                        <option <?= $order_by == 'id_asc' ? 'selected' : ''; ?> value="id_asc">Cũ nhất</option>
                        <option <?= $order_by == 'price_desc' ? 'selected' : ''; ?> value="price_desc">Giá giảm dần</option>
                        <option <?= $order_by == 'price_asc' ? 'selected' : ''; ?> value="price_asc">Giá tăng dần</option>
                    </select>
                </form>
                
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="filter__found">
                <h6>Tìm thấy: <span><?= $countPosts;?></span> sản phẩm</h6>
            </div>
        </div>
        <div class="col-lg-4 col-md-3">
            <div class="filter__option">
                <span class="icon_grid-2x2"></span>
                <span class="icon_ul"></span>
            </div>
        </div>
    </div>
</div>