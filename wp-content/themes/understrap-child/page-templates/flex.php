<?php
/**
 * Template Name: MBSA Flex Field
 *
 * Template for displaying Custom Mt Baker Ski Area content blocks using ACF flexible Fields
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$sb = get_field( 'sb' );

if( $sb == 1 ) {
    $t = get_field('sb_t');
} 


?>
<div class="wrapper" id="index-wrapper">
    <div id="content" tabindex="-1">

        <?php if ( post_password_required() ) : 

            get_template_part( 'global-templates/password-protected' );

        else: ?>

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
                    <?php 

                            //get flex controller to load up the options 
                            get_template_part('template-parts/flex/flex-controller');
                        ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

    </div>
</div>
<?php get_footer(); ?>