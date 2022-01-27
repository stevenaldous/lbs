<?php // Flex Template for Spacer

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	$m = ' my-'.get_sub_field('ht');

	$v = ' sp-'.get_sub_field('vis');
?>
<div class="row flex-spacer">
	<div class="col">
		<div class="<?php echo $m.$v; ?>"></div>
	</div>
</div>