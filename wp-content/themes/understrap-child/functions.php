<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$understrap_includes = array(
    '/enqueue.php',              // Load Child Scripts and Styles

    '/sa-functions.php',         // FFB Custom php
    '/cpt.php',                  // Custom Post Type.

    '/blocks.php',               // Custom Blocks.

    '/class-wp-bootstrap-navwalker.php', // support 3 tier nav

    '/setup.php',
    '/widgets.php'              // edit and/or remove understrap widgets
);

foreach ( $understrap_includes as $file ) {
    $filepath = locate_template( '/inc' . $file );
    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}


