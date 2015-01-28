<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$isbn = $product->get_attribute( 'ISBN' );

?>
<div class="col-md-8">
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<?php $autores = get_the_terms( $post->ID, 'autores' ); ?>
<?php $tipos = get_the_terms( $post->ID, 'tipos' ); ?>
<?php $idiomas = get_the_terms( $post->ID, 'idiomas' ); ?>
<?php $coeditores = get_the_terms( $post->ID, 'coeditores' ); ?>
<?php $alianzas = get_the_terms( $post->ID, 'alianzas' ); ?>

<h2 class="author-ref"><strong>Autor: </strong>
<?php foreach ($autores as $autor): ?>
	<a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
<?php endforeach ?>
</h2>

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer"> 

     <?php if (get_field('estado')){  ?>
        <p class="quant-text"><strong>Estado:</strong> Libro Publicado</p>
     <?php } else {?>
        <p class="quant-text"><strong>Estado:</strong> Libro por Publicar</p>
     <?php } ?>

</div>

<span class="clear character">
	<p><strong>Coeditor:</strong></p>
	<?php if($coeditores){?>
	<?php foreach ($coeditores as $coeditor): ?>
		<?php $linkcoeditor = get_term_link( $coeditor); ?>

		<a href="<?php echo $linkcoeditor?>"><?php echo $coeditor->name ?>, </a>
	<?php endforeach ?>
	<?php } ?>
</span>

<span class="clear character">
	<p><strong>Alianzas:</strong></p>
	<?php if($alianzas){?>
	<?php foreach ($alianzas as $alianza): ?>
		<?php $linkalianza = get_term_link( $alianza); ?>

		<a href="<?php echo $linkalianza?>"><?php echo $alianza->name ?>, </a>
	<?php endforeach ?>
	<?php } ?>
</span>

<span class="clear character">
	<p><strong>Tipo:</strong></p>
	<?php if($tipos){?>
	<?php foreach ($tipos as $tipo): ?>
		<?php $linktipo = get_term_link( $tipo); ?>
		
		<a href="<?php echo $linkautor ?>"><?php echo $tipo->name ?>, </a>
	<?php endforeach ?>
	<?php } ?>
</span>

<span class="clear character">
	<p><strong>Idioma:</strong></p>
	<?php if($idiomas){?>
	<?php foreach ($idiomas as $idioma): ?>
		<?php $linkidioma = get_term_link( $idioma); ?>

		<a href="<?php echo $linkautor ?>"><?php echo $idioma->name ?>, </a>
	<?php endforeach ?>
	<?php } ?>
</span>

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	 <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

	     <span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	  <?php endif; ?>
	  <div class="clear"></div>
	  

</div>

<span class="sku_wrapper"><strong>ISBN:</strong> <span class="sku" itemprop="sku"><?php echo $isbn; ?></span></span>




