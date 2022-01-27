<?php
/**
 * Flex Field Controller
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// check if the flexible content field has rows of data
if( have_rows('fsb_flex') ):

     // loop through the rows of data
    while ( have_rows('fsb_flex') ) : the_row();

        if( get_row_layout() == 'title' ):

            get_template_part('template-parts/flex/rows/title');

   		elseif( get_row_layout() == 'image' ):

            get_template_part('template-parts/flex/rows/image');

        elseif( get_row_layout() == 'spacer' ):

            get_template_part('template-parts/flex/rows/spacer');

        elseif( get_row_layout() == 'video' ): 

            get_template_part('template-parts/flex/rows/video');


        elseif( get_row_layout() == 'button' ):

            get_template_part('template-parts/flex/rows/button');


        endif;

    endwhile;

else :

    // no layouts found

endif;

?>