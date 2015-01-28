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

<?php /*?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?>
	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>


<!-- if ( ! $product->is_purchasable() ) return;
?> -->
</div>
<?php */?>
</div>
<?php if($product->product_type != 'grouped'){?>
<div class="col-md-4 white">
	
    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		
        <p class="price bigged">
            <span class="blackened"><strong>Precio:</strong></span>
            <?php echo $product->get_price_html(); ?>
        </p>

        <meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
        <meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
        <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
    
    </div>


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
</div>
<?php }?>
