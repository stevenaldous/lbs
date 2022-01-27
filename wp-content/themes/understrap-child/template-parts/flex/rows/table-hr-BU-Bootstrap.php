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
			<div class="accordion" id="accGroup-<?php echo $id; ?>">
				<?php if ( ! empty ( $table ) ) : ?>

					<?php if ( ! empty( $table['header'] ) ) :  // set visible header for tables ?>
					    <table class="table table-responsive-md tabth-lbs table-hover table-striped mb-0" border="0">
					    	<thead>
					    		<tr>
					    			<?php foreach ( $table['header'] as $th ) : ?>
					    				<th scope="col">
					    					<?php echo $th['c']; ?></th>
					    			<?php $cols ++; endforeach; ?>
					    		</tr>
					    	</thead>
					    </table>
					<?php endif; ?>

					<?php if( $range ): ?>
						<div class="card">
							<div class="card-header" id="head<?php echo $id; ?>-1">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#coll<?php echo $id; ?>-1" aria-expanded="true" aria-controls="coll<?php echo $id; ?>-1">
							  			<span class="d-flex justify-content-between">
					        				<?php echo $range; ?>
					        				<span class="icon">
					        					<i class="fas fa-caret-down"></i>
					        				</span>
					        			</span>
									</button>
								</h2>
							</div>
							<div id="coll<?php echo $id; ?>-1" class="collapse show" aria-labelledby="head<?php echo $id; ?>-1">
								<div class="card-body p-0">
									<table class="table table-responsive-md tabth-lbs table-hover table-striped mb-0" border="0">
										<colgroup>
											<?php for ( $c = 1; $c <= $cols; $c ++ ) {
												echo '<col></col>';
											} ?>
										</colgroup>
										<?php if ( ! empty( $table['header'] ) ) :  // set sr header for accessibility ?>  
									    	<thead class="sr-only">
									    		<tr>
									    			<?php foreach ( $table['header'] as $th ) : ?>
									    				<th>
									    					<?php echo $th['c']; ?></th>
									    			<?php endforeach; ?>
									    		</tr>
									    	</thead>
										<?php endif; ?>
										<tbody>
											<?php foreach ( $table['body'] as $tr ) : ?>
												<tr>
													<?php foreach ( $tr as $td ): ?>
														<td>
															<?php echo $td['c']; ?>
														</td>
													<?php endforeach; ?>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>

								</div>
							</div>
						</div>
					<?php endif; // $range statement ?>
				<?php endif; // first table if statement ?>


				<?php  
					if( have_rows('hr_rep') ):
					    $ct = 2;
					    
						while( have_rows('hr_rep') ) : the_row(); 

							$arange = get_sub_field('yg');
							$atable = get_sub_field( 'table' );

							if( $arange ) :
				?>

					<div class="card">
						<div class="card-header" id="head<?php echo $id; ?>-<?php echo $ct; ?>">
							<h2 class="mb-0">
								<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#coll<?php echo $id; ?>-<?php echo $ct; ?>" aria-expanded="false" aria-controls="coll<?php echo $id; ?>-<?php echo $ct; ?>">
									<span class="d-flex justify-content-between">
										<?php echo $arange; ?>
										<span class="icon">
											<i class="fas fa-caret-down"></i>
										</span>
									</span>
								</button>
							</h2>
						</div>
						<div id="coll<?php echo $id; ?>-<?php echo $ct; ?>" class="collapse" aria-labelledby="head<?php echo $id; ?>-<?php echo $ct; ?>">
							<div class="card-body p-0">
								<table class="table table-responsive-md tabth-lbs table-hover table-striped mb-0" border="0">


									<colgroup>
										<?php for ( $c = 1; $c <= $cols; $c ++ ) {
											echo '<col></col>';
										} ?>
									</colgroup>


									<?php if ( ! empty( $table['header'] ) ) :  // set sr header for accessibility ?>  
										<thead class="sr-only">
											<tr>
												<?php foreach ( $table['header'] as $th ) : ?>
													<th>
														<?php echo $th['c']; ?></th>
												<?php endforeach; ?>
											</tr>
										</thead>
									<?php endif; ?>
									<tbody>
										<?php foreach ( $atable['body'] as $tr ) : ?>
											<tr>
												<?php foreach ( $tr as $td ): ?>
													<td>
														<?php echo $td['c']; ?>
													</td>
												<?php endforeach; ?>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>


				<?php endif; $ct++; endwhile; endif; ?>
			</div>
		</div><?php // table wrap ?>
	</div>
</div> <?php // end of row ?>