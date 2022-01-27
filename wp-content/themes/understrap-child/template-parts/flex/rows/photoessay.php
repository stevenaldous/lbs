<?php // Flex Template for a Photo Essay

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// post
	$post = get_sub_field('pe');

	
	
	
	// bottom margin
	$m = ' mb-'.get_sub_field('space');
	
	if($post):
		// set post data/
		setup_postdata($post);
?>
<div class="row flex-photoessay<?php echo $m; ?>">
	<div class="col">
		<?php get_template_part('cpt/pe-controller'); ?>
	</div>
</div>
<?php  wp_reset_postdata(); endif; ?>