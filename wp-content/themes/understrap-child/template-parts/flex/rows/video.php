<?php // Flex Template for Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	// get original video
	$v = get_sub_field('video');

	// get qty of videos for row
	$q = 0; // set to 0 for sidebar
	$q = get_sub_field('qty');

	$m = ' mb-'.get_sub_field('space');

	$a = ' text-'.get_sub_field('align');



?>
<div class="row flex-video<?php echo $m ; ?>">
	<div class="col">
		<div class="embed-wrap <?php echo $a; ?>">
			<?php 
				if( $v  ) {
					echo $v;
				} 
			?>
		</div>
	</div>
	<?php if( $q == 1 ): $v2 = get_sub_field('vtwo');?>
		<div class="col-12 col-md-6">
			<div class="embed-wrap <?php echo $a; ?>">
				<?php 
					if( $v2  ) {
						echo $v2;
					} 
				?>
			</div>
		</div>
	<?php endif; ?>
</div>