<?php // Flex Template for a sponsor

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	
	
	// bottom margin
	$m = ' mb-'.get_sub_field('space');
	
?>
<div class="row flex-sponsor<?php echo $m; ?>">
	<?php get_template_part('cpt/row-sponsor'); ?>
</div>