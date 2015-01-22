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
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>
    <div class="clear"></div>
    <span class="sku_wrapper"><strong>ISBN:<strong> <span class="sku" itemprop="sku"><?php echo $isbn; ?></span></span>

	<p class="price bigged">
		<span class="blackened"><strong>Precio:<strong></span>
		<?php echo $product->get_price_html(); ?>
	</p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />


    
</div>