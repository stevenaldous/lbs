<?php
/**
 * CPT - Sponsor row with ACF options
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$type = get_sub_field('sp_type');


?>

<div class="sp-<?php echo $type; ?>">
    <?php get_template_part('cpt/sp-flex/sp', $type); ?>
</div>

