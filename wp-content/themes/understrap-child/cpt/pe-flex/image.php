<?php // Flex Template for Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// template variables

	// image sizes
	$s = 'full';

	// img 1 (or only img)
	$i1 = get_sub_field('img1');
	$i1ar = get_sub_field('img1_ar');
	$i1cap = get_sub_field('img1_cap');
	$i1sty = get_sub_field('img1_sty');
	$i1aud = get_sub_field('img1_aud');

		

	$m = ' mb-'.get_sub_field('space');

	$qty = get_sub_field('qty');



?>
<div class="row flex-image<?php echo $m; ?>">
	<div class="col">
		<div class="pe-card">
			<?php // image and aspect ratio logic ?>
			<?php if( $i1ar && $i1ar != 'none' ): ?>
				<div class="arb <?php echo $i1ar; ?>">
					<div class="arbi">
						<div class="img-wrap obj">
							<?php if( $i1){
								echo wp_get_attachment_image( $i1, $s );
							}?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="img-wrap">
					<?php 
						if( $i1 ) {
							echo wp_get_attachment_image($i1, $s);
						}
					?>
				</div>
			<?php endif; ?>
			<?php ////////////////////////////////// ?>
			<?php if( $i1cap ): ?>
			<div class="card-foot p-3">
				<?php if($i1sty == 1 ): ?>
					<p class="mb-0 cap"><em><?php echo $i1cap; ?></em></p>
				<?php else: ?>
					<p class="mb-0 cap"><?php echo $i1cap; ?></p>
				<?php endif; ?>

				<?php if($i1aud): ?>

					<div class="aud-wrap mt-3 text-center">
						 <audio controls controlsList="nodownload">
							<source src="<?php echo $i1aud; ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio> 
					</div>

				<?php endif; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>


	<?php // check for a second image and change layout
		if($qty == 1): 

			// img 2 
			$i2 = get_sub_field('img2');
			$i2ar = get_sub_field('img2_ar');
			$i2cap = get_sub_field('img2_cap');
			$i2sty = get_sub_field('img2_sty');
			$i2aud = get_sub_field('img2_aud');
	?>
		<div class="col-12 col-md-6">
			<div class="pe-card">
				<?php // image and aspect ratio logic ?>
				<?php if( $i2ar && $i2ar != 'none' ): ?>
					<div class="arb <?php echo $i2ar; ?>">
						<div class="arbi">
							<div class="img-wrap obj">
								<?php if( $i2){
									echo wp_get_attachment_image( $i2, $s );
								}?>
							</div>
						</div>
					</div>
				<?php else: ?>
					<div class="img-wrap">
						<?php 
							if( $i2 ) {
								echo wp_get_attachment_image($i2, $s);
							}
						?>
					</div>
				<?php endif; ?>
				<?php ////////////////////////////////// ?>
				<?php if( $i2cap ): ?>
				<div class="card-foot p-3">
					<?php if($i2sty == 1 ): ?>
						<p class="mb-0 cap"><em><?php echo $i2cap; ?></em></p>
					<?php else: ?>
						<p class="mb-0 cap"><?php echo $i2cap; ?></p>
					<?php endif; ?>

					<?php if($i2aud): ?>
		
						<div class="aud-wrap mt-3 text-center">
							 <audio controls controlsList="nodownload">
								<source src="<?php echo $i2aud; ?>" type="audio/mpeg">
								Your browser does not support the audio element.
							</audio> 
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			</div>
		</div>


	<?php endif; ?>


</div>