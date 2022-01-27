<?php // Flex Template for the Overview Block 


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	// text variables
	$t = get_sub_field('title');
	$txt = get_sub_field('text');

	// image vars
	$i = get_sub_field('image');
	$s = 'large';	

	// link vars
	$l = get_sub_field('link');

    if($l){
      $lu = $l['url'];
      $lt = $l['title'];
      $lx = $l['target'] ? $l['target'] : '_self';
    };

	// Bottom Margin var
	$m = ' mb-'.get_sub_field('space');	

?>
<div class="row flex-overview  <?php echo $m; ?>">
	<?php if( $i ) : ?>
	<div class="col-12 col-md-2 mb-2 mb-md-0 d-md-flex flex-md-column justify-content-center">
		<?php if($l): ?>
			<a href="<?php echo esc_url($lu) ?>" class="arb-wrap d-block mx-auto mx-md-0" target="<?php echo $lx; ?>">
			<?php endif; ?>
					<div class="arb arb-art-box">
						<div class="arbi">
							<div class="img-wrap obj">
								<?php echo wp_get_attachment_image($i, $s); ?>
							</div>
						</div>
					</div>
			<?php if($l): ?>
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>
	<div class="col d-flex flex-column justify-content-between">
		<div class="copy-wrap mb-3 mb-md-0">
			<h3 class="h2 text-uppercase mb-0"><?php echo $t; ?></h3>
			<p class="mb-0"><?php echo $txt; ?></p>
		</div> 

		<?php if($l): ?>
			<div class="btn-wrap mt-3 d-flex flex-row justify-content-center justify-content-md-end">
      	<a class="btn btn-primary " href="<?php echo esc_url($lu) ?>" target="<?php echo $lx; ?>" >
          	<?php echo esc_html($lt); ?>
      	</a>
      </div>
    <?php endif; ?>
				
	</div>
</div>