<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	echo '<div class="container-fluid grey-footer pd0mob">';
	echo '<div class="footer-wrap">';

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
	<?php woo_footer_before(); ?>
	

		<section id="footer-widgets" class="col-full col-md-12 <!-- col-<?php //echo $total; ?> fix -->">
	
			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>
	
			<div class="block footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>
	
		        <?php } ?>
			<?php } // End WHILE Loop ?>
	
		</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>
		<footer id="footer" class="container">

		<div class="col-md-4 mbottom20mob">

				<img src="<?php bloginfo('template_directory') ?>/images/logo.png">
				<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
				    <a id="logo" href="<?php echo esc_url( home_url() ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
				    	<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
				    </a>
			    <?php } ?>
		</div>
	
		<div class="col-md-2">
			<h5 class="footnav-title">Siguenos</h5>
			<ul class="social-bottom">
				<li><a class="twitter" href="/" title="@Actoeditores" rel="tag">Twitter</a></li>
				<li><a class="facebook" href="/" title="Acto Editores" rel="tag">Facebook</a></li>
				<li><a class="pinterest" href="/" title="Acto Editores" rel="tag">Pinterest</a></li>
			</ul>
		</div>

		<nav class="col-md-2">
			<h5 class="footnav-title">Editorial</h5>
			<ul class="foot-col">
				<li><a href="<?php echo home_url('sobre-acto') ?>">Sobre Acto</a></li>
				<li><a href="<?php echo home_url('actividades') ?>">Actividades</a></li>
				<li><a href="<?php echo home_url('novedades') ?>">Novedades</a></li>
				<li><a href="<?php echo home_url('autores') ?>/" title="Destacados" rel="nofollow">Autores</a></li>
				
			</ul>
		</nav>

		<nav class="col-md-2">
			<h5 class="footnav-title">Medios</h5>
			<ul class="foot-col">
				<li><a href="<?php echo home_url('shop') ?>/" title="Actividades" rel="nofollow">Catálogo</a></li>
				<li><a href="<?php echo home_url('terminos') ?>/" title="Novedades" rel="nofollow">Términos y Condiciones</a></li>
				<li><a href="<?php echo home_url('ventas') ?>/">Ventas</a></li>
			</ul>
		</nav>
		
		<address class="col-md-2">
			<h5 class="footnav-title">Contacto</h5>
			<span class="foot-address">
				<p>Fono: <a href="tel:+56945456789" title="Comunicate con nosotr0s" rel="help">(+56)45456789</a></p>
				
			</span>
			<span class="foot-address">
				<p>Mail: <a href="mailto:contacto@acto.cl" title="Escribenos" rel="help">contacto@acto.cl</a></p>
				
			</span>
			<span class="foot-address">
				<p>Skype: <a href="tel:+56945456789" title="Comunicate con nosotros vía Skype" rel="help">(+56)45456789</a></p>

			</span>
		</address>
	
		</footer><!-- /#footer -->
	</div> <!-- / footer-wrap-->
</div><!-- /container-fluid-->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>