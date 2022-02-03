<?php
/**
 * Sponsor All Display
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$level = get_sub_field('sp_level');

$args = array(
    'post_type' => 'cpt_sponsor',
    'orderby'   => 'ASC',
    'posts_per_page'    => -1,
);

$sp_query = new WP_Query($args);

if( $sp_query->have_posts() ):

?>
    <div class="col-12">
        <div class="row justify-content-center">
            <?php while($sp_query->have_posts() ): $sp_query->the_post(); ?>
                <div class="col-6 col-md-3 col-lg-2 p-0">
                    <?php get_template_part('cpt/sp-flex/logo'); ?>
                </div>
            <?php  endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>