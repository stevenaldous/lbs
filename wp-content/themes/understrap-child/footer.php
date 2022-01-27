<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );


	$foot = get_field('footer', 'options'); 

	if($foot): 

		// menu IDs
		$lid = $foot['lm_id'];
		$rid = $foot['rm_id'];

		// Linked Image Vars
		$limg = $foot['li_img'];
		$liu = $foot['li_link']['url'];
		$lit = $foot['li_link']['title'];
		$lix = $foot['li_link']['target'] ? $foot['li_link']['target'] : '_self';

		// Forest Service img and copy
		$fimg  = $foot['fs_img'];
		$fcopy = $foot['fs_copy'];


		// Address Bar
		$acopy = $foot['ad_copy'];

		$add = $foot['ad_add'];

		// Ad link variables
		$alu = $foot['ad_link']['url'];
		$alt = $foot['ad_link']['title'];
		$alx = $foot['ad_link']['target'] ? $foot['ad_link']['target'] : '_self';

		// addtnl footer text
		$adtext = $foot['cr_text'];


		// copyright text
		$copr = $foot['cr_copy'];

		// link 1 variables
		$l1u = $foot['cr_link1']['url'];
		$l1t = $foot['cr_link1']['title'];
		$l1x = $foot['cr_link1']['target'] ? $foot['cr_link1']['target'] : '_self';

		// link 1 variables
		$l2u = $foot['cr_link2']['url'];
		$l2t = $foot['cr_link2']['title'];
		$l2x = $foot['cr_link2']['target'] ? $foot['cr_link2']['target'] : '_self';

		// phone vars

		$dtpho = get_field('mb_pho', 'options');
		$srpho = get_field('sr_pho', 'options')

?>


<div class="foot-bar bg-mb1 t-90"></div>
<div class="wrapper pb-0" id="wrapper-footer-full">

	<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

		<div class="row">

			<div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
				<?php
					if($lid){

						wp_nav_menu(
							array(
								'menu' 			  => $lid,
								'menu_class' 	  => 'clean',

								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); 

					}; 
				?>
			</div><?php // col 1 end ?>

			<div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
				<?php
					if($rid){

						wp_nav_menu(
							array(
								'menu' 			  => $rid,
								'menu_class' 	  => 'clean',

								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); 

					}; 
				?>
			</div><?php // col 2 end ?>

			<div class="col text-md-right">
				<?php if($dtpho): ?>
					<p class="mb-1">PHONE: <?php echo phone( $dtpho ); ?></p>
				<?php endif; ?>
				<?php if($srpho): ?>
					<p>SNOW REPORT: <?php echo phone( $srpho ); ?></p>
				<?php endif; ?>
			</div>

		</div>


		<?php // social icons ?>
		<div class="row">
			<div class="col d-flex justify-content-start justify-content-md-end">
				<?php get_template_part('global-templates/social-inline'); ?>
			</div>
		</div>
		<?php // social icons?>

	</div>

</div><!-- #wrapper-footer-full -->





<div class="wrapper bg-black p-2" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">


		<?php  if( $limg && $liu): // linked image row start ?>
		<div class="row">
			<div class="col-md-12">
				<div class="linked-image d-flex justify-content-center">
					<?php if($liu): ?>
						<a href="<?php echo esc_url( $liu ); ?>" target="<?php echo $lix; ?>">
							
							<?php 
								if($limg){
									$size = 'full';
									echo wp_get_attachment_image( $limg, $size, '', array( 'alt' => $lit ) );
								}
							?>							

						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; // linked image row end ?>



		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info d-flex justify-content-center align-items-center flex-column flex-md-row">
						<div class="img-wrap mr-2">
							<?php 
								if($fimg){
									$size = 'full';
									echo wp_get_attachment_image( $fimg, $size );
								}
							?>
						</div>



						<?php if($fcopy): ?>
							<p class="mb-0 text-center text-md-left"><?php echo esc_html($fcopy); ?></p>
						<?php endif; ?>
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->




<div class="wrapper bg-white p-2" id="wrapper-copyright">

	<div class="container-fluid">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="copyright">

					<div class="address d-flex justify-content-center align-items-center flex-row mb-2">
							<div>
								<p class="mb-0 text-center">
									<?php echo esc_html($acopy); ?> 
									<span>&#183;</span> <?php the_field($add.'_str', 'options'); ?>
									<span>&#183;</span> <?php the_field($add.'_city', 'options'); ?> 
									<?php the_field($add.'_state', 'options'); ?> 
									<?php the_field($add.'_zip', 'options'); ?>
									<span>&#183;</span> 
									<?php if($alu): ?>
										<a href="<?php echo esc_url( $alu ); ?>" target="<?php echo $alx; ?>">
											<?php echo esc_html( $alt ); ?>	
										</a>
									<?php endif; ?>
								</p>
							</div>			
					</div><!-- .site-info -->
					<?php if($adtext): ?>
						<div class="copyright ad-text d-flex justify-content-center align-items-center flex-row mb-2">
							<p class="mb-0 text-centered"><em><?php echo $adtext; ?></em></p>
						</div>
					<?php endif; ?>
					<div class="copyright d-flex justify-content-between align-items-center flex-column flex-md-row">
							<div>
								<p class="mb-0 text-center">Copyright &copy; <?php echo esc_html($copr); ?></p>
							</div>
			
							<div class="util-links">
								<?php if($l1u): ?>
									<a href="<?php echo esc_url( $l1u ); ?>" target="<?php echo $l1x; ?>">
										<?php echo esc_html( $l1t ); ?>		
									</a>
								<?php endif; ?>
								<?php if($l2u): ?>
									<a class="ml-2" href="<?php echo esc_url( $l2u ); ?>" target="<?php echo $l2x; ?>">
										<?php echo esc_html( $l2t ); ?>		
									</a>
								<?php endif; ?>
							</div>

							

				
					</div><!-- .site-info -->

				</footer><!-- #copyright -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

<?php endif; ?>

</div><!-- #page we need this extra closing tag here -->


<?php // check for page Javascript

	// Global JS
	$fjs = get_field('mbsajs_foot','options');
	if($fjs){
		echo $fjs;
	}
	// page specific JS
	$pfjs = get_field('pagejs_foot');
	if($pfjs){
		echo $pfjs;
	}
?>

<?php wp_footer(); ?>

</body>

</html>

