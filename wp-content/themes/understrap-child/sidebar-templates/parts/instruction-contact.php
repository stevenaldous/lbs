<?php /* this template display the instruction contact us block
*
*
*/

	//vars
	$t = get_field('sb_lr_title', 'options');
	$s = get_field('sb_lr_subt', 'options');
	$e = get_field('sb_lr_email', 'options');
?>
<div class="mt-5 lr-contact">
	<div class="copy-wrap text-center">
		<?php if($t): ?>
			<p class="h4 title text-uppercase mb-0"><?php echo $t; ?></p>
		<?php endif; ?>
		<?php if($s): ?>
			<p class="mb-0 subt text-capitalize"><?php echo $s; ?></p>
		<?php endif; ?>
		<?php if($e): ?>
			<a href="mailto:<?php echo $e; ?>" class="ema text-uppercase"><?php echo $e; ?></a>
		<?php endif; ?>
	</div>
</div>