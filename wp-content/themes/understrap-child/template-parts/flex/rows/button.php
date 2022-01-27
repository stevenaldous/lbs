<?php // Flex Template for a simple button

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// link
	$link = get_sub_field('link');
      // link variables
      if($link){
        $lu = $link['url'];
        $lt = $link['title'];
        $lx = $link['target'] ? $link['target'] : '_self';
      };

     $c = get_sub_field('color');
	

	// alignment vars
	$a = ' text-'.get_sub_field('align');
	$m = ' mb-'.get_sub_field('space');
	$w = get_sub_field('width');
	
?>
<div class="row flex-button<?php echo $m; ?>">
	<div class="col <?php echo $a; ?>">
		<?php if($link): ?>
      <a class="btn btn-<?php echo $c; ?><?php if($w == 1){ echo ' btn-fw'; }; ?>" href="<?php echo esc_url($lu) ?>"  target="<?php echo $lx; ?>">
        <?php echo esc_html($lt); ?>
      </a>
   	<?php endif; ?>
	</div>
</div>