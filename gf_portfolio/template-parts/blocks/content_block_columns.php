<div class="column-content margin-top margin-bottom"> 

  <div class="grid contain">

    <div class="grid-item content">
      <?php
      $image_left = get_sub_field('image_left');
      $video_left = get_sub_field('embed_video_left');
      if($image_left) {
        echo wp_get_attachment_image( $image_left, 'full');
      } elseif($video_left) {
        echo '<div class="responsive-embed">' . $video_left . '</div>';
      }
      ?>
      <?php the_sub_field('content_editor_left'); ?>
    </div>

    <div class="grid-item content">
      <?php
      $image_right = get_sub_field('image_right');
      $video_right = get_sub_field('embed_video_right');
      if($image_right) {
        echo wp_get_attachment_image( $image_right, 'full');
      } elseif($video_right) {
        echo '<div class="responsive-embed">' . $video_right . '</div>';
      }
      ?>
      <?php the_sub_field('content_editor_right'); ?>
    </div>

  </div>

</div>