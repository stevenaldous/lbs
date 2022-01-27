<?php // Flex Template for Fineprint

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// text variables
	$t = get_sub_field('text');
	$c = get_sub_field('cols');

	// alignment vars
	$a = ' text-'.get_sub_field('align');
	$m = ' mb-'.get_sub_field('space');
	
?>
<div class="row flex-fineprint<?php echo $m; ?>">
	<div class="col <?php echo $a; ?>">
		<p class="mb-0<?php if($c == 1){ echo ' two-col'; }; ?>">
			<em><?php echo $t; ?></em>
		</p>
	</div>
</div>