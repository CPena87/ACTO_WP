<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

<div class="novedad-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Actividades</h1>
                    <p>You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water.</p>
                </div>

            </div>
        </div>
    </div>
</div>
    
    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="col-left"> 

		<?php if (have_posts()) : $count = 0; ?>
                

        <?php
    
            $settings = array(
                    'thumb_w' => 787, 
                    'thumb_h' => 300, 
                    'thumb_align' => 'alignleft'
                    );
                    
            $settings = woo_get_dynamic_values( $settings );
        
            // Display the description for this archive, if it's available.
            woo_archive_description();
        ?>
        
	        <div class="fix"></div>
        
        	<?php woo_loop_before(); ?>
            <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>

                    <div class="time-capsule">
                        <p><span><?php the_time( 'j M' ); ?></span>
                        </p>
                    </div>
                    <section class="activity-content">
                        <header class="title-data">
                            <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        </header>
                      
                        <section class="entry act">
                        <?php if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] == 'actividades' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(); } ?>
                        <p>Categorias:</p> <?php woo_post_meta(); ?>
                        </section>
                
                          
                    </section><!--/.post-content -->

                </article><!-- /.post -->
            <?php endwhile; ?>
            <!-- pagination -->
           
            
            <?php else : ?>
            <!-- No posts found -->
            <?php endif; ?>


            
	        <?php else: ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Lo sentimos, no se encuentra lo que buscas.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>  
	        
	        <?php woo_loop_after(); ?>
    
			<?php woo_pagenav(); ?>
            <?php wp_reset_query(); ?>   
                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar('content'); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>