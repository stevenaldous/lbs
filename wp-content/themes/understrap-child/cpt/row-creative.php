<?php
/**
 * Template for Creative Partners
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	// get excerpt
	$excerpt = get_field('excerpt') ? get_field('excerpt') : get_field('bio');
	// get the title
	$t = get_the_title();
	$id = get_the_ID();

	$images = get_field('gallery');
	


	

	if($images) {
		// count number of images in gallery
		$itot = count($images);
		if ( $itot > 1 ) {
			$img1 = array_shift($images);
		} else {
			$img1 = $images[0];
		}
	}
	$title = '<h2 class="h2 mr-3 mb-0">'.$t.'</h2>';

	// check if there is category titles used to set hx size
	if($terms){
		if( count($terms) > 1 ) {
			$title = '<h3 class="h3 mr-3 mb-0">'.$t.'</h3>';
		}
	}
?>
<div class="row mb-4 mb-lg-3 cpt-partner partner-creative">
	<?php // use first image from gallery
		if( $images && $img1 ): 
			$img = $img1; 
			$s = 'medium'; 
	?>
		<div class="col-12 col-md-3">
			<?php if( $itot > 1 ): ?>
				<button class="no-btn w-100 arb-wrap slide-to" role="button"  data-swiper="1" data-toggle="modal" data-target="#modal<?php echo $id; ?>">
					<div class="arb arb-art-box">
						<div class="arbi">
							<div class="img-wrap obj">
								<?php if($img){
									echo wp_get_attachment_image($img, $s );
								}?>
							</div>
						</div>
					</div>
				</button>
			<?php else: ?>
				<div class="img-wrap obj h-100">
					<?php if($img){
						echo wp_get_attachment_image($img, $s );
					}?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="col">
		<div class="title-wrap d-flex flex-column flex-lg-row justify-content-start align-items-baseline mb-3 mb-md-0">
			<?php echo $title; ?>

			<?php if( have_rows('web_rep') ): /* loop through link repeater */  ?>

				<div class="website d-flex flex-column flex-md-row justify-content-start mb-2 mb-lg-0">

					<?php while( have_rows('web_rep') ): the_row(); 
						$type = get_sub_field('type');

						if( $type == 'link' ){

							// check for and get links
							$link = get_sub_field('link');

							 // link variables
							if($link):
								$lu = $link['url'];
								$lt = $link['title'];
								$lx = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="mr-md-3" href="<?php echo esc_url($lu) ?>"  target="<?php echo $lx; ?>">
				        	<?php echo esc_html($lt); ?>
				           </a>
				        <?php endif; ?>

					<?php } elseif( $type == 'pho' ){

						$num = get_sub_field('pho');
						$dis = get_sub_field('pho_display');

					?>

						<a class="mr-md-3"  href="tel:+1<?php echo $num; ?>"><?php echo $dis; ?></a>

					<?php }; ?>
			<?php endwhile;?>

			</div>
		<?php endif; ?>
		</div>
		<div class="copy-wrap">
			<?php if($excerpt): ?>
				<p><?php echo $excerpt; ?></p>
			<?php endif; ?>
		</div>
		

		<div class="gallery-wrap d-flex justify-content-start">
			<?php if($images):  if ( $itot > 1 ): 
				// set thumbnail size
				$s = 'thumbnail'; 

				$ct = 2;
				foreach($images as $img ) :
			?>
			<button class="d-inline-block img-wrap mr-3 ratio ratio-1x1 p-0 slide-to" data-swiper="<?php echo $ct; ?>" data-toggle="modal" data-target="#modal<?php echo $id; ?>">
				<?php echo wp_get_attachment_image($img, $s ); ?>
				<span class="sr-only">Open modal for <?php echo $t ; ?> Photo gallery</span>
			</button>
			
			<?php $ct++; endforeach; ?>

			<?php endif; endif; ?>

		</div>

	</div>
</div>
<?php 
	// if image gallery, reset to original array and make popup
	if($images):if( $itot = 1 ):
		array_unshift($images, $img1);
		$s='full';
?>	
<!-- Modal Gallery -->
<div id="modal<?php echo $id; ?>" class="modal modal-swiper" role="button" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
					<?php foreach( $images as $img): ?>
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
								<div class="copy-wrap pt-4">
									<?php if($fl){ echo '<p class="text-muted mb-0">'.$fl.'</p>'; } ?>
									<?php if($sl){ echo '<p class="text-muted mb-0">'.$sl.'</p>'; } ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endforeach; ?>
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

<?php endif; endif; ?>
