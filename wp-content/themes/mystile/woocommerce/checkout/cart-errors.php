<?php
/**
 * Cart errors page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

	<div class="novedad-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-6 ">
	                <div id="take" class="carousel-
	                caption jumbotron fleft">
	                    <h1>Productos</h1>
	                    <p>You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water.</p>
	                </div>

	            </div>
	        </div>
	    </div>
	</div> 

<?php wc_print_notices(); ?>

<p><?php _e( 'There are some issues with the items in your cart (shown above). Please go back to the cart page and resolve these issues before checking out.', 'woocommerce' ) ?></p>

<?php do_action( 'woocommerce_cart_has_errors' ); ?>

<p><a class="button wc-backward" href="<?php echo get_permalink(wc_get_page_id( 'cart' ) ); ?>"><?php _e( 'Return To Cart', 'woocommerce' ) ?></a></p>