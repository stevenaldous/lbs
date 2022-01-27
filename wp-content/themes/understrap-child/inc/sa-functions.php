<?php //this sheet holds the WP Functions settings for this project.

//////////////////////////////////////////////////////////////////////////
/// ** Change Default template to the MBSA FLEX FIELDS **
///////////////////////////////////////////////////////////////////////////
function mbsa_default_page_template() {
    global $post;
    if ( 'page' == $post->post_type 
        && 0 != count( get_page_templates( $post ) ) 
        && get_option( 'page_for_posts' ) != $post->ID // Not the page for listing posts
        && '' == $post->page_template // Only when page_template is not set
    ) {
        $post->page_template = "page-templates/flex.php";
    }
}
add_action('add_meta_boxes', 'mbsa_default_page_template', 1);





/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_stylesheet_directory() . '/inc/class-wp-sidebar-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );





//////////////////////////////////////////////////////////////////////////
/// ** Disable Child theme templates from editor **
///////////////////////////////////////////////////////////////////////////
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );
/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function child_theme_remove_page_template( $page_templates ) {
    // Remove the template we don’t need.
    unset( $page_templates['page-templates/blank.php'] );
    unset( $page_templates['page-templates/empty.php'] );
    unset( $page_templates['page-templates/both-sidebarspage.php'] );
    unset( $page_templates['page-templates/fullwidthpage.php'] );
    unset( $page_templates['page-templates/left-sidebarpage.php'] );
    unset( $page_templates['page-templates/right-sidebarpage.php'] );
    return $page_templates;
}


//////////////////////////////////////////////////////////////////////////
// ** Rename Default Template **
//////////////////////////////////////////////////////////////////////////
add_filter('default_page_template_title', function() {
    return __('WP Default (do not use)', 'your_text_domain');
});


//////////////////////////////////////////////////////////////////////////
/// ** ACF Options **
///////////////////////////////////////////////////////////////////////////
//Add ACF site Options page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'MBSA Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Social Accounts',
        'menu_title'    => 'Social Accounts',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Alert Banner',
        'menu_title'    => 'Alert Banner',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Sidebar Options',
        'menu_title'    => 'Sidebar Options',
        'parent_slug'   => 'theme-general-settings',
    ));
    
};

function remove_acf_options_page() {
	global $user_ID;

	if ( current_user_can( 'editor' ) ) {
   		remove_menu_page('theme-general-settings');		
	}
}
add_action('admin_menu', 'remove_acf_options_page', 99);

/////////////////////////////////////////////////////////////////////
// ** Edit TinyMCE editor to limit options and improve ADA compliance  **
//////////////////////////////////////////////////////////////////////////
add_filter('tiny_mce_before_init', 'tiny_mce_cph' );

function tiny_mce_cph($init) {
    // Add block format elements you want to show in dropdown
    $init['block_formats'] = 'Paragraph=p;Heading 2=h3;Heading 3=h4;Heading 4=h5;';


    return $init;
}

/////////////////////////////////////
// ** Gravity Form Functions **
/////////////////////////////////////
// enable hide form labels in Gravity Forms
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
// disable form focus
add_filter( 'gform_confirmation_anchor', '__return_false' );

// add vertical to contact form submission
add_filter('gform_field_value_vertical', 'populate_vertical');

function populate_vertical() {
  return $_SESSION['vert'];
};
// filter the Gravity Forms button type
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button' type='submit' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
}

// add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
//     if ( isset( $confirmation['redirect'] ) ) {
//         $url          = esc_url_raw( $confirmation['redirect'] );
//         $confirmation = 'Thanks for contacting us! We will get in touch with you shortly.';
//         $confirmation .= "<script type=\"text/javascript\">window.open('$url', '_blank');</script>";
//     }
 
//     return $confirmation;
// }, 10, 4 );


//////////////////////////////////////////////////////////////////////////
/// ** Custom Read More **
///////////////////////////////////////////////////////////////////////////
function lbs_readmore( $text, $limit ) {
 
    if( str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $pre_text = substr($text, 0, $pos[$limit]);
        $rm = '<button class="btn-rm">...more</button>';
        $post_text = '<span class="rm-text">'.substr($text, $pos[$limit] ).'</span>';
        $read_more = $pre_text . $rm . $post_text;
    }       

    return $read_more;
}


//////////////////////////////////////////////////////////////////////////
/// ** Address Format **
///////////////////////////////////////////////////////////////////////////
function mbsa_address( $add, $style ) {
        $str = get_field($add.'_str','options');
        $cit = get_field($add.'_city','options');
        $sta = get_field($add.'_state','options');
        $zip = get_field($add.'_zip','options');

        if( $style == 'inline' ) {
            return  '<address class="mb-2">'.
                        '<p class="mb-0">'.
                            $str.', '.
                            $cit.', '.
                            $sta.' '.
                            $zip.
                        '</p>'.
                    '</address>';
        } 
        else {
            return  '<address>'.
                        '<p class="mb-2">'.$str.'</p>'.
                        '<p>'.
                            $cit.', '.
                            $sta.' '.
                            $zip.
                        '</p>'.
                    '</address>';
        }
}


//////////////////////////////////////////////////////////////////////////
/// ** Phone Format **
///////////////////////////////////////////////////////////////////////////
function phone( $pho ) {
    // $pho = get_field('g_pho','options');
    if( $pho ):
        return '<a class="pho" href="tel:+1'.$pho.'">('.
            substr($pho, 0, 3 ).
            ') '.
            substr($pho, 3, 3 ).
            '-'.
            substr($pho, 6, 4 ).
            '</a>';
    endif;
};


//////////////////////////////////////////////////////////////////////////
/// ** Move Yoast to bottom of editor **
///////////////////////////////////////////////////////////////////////////
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');



//////////////////////////////////////////////////////////////////////////
/// ** Remove COMMENTS in its entirety **
///////////////////////////////////////////////////////////////////////////
// Removes from admin menu
add_action( 'admin_menu', 'pk_remove_admin_menus' );
function pk_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Removes from post and pages
add_action('init', 'pk_remove_comment_support', 100);
function pk_remove_comment_support() {
   remove_post_type_support( 'post', 'comments' );
   remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
function pk_remove_comments_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}



