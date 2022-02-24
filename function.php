<?php 
/*Display banner in between product like after 4 product*/

add_action( 'woocommerce_shop_loop', 'action_woocommerce_shop_loop', 100 );
function action_woocommerce_shop_loop() {
    // Only on producy cayegory archives
    if ( is_product_category() ) :
        
    global $wp_query;
    
    // Get the number of columns set for this query
    $columns = esc_attr( wc_get_loop_prop( 'columns' ) );
    
    // Get the current post count 
    $current_post = $wp_query->current_post;
    
    if ( ( $current_post % $columns ) == 0  && $current_post == 4 ) :
    
    ?>
    <div class="contact_banner"><?php  if (is_active_sidebar('usp_banner')): dynamic_sidebar('contact_banner'); endif; ?></div>
	
    <ul class="products columns-<?php echo $columns; ?>">
    <?php
    endif; endif;
}

/*widget*/
function custom_widget_init() {
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'USP Banner', 'enfold' ),
			'id'            => 'usp_banner',
			'description'   => esc_html__( 'Add widgets here.', 'enfold' ),
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Contact Banner', 'enfold' ),
			'id'            => 'contact_banner',
			'description'   => esc_html__( 'Add widgets here.', 'enfold' ),
		)
	);
}
add_action( 'widgets_init', 'custom_widget_init' );

/* display widget value*/
<div class="contact_banner"><?php  if (is_active_sidebar('usp_banner')): dynamic_sidebar('contact_banner'); endif; ?></div>
?>
