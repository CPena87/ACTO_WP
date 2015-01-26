<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$isbn = $product->get_attribute( 'ISBN' )?>



<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<!-- Contador de productos en stock -->
	<p class="quant-text"><strong>Cantidad:</strong>
	<?php
		// Availability
		$availability      = $product->get_availability();
		$availability_html = empty( $availability['availability'] ) ? : '<span class="text-random">' . esc_html( $availability['availability'] ) . '</span></p>';
		
		echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
	?>

</div>
