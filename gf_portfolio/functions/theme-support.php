<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function gfp_theme_support() {
  /*
  * Switch default core markup for search form, comment form, and comments
  * to output valid HTML5.
  */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
    )
  );
}

add_action( 'after_setup_theme', 'gfp_theme_support' );

add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'responsive-embeds' );

add_theme_support( 'disable-custom-colors' );

add_theme_support( 'disable-custom-font-sizes' );

add_theme_support( 'align-wide' );

add_theme_support( 'editor-styles' );

function gfp_cleanup_head() {
  add_filter('the_generator', '__return_false');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10);
}

add_action('init', 'gfp_cleanup_head');


/**
 * Disable the emoji's.
 */
function gfp_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );

  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

add_action( 'init', 'gfp_disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }

  return $urls;
}

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 *
 * @return string $html
 */
function gfp_read_more_tag( $html ) {
  return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'gfp_read_more_tag' );

/**
 * Remove "Category:", "Tag:" from archive title
 * 
 */
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  }
  return $title;
});

/**
 * add async and defer attributes to enqueued scripts
 * 
 */
function hc_script_loader_tag($tag, $handle, $src) {
  if ($handle === 'google-maps') {
    if (false === stripos($tag, 'async')) {
      $tag = str_replace(' src', ' async="async" src', $tag);
    }

    if (false === stripos($tag, 'defer')) {
      $tag = str_replace('<script ', '<script defer ', $tag);
    }
  }
  return $tag;
}

add_filter('script_loader_tag', 'hc_script_loader_tag', 10, 3);


/**
 * Move Yoast to bottom
 * 
 */
function yoasttobottom() {
  return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

function gfp_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons', 'gfp_mce_buttons' );

function gfp_mce_insert_formats( $init_array ) {
  $style_formats = [
    [
      'title' => 'Button',
      'selector' => 'a',
      'classes' => 'button'
    ],
    [
      'title' => 'Button - External Link',
      'selector' => 'a',
      'classes' => 'button wp-editor external-link'
    ],
    [
      'title' => 'External Link',
      'selector' => 'a',
      'classes' => 'link wp-editor external-link'
    ],
  ];

  $init_array['style_formats'] = wp_json_encode( $style_formats );

  return $init_array;
}

add_filter( 'tiny_mce_before_init', 'gfp_mce_insert_formats' );

add_filter( 'gform_required_legend', function( $legend, $form ) {
  return '* Required Field';
}, 10, 2 );

// Change fields displays
add_filter('gform_field_content', function ($field_content, $field) {
  $field_content = str_replace('<select', '<div class="select-container"><select', $field_content);
  $field_content = str_replace('</select>', '</select><svg class="icon" viewBox="0 0 24 24"><use xlink:href="#form-arrow"></use></svg></div>', $field_content);

  return $field_content;
}, 10, 2);

add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}

if( function_exists('acf_add_options_page') ) {
    
  acf_add_options_page();
  
}