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
if( have_rows('mbsa_ff') ):

     // loop through the rows of data
    while ( have_rows('mbsa_ff') ) : the_row();

        if( get_row_layout() == 'title' ):

            get_template_part('template-parts/flex/rows/title');

        elseif( get_row_layout() == 'text' ):

            get_template_part('template-parts/flex/rows/text');

   		elseif( get_row_layout() == 'image' ):

            get_template_part('template-parts/flex/rows/image');

        elseif( get_row_layout() == 'spacer' ):

            get_template_part('template-parts/flex/rows/spacer');

        elseif( get_row_layout() == 'video' ): 

            get_template_part('template-parts/flex/rows/video');

        elseif( get_row_layout() == 'pricetable' ): 

            get_template_part('template-parts/flex/rows/pricetable');

        elseif( get_row_layout() == 'table' ): 

            get_template_part('template-parts/flex/rows/table');

        elseif( get_row_layout() == 'fineprint' ): 

            get_template_part('template-parts/flex/rows/fineprint');

        elseif( get_row_layout() == 'overview' ): 

            get_template_part('template-parts/flex/rows/overview');

        elseif( get_row_layout() == 'package' ):  

            get_template_part('template-parts/flex/rows/package');

        elseif( get_row_layout() == 'mtnsafety' ): 

            get_template_part('template-parts/flex/rows/mtnsafety');

        elseif( get_row_layout() == 'faqs' ):  

            get_template_part('template-parts/flex/rows/faqs');

        elseif( get_row_layout() == 'button' ):

            get_template_part('template-parts/flex/rows/button');

        elseif( get_row_layout() == 'partner' ):

            get_template_part('template-parts/flex/rows/partner');

        elseif( get_row_layout() == 'sponsor' ):

            get_template_part('template-parts/flex/rows/sponsor');

        elseif( get_row_layout() == 'photoessay' ):

            get_template_part('template-parts/flex/rows/photoessay');

        elseif( get_row_layout() == 'iframe' ):

            get_template_part('template-parts/flex/rows/iframe');

        elseif( get_row_layout() == 'form' ):

            get_template_part('template-parts/flex/rows/form');

        elseif( get_row_layout() == 'lightbox' ):

            get_template_part('template-parts/flex/rows/lightbox');

        // unique to LBS Site from MBSA Site
        elseif( get_row_layout() == 'gall_link' ):

            get_template_part('template-parts/flex/rows/gallery-link');


        elseif( get_row_layout() == 'tablepress' ):

            get_template_part('template-parts/flex/rows/tablepress');




            

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>