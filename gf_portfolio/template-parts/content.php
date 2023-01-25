<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <?php if(has_post_thumbnail()): ?>

    <div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);"></div>

  <?php endif; ?>

  <div class="content">

    <?php the_content(); ?>

  </div><!-- .content -->

</article><!-- .post -->