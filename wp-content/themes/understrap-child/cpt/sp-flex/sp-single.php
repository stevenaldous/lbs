<?php
/**
 * Sponsor Single Display
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$post = get_sub_field('sponsor');

if( $post ):
    setup_postdata($post);


?>
<div class="col-12 col-md-4">
    <?php get_template_part('cpt/sp-flex/logo'); ?>
</div>
<?php wp_reset_postdata(); endif; ?>