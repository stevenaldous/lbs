<?php
/**
 * Template Name: MBSA Partners Template
 *
 *
 * Template for displaying Custom Mt Baker Ski Area Partners pages with selected options
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

	$terms = get_field('partner_category');
    $text = get_field('partner_text');


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
                    <div class="row">
                        <div class="col">
                            <p><?php echo $text; ?></p>
                        </div>
                    </div>

                    <?php 
                        if($terms){
                            foreach( $terms as $term ){
                                


                                $t = get_term( $term, 'partner_category' );

                                if( count($terms) > 1 ) {
                                    echo '<div class="row">
                                                <div class="col">
                                                    <h2 class="h2">'.$t->name.'</h2>
                                                </div>
                                            </div>';
                                };

                                // WP Query Post
                                $args = array(
                                    'post_type'     => 'cpt_partner',
                                    'tax_query'     => array(
                                        array(
                                            'taxonomy'  => 'partner_category',
                                            'field'     => 'id',
                                            'terms'     => $term,
                                        ),
                                    ),


       

                                );

                                $partner_query = new WP_Query( $args );

                                if( $partner_query->have_posts() ){ 
                                    while( $partner_query->have_posts() ){ 
                                        $partner_query->the_post();

                                        include( locate_template( 'cpt/row-creative.php', false, false ) );

                                        ?>

                                        <div class="row flex-spacer partner-spacer">
                                            <div class="col">
                                                <div class="my-3 sp-1"></div>
                                            </div>
                                        </div>
                                    <?php 
                                    }
                                    wp_reset_postdata();
                                }  

                               
     


                            };
                        };
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>