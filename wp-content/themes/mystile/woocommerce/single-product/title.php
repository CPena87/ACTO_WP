<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<?php $autores = get_the_terms( $post->ID, 'autores' ); ?>
<?php //var_dump($terms)?>
<h2 class="author-ref">Autor: 
<?php foreach ($autores as $autor): ?>
	<a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
<?php endforeach ?>
</h2>
<?php $tipos = get_the_terms( $post->ID, 'tipos' ); ?>
<?php $idiomas = get_the_terms( $post->ID, 'idiomas' ); ?>
<span class="clear character">
	<p><strong>Tipo:</strong></p>
	<?php if($tipos){?>
	<?php foreach ($tipos as $tipo): ?>
		<?php $linktipo = get_term_link( $tipo); ?>
		
		<a href="<?php echo $linkautor ?>"><?php echo $tipo->name ?></a>
	<?php endforeach ?>
	<?php } ?>
</span>
<span class="clear character">
	<p><strong>Idioma:</strong></p>
	<?php if($idiomas){?>
	<?php foreach ($idiomas as $idioma): ?>
		<?php $linkidioma = get_term_link( $idioma); ?>

		<a href="<?php echo $linkautor ?>"><?php echo $idioma->name ?></a>
	<?php endforeach ?>
	<?php } ?>
</span>