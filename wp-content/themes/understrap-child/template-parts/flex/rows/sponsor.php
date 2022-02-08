<?php // Flex Template for a sponsor

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	
	
	// bottom margin
	$m = ' mb-'.get_sub_field('space');

	$type = get_sub_field('sp_type');
	$ls = '';

	if( $type == 'level') {
		$lid = get_sub_field('sp_level');
		$level = get_term( $lid, 'sponsor_category');
		$ls = ' py-3 level-' . $level->slug;
	}

	
?>
<div class="row flex-sponsor<?php echo $m . $ls; ?>">
	<?php get_template_part('cpt/sp-flex/sp', $type); ?>
</div>