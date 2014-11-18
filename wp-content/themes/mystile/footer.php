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
	
	echo '<div class="container-fluid">';
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
		<footer id="footer" class="col-full">

		<div class="col-md-4">

				<img src="<?php bloginfo('template_directory') ?>/images/logo.png">
				<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
				    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
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
				<li><a href="/" title="Novedades" rel="nofollow">Novedades</a></li>
				<li><a href="/" title="Catálogo" rel="nofollow">Catálogo</a></li>
				<li><a href="/" title="Autores" rel="nofollow">Autores</a></li>
				<li><a href="/" title="Distribuición" rel="nofollow">Distribuición</a></li>
				<li><a href="/" title="Sobre Acto" rel="faq">Sobre Acto</a></li>
			</ul>
		</nav>

		<nav class="col-md-2">
			<h5 class="footnav-title">Medios</h5>
			<ul class="foot-col">
				<li><a href="/" title="Actividades" rel="nofollow">Actividades</a></li>
				<li><a href="/" title="Editorial" rel="nofollow">Editorial</a></li>
				<li><a href="/" title="Prensa" rel="nofollow">Prensa</a></li>
				<li><a href="/" title="Destacados" rel="nofollow">Destacados</a></li>
			</ul>
		</nav>
		
		<address class="col-md-2">
			<h5 class="footnav-title">Contacto</h5>
			<span class="foot-address">
				<p>Teléfono: <a href="tel:+56945456789" title="Comunicate con nosotrs" rel="help">(+56)45456789</a></p>
				
			</span>
			<span class="foot-address">
				<p>Mail: <a href="mailto:contacto@acto.cl" title="Escribenos" rel="help">contacto@acto.cl</a></p>
				
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