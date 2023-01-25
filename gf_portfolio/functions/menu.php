<?php

/**
 * Register menus 
 */

function gfp_menus() {

  $locations = array(
    'primary_nav'  => __( 'Primary Nav', 'gfp' ),
    'footer_nav' =>__( 'Footer', 'gfp' )
  );

  register_nav_menus( $locations );
}

add_action( 'init', 'gfp_menus' );

// Nav Walker
class gfp_Sublevel_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
    global $wp;

    $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

    if (in_array('menu-item-has-children', $classes) && $depth > 0) {
      if (($key = array_search('menu-item-has-children', $classes)) !== false) {
        unset($classes[$key]);
      }
    }

    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= '<li' . $id . $class_names . '>';

		$atts           = [];
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}
    if (in_array('menu-item-has-children', $classes)) {
      $atts['id'] = 'menu-item-' . $item->ID . '-anchor';
      $atts['aria-haspopup'] = 'true';
      $atts['aria-expanded'] = 'false';
      $atts['aria-controls'] = 'menu-item-' . $item->ID . '-submenu';
      $atts['role'] = 'button';
    }
    if(!empty($item->menu_item_parent)) {
      $atts['tabindex'] = '-1';
    }
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['aria-current'] = $item->current ? 'page' : '';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

    $title = apply_filters( 'the_title', $item->title, $item->ID );
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    if(in_array('menu-item-has-children', $classes) && $depth === 0) {
      $output .= '<div id="menu-item-' . $item->ID . '-submenu" class="sub-menu-container" aria-labelledby="menu-item-' . $item->ID . '-anchor">';
    }
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}

    $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

    if(in_array('menu-item-has-children', $classes) && $depth === 0) {
      $output .= '</div>';
    }

		$output .= "</li>{$n}";
	}

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class='sub-menu'>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
}