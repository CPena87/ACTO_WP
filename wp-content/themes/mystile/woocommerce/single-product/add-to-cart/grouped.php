<?php
/**
 * Grouped product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.7
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $post;

$parent_product_post = $post;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>



<form class="cart" method="post" enctype='multipart/form-data'>
	<h4>Variaciones del Producto</h4>
	<table class="table table-striped">
			<?php
				foreach ( $grouped_products as $product_id ) :
					$product = wc_get_product( $product_id );
					$post    = $product->post;

					$tipo = wp_get_post_terms($post->ID , 'tipos');

					$fa = '';
						if($tipo[0]->slug == 'ebook'){ $fa = '<span class="fa fa-tablet fa-fw fa-lg"></span>' ;}
						elseif($tipo[0]->slug == 'audio-book') { $fa = '<span class="fa fa-music fa-fw fa-lg"></span>'; }
						elseif($tipo[0]->slug == 'coffee-book') { $fa = '<span class="fa fa-coffee fa-fw fa-lg"></span>' ;}
						elseif($tipo[0]->slug == 'hardbook') { $fa = '<span class="fa fa-book fa-fw fa-lg"></span>';}
						else{$fa = '<span class="fa fa-book fa-fw fa-lg"></span>';};

					setup_postdata( $post );
					?>
					<tr>
                    	
                       
						<td class="gr-suggest">
							<?php if ( $product->is_sold_individually() || ! $product->is_purchasable() ) : ?>
								<?php woocommerce_template_loop_add_to_cart(); ?>
							<?php else : ?>
								<?php
									$quantites_required = true;
									woocommerce_quantity_input( array( 'input_name' => 'quantity[' . $product_id . ']', 'input_value' => '0' ) );
								?>
							<?php endif; ?>
						</td>

						<td class="label" style="width:100%;">
							
								<?php echo $product->is_visible() ? '<a href="' . get_permalink() . '">' . $fa .''. $tipo[0]->slug. '</a>' : substr( get_the_title(), 0, 55); ?>
							
						</td>

						<?php do_action ( 'woocommerce_grouped_product_list_before_price', $product ); ?>

						<td class="price" style="width:38%; padding-top:20px; padding-left:5px;">
							<?php
								echo '$'.$product->get_price();

								if ( $availability = $product->get_availability() ) {
									$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';
									echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
								}
							?>
						</td>
					</tr>
					<?php
				endforeach;

				// Reset to parent grouped product
				$post    = $parent_product_post;
				$product = wc_get_product( $parent_product_post->ID );
				setup_postdata( $parent_product_post );
			?>
	</table>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	<?php if ( $quantites_required ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

</div>