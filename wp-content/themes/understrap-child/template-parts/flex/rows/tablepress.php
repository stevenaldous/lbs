<?php // Flex Template for TablePress Display

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	$table = get_sub_field('table');

	$m = ' mb-'.get_sub_field('space');

	if($table):

?>
<div class="row flex-form<?php echo $m; ?>">
	<div class="col">
		<?php tablepress_print_table('id='.$table); ?>
	</div>
</div>

<?php endif; ?>
