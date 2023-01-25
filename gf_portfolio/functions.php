<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// Theme support options
require_once __DIR__ . '/functions/theme-support.php';

// Register scripts and stylesheets
require_once __DIR__ . '/functions/enqueue-scripts.php';

// Adds pagination 
require_once __DIR__ . '/functions/pagination.php';

// Adds menu 
require_once __DIR__ . '/functions/menu.php';

// Post types
require_once __DIR__ . '/functions/post-types.php';