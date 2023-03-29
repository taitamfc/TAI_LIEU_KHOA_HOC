<?php
class WP_Cart {
    public function __construct(){
        add_action('init', [$this,'myStartSession']);
    }

    public function myStartSession(){
        if(!session_id()) {
            session_start();
        }
    }
    public function getCart(){
        $the_cart = $_SESSION['cart'];
        if($the_cart){
            $product_ids = array_keys($the_cart);

            $args = [
                'post_type' => 'product',
                'include'   => $product_ids
            ];
            $products = get_posts($args);
        }else{
            $products = [];
        }
        $cart = [];
        $cart['products'] = $products;
        $cart['the_cart'] = $the_cart;
        return $cart;
    }

    public function getCartTotal(){
        $the_cart = $_SESSION['cart'];
        $total = 0;
        if($the_cart){
            $product_ids = array_keys($the_cart);
            foreach( $product_ids as $product_id  ){
                $price      = get_post_meta($product_id,'product_price',true);
                $qty        = $the_cart[$product_id];
                $total      += ($qty *$price );
            }
        }
        return $total;
    }

    public function getFragments(){
        $cart = $_SESSION['cart'];
        $cart_total = $this->getCartTotal();
        return [
            'cart_count' => count($cart),
            'cart_total' => $cart_total,
            'cart_total_format' => number_format($cart_total),
            'cart_html'  => $this->getCartHtml()
        ];
    }
    public function getCartHtml(){
        ob_start();
        $cart_data = $this->getCart();
        ?>
        <?php if( count($cart_data['products']) ):?>
            <?php foreach( $cart_data['products'] as $product ):
                $post_id = $product->ID;
                $image      = wp_get_attachment_image_url( get_post_thumbnail_id($post_id) );
                $price      = get_post_meta($post_id,'product_price',true);
                $qty        = $cart_data['the_cart'][$post_id];
                $sub_total  = $price * $qty;
                ?>
            <tr>
                <td class="shoping__cart__item">
                    <img src="<?= $image; ?>" alt="">
                    <h5><?= get_the_title($post_id);?></h5>
                </td>
                <td class="shoping__cart__price">
                    <?= number_format($price); ?>
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input name="qty[<?= $post_id; ?>]" type="text" value="<?= $qty; ?>">
                        </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    <?= number_format($sub_total); ?>
                </td>
                <td class="shoping__cart__item__close">
                    <span data-id="<?= $post_id; ?>"  class="icon_close delete_cart"></span>
                </td>
            </tr>
            <?php endforeach;?>
        <?php endif;?>
        <?php
        return ob_get_clean();
    }
    public function addToCart($product_id,$quantity){
        $cart = $_SESSION['cart'];
        if( isset( $cart[$product_id] ) ){
            $cart[$product_id] = $cart[$product_id] + $quantity;
        }else{
            $cart[$product_id] = $quantity;
        }
        $_SESSION['cart'] = $cart;
    }
    public function updateCart($new_cart){
        $_SESSION['cart'] = $new_cart;
    }
    public function removeProductFromCart($product_id){
        $cart = $_SESSION['cart'];
        unset($cart[$product_id]);
        $_SESSION['cart'] = $cart;
    }

}
global $cart;
$cart = new WP_Cart();