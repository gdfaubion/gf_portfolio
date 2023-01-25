<?php
/**
 * The template for displaying the 404 template.
 *
 */

get_header();
?>

<main id="site-content" role="main">

  <div class="contain error404-content">

    <h2><?php _e( 'Page Not Found', 'gfp' ); ?></h2>

    <p>The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.</p>

    <a class="button" href="/">Go to homepage</a>

  </div>

</main><!-- #site-content -->

<?php
get_footer();