<?php // Flex Template for Phot essay image Slider
	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// template variables

	// generate random id number for slider in case there are more than one on page
	$id = rand( 5, 500);

	// image sizes
	$s = 'full';

	// Images Aspect Ratio
	$ar = get_sub_field('img_ar');
	

		

	$m = ' mb-'.get_sub_field('space');



?>

<?php //// ImageSlider ?>
<?php if( have_rows('img_rep') ): ?>
	<div class="row pe-imageslider<?php echo $m; ?>">
		<div class="col">

			<?php // Slider main container ?>
			<div id="swiper<?php echo $id; ?>" class="swiper-container pe-swiper bg-black" styles="max-width: 100%;">
				<?php // Additional required wrapper ?>
				<div class="swiper-wrapper align-items-center">
					<?php // Slides ?>
					<?php while( have_rows('img_rep') ): the_row(); 

						// load slide vars
						$img = get_sub_field('img');
						$cap = get_sub_field('cap');
						$sty = get_sub_field('sty');
						$aud = get_sub_field('aud');

						$iar = get_sub_field('iar');

					?>
						<div class="swiper-slide pe-card">
							<div class="slide-inner bg-dark">

								<?php if( ($ar && $ar != 'none') || ( $iar && $iar != 'none') ): ?>

	

									<div class="arb <?php if( $iar ) { echo $iar; } else { echo $ar; }; ?>">
										<div class="arbi">
											<div class="img-wrap obj">
												<?php if( $img){
													echo wp_get_attachment_image( $img, $s );
												}?>
											</div>
										</div>
									</div>
				
								<?php else: ?>
									<div class="img-wrap ar-none">
										<?php 
											if( $img ) {
												echo wp_get_attachment_image($img, $s);
											}
										?>
									</div>
								<?php endif; ?>

								<?php if( $cap ): ?>
									<div class="card-foot p-3">
										<?php if($sty == 1 ): ?>
											<p class="mb-0 cap"><em><?php echo $cap; ?></em></p>
										<?php else: ?>
											<p class="mb-0 cap"><?php echo $cap; ?></p>
										<?php endif; ?>

										<?php if($aud): ?>
											<div class="aud-wrap mt-3 text-center">
												 <audio controls controlsList="nodownload">
													<source src="<?php echo $aud; ?>" type="audio/mpeg">
													Your browser does not support the audio element.
												</audio> 
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>

							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php // If we need navigation buttons ?>
				<div class="swiper-button-prev pl-3"></div>
				<div class="swiper-button-next pr-3"></div>
			</div>
		</div>
	</div>

<?php // on page javascript for slider if it is added ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			// enable slider
			var swiper<?php echo $id; ?> = new Swiper('#swiper<?php echo $id; ?>', {
		        loop: true,
		        autoplay: false,
		        // autoHeight: true,
		        // centeredSlides: true,
		        // listen to containers and size accordingly (fixes modal bugs)
		        // observer: true, 
		        // observeParents: true,
		        // fade effect
				effect: 'fade',
				fadeEffect: {
					crossFade: true
				},
				// Navigation arrows
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
		    });

			// swiper<?php echo $id; ?>.updateAutoHeight('5000ms');

		    $( window ).resize(function() { swiper<?php echo $id; ?>.updateSize();  });
		});
	</script>
<?php endif; ?>
<?php ///////////////// ?>