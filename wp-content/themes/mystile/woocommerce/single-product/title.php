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

<span class="clear">
	<?php if($tipos){?>
	<?php foreach ($tipos as $tipo): ?>
		<?php $linktipo = get_term_link( $tipo); ?>
		<a href="<?php echo $linkautor ?>"><?php echo $tipo->name ?></a>
	<?php endforeach ?>
	<?php } ?>
</span>