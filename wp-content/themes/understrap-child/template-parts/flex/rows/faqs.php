<?php // Flex Template for FAQs
	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	$post = get_sub_field('faq');

	$m = ' mb-'.get_sub_field('space');

	if($post):
		setup_postdata($post);

	$slug = $post->post_name;
	// generate random id number for collapse feature
	$id = rand( 5, 500);

	// alignment vars
	



	if( have_rows( 'faq_rep' ) ): 
?>
<div id="faq-<?php echo $slug; ?>" class="row flex-faqs<?php echo $m; ?>">
	<div class="col">
		<div class="accordion" id="accordion<?php echo $id; ?>">
			<h2><?php the_title(); ?></h2>

			<?php while( have_rows( 'faq_rep' ) ): the_row(); 
				$i = get_row_index();
				$q = get_sub_field('q');
				$a = get_sub_field('a');
			?>
			    <div class="card">
				    <div class="card-header" id="heading<?php echo $id . '-' . $i; ?>">
				    	<h2 class="h3 mb-0">
				   			<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $id . '-' . $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $id . '-' . $i; ?>">
				    			<?php echo $q; ?>
				    		</button>
				    	</h2>
				    </div>
				    <div id="collapse<?php echo $id . '-' . $i; ?>" class="collapse" aria-labelledby="heading<?php echo $id . '-' . $i; ?>" data-parent="#accordion<?php echo $id; ?>">
				      	<div class="card-body">
				        	<?php echo $a; ?>
						</div>
					</div>
				</div>
	  		<?php endwhile; ?>
	  
		</div>
	</div>
</div>

<?php endif; ?>

<?php // Reset the global post object so that the rest of the page works correctly.
    	wp_reset_postdata();
endif; 

?>



