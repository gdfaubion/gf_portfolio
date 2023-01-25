<div class="margin-top margin-bottom">

  <?php
  if(get_sub_field('headline')) {
    echo '<h2 class="text-center">' . get_sub_field('headline') . '</h2>';
  }
  ?>

  <?php if(have_rows('content_block_repeater')): ?>

  <div class="alternating-content">

    <?php
    $row = 1;
    while(have_rows('content_block_repeater')): 
      the_row(); 

      if($row % 2 == 0) {
        $image_placement = 'right';
      } else {
        $image_placement = 'left';
      }
      
    ?>
        
    <div class="contain grid image-<?php echo $image_placement; ?>">

    <?php 
      $image = get_sub_field('cb_image');
      if($image_placement === 'left') {
        echo '<div class="grid-item image"><div class="border">' . wp_get_attachment_image( $image['ID'], 'full') . '</div></div>';
        echo '<div class="grid-item content"><h2>' . get_sub_field('cb_headline') . '</h2>' . get_sub_field('cb_text_area') . '</div>';
      } else {
        echo '<div class="grid-item content"><h2>' . get_sub_field('cb_headline') . '</h2>' . get_sub_field('cb_text_area') . '</div>';
        echo '<div class="grid-item image"><div class="border">' . wp_get_attachment_image( $image['ID'], 'full') . '</div></div>';
      }
    ?>

    </div>

    <?php $row++; endwhile; ?>

  </div>

  <?php endif; ?>

</div>