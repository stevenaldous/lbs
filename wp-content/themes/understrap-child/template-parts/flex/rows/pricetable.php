<?php // Flex Template for Table

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	// header vars
	$title = get_sub_field('title');
	$subt = get_sub_field('subt');

	// table label vars
	$g = get_sub_field('glabel');
	$a = get_sub_field('alabel');
	$p = get_sub_field('plabel');

	// generate random id number for collapse feature
	$id = rand( 5, 500);

	// collapse vars
	$coll = get_sub_field('collapse');
	$open = get_sub_field('open');

	// alignment/spacing vars
	$mx = get_sub_field('maxw') ? get_sub_field('maxw') : '';
	$al = get_sub_field('align') ? get_sub_field('align') : '' ;
	$mb = ' mb-'.get_sub_field('space');
?>
<div class="row flex-pricetable<?php echo $mb; ?>">
	<div class="col">
		<div class="table-wrap bg-white <?php echo $al; ?>" <?php if($mx > 0) { echo 'style=" max-width: '.esc_html($mx).'px;"';} ?> >
			<div class="title-wrap p-3 d-flex flex-row justify-content-between align-items-center">
				<div class="copy">
					<h3 class="h3 title text-uppercase mb-1"><?php echo $title; ?></h3>
					<p class="subt mb-0"><em><?php echo $subt; ?></em></p>
				</div>
				<?php if( $coll == 1 ): ?>
					<div>
						<button class="btn<?php if( $open == 1 ){ echo ' collapsed';} ?>" type="button" 
							data-toggle="collapse" data-target="#coll-<?php echo $id; ?>" 
							aria-expanded="<?php if( $open == 0 ){ echo 'true'; } else { echo 'false';}; ?>" 
							aria-controls="coll-<?php echo $id; ?>">
							<span class="icon-wrap">
						    	<i class="fas fa-caret-up"></i>
						    </span>
						</button>
					</div>
				<?php endif; ?>
			</div>
			<div class="collapse<?php if( $open == 0 ){ echo ' show';} ?>" id="coll-<?php echo $id; ?>">
				<table class="table table-striped table-hover mb-0">
				  <thead>
				    <tr>
				      <th scope="col"><?php echo $g; ?></th>
				      <th class="text-center" scope="col"><?php echo $a; ?></th>
				      <th class="text-right" scope="col"><?php echo $p; ?></th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php if( have_rows('ptable') ): while( have_rows('ptable') ): the_row(); 
				  		$pr = get_sub_field('price');
				  		$ip = explode('.',$pr);
				  	?>
				  	<tr>
				      <td class="group"><?php the_sub_field('group'); ?></td>
				      <td class="age text-center"><?php the_sub_field('age'); ?></td>
				      <td class="price text-right"><span ><i class="far fa-dollar-sign"></i></span><?php echo $ip[0] .'.<span class="cents">'.$ip[1].'</span>'; ?></td>
				    </tr>

				  	<?php endwhile; endif; ?>


				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>


