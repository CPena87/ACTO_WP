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
                    <h1>Autores</h1>
                    <p>You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<?php 
$var = get_queried_object();

?>
    
    <div id="content" class="col-full container">
    	
    	<?php woo_main_before(); ?>
    	
		<section class="row"> 

		<?php if (have_posts()) : $count = 0; ?>

            <?php 
                $image = get_field('avatarautor' , 'autores_'. $var->term_id);
                $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                $avatarautor = wp_get_attachment_image_src( $image, $size );
            ?>
                
        <div class="col-md-3 prof-avatar">
            <img src="<?php echo $avatarautor[0]?>">
        </div>
        <aside class="col-md-9 prof-name">
            <h1 class="name"><?php echo $var->name ?></h1>
            <?php woo_archive_description(); ?>
            <?php echo get_field('descripcion' , 'autores_'.$var->term_id) ?>
        </aside>
        
	        <div class="fix"></div>
        
        	<?php woo_loop_before(); ?>
        	
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); $count++; ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

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


    </div><!-- /#content -->
		
<?php get_footer(); ?>