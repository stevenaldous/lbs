<?php /* this template is to check for content in the top banner from the 'Theme Options' and display if content */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	$tm = get_field('top_menu', 'options'); 

	if($tm):

		// link icon
		$fa = $tm['fa'];


		// link variables
		$lu = $tm['link']['url'];
		$lt = $tm['link']['title'];
		$lx = $tm['link']['target'] ? $tm['link']['target'] : '_self';

		// Menu Id
		$menu = $tm['menu'];
?>
<div class="tm bg-mb1 py-2 d-none d-lg-block position-relative">

	<div class="alert-btn-wrap position-absolute">
		<?php get_template_part('global-templates/alert-btn'); ?>
	</div>
	
	<div class="container">
		
		<div class="row">
			<div class="col d-flex justify-content-between">
				<div class="tml d-flex justify-content-start align-items-center">

					<?php if($lu): ?>
						<a href="<?php echo esc_url( $lu ); ?>" target="<?php echo $lx; ?>">
							<i class="mr-1 <?php echo esc_html( $fa ); ?>"></i>
							<?php echo esc_html($lt); ?>
						</a>

					<?php endif; ?>
					
				</div>
				<div class="tmr">
					<?php
						if($menu){

							wp_nav_menu(
								array(
									'menu' 			  => $menu,
									'menu_class' 	  => 'clean d-flex mb-0',

									'walker'          => new understrap_WP_Bootstrap_Navwalker(),
								)
							); 

						}; 
					?>
				</div>
				
			
			</div>
		</div>

		
	</div>
</div>

<?php endif; ?>