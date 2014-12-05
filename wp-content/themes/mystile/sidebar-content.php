<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php 
/**
 * Sidebar Template
 *
 * If a `primary` widget area is active and has widgets, display the sidebar.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	if ( isset( $woo_options['woo_layout'] ) && ( $woo_options['woo_layout'] != 'layout-full' ) ) {
?>	
<aside id="sidebar" class="col-right sidecontent mbottom50">
<h4 class="sidebar">Novedades Relacionadas</h4>
<?php $novedades= get_posts(array('post_type' => 'novedades', 'numberposts' => 3)); ?>
       <?php $countnovedades = 0 ?>
       <?php foreach ($novedades as $novedad): ?>
       <?php $countnovedades++ ?>
	
	<div class="mbottom20">
		<h3 class="sidebar"><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
	
	<?php echo substr($post->post_content , 0 , 150 )?>
	</div>
	<a href="<?php echo get_permalink($novedad->ID) ?>" title="Continua Leyendo>">Continua Leyendo...</a>
<?php endforeach ?>



	<form class="send-news mtop30">
		<h4>Suscribete al newsletter</h4>
		<p>I used to think the world was this great place where everybody.</p>
		<label for="contacto-nombre">Nombre</label>
		<input type="text" id="contacto-nombre" placeholder="Ingresa tu Nombre" />
		<label for="contacto-nombre">Email</label>
		<input type="email" id="contacto-nombre" placeholder="Ingresa tu Nombre" />
		<input type="submit" placeholder="Enviar" />
	</form>
	
</aside><!-- /#sidebar -->
<?php } // End IF Statement ?>