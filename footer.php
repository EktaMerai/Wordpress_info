<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
			<?php astra_content_bottom(); ?>

			</div> <!-- ast-container -->

		</div><!-- #content -->

		<?php astra_content_after(); ?>

		<?php astra_footer_before(); ?>

		<?php astra_footer(); ?>

		<?php astra_footer_after(); ?>

	</div><!-- #page -->

	<?php astra_body_bottom(); ?>

	<?php  wp_footer(); ?>

<?php 
if ( is_product() ) { 
if(get_post_meta(get_the_ID(), '_non_supplement', true) == 'yes'){
?>
<style> .single-product span.woocommerce-Price-amount.amount:after{ display:none !important; }a[href="#product-options"] { display: none !important; } .elementor-element.elementor-element-178a72a.elementor-mobile-align-center.buy-now-button.elementor-widget.elementor-widget-button { display: none; } section#product-options { display: none; }  .non_supplement button.single_add_to_cart_button.button.alt { background-image: radial-gradient(farthest-corner at 104px 10px, #fee839 6%, #fd8435 75%) !important; background-repeat: no-repeat;  background-size: cover; background-position: center;  height: 60px; color: #000 !important; display: inline-flex; align-items: center; justify-content: center; box-sizing: border-box; transition: all 0.06s ease-out; position: relative; font-family: 'Poppins' !important;font-weight: 700; font-size:18px; text-transform: uppercase; min-width: 250px; border-width: 0px 0px 1px 0px !important;  border-color: #fee839 !important; border-radius: 5px; width: auto; margin: 0px; } .non_supplement button.single_add_to_cart_button.button.alt:after { display: inline-block; content: ""; position: absolute; left: 0; right: 0; z-index: -49; top: 9px; border-radius: 10px; height: 60px; background: linear-gradient(to bottom, #fdb936 100%, #fed337 6px); transition: all 0.078s ease-out;   box-shadow: 0 1px 0 0px rgb(253 132 53), 0 -2px 0.4px rgb(255 140 56), 0 7.8px 12px rgb(250 125 54); } .non_supplement button.single_add_to_cart_button.button:before { content: "\f07a"; font-family: "Font Awesome 5 Free"; font-weight: 900; margin-left: 25px; font-size: 18px; position: absolute;  right: 40px !important; } .non_supplement button.single_add_to_cart_button.button:hover {  background-image: radial-gradient(farthest-corner at 104px 10px, #fd8435 6%, #fd8435 75%) !important; } .non_supplement .quantity.sm-quantity-input { display: none !important; }.count-cart-total {background: #f37921 !important;color: #fff !important;}
</style>
<?php 	
}else{
	?>
	<style> .non_supplement{ display:none !important; } </style>
	<?php
}
} 
?>

<!-- Start of conscious Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=ac59f08c-81d2-4ee4-8acc-e5d35fa8fb53"> </script>
<!-- End of conscious Zendesk Widget script -->



<script>
jQuery(document).ready(function() {   

	var item_count = jQuery('table.shop_table.cart.woocommerce-cart-form__contents.wl-ci-cart-table tbody tr.cart_item').length;
	jQuery('th.product-thumbnail.wl-product-thumbnail.wl-ci-heading').html('<span class="item_number">'+item_count+'</span>ITEMS');
	 /* vat count_items = localStorage.getItem('cart_count')  */
	 jQuery('.header-cart-count').text(item_count);
	jQuery('th.product-thumbnail.wl-product-thumbnail.wl-ci-heading').attr('colspan','2');

	
    jQuery('.product-menu a, .shop_mega_menu').hover(function(){     
        jQuery('.shop_mega_menu').addClass('shop_mega_menu-active');    
    },     
    function(){    
        jQuery('.shop_mega_menu').removeClass('shop_mega_menu-active');     
    });
});   



var myVar = setInterval(myTimer, 1000);

function myTimer() {
	 var item_count = jQuery('table.shop_table.cart.woocommerce-cart-form__contents.wl-ci-cart-table tbody tr.cart_item').length; 
	 console.log(item_count);
	/* var item_count =  jQuery( "table.shop_table.cart.woocommerce-cart-form__contents.wl-ci-cart-table" ).find( "tbody tr.cart_item" ).length; */
	jQuery('th.product-thumbnail.wl-product-thumbnail.wl-ci-heading').html('<span class="item_number">'+item_count+'</span>ITEMS');
	 jQuery('.header-cart-count').text(item_count); 
	jQuery('th.product-thumbnail.wl-product-thumbnail.wl-ci-heading').attr('colspan','2');
	jQuery('.quantity').addClass('buttons_added');
	 /* localStorage.setItem('cart_count', cart_count);  */
	
	jQuery('input.plus').click(function(){
		 
		jQuery('[name=update_cart]').trigger('click');
	});
	jQuery('input.minus').click(function(){
		 
		jQuery('[name=update_cart]').trigger('click');
	});
}

function myStopFunction() {
  clearInterval(myVar);
}
</script>

</body>
</html>
