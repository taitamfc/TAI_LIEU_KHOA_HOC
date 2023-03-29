console.log(custom_js_object);
get_cart();

function initInputQty(){
    var proQty = jQuery('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = jQuery(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}

function delete_cart(id){
    let options = {
        url : custom_js_object.ajaxurl+'?action=wp2023_delete_cart',
        method: 'POST',
        dataType: 'json',
        data: {
            id : id
        },
        success: function(res){
            get_cart();
        }
    }
    jQuery.ajax(options); 
}
function get_cart(){
    let options = {
        url : custom_js_object.ajaxurl+'?action=wp2023_get_cart',
        method: 'GET',
        dataType: 'json',
        success: function(res){
            jQuery('#cart_content').html(res.fragments.cart_html);
            jQuery('.cart_total_format').html(res.fragments.cart_total_format);
            jQuery('.cart_count').html(res.fragments.cart_count);
            initInputQty();
        }
    }
    jQuery.ajax(options); 
}

function update_cart(){
    let options = {
        url : custom_js_object.ajaxurl+'?action=wp2023_update_cart',
        method: 'POST',
        dataType: 'json',
        data: jQuery('#form-cart').serialize(),
        success: function(res){
            get_cart();
        }
    }
    jQuery.ajax(options); 
}
function add_to_cart(){
    let product_qty = jQuery('#product_qty').val();
    let product_id  = jQuery('#product_id').val();

    let options = {
        url : custom_js_object.ajaxurl,
        method: 'POST',
        dataType: 'json',
        data: {
            action : 'wp2023_add_to_cart',
            nonce : custom_js_object.nonce,
            qty : product_qty,
            product_id : product_id
        },
        success: function(res){
            console.log(res);
        }
    }
    jQuery.ajax(options);
}
jQuery( document ).ready( function(){
    jQuery('#update_cart').click(function(){
        update_cart();
    });

    jQuery('#add_to_cart').click(function(){
        add_to_cart();
    });
    jQuery('body').on('click','.delete_cart',function(){
        let id = jQuery(this).data('id');
        delete_cart(id);
    });
});