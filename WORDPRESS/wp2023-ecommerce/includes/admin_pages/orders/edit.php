<?php
$order_id = isset( $_GET['order_id'] ) ? $_GET['order_id'] : 0;
if( $order_id ){
    $objWp2023Order = new Wp2023Order();
    $order = $objWp2023Order->find($order_id);
    $order_items = $objWp2023Order->order_items($order_id);
}    

if( isset( $_POST['wp2023_save_order'] ) ){
    check_admin_referer( 'wp2023-update_order');

    // Người dùng đang lưu order
    $order_status   = isset($_REQUEST['order_status']) ? $_REQUEST['order_status'] : '';
    $note           = isset($_REQUEST['note']) ? $_REQUEST['note'] : '';

    $note = sanitize_text_field($note);

    $objWp2023Order->update($order_id,[
        'status'    => $order_status,
        'note'      => $note,
    ]);

    wp2023_redirect('admin.php?page=wp2023-orders&order_id='.$order_id);
    exit();
    
}
?>
<style>
table.form-table.bordered th,table.form-table.bordered td {
    border: 1px solid #ccc;
    text-align: center;
}
</style>
<div class="wrap">
    <h1 class="wp-heading-inline">Chi tiết đơn hàng: <?= $order->id; ?></h1>
    <form id="posts-filter" method="post">
        <?php wp_nonce_field( 'wp2023-update_order');?>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <!-- Left columns -->
                <div id="post-body-content">
                    <!-- Thông tin đơn hàng -->
                    <div class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle ui-sortable-handle">Thông tin đơn hàng</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table  ">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <td> <?= $order->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td> <?= date('d-m-Y',strtotime($order->created)); ?></td>
                                </tr>
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td> <?= $order->customer_name; ?> </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td> <?= $order->customer_phone; ?> </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> <?= $order->customer_email; ?> </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td> <?= esc_html($order->customer_address); ?> </td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>
                                        <p><?= esc_html($order->note); ?></p>
                                        <textarea name="note" rows="5" class="large-text"><?= $order->note; ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Chi tiết đơn hàng -->
                    <div class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle">Chi tiết đơn hàng</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table bordered">
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                <?php foreach( $order_items as $order_item ):?>
                                <tr>
                                    <td><?= $order_item->product_id; ?></td>
                                    <td><?= $order_item->product_name; ?></td>
                                    <td><?= $order_item->quantity; ?></td>
                                    <td><?= number_format($order_item->price); ?></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Right columns -->
                <div id="postbox-container-1">
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2 class="hndle">Hành động</h2>
                        </div>
                        <div class="inside">
                            <div class="submitbox">
                                <p>
                                    <select name="order_status" class="large-text ">
                                        <option <?= $order->status == 'pending' ? 'selected' : ''; ?> value="pending">Đơn hàng mới</option>
                                        <option <?= $order->status == 'completed' ? 'selected' : ''; ?> value="completed">Đơn đã hoàn thành</option>
                                        <option <?= $order->status == 'canceled' ? 'selected' : ''; ?> value="canceled">Đơn đã hủy</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="submit" name="wp2023_save_order" id="submit" class="button button-primary"
                                        value="Lưu thay đổi">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>