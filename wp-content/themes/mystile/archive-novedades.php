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

            <div class="col-md-5 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Novedades</h1>
                </div>
            </div>

             <div class="col-md-6 col-md-offset-1 mtop60 mtop0mob">
                <div class=" jumbotron fleft mtop0mob">
                    <p>You don't get sick, I do. 123 That's also clear. But for some reason, you and I react the exact same way to water.</p>
                </div>
            </div>

        </div>
    </div>
</div>
    
    <div id="content" class="container">
    	
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="col-md-8"> 

		<?php if (have_posts()) : $count = 0; ?>
                

        <?php
	
			$settings = array(
					'thumb_w' => 787, 
					'thumb_h' => 200, 
					'thumb_align' => 'alignleft'
					);
					
			$settings = woo_get_dynamic_values( $settings );
		
        	// Display the description for this archive, if it's available.
        	woo_archive_description();
        ?>
        
	        <div class="fix"></div>
        
        	<?php woo_loop_before(); ?>
        	
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); $count++; ?>

				<article <?php post_class('post'); ?>>

                    <section class="nov-content">
                        <!-- <a href="<?php //echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                        </a> -->
                    
                        <header class="title-data">
                            <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <!-- <p class="author">Autor: <span><?php the_author(); ?></span></p> -->
                            <p class="date">Fecha: <span><?php the_time( 'j F' ); ?> de <?php the_time('Y')?></span></p>
                        </header>
                      <?php 
                            //set_post_thumbnail_size( 870, 200, true );
                            //set_post_thumbnail_size( 870, 200, array( 'center', 'center')  );
                            //woo_image( 'width=870&height=200&class=thumbnailalignleft' ); 
                        ?>

                      <?php 
                            if ( has_post_thumbnail() ) { 
                                the_post_thumbnail('encabezado');
                            } 
                        ?>
                
                        <section class="entry">
                        <?php if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] == 'novedades' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(); } ?>
                        <?php //woo_post_meta(); ?>
                        </section>
                
                          
                    </section><!--/.post-content -->
            
                </article><!-- /.post -->

			<?php endwhile; ?>
            
	        <?php else: ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>  
	        
	        <?php woo_loop_after(); ?>
    
			<?php woo_pagenav(); ?>
                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar('actividades'); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>