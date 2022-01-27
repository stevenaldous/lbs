<?php 

// add_action('acf/init', 'my_acf_init_block_types');

function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'banner',
            'title'             => __('Banner'),
            'description'       => __('FFB Banner'),
            'render_template'   => 'template-parts/blocks/banner.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'banner', 'ad' ),
        ));



        // register form accordion
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Donation Form Accordion'),
            'description'       => __('FFB Donation form Accordion.'),
            'render_template'   => 'template-parts/blocks/accordion.php',
            'category'          => 'formatting',
            'icon'              => 'money-alt',
            'keywords'          => array( 'accordion', 'donation', 'donate', 'form' ),
        ));








    }
}



?>