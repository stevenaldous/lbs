<?php
/**
 * Template Name: MBSA Contact Page
 *
 *
 * Template for displaying Custom Mt Baker Ski Area content blocks using ACF flexible Fields
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

// $sb = get_field( 'sb' );

// if( $sb == 1 ) {
//     $t = get_field('sb_t');
// } 


    $form = 1;
?>
<div class="wrapper" id="index-wrapper">
    <div id="content" tabindex="-1">

        <?php get_template_part('global-templates/breadcrumbs'); ?>


        <div class="container">
            <div class="row">
                <?php 

                if($t) {
                    get_template_part('sidebar-templates/'.$t ); 
                }
                ?>
                
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h1 class="h1 text-uppercase"><?php the_title(); ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="copy-wrap">
                                <h2 class="h3">Mt Baker Ski Area <strong>Business Office</strong></h2>
                                <?php echo mbsa_address('dto', ''); ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php echo gravity_form( $form , false , false, false, '', true, ); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>