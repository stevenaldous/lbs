<?php // This templatew displays available Social Icons inline 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	// Facebook
	$f= get_field('fb', 'options');

	// Instagram
	$i= get_field('ig', 'options');


	if($f || $i  ):

?>
	<ul class="social inline mb-0 d-flex flex-row justify-content-center align-items-center">
		<?php if($f): ?>
			<li>
				<a href="<?php echo $f; ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="false"></i><span class="sr-only">See Our Facebook account</span></a>
			</li>
		<?php endif; ?>

		<?php if($i): ?>
			<li>
				<a href="<?php echo $i; ?>" target="_blank"><i class="fab fa-instagram ml-3" aria-hidden="false"></i><span class="sr-only">See Our Instagram account</span></a>
			</li>
		<?php endif; ?>


	<?php endif; ?>
	</ul>




