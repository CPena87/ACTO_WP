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

            <div class="col-md-5 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Catálogo</h1>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 mtop60 mtop0mob">
            	<div class=" jumbotron fleft mtop0mob">
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
		    		<?php  $product = wc_get_product( $libro->ID );?>

		    		<?php $gprice = $product->price;?>

		    		<?php if($product->post->post_parent == '0'){ ?>

		    		<!-- Corresponde a los datos del libro 123-->
		    		<figure class="col-md-3 col-sm-6 col-xs-6 producto pdbottom10">
		    			<a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
		    			<?php echo get_the_post_thumbnail($libro->ID , 'portadillas'); ?>
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


		    					<?php if($product->product_type == 'grouped') {?>
		    						<span class="price">Desde $<?php echo $gprice; ?></span>
		    					<?php }else{ ?>



									
			    					<?php if(get_post_meta( $libro->ID, '_sale_price')){ ?>
			    						
			    						<span class="oferta">Oferta <?php echo $dprice[0]; ?></span>
			    						<span class="price">$<?php echo $price[0]; ?></span>
			    					<?php }else{ ?>
										<span class="price">$<?php echo $price[0]; ?></span>
			    					<?php } ?>
		    					<?php } ?>

			    				

		    				</footer>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->
		    		<?php } ?>
		    		<?php endforeach ?>
  
    		</div>
    	</div>
    </div>
</section>

<?php get_footer( ); ?>