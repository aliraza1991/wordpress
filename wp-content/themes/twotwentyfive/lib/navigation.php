<?php
function twotwentyfive_register_menu() {
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'twotwentyfive'),
        'footer-menu' => esc_html__('Footer Menu', 'twotwentyfive')
    ));
}

add_action('init', 'twotwentyfive_register_menu');

function kbnt_special_nav_class( $classes, $item ){
    $classes[] = "nav-item";
    return $classes;
   }
   
   add_filter('nav_menu_css_class' , 'kbnt_special_nav_class' , 10 , 2);
   
   
   // add class in a tag
   function wpse156165_menu_add_class( $atts, $item, $args ) {
       $class = 'nav-link'; // or something based on $item
       $atts['class'] = $class;
       return $atts;
   }
   add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
   
   
?>