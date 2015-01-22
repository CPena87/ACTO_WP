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

<div class="col-md-12 mtop20 pd0 clear">

	<div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#comentarios" aria-controls="comentarios" role="tab" data-toggle="tab">Comentarios</a></li>
        <li role="presentation"><a href="#dimensiones" aria-controls="dimensiones" role="tab" data-toggle="tab">Dimensiones del producto</a></li>
        <li role="presentation"><a href="#recomendados" aria-controls="recomendados" role="tab" data-toggle="tab">Libros recomendados</a></li>
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
        
        <div role="tabpanel" class="tab-pane" id="recomendados">
            <?php $not_in = array();?>
        	<?php array_push($not_in , $post->ID)?>
            <?php $libros = get_posts(array('post_type' => product , 'numberposts' => '4' , 'post__not_in' => $not_in)) ?>
            <?php foreach($libros as $libro): ?>
            <!-- Corresponde a los datos del libro -->
            <figure class="col-md-3 producto pdbottom10 pleft0 mtop30">
                <a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
                    <?php echo get_the_post_thumbnail($libro->ID); ?>
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