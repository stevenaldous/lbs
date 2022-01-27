<?php
/**
 * The home grid section
 *
 * @package UnderStrap
 */


if( have_rows('home_grid') ): 
	$ct = 0;
?>


<?php ?>

	<div class="container-md">
		<div class="row row-eq-height">

			<?php while( have_rows('home_grid') && $ct < 4 ): the_row();

				// SLide variables
				$img = get_sub_field('img');
				$tit = get_sub_field('tit');
				$link = get_sub_field('link');
				$color = get_sub_field('color') ? get_sub_field('color') : 'btn-primary';


				// link variables
				if($link){
					$lu = $link['url'];
					$lt = $link['title'];
					$lx = $link['target'] ? $link['target'] : '_self';
				};

	    	?>
			<div class="col-12 col-md-6 col-xl-3 mb-3 px-0 px-md-3">
				<div class="g-card h-100 d-flex flex-column ">
					<div class="arb">
						<div class="arbi">
							<div class="obj img-wrap ">
								<?php echo wp_get_attachment_image( $img, 'full' ); ?>
							</div>
						</div>
					</div>
					<div class="copy-wrap text-center p-3 bg-white h-100 d-flex flex-column justify-content-between">



						<div class="d-flex h-100 justify-content-center flex-column">
							<p class="h3 title text-uppercase">
								<?php echo esc_html($tit); ?>
							</p>
						</div>
						

						

						<?php if($link): ?>

							<a class="btn <?php echo $color; ?> btn-fw align-self-end text-capitalize" href="<?php echo esc_url($lu) ?>" >
								<?php echo esc_html($lt); ?>
							</a>

						<?php endif; ?>

					</div>
				</div>
			</div>
		</li>





			<?php $ct++; endwhile; ?>
		</div>
	</div>
<?php endif; ?>
		
