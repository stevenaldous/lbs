<?php
/**
 * Template Name: LBS Honor Roll
 *
 * Template for displaying Custom Mt Baker Ski Area content blocks using ACF flexible Fields
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$yrs = get_field('hr_yrs');


?>
<div class="wrapper" id="index-wrapper">
    <div id="content" tabindex="-1">


        <?php if ( post_password_required() ) : 

            get_template_part( 'global-templates/password-protected' );

        else: ?>

        <div class="container">
            <div class="row">
              
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h1 class="h1 text-uppercase"><?php the_title(); ?><em class="pl-4"><?php echo $yrs; ?></em></h1>
                        </div>
                    </div>


                    <?php
                        // check if the flexible content field has rows of data
                        if( have_rows('hr_ff') ):

                             // loop through the rows of data
                            while ( have_rows('hr_ff') ) : the_row();

                                if( get_row_layout() == 'table-hr' ):

                                    get_template_part('template-parts/flex/rows/table-hr');

                                // elseif( get_row_layout() == 'text' ):

                                //     get_template_part('template-parts/flex/rows/text');

                                    

                                endif;

                            endwhile;

                        else :

                            // no layouts found

                        endif;

                     ?> 
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>