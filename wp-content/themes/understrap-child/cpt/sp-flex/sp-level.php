<?php
/**
 * Sponsor Level Display
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get selected level ID
$lid = get_sub_field('sp_level');

// get level data
$level = get_term( $lid, 'sponsor_category');

// set level name
$ln = $level->name;

$args = array(
    'post_type' => 'cpt_sponsor',
    'posts_per_page'    => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'sponsor_category',
            'field'    => 'term_taxonomy_id',
            'terms'    => $lid,
        ),
    ),


);

$sp_query = new WP_Query($args);

if( $sp_query->have_posts() ):


    switch ($ln) {
        case 'Gold':
            $col = 'col-12 col-md-6 col-lg-4 p-0';
            $t = '';
            break;
        case 'Silver':
            $col = 'col-6 col-md-3 col-lg-3 p-0';
            $t = ' t-80';
            break;
        case 'Bronze':
            $col = 'col-4 col-md-3 col-lg-2 p-0';
            $t = ' t-60';
            break;
        default:
            $col = 'col-3 col-md-2 col-lg-2 p-0';
            $t = ' t-40';
    }

?>
    <div class="col-12">
        <?php if( get_sub_field('sp_tf') ): ?>
            <div class="copy-wrap text-center text-uppercase">
                <h2 class="h2"><?php echo $ln; ?> Level</h2>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <?php while($sp_query->have_posts() ): $sp_query->the_post(); ?>
                <div class="<?php echo $col . $t; ?>">
                    <?php get_template_part('cpt/sp-flex/logo'); ?>
                </div>
            <?php  endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>