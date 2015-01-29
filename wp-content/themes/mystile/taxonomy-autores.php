<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

<div class="autores-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-5 ">
                <div id="take" class="carousel-
                caption jumbotron fleft">
                    <h1>Autores</h1>
                
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
                    <div class="proust">
                        
                        <?php $preguntas = get_field('cuestionario' , 'autores_'.$var->term_id) ?>
                        <?php if ($preguntas){ ?>
                        <?php foreach($preguntas as $pregunta): ?>

                        <h2>Cuestionario Proust</h2>

                        <h4><?php echo $pregunta['ask'] ?></h4>
                        <blockquote> <p><?php echo $pregunta['answer'] ?></p> </blockquote>
                        <?php endforeach ?>
                        <?php } ?>
                </div>  
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

                <h2 class="pub-autores">Publicaciones Relacionadas al Autor</h2>
                <!-- Textos relacionados -->
                <?php $libros = get_posts(array('post_type' => product , 'numberposts' => '8')) ?>
                    
                    <?php foreach($libros as $libro): ?>
                    <?php  $product = wc_get_product( $libro->ID );?>

                    <?php $gprice = $product->price;?>

                    <?php if($product->post->post_parent == '0'){ ?>
                    
                    <!-- Corresponde a los datos del libro -->
                    <figure class="col-md-3 col-sm-3 col-xs-6 producto pdbottom10 pleft0">
                        <a class="entered" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">
                        <?php echo get_the_post_thumbnail($libro->ID , 'portadillas'); ?>
                    </a>
                        <div class="maxim over-oustand"><img src="<?php bloginfo('template_directory'); ?>/images/new-icon.png" alt=""></div>
                        <figcaption class="white">
                            <header class="superior related">
                                <h4><?php echo substr($libro->post_title , 0 , 65 )?></h4>
                                <?php $autores = get_the_terms( $libro->ID, 'autores' ); ?>
                                <p>
                                    <?php foreach  ($autores as $autor): ?>
                                    <?php $linkautor = get_term_link( $autor); ?>
                                    <a href="<?php echo $linkautor ?>"><?php echo $autor->name ?></a>
                                <?php endforeach ?>
                                </p>
                            </header>
                            <div class="clear"></div>
                            <?php $tipos = get_the_terms( $libro->ID, 'tipos' ); ?>
                            <div class="booktype mg5">
                                <?php if($tipos){?>
                                <?php foreach ($tipos as $tipo): ?>
                                    <?php $linktipo = get_term_link( $tipo); ?>
                                    <a href="<?php echo $linkautor ?>"><?php echo $tipo->name ?></a>
                                <?php endforeach ?>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>

                            <a class="cart" href="<?php echo get_permalink($libro->ID) ?>" title="Ver producto" rel="help">Ver producto</a>
                            <footer class="inferior">
                                <?php $price = get_post_meta( $libro->ID, '_regular_price'); ?>
                                <?php $dprice = get_post_meta( $libro->ID, '_sale_price'); ?>
                                

                                <?php if(get_post_meta( $libro->ID, '_sale_price')){ ?>
                                        
                                    <span class="oferta">Dcto.<?php echo $dprice[0]; ?></span>
                                    <span class="price">$<?php echo $price[0]; ?></span>
                                <?php }else{ ?>
                                    <span class="price">$<?php echo $price[0]; ?></span>
                                <?php } ?>
                            <?php } ?>

                            </footer>
                        </figcaption>
                    </figure>
                    <!-- Fin datos de libro -->

                    <?php endforeach ?>
                <!-- Fin de textos relacionados -->
            </aside>
        
        </section><!-- /#main -->
        
        <?php woo_main_after(); ?>

    </div>
    <!-- /#content -->

<!-- Modal -->
<div class="gray-cta">
    <section class="container ">
        <div class="row">
            <div class="col-md-12 col-sm-12 publish-cta">
                <img src="<?php bloginfo('template_directory'); ?>/images/writing-gray.png" alt="">
                <h2>Tu puedes ser parte de Acto Editores</h2>
                <h3>Te invitamos a publicar con nosotros, llenando el siguiente formulario</h3>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Escribenos aquí
                </button>
            </div>
        </div>  
    </section>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="183" title="Editar en Acto"]'); ?>
      </div>

    </div>
  </div>
</div>
<!-- Fin Modal -->


<div class="container mtop20mob brdtop">
    <div class="row">
        <div class="col-md-12 sidecontent mtop30 mbottom50">

            <h3 class="title-sidebar">Novedades</h3>

                <?php $novedades = get_posts(array('post_type' => 'novedades', 'numberposts' => 2)); ?>
                <?php $countnovedades = 0 ?>
                <?php foreach ($novedades as $novedad): ?>
                <?php $countnovedades++ ?>

                <article class="col-md-6 pd0 wide ">
                    <h3><a href="<?php echo get_permalink($novedad->ID) ?>" title="<?php echo $novedad->post_title ?>" rel="blog"><?php echo $novedad->post_title ?></a></h3>
                    <p><?php echo substr($novedad->post_content , 0 , 200 )?>...</p>
                </article>
            <?php endforeach ?>

        </div>
    </div>
</div>

		
<?php get_footer(); ?>