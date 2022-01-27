<?php //this sheet holds the CPT settings for this portfolio.


/////////////////////////////////////
// PARTNER CPT //////////////////////
/////////////////////////////////////
add_action( 'init','create_partner' );
// create Staff Categories for Staff and Board
add_action( 'init', 'create_partner_taxonomy', 0);

function create_partner() {
  $labels = array(
    'name' => _('Partners'),
    'singular_name' => _('Partner'),
  );
  $args = array(
    'labels' => $labels,
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'partner' ),
      'menu_icon' => 'dashicons-id',
      'taxonomies' => array('partner_category')
  );
  register_post_type('cpt_partner', $args );
  flush_rewrite_rules();
}

function create_partner_taxonomy() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'category' ),

    );

    register_taxonomy( 'partner_category', 'cpt_partner', $args );
}


/////////////////////////////////////
// PARTNER CPT //////////////////////
/////////////////////////////////////
add_action( 'init','create_sponsor' );
// create Staff Categories for Staff and Board
add_action( 'init', 'create_sponsor_taxonomy', 0);

function create_sponsor() {
  $labels = array(
    'name' => _('Sponsors'),
    'singular_name' => _('Sponsor'),
  );
  $args = array(
    'labels' => $labels,
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'sponsor' ),
      'menu_icon' => 'dashicons-money-alt',
      'taxonomies' => array('sponsor_category')
  );
  register_post_type('cpt_sponsor', $args );
  flush_rewrite_rules();
}

function create_sponsor_taxonomy() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'category' ),

    );

    register_taxonomy( 'sponsor_category', 'cpt_sponsor', $args );
}




/////////////////////////////////////
// FAQ CPT /////////////////
/////////////////////////////////////
add_action( 'init','create_faqs' );

function create_faqs() {
  $labels = array(
    'name' => _('FAQs'),
    'singular_name' => _('FAQ Group'),
  );
  $args = array(
    'labels' => $labels,
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'faq' ),
      'menu_icon' => 'dashicons-editor-help',
  );
  register_post_type('cpt_faq', $args );
  flush_rewrite_rules();
}

/////////////////////////////////////
// PHOTO ESSAY CPT /////////////////
/////////////////////////////////////
add_action( 'init','create_essays' );

function create_essays() {
  $labels = array(
    'name' => _('Photo Essay'),
    'singular_name' => _('Photo Essay'),
  );
  $args = array(
    'labels' => $labels,
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'faq' ),
      'menu_icon' => 'dashicons-images-alt',
  );
  register_post_type('photoessay', $args );
  flush_rewrite_rules();
}


/////////////////////////////////////
// PHOTO GALLERY CPT ////////////////
/////////////////////////////////////
add_action( 'init','create_galleries' );

function create_galleries() {
  $labels = array(
    'name' => _('Media Galleries'),
    'singular_name' => _('Gallery'),
  );
  $args = array(
    'labels' => $labels,
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'cpt-gallery' ),
      'menu_icon' => 'dashicons-images-alt',
  );
  
  register_post_type('gallery', $args );
  
  flush_rewrite_rules();
}











// end of cpt.php
 ?>