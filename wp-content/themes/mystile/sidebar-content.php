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

	<h4 class="sidebar">Ediciones Relacionadas</h4>
	<h3 class="sidebar"><a href="/" rel="nofollow" title="Reedición Cementerio de Praga">Reedición Cementerio de Praga</a></h3>
	<p class="data"><strong>Autor: </strong>María José Correa Gómez</p>
	<p>Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now</p>
	<a href="/" title="Continua Leyendo" rel="nofollow">Continua Leyendo...</a>

	<h3 class="sidebar"><a href="/" rel="nofollow" title="Reedición Cementerio de Praga">Reedición Cementerio de Praga</a></h3>
	<p class="data"><strong>Autor: </strong>María José Correa Gómez</p>
	<p>Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now</p>
	<a href="/" title="Continua Leyendo" rel="nofollow">Continua Leyendo...</a>

	<h3 class="sidebar"><a href="/" rel="nofollow" title="Reedición Cementerio de Praga">Reedición Cementerio de Praga</a></h3>
	<p class="data"><strong>Autor: </strong>María José Correa Gómez</p>
	<p>Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now</p>
	<a href="/" title="Continua Leyendo" rel="nofollow">Continua Leyendo...</a>


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