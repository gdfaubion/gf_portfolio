<?php if(have_rows('overview_cards')): ?>

<div class="overview-cards margin-top margin-bottom">

  <div class="contain grid">

    <?php while(have_rows('overview_cards')): the_row(); ?>

    <div class="grid-item content">

      <?php
      $card_img = get_sub_field('image');
      if($card_img) {
        echo wp_get_attachment_image( $card_img, 'full', "", array( "class" => "overview-img" ) );
      }
      ?>

      <h2 class="h3"><?php the_sub_field('headline'); ?></h2>

      <?php the_sub_field('text_editor'); ?>

    </div>

    <?php endwhile; ?>

  </div>

</div>

<?php endif; ?>