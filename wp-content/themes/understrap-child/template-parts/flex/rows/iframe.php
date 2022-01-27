<?php // Flex Template for Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	$iframe = get_sub_field('iframe');

	$a = get_sub_field('align');	
	$m = ' mb-'.get_sub_field('space');



?>
<div class="row flex-iframe<?php echo $m; ?>">
	<div class="col">
		<div class="embed-responsive embed-responsive-16by9">
			<?php echo $iframe; ?>
		</div>
	</div>
</div>