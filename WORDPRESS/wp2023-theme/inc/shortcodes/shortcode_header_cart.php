<div class="header__cart">
    <ul>
        <?php if($show_wishlist):?>
        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
        <?php endif; ?>
        <?php if($show_cart):?>
        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span class="cart_count">0</span></a></li>
        <?php endif; ?>
    </ul>
    <?php if($show_total):?>
    <div class="header__cart__price cart_total_format" >item: <span>$150.00</span></div>
    <?php endif; ?>
</div>