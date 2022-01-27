<?php // Flex Template for a Link to a gallery

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	

	$post = get_sub_field('gallery');

	if($post):
		
	// $link = get_sub_field('link');
      // link variables
      // if($link){
        // $lu = $link['url'];
        // $lt = $link['title'];
        // $lx = $link['target'] ? $link['target'] : '_self';
      // };

     // $c = get_sub_field('color');
	

	// alignment vars
	$m = ' mb-'.get_sub_field('space');
	
?>
<div class="row flex-button<?php echo $m; ?>">


<?php // setup first post 

	setup_postdata($post);

		$t = get_the_title();

		$img = get_field('poster');
		$s = 'full'; 

		$attr = array(
			'class'=> 'img-responsive',
			'alt' => 'Go to '.$t.' gallery',
		)
?>

	<div class="col">
		<a href="<?php echo the_permalink(); ?>">
			
			<?php if($img){
				echo wp_get_attachment_image($img, $s, '', $attr );
			} ?>

		</a>

		<h3 class="h3"><?php echo $t; ?></h3>
	</div>
	<?php wp_reset_postdata(); // Reset the global post object so that the rest of the page works correctly. ?>
</div>


<?php 
endif; 

?>
