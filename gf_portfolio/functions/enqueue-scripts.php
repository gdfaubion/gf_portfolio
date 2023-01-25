<?php

/**
 * Register and Enqueue Styles.
 */

function gfp_register_styles() {

  $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'gfp-style', get_template_directory_uri() . '/css/dist/style.css', array(), $theme_version );

  }

add_action( 'wp_enqueue_scripts', 'gfp_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function gfp_register_scripts() {

  $theme_version = wp_get_theme()->get( 'Version' );

  if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_enqueue_script( 'gfp-js', get_template_directory_uri() . '/js/dist/app.js', array('jquery'), $theme_version, true );
  wp_script_add_data( 'gfp-js', 'async', true );


}

add_action( 'wp_enqueue_scripts', 'gfp_register_scripts' );