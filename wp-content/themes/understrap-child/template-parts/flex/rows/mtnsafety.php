<?php // Flex Template for the Mountain Safety Block


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
<div class="row flex-mtnsafety  <?php echo $m; ?>">
	<?php if( $i ): ?>
	<div class="col-12 col-md-4 mb-2 mb-md-0">
		<div class="img-wrap text-center">
			<?php echo wp_get_attachment_image($i, $s); ?>
		</div>
	</div>
<?php endif; ?>
	<div class="col d-flex flex-column justify-content-between">
		<div class="copy-wrap mb-3 mb-md-0">
			<h3 class="h3 text-uppercase mb-0"><?php echo $t; ?></h3>
			<p class="mb-0"><?php echo $txt; ?></p>
		</div> 

		<?php if($l): ?>
			<div class="btn-wrap d-flex flex-row justify-content-center justify-content-md-end">
       	<a class="btn btn-primary " href="<?php echo esc_url($lu) ?>" target="<?php echo $lx; ?>" >
         	<?php echo esc_html($lt); ?>
       	</a>
      </div>
    <?php endif; ?>


		
				
		
	</div>
</div>