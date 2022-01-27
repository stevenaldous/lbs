<?php
/**
 * Flex Field Controller
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


    $img = get_field('sp_img');

    $link = get_field('sp_link');

    if( $link) {

        $lu = $link['url'];
        $lt = $link['title'];
        $lx = $link['target'] ? $link['target'] : '_self';

    }


?>
<div class="spons-logo">
    <?php if( $link ) : ?>
        <a href="<?php echo esc_url($lu); ?>" target="<?php echo $lx; ?>">
            <?php if($img ) {
                echo wp_get_attachment_image($img, 'full', '', array('alt' => $lt) );
            }; ?>
        </a>
    <?php endif; ?>
</div>

