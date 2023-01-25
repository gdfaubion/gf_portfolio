<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
  <footer id="site-footer" role="contentinfo" class="bg-dark">

    <div class="contain footer-credits text-center">
      <p>&copy; <?php echo date('Y'); ?> Designed & Built by <?php bloginfo('name'); ?></p>
    </div><!-- .footer-credits -->

  </footer><!-- #site-footer -->

  <?php wp_footer(); ?>	

  <div class="hide">
    <?php include __DIR__ . '/images/icons.svg'; ?>
  </div>

</body>

</html>