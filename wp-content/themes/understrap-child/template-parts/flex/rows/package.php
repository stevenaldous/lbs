<?php // Flex Template for Text Block


	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// text variables
	$t = get_sub_field('title');
	$mt = get_sub_field('muted');
	$txt = get_sub_field('text');

	// title vars
	$pb = get_sub_field('pack_bold');
	$pt = get_sub_field('pack_title');
	$ps = get_sub_field('pack_subt');

	//price vars
	$p = get_sub_field('price');

	//demographic vars
	$dab = get_sub_field('ability');
	$ddu = get_sub_field('duration');
	$dag = get_sub_field('age');



	// alignment vars
	$a = ' text-'.get_sub_field('align');
	$m = ' mb-'.get_sub_field('space');


	
?>
<div class="row flex-package<?php echo $m; ?>">
	<div class="col <?php echo $a; ?>">
		<div class="copy-wrap">
			<h3 class="h3 mb-0 text-uppercase">
				<?php echo $t; ?><span class="text-muted ml-2 text-capitalize"><?php echo $mt; ?></span>
			</h3>
			<p class="mb-2">
				<?php echo $txt; ?>
			</p>
		</div>
		<div class="pack-card bg-white">
			<div class="card-head d-flex justify-content-between align-items-center px-4 py-3">
				<div class="title-wrap">
					<p class="mb-0 h4">
						<span class="text-uppercase mr-1"><strong><?php echo $pb; ?></strong></span><?php echo $pt; ?>
					</p>
					<p class="mb-0"><em><?php echo $ps; ?></em></p>
				</div>
				<div class="price-wrap text-center">
					<p class="mb-0 price">
						<i class="far fa-dollar-sign mr-1"></i><?php echo $p; ?>
					</p>
					<p class="mb-0 tax"><em>tax not included</em></p>
				</div>
			</div>
			<div class="card-body bg-light d-flex justify-content-around align-items-center">
				<div class="ability">
					<p class="mb-0 text-uppercase"><span class="text-muted mr-1">Ability</span><strong><?php echo esc_html($dab); ?></strong></p>
				</div>
				<div class="ability">
					<p class="mb-0 text-uppercase"><span class="text-muted mr-1">Duration</span><strong><?php echo esc_html($ddu); ?></strong></p>
				</div>
				<div class="ability">
					<p class="mb-0 text-uppercase"><span class="text-muted mr-1">Age</span><strong><?php echo esc_html($dag); ?></strong></p>
				</div>

			</div>
		</div>
	</div>
</div>