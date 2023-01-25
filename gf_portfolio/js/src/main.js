jQuery(document).ready(function($) {
  'use strict';

  $(".button.wp-editor.external-link").append(' <svg class="icon external" viewBox="0 0 24 24"><use xlink:href="#link_external"></use></svg>');

  $(".link.wp-editor.external-link").append(' <svg class="icon external" viewBox="0 0 24 24"><use xlink:href="#link_external"></use></svg>');

  $( "iframe" ).wrap(function() {
    return "<div class='responsive-embed'></div>";
  });

});