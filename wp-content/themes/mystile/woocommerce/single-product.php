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

<div class="container">
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



<div class="container mtop20mob brdtop">
	<div class="row">

			<!-- Pestañas de Contenido -->
	<div class="col-md-8 mtop20 clear">

<h2>Otras Características</h2>

		<div role="tabpanel">
	      <ul class="nav nav-tabs" role="tablist">
	        <li role="presentation" class="active"><a href="#comentarios" aria-controls="comentarios" role="tab" data-toggle="tab">Comentarios</a></li>
	        <li role="presentation"><a href="#dimensiones" aria-controls="dimensiones" role="tab" data-toggle="tab">Dimensiones del producto</a></li>
	        <li role="presentation"><a href="#indice" aria-controls="indice" role="tab" data-toggle="tab">Contenidos</a></li>
	      </ul>
	      <div class="tab-content">
	        <div role="tabpanel" class="tab-pane active" id="comentarios">
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
	       
	        
	        <div role="tabpanel" class="tab-pane" id="indice">
	        	<h2 class="appendix">Índice de Contenidos</h2>

	            <?php 
	                $indice = get_field('indice' , $post->ID); 

	            ?>
	            <?php echo $indice; ?>
	        </div>
	        
	      </div>

		</div>
	</div>
	<!-- Fin Pestañas de Contenido -->

<div class="col-md-4 mtop20" >

	<h2>Libros Relacionados </h2>

            <?php $not_in = array();?>
        	<?php array_push($not_in , $post->ID)?>
            <?php $libros = get_posts(array('post_type' => product , 'numberposts' => '2' , 'post__not_in' => $not_in)) ?>
            <?php foreach($libros as $libro): ?>
            <!-- Corresponde a los datos del libro -->
            <figure class="col-md-6 col-sm-6 col-xs-6 producto pdbottom10 pleft0 mtop30">
                <a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
                    <?php echo get_the_post_thumbnail($libro->ID , 'portadillas'); ?>
                </a>
                <div class="minun over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
                <figcaption class="white">
                    <header class="superior reference">
                        <h4><?php echo substr($libro->post_title , 0 , 75 )?></h4>
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
                                
                        <!--<pre><?php var_dump(get_post_meta($libro->ID , '_regular_price'))?></pre>
                        <pre><?php var_dump(get_post_meta($libro->ID , '_sale_price'))?></pre> -->
                                
                        <span class="price">$<?php echo $price[0]; ?></span>

                        <?php if($dprice[0] != ''){ ?>
                        <span class="oferta">$<?php echo $dprice[0]; ?></span>
                        <?php } ?>

                    </footer>
                </figcaption>
            </figure>
            <!-- Fin datos de libro -->
            <?php endforeach ?>
        </div>
			

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
</div>

<?php get_footer( 'shop' ); ?>