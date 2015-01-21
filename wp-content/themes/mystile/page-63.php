<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Page Template Autores
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
<div class="autores-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Autores</h1>
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
            <article <?php post_class('col-md-12'); ?>>

                <section class="entry">

                	<?php the_content(); ?>

                       <?php $autores = get_terms( 'autores'  , array('hide_empty' => false )) ?>

                        <?php foreach($autores as $autor): ?>
                            <?php $linkautor = get_term_link( $autor); ?>
                            
                               <figure class="col-md-4 avatarautor ">
                                    <?php 
                                        $image = get_field('avatarautor' , 'autores_'. $autor->term_id);
                                        $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                                        $avatarautor = wp_get_attachment_image_src( $image, $size )
                                    ?>
                                    <a href="<?php echo $linkautor ?>"><img src="<?php echo $avatarautor[0]?>"></a>
                                    <figcaption class="desc-autor">
                                        <a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
                                        <?php $descripcionn = get_field('descripcion' , 'autores_'.$autor->term_id) ?>
                                        <?php echo substr($descripcionn, 0, 125 ) ?>
                                    </figcaption>
                              </figure>
                         

                        <?php endforeach ?>

                    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>

					
               	</section><!-- /.entry -->

			
                
            </article><!-- /.post -->
            
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
                    <?php 
                        $leftcol = get_field('leftcol' , $post->ID);
                        $rightcol = get_field('rightcol' , $post->ID);
                        $remate = get_field('lasttext' , $post->ID);
                     ?>
             <section class="col-md-12">
                <aside class="col-md-6 desc-team">

                    
                    <p>
                    <?php echo $leftcol; ?>
                    </p>
                </aside>  

                <aside class="col-md-6 desc-team">
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