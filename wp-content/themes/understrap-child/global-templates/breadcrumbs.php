<?php
    // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="container">
    <div class="row">
        <div class="col">
                <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                        }
                ?>
        </div>
    </div>            
</div>