<?php
/**
 * The template for displaying pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>

<main id="site-content" role="main">

  <div class="hero-container bg-dark">

    <div class="contain grid">

      <div class="grid-item">
        <?php 
          if(get_field('hero_headline')) {
            $hero_headline = get_field('hero_headline');
          } else {
            $hero_headline = get_the_title();
          }
        ?>
        <h1><?php echo $hero_headline; ?></h1>
        <?php
        if(get_field('hero_text_area')) {
          echo '<p>' . get_field('hero_text_area') . '</p>';
        }
        ?>

        <?php
        $hero_btn = get_field('hero_cta_button', $hero->ID);
        $home_url = home_url();
        if($hero_btn) {
          if (str_contains($hero_btn['url'], $home_url) || $first_character === "/") {
            echo '<a class="button red" href="' . $hero_btn['url'] . '">' . $hero_btn['title'] . '</a>';
          } else {
            echo '<a class="button red" href="' . $hero_btn['url'] . '">' . $hero_btn['title'] . '</a>';
          }
        }
        ?>
      </div>

      <div class="grid-item">
        <div class="headshot"><?php echo wp_get_attachment_image( 4, 'full'); ?></div>
      </div>

    </div>
    
  </div>

  <?php
    if ( ! post_password_required() ):
      if( have_rows('page_builder_elements') ):
        echo '<div class="fw-pagebuilder">';
        while( have_rows('page_builder_elements') ): the_row();
          include('template-parts/blocks/' . get_row_layout() . '.php');
        endwhile;
        echo '</div>';
      endif;
    endif;
  ?>

</main><!-- #site-content -->

<?php
get_footer();