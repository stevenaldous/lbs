<?php // this template is for the below nav alert bar. Once a user closes, a cookie is created to check to make sure not to show again

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
	// Check to see if alert is enabled before doing anything
	$tf = get_field('alert_tf', 'options');

	if($tf == 1 ):

	// variables
	$title = get_field('alert_title', 'options');
	$subt = get_field('alert_subt', 'options');
	$theme = get_field('alert_theme', 'options');
	//alert-<?php echo $theme;

?>
<div id="alertNav" class="alert-nav <?php echo 'theme-'.$theme; ?> position-relative hide">
	<div class="container-fluid position-md-absolute">
		<div class="row">
			<div class="col">
				<div class="btn-wrap d-flex justify-content-end">
					<button id="alertClose" type="button" class="alert-close btn btn-close" aria-label="Close Alert Banner"><i class="far fa-times fa-2x"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="alert-content<?php echo ' bg-'.$theme; ?>">
		<div class="container">
			<div class="row pt-5 pb-3 pt-md-3">
				<div class="col-12 col-md-5">
					<div class="title-wrap text-center text-md-left">
						<?php if( $title ): ?>
							<p class="h2 title text-uppercase mb-1 mb-md-0"><?php echo $title; ?></p>
						<?php endif; ?>
						<?php if( $subt ): ?>
							<p class="h4 subt text-uppercase mb-3 mb-md-0"><?php echo $subt; ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col">
					<div class="copy-wrap">
						<?php if( have_rows('alert_list', 'options') ): ?>
							<ul class="mb-0">
								<?php while( have_rows('alert_list', 'options') ): the_row(); ?>
									<li><?php the_sub_field('text', 'options'); ?></li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>