<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
                            <h1 class="h1"><?php the_title(); ?></h1>
                        </div>
                    </div>
                    <?php 

                            //get flex controller to load up the options 
                            get_template_part('template-parts/flex/flex-controller');
                        ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>