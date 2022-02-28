<?php 
/*Display banner in between product like after 4 product*/
/* https://www.dictionary.com/ */
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
// hide prices
add_action('wp', 'hidePriceAddCartNotLoggedIn');
function hidePriceAddCartNotLoggedIn() 
{   
    if (is_user_logged_in() === false) {      
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 50);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
           
        add_action('woocommerce_single_product_summary', 'printLoginToSeePrices', 31);
    }
}

function printLoginToSeePrices() 
{
    echo '<a class="login-to-see-prices" href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . 'Wilt u artikelen uit onze webshop bestellen? Log hier in.</a>';
}

// Prevent default login by wc
function newUserApproveAutologout($redirect) {
    if (is_user_logged_in() === false) {
        return $redirect;
    }

    $approved = get_user_meta(wp_get_current_user()->ID, 'pw_user_status', true )  === 'approved';

    if ($approved) { 
        return $redirect;
    } else {
        wp_logout();
        wp_clear_auth_cookie(); 

        do_action('woocommerce_set_cart_cookies',  true);
        wc_add_notice(__('Registratie succesvol! Je account wordt beoordeeld.', 'woocommerce'), 'notice');

        return get_permalink(6351);
    }
}
add_action('woocommerce_registration_redirect', 'newUserApproveAutologout', 2);

add_action('woocommerce_before_shop_loop', 'displayShopText');
function displayShopText() {
    if (is_shop()) {
        echo do_shortcode("[av_sidebar widget_area='Webshop tekst']");
    }
}

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );
function woocommerce_template_loop_stock() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() ){
        echo '<span class="stock out-of-stock">Out of Stock</span>';
	}else {
		echo '<span class="stock"><span class="in_stock_icon"></span>Op voorraad</span>';
	}
    if ( $product->is_on_backorder() == true ) {
               echo '<span class="stock vanviegen_backorder_stock"><span class="in_stock_icon"></span>Levering op bestelling</span>';
      } 
}
?>
