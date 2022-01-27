<?php // Flex Template for Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	$i = get_sub_field('image');
	$s = get_sub_field('size');	

	$m = ' mb-'.get_sub_field('space');

	$tf = get_sub_field('active');

?>
<div class="row flex-image<?php echo $m; ?>">
	<div class="col">
		<?php if( $tf == 1 ): 

			// link
			$link = get_sub_field('link');
		      // link variables
		      if($link){
		        $lu = $link['url'];
		        $lt = $link['title'];
		        $lx = $link['target'] ? $link['target'] : '_self';
		      };

		?>
			<a class="img-wrap d-block" href="<?php echo esc_url($lu) ?>" target="<?php echo $lx; ?>" title="open link to <?php echo esc_html($lt); ?>">
				<?php 
					if( $i ) {
						echo wp_get_attachment_image($i, $s);
					}
				?>
			</a>
		<?php else: ?>
			<div class="img-wrap">
				<?php 
					if( $i ) {
						echo wp_get_attachment_image($i, $s);
					}
				?>
			</div>
		<?php endif; ?>
	</div>
</div>