<?php // Flex Template for Photo Essay Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// generate random id number for collapse feature
	$id = rand( 5, 500);

	$t = get_sub_field('text');
	$a = ' text-'.get_sub_field('align');
	$m = ' mb-'.get_sub_field('space');
	$c = get_sub_field('collapse')

?>
<div class="row flex-text<?php echo $m; ?>">
	<div class="col col-md-11<?php echo $a; ?> mx-auto">
		<?php if($c == 1){
		?>
			<div class="collapse" id="rm<?php echo $id; ?>" >
				<?php echo $t; ?>
			</div>
			<button class="no-btn rm-toggle" type="button" data-toggle="collapse" data-target="#rm<?php echo $id; ?>" aria-expanded="false" aria-controls="rm<?php echo $id; ?>">Read More</button>
		<?php 

		}
		else {
			echo $t;
		}
		?>
	</div>
</div>