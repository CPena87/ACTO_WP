<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Productos
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>

	<div class="novedad-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-6 ">
	                <div id="take" class="carousel-
	                caption jumbotron fleft">
	                    <h1>Productos</h1>
	                    <p>You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water.</p>
	                </div>

	            </div>
	        </div>
	    </div>
	</div> 
       
    <div id="content" class="page col-full">
    
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="fullwidth">
           
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                             
                <article <?php post_class(); ?>>
					
                    
                    <section class="entry">
	                	<?php the_content(); ?>
	               	</section><!-- /.entry -->

				

                </article><!-- /.post -->
                                                    
			<?php
					} // End WHILE Loop
				} else {
			?>
				<article <?php post_class(); ?>>
                	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                </article><!-- /.post -->
            <?php } ?>  
        
		</section><!-- /#main -->
		
		<?php //woo_main_after(); ?>
		
    </div><!-- /#content -->
		
<?php get_footer(); ?>