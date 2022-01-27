<?php // Flex Template for Table

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	

	// generate random id number for collapse feature
	$id = rand( 5, 500);


	$title = get_sub_field('hr_title');

	// main Table
	$table = get_sub_field( 'hr_table' );
	$range = get_sub_field('hr_yg');


	// collapse vars
	$coll = get_sub_field('collapse');
	$open = get_sub_field('open');

	$cols = 0;
?>
<div class="row flex-table mb-3 mb-lg-4 ">
	<div class="col">
		<div class="table-wrap bg-white <?php echo $al; ?>" <?php if($mx > 0) { echo 'style=" max-width: '.esc_html($mx).'px;"';} ?> >
			<div class="title-wrap p-3 d-flex flex-row justify-content-between align-items-center">
				<div class="copy">
					<h3 class="h3 title text-uppercase mb-1"><?php echo $title; ?></h3>
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

					    echo '<table id="group'.$id.'" class="accordion table table-responsive-md tabth-lbs table-hover table-striped mb-0" border="0">';

					        if ( ! empty( $table['header'] ) ) {

					            echo '<thead>';

					                echo '<tr>';

					                    foreach ( $table['header'] as $th ) {

					                        echo '<th scope="col">';
					                            echo $th['c'];
					                        echo '</th>';

					                        $cols ++;
					                    }

					                echo '</tr>';

					            echo '</thead>';
					        }

					        

				        	if( $range ){

				        ?>
				        		<tbody class="clickable" data-toggle="collapse" data-target=".rowgroup<?php echo $id; ?>-1" aria-expanded="true" aria-controls="rowgroup<?php echo $id; ?>-1" >	
					        		<tr>
					        			<td colspan="<?php echo $cols; ?>">
					        				<span class="d-flex justify-content-between">
						        				<?php echo $range; ?>
						        				<span class="icon">
						        					<i class="fas fa-caret-down"></i>
						        				</span>
						        			</span>
					        			</td>
					        		</tr>
				        		</tbody>

				        <?php 
				        	}
					        

					        // echo '<tbody class="rowgroup'. $id.'-1 collapse show" data-parent="#group'.$id.'">';

					        echo '<tbody>';
					        	
					            foreach ( $table['body'] as $tr ) {

					                echo '<tr>';

					                // echo '<tr class="rowgroup'. $id.'-1 collapse show" data-parent="#group'.$id.'">';

					                    foreach ( $tr as $td ) {

					                        echo '<td>';
					                        	echo '<div class="rowgroup'. $id.'-1 collapse show" data-parent="#group'.$id.'"><span>';
					                            	echo $td['c'];
					                            echo '</span></div>';
					                        echo '</td>';
					                    }

					                echo '</tr>';
					            }

					           echo '</tbody>';


					            if( have_rows('hr_rep') ){ 
					            	$ct = 2;
					            	while( have_rows('hr_rep') ) {
					            		the_row();

					            		

					            		$arange = get_sub_field('yg');



					                	if( $arange ){

					                	?>


								        	<tbody class="clickable" data-toggle="collapse" data-target=".rowgroup<?php echo $id; ?>-<?php echo $ct; ?>" aria-expanded="false" aria-controls="rowgroup<?php echo $id; ?>-<?php echo $ct; ?>" >	
								        		<tr>
								        			<td colspan="<?php echo $cols; ?>">
								        				<span class="d-flex justify-content-between">
									        				<?php echo $arange; ?>
									        				<span class="icon">
									        					<i class="fas fa-caret-down"></i>
									        				</span>
									        			</span>
								        			</td>
								        		</tr>
							        		</tbody>
								       <?php
								        }	

								        $atable = get_sub_field( 'table' );

								    	// echo '<tbody class="rowgroup'. $id.'-'.$ct .' collapse" data-parent="#group'.$id.'">';

								    	echo '<tbody>';

					            		foreach ( $atable['body'] as $tr ) {

					            			
							                echo '<tr>';

							                // echo '<tr class="rowgroup'. $id.'-'.$ct .' collapse" data-parent="#group'.$id.'">';

							                    foreach ( $tr as $td ) {

							                        echo '<td>';

							                        	echo '<div class="rowgroup'. $id.'-'.$ct .' collapse" data-parent="#group'.$id.'"><span>';

							                            	echo $td['c'];

							                            echo '</span></div>';

							                        echo '</td>';
							                    }

							                echo '</tr>';
							            }

							        	echo '</tbody>';

					            $ct++; } };

					        echo '</tbody>';

					    echo '</table>';
					}

				?>
			</div>
		</div>
	</div>
</div>