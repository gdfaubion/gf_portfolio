<?php

/*************************************************
 * Register Portfolio Custom Post Types
 ************************************************/

add_action('init', function () {

  $labels = [
    'name'                  => _x('Portfolio', 'Post type general name', 'textdomain'),
    'singular_name'         => _x('Portolio', 'Post type singular name', 'textdomain'),
    'menu_name'             => _x('Portfolio', 'Admin Menu text', 'textdomain'),
    'name_admin_bar'        => _x('Add New', 'Add New on Toolbar', 'textdomain'),
    'add_new'               => __('Add New', 'textdomain'),
    'add_new_item'          => __('Add New Project', 'textdomain'),
    'new_item'              => __('New Project', 'textdomain'),
    'edit_item'             => __('Edit Project', 'textdomain'),
    'view_item'             => __('View Project', 'textdomain'),
    'all_items'             => __('All Projects', 'textdomain'),
    'search_items'          => __('Search Projects', 'textdomain'),
    'parent_item_colon'     => __('Parent Project:', 'textdomain'),
    'not_found'             => __('No Projects found.', 'textdomain'),
    'not_found_in_trash'    => __('No Projects found in Trash.', 'textdomain'),
  ];

  $args = [
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => false,
    'show_ui'             => true,
    'exclude_from_search' => true,
    'show_in_nav_menus'   => false,
    'has_archive'         => false,
    'rewrite'             => false,
    'show_in_menu'        => true,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-portfolio',
    'supports'            => ['title', 'thumbnail'],
    'show_in_rest'        => true
  ];

  register_post_type('portfolio', $args);

});