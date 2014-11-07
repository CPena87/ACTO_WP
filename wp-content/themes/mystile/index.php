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
<div id="content" class="cont-full">

    <div id="content" class="container col-full <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) echo 'with-banner'; ?> <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "false" ) echo 'no-sidebar'; ?>">
    
    	<?php woo_main_before(); ?>
    
		<section id="main" class="col-left">  
		
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

        <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "true" ) get_sidebar(); ?>

    </div><!-- /#content -->

    <div class="container">
    	<div class="row">
    		 <div class="col-md-9">
    		 	<div class="col-md-3">
    			asd
	    		</div>
	    		<div class="col-md-6">
	    			asd
	    		</div>
	    		<div class="col-md-9">
	    			asd
	    		</div>
    		 </div>
    		 <div class="col-md-3">
    		 	<h3>Reseñas</h3>
    		 </div>
    	</div>
    </div>

</div>
		
<?php get_footer(); ?>