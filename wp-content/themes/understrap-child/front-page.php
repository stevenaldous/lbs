<?php
/**
 *  This template is for the home/front page
 *
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="index-wrapper">

	<div id="content" tabindex="-1">
	<!-- <div class="container-md" id="content" tabindex="-1"> -->

		<?php //<div class="row"> ?>

			<main class="site-main" id="main">

				<?php 
					// Home slider
					get_template_part( 'template-parts/home/banner' );

					// Home grid
					get_template_part( 'template-parts/home/grid' );
				?>

			</main><!-- #main -->


		<?php // </div><!-- .row --> ?>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
