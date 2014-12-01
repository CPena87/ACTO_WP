<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>



<!-- if ( ! $product->is_purchasable() ) return;
?> -->



<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>

		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	 	<button type="submit" class="single_add_to_cart_button button alt"><img class="cart-icon" src="<?php bloginfo('template_directory') ?>/images/white-cart.png">Añadir al Carro</button>

	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() )
	 			woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 			) );
	 	?>



		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>

<div class="col-md-12 pd0">
<?php $libros = get_posts(array('post_type' => product , 'numberposts' => '3')) ?>
    				
    				<?php foreach($libros as $libro): ?>
		    		
		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-4 producto pdbottom10 pleft0">
		    			<?php echo get_the_post_thumbnail($libro->ID); ?>
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4><?php echo $libro->post_title ?></h4>
		    					<?php $autores = get_the_terms( $libro->ID, 'autores' ); ?>
		    					<p>
		    						<?php foreach  ($autores as $autor): ?>
		    						<?php $linkautor = get_term_link( $autor); ?>
									<a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
								<?php endforeach ?>
		    					</p>
		    				</header>
		    				<a class="cart" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">Ver producto</a>
		    				<footer class="inferior">
		    					<?php $price = get_post_meta( $libro->ID, '_regular_price'); ?>
		    					<?php $dprice = get_post_meta( $libro->ID, '_sale_price'); ?>
		    					
			    				<span class="price">$<?php echo $price[0]; ?></span>

			    				<?php if(get_post_meta( $libro->ID, '_sale_price')){ ?>
			    				<span class="oferta">$<?php echo $dprice[0]; ?></span>
			    				<?php } ?>

		    				</footer>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<?php endforeach ?>

</div>
