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

global $post;

if ( ! $post->post_excerpt ) return;

get_header(  ); ?>


<div class="container mtop145">
	<div class="row">

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


<div class="clear"></div>

<div class=" mtop20mob clear">
	<div class="row">
    
    <div class="brdtop"></div>
		<div class="clear separator"></div>
    

	<!-- Pestañas de Contenido -->
	<div class="col-md-8 clear" style="background-color:#fff;">
		<div class="separator"></div>
		<div role="tabpanel" class="bg-tab">
	      <ul class="nav nav-tabs" role="tablist">
	      	<li role="presentation" class="active"><a href="#descripcion" aria-controls="descripcion" role="tab" data-toggle="tab">Descripción</a></li>
	      	<li role="presentation"><a href="#indice" aria-controls="indice" role="tab" data-toggle="tab">Contenidos</a></li>
	      	<li role="presentation"><a href="#dimensiones" aria-controls="dimensiones" role="tab" data-toggle="tab">Dimensiones del producto</a></li>
	        <li role="presentation" ><a href="#comentarios" aria-controls="comentarios" role="tab" data-toggle="tab">Comentarios</a></li>


	      </ul>

	      <div class="tab-content">
	      	<div role="tabpanel" class="tab-pane active" id="descripcion">
	      		<div itemprop="description">
					<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>

					<?php the_content(); ?>
				</div>
	      	</div>

	        <div role="tabpanel" class="tab-pane" id="indice">
	        	<h2 class="appendix">Índice de Contenidos</h2>

	            <?php 
	                $indice = get_field('indice' , $post->ID); 

	            ?>
	            <?php echo $indice; ?>


	            <p class="appendix"><strong>Número de Páginas:</strong>
	            <?php 
	            	$paginas = get_field('numero_paginas' , $post->ID);
	             ?>
	             <?php echo $paginas; ?></p>
	        </div>

	        
	        <div role="tabpanel" class="tab-pane" id="dimensiones">
	            <table class="shop_attributes">
				<?php if ( $product->enable_dimensions_display() ) : ?>
	                <?php if ( $product->has_weight() ) : $has_row = true; ?>
	                    <tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
	                        <th><?php _e( 'Weight', 'woocommerce' ) ?></th>
	                        <td class="product_weight"><?php echo $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></td>
	                    </tr>
	                <?php endif; ?>

	                <?php if ( $product->has_dimensions() ) : $has_row = true; ?>
	                    <tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
	                        <th><?php _e( 'Dimensions', 'woocommerce' ) ?></th>
	                        <td class="product_dimensions"><?php echo $product->get_dimensions(); ?></td>
	                    </tr>
	                <?php endif; ?>
	            <?php endif; ?>
	            </table>
	        </div>

	       	<div role="tabpanel" class="tab-pane" id="comentarios">
				<?php
	                //Gather comments for a specific page/post 
	                $comments = get_comments(array(
	                    'post_id' => $post->ID,
	                    //'status' => 'approve', //Change this to the type of comments to be displayed
	                    'orderby' => 'ID',
	                    'order' => 'ASC',
	                ));
	            ?>
	            <?php foreach($comments as $comentario):?>
	                <div class="comentario col-md-12 comentario-user">
	                    <div class="avatar col-md-2 hide-on-mobile pleft0">
	                        <img src="<?php bloginfo('template_directory')?>/images/avatar-male.jpg" alt="" />
	                    </div>
	                    <div class="col-md-10">
	                        <h4><?php echo $comentario->comment_author?></h4>
	                        <p><?php echo $comentario->comment_content?></p>
	                    </div>
	                </div>
	            <?php endforeach;?>
	            
	            <div class="form">
				<?php $args = array(
	                'fields' => apply_filters( 'comment_form_default_fields', array(
	                'author' => '<div class="col-md-6"><p class="comment-form-author" style="width:100%;">'. ( $req ? '<span class="required">*</span>' : '' ) .
	                '<input id="author" name="author" type="text" placeholder="Nombre" value="' .
	                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
	                '</p></div>',
	                'email'  => '<div class="col-md-6"><p class="comment-form-email" style="width:100%;">' .
	                '' .
	                ( $req ? '<span class="required">*</span>' : '' ) .
	                '<input id="email" name="email" type="text" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
	                '</p></div>',
	                'url'    => '' )),
	                    
	                'label_submit'=>'Enviar Comentario',
	                        
	                'comment_field' => '<div class="col-md-12 pleft0 pright0"><p class="comment-form-comment"><textarea id="comment" placeholder="Mensaje" name="comment" aria-required="true"></textarea></p></div>',
	            );?>
	                        
				<?php comment_form($args)?>
	            <!-- Fin Comentarios -->
	            </div>
	        </div>
	       
	        

	        
	      </div>

		</div>
	</div>
	<!-- Fin Pestañas de Contenido -->

<!-- <style type="text/css">
.layout-full #main{ max-width:100% !important}
</style> -->

<div class="col-md-4">

	<h2 style="font-weight:500;"> Libros Relacionados </h2>

            <?php $not_in = array();?>
        	<?php array_push($not_in , $post->ID)?>
            <?php $libros = get_posts(array('post_type' => product , 'numberposts' => '4' , 'post__not_in' => $not_in)) ?>
            <?php foreach($libros as $libro): ?>
            <?php  $product = wc_get_product( $libro->ID );?>

            <?php $gprice = $product->price;?>

            <?php if($product->post->post_parent == '0'){ ?>
            <!-- Corresponde a los datos del libro -->
            <figure class="col-md-6 col-sm-6 col-xs-6 producto pdbottom10 pleft0">
                <a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
                    <?php echo get_the_post_thumbnail($libro->ID , 'portadillas'); ?>
                </a>
                <div class="minun over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
                <figcaption class="white">
                    <header class="superior reference">
                        <h4><?php echo substr($libro->post_title , 0 , 75 )?>...</h4>
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
                                   <!--  <a href="<?php //echo $linkautor ?>"><?php //echo $tipo->name ?></a> -->
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

</div>
</div>
<div class="prefooter-gray mtop30">
	<div class="container ">
		<div class="row">
			<div class="col-md-12 sidecontent mtop30 mbottom50">
					<h3 class="title-sidebar">Novedades</h3>

					<?php $novedades = get_posts(array('post_type' => 'novedades', 'numberposts' => 2)); ?>
	    		 	<?php $countnovedades = 0 ?>
	    		 	<?php foreach ($novedades as $novedad): ?>
	    		 	<?php $countnovedades++ ?>

	    		 	<article class="col-md-6 pd0 wide ">

	    				
	    					<h3><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
	    					<p><?php echo substr($novedad->post_content , 0 , 200 )?>...</p>
	    				
		    		</article>
		    	<?php endforeach ?>

			</div>	
		</div>
	</div>
</div>


<?php get_footer( 'shop' ); ?>