<?php
class WP2023_LastProduct extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'WP2023_LastProduct', // Base ID
			'WP2023_LastProduct', // Name
			[
                'description' => __( 'Widget hiển thị các sản phẩm mới nhất', 'wp2023-theme' ) 
            ] // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
        $limit = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
        $args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'numberposts' => $limit
        ];
        $posts = get_posts( $args );
        $posts_arr = array_chunk($posts,3);
        ob_start();
        ?>
        <div class="latest-product__slider owl-carousel">
            <?php foreach( $posts_arr as $posts ):?>
            <div class="latest-prdouct__slider__item">
                <?php foreach( $posts as $post ):
                    $post_id = $post->ID;
                    $image      = wp_get_attachment_image_url( get_post_thumbnail_id($post_id) );
					$price      = get_post_meta($post_id,'product_price',true);
                ?>
                <a href="<?= get_the_permalink($post_id);?>" class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img src="<?= $image; ?>" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6><?=  get_the_title($post_id);?></h6>
						<span><?= number_format($price); ?></span>
                    </div>
                </a>
                <?php endforeach;?>
            </div>
            <?php endforeach;?>

        </div>
        <?php
		echo ob_get_clean();
		echo $after_widget;
	}

	public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : __( 'New title', 'wp2023-theme' );
        $limit = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		 </p>
         <p>
			<label for="<?php echo $this->get_field_name( 'limit' ); ?>"><?php _e( 'Limit:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>" />
		 </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		return $instance;
	}
}

new WP2023_LastProduct();