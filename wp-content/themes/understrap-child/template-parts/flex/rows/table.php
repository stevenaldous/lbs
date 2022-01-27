<?php // Flex Template for Table

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	
	$table = get_sub_field( 'table' );


	// header vars
	$title = get_sub_field('title');
	$subt = get_sub_field('subt');


	// generate random id number for collapse feature
	$id = rand( 5, 500);

	// collapse vars
	$coll = get_sub_field('collapse');
	$open = get_sub_field('open');

	//theme, style, and hover
	$the = get_sub_field('theme') ? ' '.get_sub_field('theme') : '';
	$sty = get_sub_field('style') ? ' '.get_sub_field('style') : '';
	$hov = get_sub_field('hover') ? ' '.get_sub_field('hover') : '';
	

	// alignment/spacing vars
	$mx = get_sub_field('maxw') ? get_sub_field('maxw') : '';
	$al = get_sub_field('align') ? get_sub_field('align') : '' ;
	$cal = get_sub_field('content_align') ? get_sub_field('content_align') : '' ;
	$mb = ' mb-'.get_sub_field('space');
	$lay = get_sub_field('layout') ? ' table-auto' : ' table-fixed';

?>
<div class="row flex-table<?php echo $mb; ?>">
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
				<?php 

					if ( ! empty ( $table ) ) {

					    echo '<table class="table table-responsive-md'. $the . $sty . $hov.' mb-0 content-'.$cal.$lay.'" border="0">';

					        if ( ! empty( $table['caption'] ) ) {

					            echo '<caption class="sr-only">' . $table['caption'] . '</caption>';
					        }

					        if ( ! empty( $table['header'] ) ) {

					            echo '<thead>';

					                echo '<tr>';

					                    foreach ( $table['header'] as $th ) {

					                        echo '<th scope="col">';
					                            echo $th['c'];
					                        echo '</th>';
					                    }

					                echo '</tr>';

					            echo '</thead>';
					        }

					        echo '<tbody>';

					            foreach ( $table['body'] as $tr ) {

					                echo '<tr>';

					                    foreach ( $tr as $td ) {

					                        echo '<td>';
					                            echo $td['c'];
					                        echo '</td>';
					                    }

					                echo '</tr>';
					            }

					        echo '</tbody>';

					    echo '</table>';
					}

				?>
			</div>
		</div>
	</div>
</div>