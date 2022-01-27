<?php // Flex Template for a Partner

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// post
	$post = get_sub_field('partner');

	
	
	
	// bottom margin
	$m = ' mb-'.get_sub_field('space');
	
	if($post):
		// set post data/
		setup_postdata($post);
?>
<div class="row flex-partner<?php echo $m; ?>">
	<div class="col">
		<?php get_template_part('cpt/row-creative'); ?>
	</div>
</div>
<?php  wp_reset_postdata(); endif; ?>