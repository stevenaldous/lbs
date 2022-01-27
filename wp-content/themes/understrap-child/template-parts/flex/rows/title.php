<?php // Flex Template for Single Image


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	$t = get_sub_field('title');
	$a = ' text-'.get_sub_field('align');
	$m = ' mb-'.get_sub_field('space');
	$s = get_sub_field('sem_hx');
	$v = get_sub_field('vis_hx');

	$c = get_sub_field('color');

	$title = '<'.$s.' class="'.$v.$a.' mb-0">'.$t.'</'.$s.'>';
?>
<div class="row flex-title<?php echo $m; ?>">
	<div class="col<?php if( $c == 1 ) { echo ' mbsa-color'; }; ?>">
		<?php echo $title; ?>
	</div>
</div>