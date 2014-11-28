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
    		 	<h2>Noticias</h2>
    		 	<figure class="col-md-4 relevance">
    		 		<img src="<?php bloginfo('template_directory'); ?>/images/relevance-1.jpg" alt="">
    				<figcaption>
    					<h3><a href="" title="" rel="">Lorem Ipsum</a></h3>
    					<p>I used to think the world was this great place where everybody.</p>
    				</figcaption>
	    		</figure>
	    		<figure class="col-md-8 relevance">
	    			<img src="<?php bloginfo('template_directory'); ?>/images/relevance-2.jpg" alt="">
	    			<figcaption>
						<h3><a href="" title="" rel="">Lorem Ipsum</a></h3>
    					<p>Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. </p>
    				</figcaption>
	    		</figure>
	    		<figure class="col-md-12 relevance">
	    			<img src="<?php bloginfo('template_directory'); ?>/images/relevance-3.jpg" alt="">
    				<figcaption>
    					<h3><a href="" title="" rel="">Lorem Ipsum</a></h3>
    					<p>Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke.</p>
    				</figcaption>
   	    		</figure>
   	    		<a class="go-cta news" href="/" title="Ir a Noticias" rel="nofollow">Ir a Noticias</a>
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
		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-3 producto pdbottom10">
		    			<img src="<?php bloginfo('template_directory'); ?>/images/book1.jpg" alt="">
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4>Historias de las Tierras y Lugares Extraños</h4>
		    					<p>Umberto Eco</p>
		    				</header>
		    				<a class="cart" href="/" title="Ver producto" rel="help">Ver producto</a>
		    				<footer class="inferior">
			    				<span class="price">$25000</span>
			    				<span class="oferta">$19500</span>
		    				</footer>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-3 producto pdbottom10">
		    			<img src="<?php bloginfo('template_directory'); ?>/images/book1.jpg" alt="">
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4>Historias de las Tierras y Lugares Extraños</h4>
		    					<p>Umberto Eco</p>
		    				</header>
		    				<a class="cart" href="/" title="Ver producto" rel="help">Ver producto</a>
		    				<section class="inferior">
			    				<span class="price">$25000</span>
			    				<span class="oferta">$19500</span>
		    				</section>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-3 producto pdbottom10">
		    			<img src="<?php bloginfo('template_directory'); ?>/images/book1.jpg" alt="">
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4>Historias de las Tierras y Lugares Extraños</h4>
		    					<p>Umberto Eco</p>
		    				</header>
		    				<a class="cart" href="/" title="Ver producto" rel="help">Ver producto</a>
		    				<section class="inferior">
			    				<span class="price">$25000</span>
			    				<span class="oferta">$19500</span>
		    				</section>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<!-- Corresponde a los datos del libro -->
		    		<figure class="col-md-3 producto pdbottom10">
		    			<img src="<?php bloginfo('template_directory'); ?>/images/book1.jpg" alt="">
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4>Historias de las Tierras y Lugares Extraños</h4>
		    					<p>Umberto Eco</p>
		    					<p>Andrea Nuñez</p>
		    					<p>Rodrigo Sotomayor</p>
		    					<p>Joaquín Jara</p>
		    				</header>
		    				<a class="cart" href="/" title="Ver producto" rel="help">Ver producto</a>
		    				<section class="inferior">
			    				<span class="price">$25000</span>
			    				<span class="oferta">$19500</span>
		    				</section>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->
  
    		</div>
    	</div>
    </div>
</section>
<!-- Fin destacados del catálogo -->

<!-- Area loops -->
<section class="cont-full light-grey">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php woo_main_before(); ?>
    
		<section id="main" class="col-full">  
		
		<?php mystile_homepage_content(); ?>		
		
		<?php woo_loop_before(); ?>
		
		<?php if ( $woo_options[ 'woo_homepage_blog' ] == "true" ) { 
			$postsperpage = $woo_options['woo_homepage_blog_perpage'];
		?>
		
		<?php
			
			$the_query = new WP_Query( array( 'posts_per_page' => $postsperpage ) );
			
        	if ( have_posts() ) : $count = 0;
        ?>
        
			<?php /* Start the Loop */ ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php 
				endwhile; 
				// Reset Post Data
				wp_reset_postdata();
			?>
			
			

		<?php else : ?>
        
            <article <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        
        <?php endif; ?>
        
        <?php } // End query to see if the blog should be displayed ?>
        
        <?php woo_loop_after(); ?>
		                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

			</div>
		</div>
	</div>
</section>
<!-- Fin Area loops -->

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