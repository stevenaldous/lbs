<?php
/**
 * Password Protected form/copy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

    $id = get_the_ID();

?>




<div class="container pt-5">
    <div class="row pb-4">
        <div class="col">
            <h2 class="h1"><i class="fas fa-lock-alt mr-3"></i>Password Protected</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php echo get_the_password_form( $id ); ?>
        </div>
    </div>
</div>
