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
            <div class="col-md-6 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Sobre Acto</h1>
                    <p>You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water.</p>
                </div>

            </div>
        </div>
    </div>
</div>
    <div id="content" class="page col-full container">
    
    	<?php woo_main_before(); ?>
    	
		<section class="row"> 			

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
            <div <?php post_class('col-md-12'); ?>>

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



<div class=" medium-gray">
    <div class="container">
        <div class="row">
             <section class="col-md-12">

                <aside class="col-md-6 desc-team">
                    <p>
                        Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price.
                    </p>
                </aside>  
                <aside class="col-md-6 desc-team">
                    <p>
                        The lysine contingency - it's intended to prevent the spread of the animals is case they ever got off the island. Dr. Wu inserted a gene that makes a single faulty enzyme in protein metabolism. The animals can't manufacture the amino acid lysine. Unless they're continually supplied with lysine by us, they'll slip into a coma and die.
                    </p>
                </aside> 
            </section>
        </div>
    </div>
</div>	

<div class="container">
    <div class="row">
        <section class="col-md-12 quote-team">
            <p>“Well, the way they make shows is, they make one show. That show's called a pilot.”</p>
        </section>
    </div>
</div>
<?php get_footer(); ?>