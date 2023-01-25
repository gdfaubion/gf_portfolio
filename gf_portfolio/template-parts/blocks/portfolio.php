<?php 

$post_objects = get_sub_field('portfolio_list');

if( $post_objects ): ?>

<div id="portfolio" class="margin-top margin-bottom">

  <?php
  if(get_sub_field('headline')) {
    echo '<h2 class="text-center">' . get_sub_field('headline') . '</h2>';
  }
  ?>

  <div class="contain grid">

    <?php foreach( $post_objects as $post): setup_postdata($post); ?>

    <div class="grid-item">

      <div class="screenshot">
        <?php
          $img_id = get_post_thumbnail_id(); 
          echo wp_get_attachment_image( $img_id, 'full'); 
        ?>
      </div>

      <div class="website-url bg-dark">
        <a class="link wp-editor external-link" href="<?php the_field('website_url'); ?>">View Website</a>
      </div>

    </div>

    <?php endforeach; ?>

  </div>

</div>
      
<?php 

wp_reset_postdata();

endif; ?>