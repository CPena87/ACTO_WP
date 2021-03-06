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

            <div class="col-md-5">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Reseñas</h1>
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
    	
		<section id="main" class="col-md-8 pd0mob"> 

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
            <!-- the loop -->
            <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>


				<article <?php post_class('post'); ?>>

                    <div class="reviewer">
                        <?php 

                            $image = get_field('imagen' , $post->ID);
                            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                            $src = wp_get_attachment_image_src( $image, $size );
                            $zine = get_field('revista' , $post->ID);

                        ?>
                        <img src="<?php echo $src[0]?>">
                        <div class="sign"></div>    
                    </div>
                    
                    <section class="post-content">
                    
                        <header class="resign-data">
                            <?php if(get_field('destino', $post->ID) == 'externo'){  ?>

                            <h1><a href="<?php echo get_field('link',$post->ID); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <?php } elseif (get_field('destino', $post->ID) == 'local') {?>
                            <h1><a class="fleft" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <?php } ?>

                            <p class="author mbottom10">Fuente: <span><?php echo $zine;?></span></p>
                            <p class="author mbottom10">Por: <span class="stronged"><?php the_author(); ?></span></p>
                        </header>
                
                        <section class="entry rev-excerpt">
                        <?php if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] == 'novedades' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(0 , 75); } ?>
                       

                        <?php if(get_field('destino', $post->ID) == 'externo'){  ?>

                            <a class="fleft" href="<?php echo get_field('link',$post->ID); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Continúa Leyendo</a>
                       <?php } elseif (get_field('destino', $post->ID) == 'local') {?>
                            <a class="fleft" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Continúa Leyendo</a>
                       <?php } ?>
                        <?php woo_post_meta(); ?>
                        </section>
                
                          
                    </section><!--/.post-content -->
            
                </article><!-- /.post -->

			<?php endwhile; ?>

            <?php else: ?>
            
            <?php endif; ?>  
            
	        <?php else: ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>  
	        
	        <?php woo_loop_after(); ?>
    
			<?php woo_pagenav(); ?>
                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar('mixed'); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>