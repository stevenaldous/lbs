<?php // Flex Template for Lightbox 

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	

	if( have_rows('lb_rep') ):

		// generate random id number for collapse feature
		$id = rand( 5, 500);

		// get bottom spacing
		$m = ' my-'.get_sub_field('space');

?>
<div class="row flex-lightbox">
	<div class="col">
		<div class="gallery-wrap d-flex justify-content-start flex-wrap">
			<?php 
				

				while( have_rows('lb_rep') ): the_row(); 
					$ct = get_row_index();
					$img = get_sub_field('image');
					$s = 'medium';
					

					if($img):
			?>






				<button class="no-btn w-100 arb-wrap slide-to mr-3 mt-3" data-swiper="<?php echo $ct; ?>" data-toggle="modal" data-target="#modal<?php echo $id; ?>">
					<div class="arb arb-1-1">
						<div class="arbi">
							<div class="img-wrap obj">
								<?php echo wp_get_attachment_image($img, $s ); ?>
							</div>
						</div>
					</div>
					<span class="sr-only">Open modal for the photo gallery</span>
				</button>
			<?php endif; endwhile; ?>
		</div>
	</div>
</div>






<!-- Modal Gallery -->
<div id="modal<?php echo $id; ?>" class="modal modal-swiper modal-lightbox" role="button" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content bg-white">
			<div class="modal-header pb-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="far fa-times fa-lg"></i>
				</button>
			</div>
			<div class="modal-body">
				<!-- Slider main container -->
				<div id="slider<?php echo $id; ?>" class="swiper-container" styles="max-width: 100%;">

				<!-- Additional required wrapper -->
				<div class="swiper-wrapper align-items-center">

					<!-- Slides -->
					<?php 
						while( have_rows('lb_rep') ): the_row(); 
							$ct = get_row_index();
							$img = get_sub_field('image');
							$s = 'full';
							

							if($img):

								// link
								$link = get_sub_field('link');
							      // link variables
							      if($link){
							        $lu = $link['url'];
							        $lt = $link['title'];
							        $lx = $link['target'] ? $link['target'] : '_self';
							      };
					?>
					<div class="swiper-slide">
						<div class="slide-inner">
							<div class="img-wrap text-center flex-grow-0">
								<?php echo wp_get_attachment_image($img, $s ); ?>
							</div>

							<?php //load photo acf meta
								$fl = get_field('fl', $img);
								$sl = get_field('sl', $img);

								if( $fl || $sl ):
							?>
								<div class="copy-wrap pt-4 d-grid">
									<div class="caption-wrap">
										<?php if($fl){ echo '<p class="text-muted mb-0">'.$fl.'</p>'; } ?>
										<?php if($sl){ echo '<p class="text-muted mb-0">'.$sl.'</p>'; } ?>
									</div>
									
									<?php if($link): ?>
										<div class="btn-wrap text-center mt-3 mt-md-0">
									    	<a href="<?php echo esc_url($lu) ?>"  target="<?php echo $lx; ?>">
									        	<?php echo esc_html($lt); ?>
									    	</a>
										</div>
									<?php endif; ?>

								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; endwhile; ?>
				</div>
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"><i class="far fa-chevron-left"></i></div>
				<div class="swiper-button-next"><i class="far fa-chevron-right"></i></div>
				</div>
			</div>
		</div>
	</div>
</div>















<script type="text/javascript">
jQuery(document).ready(function($) {


	// enable slider
	var swiper<?php echo $id; ?> = new Swiper('#slider<?php echo $id; ?>', {
        loop: true,

        autoplay: false,

        centeredSlides: true,

        // listen to containers and size accordingly (fixes modal bugs)
        observer: true, 
        observeParents: true,

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

	// when theumbnail is clicked, open slider at that image.
    $('.slide-to').on( 'click', function(){
    	$slide = $(this).attr('data-swiper')
    	swiper<?php echo $id; ?>.slideTo($slide);
    })



    $( window ).resize(function() { swiper<?php echo $id; ?>.updateSize();  });


});



</script>





<?php endif; ?>