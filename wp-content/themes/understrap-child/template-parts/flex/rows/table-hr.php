<?php // Flex Template for Table

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	

	// generate random id number for collapse feature
	$id = rand( 5, 500);


	$title = get_sub_field('hr_title');

	// main Table
	$table = get_sub_field( 'hr_table' );
	$range = get_sub_field('hr_yg');

	$cols = 0;
?>
<div class="row hr-table mb-3 mb-lg-4 ">
	<div class="col">
		<div class="table-wrap bg-white <?php echo $al; ?>" <?php if($mx > 0) { echo 'style=" max-width: '.esc_html($mx).'px;"';} ?> >
			<div class="title-wrap p-3 d-flex flex-row justify-content-between align-items-center">
				<div class="copy">
					<h3 class="h3 title text-uppercase mb-1"><?php echo $title; ?></h3>
				</div>
			</div>

			<?php if ( ! empty ( $table ) ) : ?>

			
			    <table class="table table-coll table-responsive-md tabth-lbs table-hover table-striped mb-0" border="0">
			    	

			
			    	<?php if ( ! empty( $table['header'] ) ) :  // set visible header for tables ?>
			    	<thead>
			    		<tr>
			    			<?php foreach ( $table['header'] as $th ) : ?>
			    				<th scope="col">
			    					<?php echo $th['c']; ?></th>
			    			<?php $cols ++; endforeach; ?>
			    		</tr>
			    	</thead>
			    	<?php endif; ?>


			    	<?php if( $table['body'] ): // make table for whole group

			    		$tr_ids = array();

			    		$i = 0;
			    		foreach ( $table['body'] as $tr ) {
			    			$tr_id = '#coll'.$id.'-'.$i;
			    			array_push( $tr_ids, $tr_id);
			    			$i++;

			    		}

			    	?>
			    		<tbody>
					    	<?php if( $range ): // make first toggle section button?>
				    			<tr class="toggle">
				    				<td class="p-0" colspan="<?php echo $cols; ?>">
				    					<button 
				    						class="btn no-btn p-0 tr-toggle-btn"
				    						type="button"
				    						aria-expanded="true" 

											<?php /*
				    						onclick="toggle(this.id,'<?php echo implode( ',',$tr_ids ); ?>');"
				    						*/ ?>

											data-click="<?php echo implode( ',',$tr_ids ); ?>"
				    						aria-controls="<?php foreach( $tr_ids as $tr){ echo str_replace( '#', '', $tr) .' '; }; ?>"
				    					>
      										<span class="d-flex justify-content-between align-items-center px-3">
			        							<?php echo $range; ?>
						        				<span class="icon">
						        					<i class="fas fa-caret-down"></i>
						        				</span>
						        			</span>
    									</button>
				    				</td>
				    			</tr>
					    	<?php endif; ?>


			    			<?php 
			    				$i = 0;
			    				foreach ( $table['body'] as $tr ) : 
			    			?>
								<tr id="coll<?php echo $id .'-'.$i; ?>" class="show">
									<?php foreach ( $tr as $td ): ?>
										<td>
											<?php echo $td['c']; ?>
										</td>
									<?php endforeach; ?>
								</tr>
							<?php $i++; endforeach; ?>



							<?php  
							if( have_rows('hr_rep') ):
							$ct = 2;

							while( have_rows('hr_rep') ) : the_row(); 

							$arange = get_sub_field('yg');
							$atable = get_sub_field( 'table' );

							$atr_ids = array();

				    		$i = 0;
				    		foreach ( $atable['body'] as $tr ) {
				    			$tr_id = '#coll'.$id.'-'.$ct.'-'.$i;
				    			array_push( $atr_ids, $tr_id);
				    			$i++;

				    		}
							
							?>

							<?php if( $arange ): // make first toggle section button?>
				    			<tr class="toggle">
				    				<td class="p-0" colspan="<?php echo $cols; ?>">
				    					<button 
				    						class="btn no-btn p-0 tr-toggle-btn"
				    						type="button"
				    						aria-expanded="false" 
											data-click="<?php echo implode( ',',$atr_ids ); ?>"
				    						aria-controls="<?php foreach( $atr_ids as $tr){ echo str_replace( '#', '', $tr) .' '; }; ?>"
				    					>
      										<span class="d-flex justify-content-between align-items-center px-3">
			        							<?php echo $arange; ?>
						        				<span class="icon">
						        					<i class="fas fa-caret-down"></i>
						        				</span>
						        			</span>
    									</button>
				    				</td>
				    			</tr>
					    	<?php endif; ?>

					    	<?php // make each table
			    				$i = 0;
			    				foreach ( $atable['body'] as $tr ) : 
			    			?>
								<tr id="coll<?php echo $id .'-'.$ct.'-'.$i; ?>" class="hidden">
									<?php foreach ( $tr as $td ): ?>
										<td>
											<?php echo $td['c']; ?>
										</td>
									<?php endforeach; ?>
								</tr>
							<?php $i++; endforeach; ?>





						<?php $ct++; endwhile; endif; ?>
						</tbody>
					<?php endif; ?>
				</table>
			<?php endif; // first table if statement ?>
		</div><?php // table wrap ?>
	</div>
</div> <?php // end of row ?>