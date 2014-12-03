<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
	
?>
    
<div class="container-fluid home-bg">
	<div class="row">
		<div class="quoteline col-md-6">
			<div id="take" class="carousel-
			caption jumbotron">
				<img src="<?php bloginfo('template_directory'); ?>/images/quote.png">
	              <h1>We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends.</h1>
	             <a class="btn-cta cta-center" href="/" title="" rel="">Ver Libro</a>
	        </div>

		</div>
	</div>
</div>

<!-- Copiar la apertura de <div class="container"> en cada portada o single del theme -->
<div id="content" class="cont-full white">

    <div id="content" class="container col-full <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) echo 'with-banner'; ?> <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "false" ) echo 'no-sidebar'; ?>">

    </div><!-- /#content -->

    <section class="container mtop30">
    	<div class="row">
    		 <div class="col-md-9 sortcontent mbottom30">

    		 	<h2>Novedades</h2>

    		 	<?php $novedades= get_posts(array('post_type' => 'novedades', 'numberposts' => 3)); ?>
    		 	<?php $countnovedades = 0 ?>
    		 	<?php foreach ($novedades as $novedad): ?>
    		 	<?php $countnovedades++ ?>

    		 	<?php if ($countnovedades == 1){ 
    		 		$col = 'col-md-4';}
    		 		elseif ($countnovedades == 2) {
    		 		$col = 'col-md-8';} 
    		 		elseif ($countnovedades == 3) {
    		 		$col ='col-md-12';}
    		 		
    		 		?>

    		 	<figure class="<?php echo $col ?> relevance">
    		 		<?php echo get_the_post_thumbnail( $novedad->ID , $col) ?>

    				<figcaption>
    					<h3><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
    					<p>Well, the way they make shows is, they make one show.<?php echo get_the_excerpt( $novedad->ID ); ?></p>
    				</figcaption>
	    		</figure>
	    	<?php endforeach ?>

	    		

   	    		<div class="ctrl-div">
   	    			<a class="go-cta news" href="<?php echo get_post_type_archive_link() ?>" title="Ir a Noticias" rel="nofollow">Ir a Noticias</a>
   	    		</div>
    		 </div>
    		 <aside class="col-md-3 sidecall pleft0">
    		 	<h2>Reseñas</h2>
    		 	<article class="quote">
    		 		<img src="<?php bloginfo('template_directory'); ?>/images/quote.png">
    		 		<p>I used to think the world was this great place where everybody.</p>
    		 		<a class="namerev" href="">Ruperthuz Honorato</a>
    		 		<span class="tagrev"><a href="">Debates Contemporáneos</a></span>
    		 	</article>
    		 	<article class="sales mtop55">
    		 		<h4>Venta y Distribuición</h4>
    		 		<p class="brdbttm">I used to think the world was this great place where everybody.</p>
    		 		<a href="">Lorem Ipsum</a>
    		 		<p>I used to think the world was this great place where everybody.</p>
    		 		<a href="">Lorem Ipsum</a>
    		 		<p>I used to think the world was this great place where everybody.</p>
    		 		<a href="">Lorem Ipsum</a>
    		 		<p>I used to think the world was this great place where everybody.</p>
    		 	</article>
    		 </aside>
    	</div>
    </section>

</div>

<!-- Corresponde a los destacados del catálogo -->
<section class="cont-full light-grey">
	<div class="container">
    	<div class="row">
    		<div class="col-md-12 outstanding mtop30 mbottom30">

    			<h2>Destacados</h2>
    			<?php $libros = get_posts(array('post_type' => product , 'numberposts' => '4')) ?>
    				
    				<?php foreach($libros as $libro): ?>
		    		
		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-3 producto pdbottom10">
		    			<a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
		    			<?php echo get_the_post_thumbnail($libro->ID); ?>
		    		</a>
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4><?php echo $libro->post_title ?></h4>
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
		    					
			    				<span class="price">$<?php echo $price[0]; ?></span>

			    				<?php if(get_post_meta( $libro->ID, '_sale_price')){ ?>
			    				<span class="oferta">$<?php echo $dprice[0]; ?></span>
			    				<?php } ?>

		    				</footer>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<?php endforeach ?>
  
    		</div>
    	</div>
    </div>
</section>
<!-- Fin destacados del catálogo -->

<!-- Variacion de subcontenidos -->
<section class="cont-full white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Lanzamientos -->
				<div class="col-md-4 mtop30 mbottom30">
					<h2 class="subs">Lanzamientos</h2>
					<figure class="launch">
						<img  src="<?php bloginfo('template_directory'); ?>/images/book-launch.jpg" alt="">
						<figcaption class="launchdata light-grey">
							<header>
								<h4>Anna Karenina</h4>
								<span>Leo Tolstoi</span>
							</header>
							<p>Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother's keeper and the finder of lost children.</p>
							<a href="/" title="Ver Catálogo" rel="nofollow">Ver Catálogo</a>
						</figcaption>
					</figure>
				</div>
				<!-- Fin Lanzamientos -->

				<!-- Comentarios -->
				<div class="col-md-4 mtop30 mbottom30">
					<h2 class="subs">Comentarios</h2>
					<article class="brdbottom">
						<p class="comments">“And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers.”</p>
					<a href="">Por Umberto Eco</a>
					</article>
					<article class="brdbottom">
						<p class="comments">“And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers.”</p>
					<a href="">Por Umberto Eco</a>
					</article>
				</div>
				<!-- Fin Comentarios -->

				<!-- Newsletter -->
				<div class="col-md-4 mtop30 mbottom30">
					<h2 class="subs">Newsletter</h2>
					<form class="send-news">
						<h4>Suscribete al newsletter</h4>
						<p>I used to think the world was this great place where everybody.</p>
					

						<label for="contacto-nombre">Nombre</label>
						<input type="text" id="contacto-nombre" placeholder="Ingresa tu Nombre" />
						<label for="contacto-nombre">Email</label>
						<input type="email" id="contacto-nombre" placeholder="Ingresa tu Nombre" />
						<input type="submit" placeholder="Enviar" />

					</form>
				</div>
				<!-- Fin newsletter -->
			</div>	
		</div>
	</div>
</section>
		
<?php get_footer(); ?>