<?php // Flex Template for Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	$f = get_sub_field('form');

	$a = get_sub_field('align');	
	$m = ' mb-'.get_sub_field('space');



?>
<div class="row flex-form<?php echo $m; ?>">
	<div class="col">
		 <?php echo gravity_form( $f , false , false, false, '', true, ); ?>
	</div>
</div>