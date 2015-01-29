<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: SobreActo
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
?>
<div class="novedad-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Sobre Acto</h1>
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
    	
		<section class="row"> 			

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
            <div <?php post_class('col-md-12 pd0mob'); ?>>

                <section class="entry">
                    <?php the_content(); ?>
                	
					
               	</section><!-- /.entry -->

            </div><!-- /.post -->
            
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
            		comments_template();
            	}

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?>
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

    </div><!-- /#content -->



<div class=" medium-gray related-column">
    <div class="container">
        <div class="row">
                    <?php 
                        $leftcol = get_field('leftcol' , $post->ID);
                        $rightcol = get_field('rightcol' , $post->ID);
                        $remate = get_field('lasttext' , $post->ID);
                     ?>
             <section class="col-md-12">
                <aside class="col-md-8 col-md-offset-2">
                    <p>
                    <?php echo $leftcol; ?>
                    
                    </p>
                    <p>
                    <?php echo $rightcol; ?>
                    </p>
                </aside>  


            </section>
        </div>
    </div>
</div>	

<div class="container">
    <div class="row">
        <section class="col-md-12 quote-team">
            <p>“<?php echo $remate; ?>”</p>
        </section>
    </div>
</div>
<?php get_footer(); ?>