/*global Modernizr */
/*jslint browser:true */

(function() {
  'use strict';

  const mq = window.matchMedia( "(min-width: 1200px)" );

  var main_menu = document.querySelector('.nav-container');

  if(main_menu) {
    var has_children = main_menu.querySelectorAll('.menu-item-has-children');

    if(has_children) {
      has_children.forEach((menu_item) => {
        var sub_menu_container = menu_item.querySelector('.sub-menu-container'),
            timer;

        if(sub_menu_container) {
          var menu_item_link = menu_item.querySelector('a[aria-haspopup]');

          if(menu_item_link) {

            // Set aria expanded on mouse enter
            menu_item.addEventListener('mouseenter', (e) => {
              menu_item_link.setAttribute('aria-expanded', 'true');
            });

            // Remove aria expanded on mouse out
            menu_item.addEventListener('mouseleave', (e) => {
              menu_item_link.setAttribute('aria-expanded', 'false');
            });

            // Allow keyboard to open mobile menu
            menu_item_link.addEventListener('keydown', (e) => {
              // Open menu with enter, space, up, or down arrow
              if(e.keyCode === 13 || e.keyCode === 32 || e.keyCode === 38 || e.keyCode === 40) {
                e.preventDefault();

                if(e.target.parentNode.classList.contains('open')) {
                  e.target.parentNode.classList.remove('open');
                  e.target.setAttribute('aria-expanded', 'false');
                } else {
                  e.target.parentNode.classList.add('open');
                  e.target.setAttribute('aria-expanded', 'true');

                  setTimeout(function(event){
                    var anchors = e.target.parentNode.querySelector('.sub-menu-container').querySelectorAll('a'),
                        select_anchor = anchors[0];

                    if(e.keyCode === 38) {
                      select_anchor = anchors[anchors.length - 1];
                    }

                    if(select_anchor) {
                      select_anchor.focus();
                    } else {
                      e.target.parentNode.querySelector('.sub-menu-container').focus();
                    }
                  }, 350);
                }
              }
            });

            // Allow top level nav to open sub nav on mobile
            menu_item_link.addEventListener('click', (e) => {
              if(document.body.classList.contains('mobile-menu-open')) {
                e.preventDefault();
                menu_item.classList.toggle('open');
              }
            });

            if (mq.matches) {

              menu_item_link.addEventListener('touchstart', (e) => {
                e.preventDefault();

                if(menu_item.classList.contains('open')) {
                  menu_item.classList.remove('open');
                  menu_item.setAttribute('aria-expanded', 'false');
                  console.log(menu_item.querySelector('a').href);
                  //window.open(menu_item.querySelector('a').href);
                  window.location.href = menu_item.querySelector('a').href;
                } else {
                  menu_item.classList.add('open');
                  menu_item.setAttribute('aria-expanded', 'true');
                }
                
              });

            }

            sub_menu_container.addEventListener('keydown', (e) => {
              var anchors = sub_menu_container.querySelectorAll('a'),
                  current_anchor_index = Array.from(anchors).indexOf(e.target);

              // On key escape
              if(e.keyCode === 27) {
                e.preventDefault();
                sub_menu_container.previousElementSibling.focus();
              }

              // On key up
              if(e.keyCode === 38) {
                e.preventDefault();

                if(current_anchor_index === 0) {
                  anchors[anchors.length - 1].focus();
                } else {
                  anchors[current_anchor_index - 1].focus();
                }
              }

              // On key down
              if(e.keyCode === 40) {
                e.preventDefault();
                
                if(current_anchor_index === (anchors.length - 1)) {
                  anchors[0].focus();
                } else {
                  anchors[current_anchor_index + 1].focus();
                }
              }

              // Key home, go to first anchor
              if(e.keyCode === 36) {
                e.preventDefault();
                anchors[0].focus();
              }

              // Key end, go to last anchor
              if(e.keyCode === 35) {
                e.preventDefault();
                anchors[anchors.length - 1].focus();
              }
            });

            // Clear out timer if focus still in subnav.
            sub_menu_container.addEventListener('focusin', function(event){
              if (timer) {
                clearTimeout(timer);
                timer = null;
              }
          	});

            // Set timer if focus leaves the subnav. This triggers even if you are tabbing within the subnav.
            sub_menu_container.addEventListener('focusout', function(event){
          		timer = setTimeout(function(event){
                var open_menu_item = document.querySelector(".menu-item-has-children.open");
                if(open_menu_item) {
                  open_menu_item.classList.remove('open');
                  open_menu_item.querySelector('a[aria-haspopup]').setAttribute('aria-expanded', 'false');
                }
          		}, 20);
          	});
          }
        }
      });
    }
  }

  /** Trigger Mobile Menu **/
  var mobile_menu_trigger = document.querySelector('.mobile-menu-trigger');
  if(mobile_menu_trigger) {
    mobile_menu_trigger.addEventListener('click', (e) => {
      e.preventDefault();
      document.body.classList.toggle('mobile-menu-open');
    });
  }

}());