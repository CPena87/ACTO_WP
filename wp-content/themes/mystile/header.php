<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-theme.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stemplate_directory'); ?>/css/bootstrap-theme.min.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

</head>

<body <?php body_class('opal-white') ?> >

<div id="wrapper" >
	<?php woo_header_before(); ?>
	
		<div class="bg-head">
			<header id="header" class="col-full">
		
		    		<hgroup class="col-md-logo col-md-1">
		    			<img src="<?php bloginfo('template_directory') ?>/images/logo.png">
		    	
				<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
				    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
				    	<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
				    </a>
			    <?php } ?>

			</hgroup>

	        <?php woo_nav_before(); ?>

			<nav id="navigation" class="col-md-6" role="navigation">

				<?php
				if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
					wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
				} else {
				?>
		        <ul id="main-nav" class="nav fl">
					<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
					<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Inicio', 'woothemes' ); ?></a></li>
					<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
				</ul><!-- /#nav -->
		        <?php } ?>

			</nav><!-- /#navigation -->

			<?php woo_nav_after(); ?>

			<!-- Navegacion secundaria carro de compra -->
			<nav class="col-md-3 cart-nav" role="navigation">
				<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
				<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
				<?php } ?>
				<?php
					if ( class_exists( 'woocommerce' ) ) {
						echo '<ul class="nav wc-nav">';
						woocommerce_cart_link();
						//echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
						// echo get_search_form();
						echo '</ul>';
					}
				?>
			</nav>
			<!-- Fin Navegacion -->

			<nav class="col-md-esp fleft social-top">
				<ul>
					<li><a class="twitter" href="/" title="@Actoeditores" rel="tag">Twitter</a></li>
					<li><a class="facebook" href="/" title="Acto Editores" rel="tag">Facebook</a></li>
					<li><a class="pinterest" href="/" title="Acto Editores" rel="tag">Pinterest</a></li>
				</ul>
			</nav>
		    	

		</header><!-- /#header -->
		</div>



</div>

<!-- Copiar la apertura de <div class="container"> en cada portada o single del theme -->

    

	<?php woo_content_before(); ?>