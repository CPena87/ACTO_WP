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
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<!-- Contador de productos en stock -->
	<p class="quant-text">Cantidad:
	<?php
		// Availability
		$availability      = $product->get_availability();
		$availability_html = empty( $availability['availability'] ) ? : '<span class="text-random">' . esc_html( $availability['availability'] ) . '</span></p>';
		
		echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
	?>

</div>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price bigged">
		<span class="blackened">Precio:</span>
		<?php echo $product->get_price_html(); ?>
	</p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

	

</div>