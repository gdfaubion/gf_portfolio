<?php
/**
 * Header file for the CaveHoldings theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

  <?php wp_body_open();?>

    <?php $header_logo = get_field('site_logo', 'option'); ?>

    <header id="site-header" role="banner">

      <a class="skip-link screen-reader-text" href="#site-content">Skip to main content</a>

      <div class="contain grid bg-dark">

        <div class="logo"><img src="<?php echo $header_logo['url']; ?>" alt="Site logo" height="35" width="115"></div>

        <div class="social-icons">

          <ul class="list-styleless">

            <?php
            $social = get_field('social_links', 'option');
            if($social) :
            foreach($social as $service => $social_link): ?>
            <?php if(!empty($social_link)): ?>

              <li>

                <a href="<?= $social_link ?>" title="Visit us on <?= $service ?>" rel="noopener">

                  <span><svg class="icon" viewBox="0 0 24 24"><use xlink:href="#<?= $service ?>"></use></svg></span>

                </a>

              </li>

            <?php endif; ?>

            <?php endforeach; endif; ?>

          </ul>

        </div>

      </div>

    </header><!-- #site-header -->