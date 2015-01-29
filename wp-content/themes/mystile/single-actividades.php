<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
    
    $settings = array(
                    'thumb_w' => 787, 
                    'thumb_h' => 300, 
                    'thumb_align' => 'alignleft'
                    );
                    
    $settings = woo_get_dynamic_values( $settings );
?>
<div class="novedad-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Actividades</h1>
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
       
    <div id="content" class="page container">
    
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="col-md-8"> 			

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
            <article <?php post_class(); ?>>
                <div class="time-capsule mleft15mob">
                    <p><span><?php the_time( 'j M' ); ?></span>
                    </p>
                </div>
                <section class="activity-content">
                    <header class="title-data ptop15">
                        <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    </header>

                    <div class="extract">              
                        <?php the_excerpt(); ?> 
                    </div>


                    <?php 
                        if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] != 'novedades' ) { 
                            woo_image( 'width=' . $settings['thumb_w'] . '&height=' . $settings['thumb_h'] . '&class=thumbnail ' . $settings['thumb_align'] ); 
                        } 
                    ?>
                    
                    <section class="entry">
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
                        
                    </section><!-- /.entry -->

                </section>

            </article><!-- /.post -->
            
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) );

				} // End WHILE Loop
			} else {
		?>
<!-- 			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post --> -->
            <?php } // End IF Statement ?> 
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar('mixed'); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>