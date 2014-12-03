<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(  ); ?>

<div class="novedad-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Catálogo</h1>
                    <p>You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water.</p>
                </div>

            </div>
        </div>
    </div>
</div>  

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">

					<h3>Libros Recomendados</h3>
					<?php $libros = get_posts(array('post_type' => product , 'numberposts' => '4')) ?>
    				
    				<?php foreach($libros as $libro): ?>
		    		
		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-3 producto pdbottom10 pleft0">
		    			<a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
		    				<?php echo get_the_post_thumbnail($libro->ID); ?>
		    			</a>
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior reference">
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

			<div class="col-md-4">
				<h3>Novedades</h3>

				<?php $novedades= get_posts(array('post_type' => 'novedades', 'numberposts' => 2)); ?>
    		 	<?php $countnovedades = 0 ?>
    		 	<?php foreach ($novedades as $novedad): ?>
    		 	<?php $countnovedades++ ?>

    		 	<article class="col-md-12 pd0 wide">

    				
    					<h3><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
    					<p>Well, the way they make shows is, they make one show.<?php echo get_the_excerpt( $novedad->ID ); ?></p>
    				
	    		</article>
	    	<?php endforeach ?>

			</div>
		</div>
	</div>

<?php get_footer( 'shop' ); ?>