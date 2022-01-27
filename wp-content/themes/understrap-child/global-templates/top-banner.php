<?php /* this template is to check for content in the top banner from the 'Theme Options' and display if content */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	$tb = get_field('top_banner', 'options'); 

	if($tb): 

		// copy variable
		$c = $tb['copy'];

		// link variables
		$lu = $tb['link']['url'];
		$lt = $tb['link']['title'];
		$lx = $tb['link']['target'] ? $tb['link']['target'] : '_self';
?>

<div class="top-banner container-fluid position-relative">
	<div class="abs-cover bg-black"></div>
	<div class="row">
		<div class="col text-center py-2">
			<p class="mb-0">
			<?php if($c): ?>
				<span class="title h3 mb-0"><?php echo esc_html($c); ?></span>
			<?php endif; ?>
			<?php if($lu): ?>
				<a class="ml-2" href="<?php echo esc_url( $lu ); ?>" target="<?php echo $lx; ?>">
					<?php echo esc_html( $lt ); ?>		
				</a>
			<?php endif; ?>
		</p>
		</div>
	</div>
</div>

<?php endif; ?>