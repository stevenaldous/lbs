<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<?php // check for page Javascript  
		
		// Global Google Analytics JS
		$gajs = get_field('mbsajs_ga','options');
		if($gajs){
			echo $gajs;
		}


	?>

	<link rel="profile" href="http://gmpg.org/xfn/11">


	<?php // Load Google Font - Montserrat 200, 200i, 400, 400i, 500, 500i, 700  ?>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,700;1,200;1,400;1,500&display=swap');
	</style>

	<?php wp_head(); ?>


	<?php // check for page Javascript  
		
		// Global JS
		$hjs = get_field('mbsajs_head','options');
		if($hjs){
			echo $hjs;
		}

		// Page JS
		$phjs = get_field('pagejs_head');
		if($phjs){
			echo $phjs;
		}
	?>


	<?php // swiper JS ?>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<?php get_template_part('global-templates/top-banner'); ?>

		<?php get_template_part('global-templates/top-menu'); ?>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark baker-nav pb-md-0" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>

			<div class="container d-flex justify-content-between align-items-center align-items-md-end">
				<div>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->
				</div>
				<div class="d-flex justify-content-end flex-row justify-content-lg-between flex-md-grow-1 align-items-center">
				<!-- The WordPress Menu goes here -->
				<div class="alert-btn-wrap d-lg-none">
					<?php get_template_part('global-templates/alert-btn'); ?>
				</div>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
				</div>
			</div><!-- .container -->


		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
	<?php get_template_part('global-templates/alert-nav'); ?>

