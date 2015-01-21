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
		<div class="quoteline col-md-8">
			<div id="take" class="carousel-
			caption jumbotron">
				<img src="<?php bloginfo('template_directory'); ?>/images/quote.png">	
					<?php $quote = get_field('quote-text' , 'options') ?>
	              	<h1><?php echo $quote ?></h1>
					"<?php $vinculo = get_field('vinculo-quote' , 'options') ?>"

	              <a class="btn-cta cta-center" href="<?php echo $vinculo?>" title="" rel="">Ver Referencia</a>
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
    		 <div class="col-md-9 col-sm-9 sortcontent mbottom30">

    		 	<h2>Novedades</h2>

    		 	<?php $novedades= get_posts(array('post_type' => 'novedades', 'numberposts' => 3)); ?>
    		 	<?php $countnovedades = 0 ?>
    		 	<?php foreach ($novedades as $novedad): ?>
    		 	<?php $countnovedades++ ?>

    		 	<?php if ($countnovedades == 1){ 
    		 		$col = 'col-md-4';
					$class = 'col-md-4 col-sm-4';
					}
    		 		elseif ($countnovedades == 2) {
    		 		$col = 'col-md-8';
					$class = 'col-md-8 col-sm-8';
					} 
    		 		elseif ($countnovedades == 3) {
    		 		$col = 'col-md-12';
					$class = 'col-md-12 col-sm-12';
					}
    		 		
    		 		?>

    		 	<figure class="<?php echo $class ?> relevance">
    		 		<?php echo get_the_post_thumbnail( $novedad->ID , $col) ?>

    				<figcaption>
    					<h3><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
    					<p><?php echo substr($post->post_content , 0 , 105 )?>...</p>
    				</figcaption>
	    		</figure>
	    	<?php endforeach ?>

	    		

   	    		<div class="ctrl-div">
   	    			<a class="go-cta news" href="<?php echo get_post_type_archive_link('novedades') ?>" title="Ir a Noticias" rel="nofollow" target="_blank">Ir a Novedades</a>
   	    		</div>
    		 </div>
    		 <aside class="col-md-3 col-sm-3 sidecall pleft0">
    		 	<section class="invitepub mtop95">
    		 		<p> Te invitamos</p> 
    		 		<p>a públicar </p> 
    		 		<p>con nosotros </p>

    		 		<a class="btn-cta"href="<?php echo home_url('publica-con-nosotros') ?>">Haz Click Aquí</a>
    		 	</section>
    		 	<article class="sales mtop30">
    		 		<h4>Distribuición</h4>
    		 		<p class="brdbttm">I used to think the world was this great place where everybody.</p>
    		 		
    		 		<?php $direcciones= get_posts(array('post_type' => 'direcciones', 'numberposts' => 8)); ?>
    		 			<?php foreach ($direcciones as $direccion): ?>

    		 			<span><?php echo $direccion->post_title ?></span>
    		 			<p><?php echo substr($direccion->post_content , 0 , 105 )?></p>

    		 			<?php endforeach ?>
    		 		
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
		    		<figure class="col-md-3 col-xs-6 producto pdbottom10">
		    			<a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
		    			<?php echo get_the_post_thumbnail($libro->ID); ?>
		    		</a>
		    			<div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
		    			<figcaption class="white">
		    				<header class="superior">
		    					<h4><?php echo substr($libro->post_title , 0 , 75 )?></h4>
		    					<?php $autores = get_the_terms( $libro->ID, 'autores' ); ?>
		    					<p>
		    						<?php foreach  ($autores as $autor): ?>
		    						<?php $linkautor = get_term_link( $autor); ?>
									<a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
								<?php endforeach ?>
		    					</p>
		    				</header>
		    				<div class="booktype mg5">
		    				<?php $tipos = get_the_terms( $libro->ID, 'tipos' ); ?>
					
								<?php if($tipos){?>
								<?php foreach ($tipos as $tipo): ?>
									<?php $linktipo = get_term_link( $tipo); ?>
									<a href="<?php echo $linkautor ?>"><?php echo $tipo->name ?></a>
								<?php endforeach ?>
								<?php } ?>
							</div>
		    				<a class="cart" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">Ver producto</a>
		    				<footer class="inferior">
		    					<?php $price = get_post_meta( $libro->ID, '_regular_price'); ?>
		    					<?php $dprice = get_post_meta( $libro->ID, '_sale_price'); ?>
		    					
                               	<!--<pre><?php var_dump(get_post_meta($libro->ID , '_regular_price'))?></pre>
                                <pre><?php var_dump(get_post_meta($libro->ID , '_sale_price'))?></pre> -->
                                
			    				<span class="price">$<?php echo $price[0]; ?></span>

			    				<?php if($dprice[0] != ''){ ?>
			    				<span class="oferta">$<?php echo $dprice[0]; ?></span>
			    				<?php } ?>

		    				</footer>
		    			</figcaption>
		    		</figure>
		    		<!-- Fin datos de libro -->

		    		<?php endforeach ?>

		    		<div class="ctrl-div">
   	    			<a class="go-cta catalog" href="<?php echo get_post_type_archive_link('product') ?>" title="Ir a Noticias" rel="nofollow" target="_blank">Ir a Catálogo</a>
   	    		</div>
  
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
					<?php $libros = get_posts(array('post_type' => product , 'numberposts' => '1')) ?>
					<?php foreach($libros as $libro): ?>
					<h2 class="subs">Lanzamientos</h2>
					<figure class="launch">
						<?php echo get_the_post_thumbnail($libro->ID); ?>
						<figcaption class="launchdata light-grey">
							<header>
								<h4><?php echo substr($libro->post_title , 0 , 35 ) ?></h4>
								<span><?php $autores = get_the_terms( $libro->ID, 'autores' ); ?></span>
							</header>
							<?php echo substr($libro->post_content , 0 , 165 )?>...
						</br>
							<a href="<?php echo get_post_type_archive_link('product') ?>" title="Ver Catálogo" rel="nofollow">Ver Catálogo</a>
							<div class="clear"></div>
						</figcaption>

					</figure>
					<?php endforeach ?>
				</div>
				<!-- Fin Lanzamientos -->



				<!-- Comentarios -->
				<div class="col-md-4 mtop30 mbottom30">
					<h2 class="subs">Comentarios</h2>
					<?php $comentarioss = get_comments(array('post_type' => 'product' , 'number' => 2)) ?>
					<?php foreach($comentarioss as $comentario): ?>
					
					<article class="brdbottom">
						<p class="comments"><?php echo substr($comentario->comment_content , 0 , 140 ) ?>...</p>
					<a href="<?php echo get_the_permalink( $comentario->comment_post_ID) ?>">Por <?php echo $comentario->comment_author ?></a>
					</article>
					<?php endforeach ?>

				</div>
				<!-- Fin Comentarios -->



				<!-- Newsletter -->
				<div class="col-md-4 mtop30 mbottom30">
					<h2 class="subs">Newsletter</h2>
					<form class="send-news">
						<h4>Suscribete al newsletter</h4>
						<p>I used to think the world was this great place where everybody.</p>
 						<?php echo do_shortcode('[contact-form-7 id="124" title="Inscripción a Newsletter"]'); ?>
					</form>
				</div>
				<!-- Fin newsletter -->
			</div>	
		</div>
	</div>
</section>
		
<?php get_footer(); ?>