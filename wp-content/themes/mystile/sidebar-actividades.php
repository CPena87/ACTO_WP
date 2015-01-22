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
<aside id="sidebar" class="col-md-3 col-md-offset-1 sidecontent mbottom50">
<h4 class="sidebar">Actividades</h4>
<?php $actividades= get_posts(array('post_type' => 'actividades', 'numberposts' => 3)); ?>
       <?php $countactividades = 0 ?>
       <?php foreach ($actividades as $actividad): ?>
       <?php $countnactividades++ ?>
	
	<div class="mbottom20">
		<h3 class="sidebar"><a href="<?php echo get_permalink($actividad->ID) ?>" title="<?php echo $actividad->post_title ?>" rel="blog"><?php echo $actividad->post_title ?></a></h3>
	
	<?php echo substr($post->post_content , 0 , 150 )?>
	</div>
	<a href="<?php echo get_permalink($actividad->ID) ?>" title="Continua Leyendo>">Continua Leyendo...</a>
<?php endforeach ?>



	<form class="send-news mtop30">
			<h4>Suscribete al newsletter</h4>
			<p>I used to think the world was this great place where everybody.</p>
 			<?php echo do_shortcode('[contact-form-7 id="124" title="Inscripción a Newsletter"]'); ?>
	</form>
	
</aside><!-- /#sidebar -->
<?php } // End IF Statement ?>