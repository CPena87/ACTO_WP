<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>


<div class="novedad-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Catálogo</h1>
                    <p>You don't get sick, I do. 123 That's also clear. But for some reason, you and I react the exact same way to water.</p>
                </div>

            </div>
        </div>
    </div>
</div>

		<!-- Corresponde a los destacados del catálogo -->
<section class="cont-full light-grey">
	<div class="container">
    	<div class="row">
    		<div class="col-md-12 outstanding mtop30 mbottom30">
    			<?php $libros = get_posts(array('post_type' => product , 'numberposts' => '8')) ?>
    				
    				<?php foreach($libros as $libro): ?>
		    		
		    		<!-- Corresponde a los datos del libro 123-->
		    		<figure class="col-md-3 col-sm-6 col-xs-6 producto pdbottom10">
		    			<a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
		    			<?php echo get_the_post_thumbnail($libro->ID); ?>
		    		</a>
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior catalogue">
		    					<h4><?php echo substr($libro->post_title , 0 , 75 )?></h4>

		    					<?php $autores = get_the_terms( $libro->ID, 'autores' ); ?>
		    					<p>
		    						<?php foreach  ($autores as $autor): ?>
		    						<?php $linkautor = get_term_link( $autor); ?>
									<a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
								<?php endforeach ?>
		    					</p>
		    				</header>
		    				<div class="clear"></div>
		    				<?php $tipos = get_the_terms( $libro->ID, 'tipos' ); ?>
							<div class="booktype mg5">
								<?php if($tipos){?>
								<?php foreach ($tipos as $tipo): ?>
									<?php $linktipo = get_term_link( $tipo); ?>
									<a href="<?php echo $linkautor ?>"><?php echo $tipo->name ?></a>
								<?php endforeach ?>
								<?php } ?>
							</div>
							<div class="clear"></div>

		    				<a class="cart" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">Ver producto</a>
		    				<footer class="inferior">
		    					<?php $price = get_post_meta( $libro->ID, '_regular_price'); ?>
		    					<?php $dprice = get_post_meta( $libro->ID, '_sale_price'); ?>


			    				<span class="price">$<?php echo $price[0]; ?></span>

			    				<?php if(get_post_meta( $libro->ID, '_sale_price')){ ?>
			    				

			    				<span class="oferta">ISBN<?php echo $isbn[0]; ?></span>
			    				<?php } ?>

		    				</footer>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<?php endforeach ?>
  
    		</div>
    	</div>
    </div>
</section>

<?php get_footer( ); ?>