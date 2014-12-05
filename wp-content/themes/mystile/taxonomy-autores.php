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

                <!-- Content Area -->
                <?php woo_loop_before(); ?>
                
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); $count++; ?>

                   

                <?php endwhile; ?>
                
                <?php else: ?>
                
                    <article <?php post_class(); ?>>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                    </article><!-- /.post -->
                
                <?php endif; ?>  
                
                <?php woo_loop_after(); ?>
                <!-- Content Area Fin -->
            </aside>
		
		</section><!-- /#main -->

        <section class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>Publicaciones Relacionadas al Autor</h2>
                <!-- Textos relacionados -->
                <?php $libros = get_posts(array('post_type' => product , 'numberposts' => '8')) ?>
                    
                    <?php foreach($libros as $libro): ?>
                    
                    <!-- Corresponde a los datos del libro -->
                    <figure class="col-md-3 producto pdbottom10 pleft0">
                        <a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
                        <?php echo get_the_post_thumbnail($libro->ID); ?>
                    </a>
                        <div class="over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
                        <figcaption class="white">
                            <header class="superior related">
                                <h4><?php echo $libro->post_title ?></h4>
                                <?php $autores = get_the_terms( $libro->ID, 'autores' ); ?>
                                <p>
                                    <?php foreach  ($autores as $autor): ?>
                                    <?php $linkautor = get_term_link( $autor); ?>
                                    <a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
                                <?php endforeach ?>
                                </p>
                            </header>
                            <a class="cart" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">Ver producto</a>
                            <footer class="inferior">
                                <?php $price = get_post_meta( $libro->ID, '_regular_price'); ?>
                                <?php $dprice = get_post_meta( $libro->ID, '_sale_price'); ?>
                                
                                <span class="price">$<?php echo $price[0]; ?></span>

                                <?php if(get_post_meta( $libro->ID, '_sale_price')){ ?>
                                <span class="oferta">$<?php echo $dprice[0]; ?></span>
                                <?php } ?>

                            </footer>
                        </figcaption>
                    </figure>
                    <!-- Fin datos de libro -->

                    <?php endforeach ?>
                <!-- Fin de textos relacionados -->
                </div>

                <div class="col-md-4">
                    <h3>Novedades</h3>

                    <?php $novedades= get_posts(array('post_type' => 'novedades', 'numberposts' => 2)); ?>
                    <?php $countnovedades = 0 ?>
                    <?php foreach ($novedades as $novedad): ?>
                    <?php $countnovedades++ ?>

                    <article class="col-md-12 pd0 wide">

                        
                            <h3><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
                            <?php echo substr($post->post_content , 0 , 150 )?>
                        
                    </article>
                    <?php endforeach ?>

                </div>
            </div>
        </section>
		
		<?php woo_main_after(); ?>

    </div>
    <!-- /#content -->


		
<?php get_footer(); ?>