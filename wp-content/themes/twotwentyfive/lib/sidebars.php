<?php

function twotwentyfive_sidebar_widgets() {
    register_sidebar(array(
        'id' => 'primary-sidebar',
        'name' => esc_html__('Primary Sidebar', 'twotwentyfive'),
        'description' => esc_html__('This sidebar appears in the blog posts page.', 'twotwentyfive'),
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget %2$s"',
        'after_widget' => '</section>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
}

$footer_layouts = sanitize_text_field(get_theme_mod('twotwentyfive_footer_widget_layout','3,3,3,3'));
$footer_layouts = preg_replace('/\s+/','', $footer_layouts);
$columns = explode(',', $footer_layouts);
$footer_bg =  get_theme_mod('twotwentyfive_footer_bg'); 
foreach($columns as $i => $column){
    register_sidebar(array(
        'id' => 'footer-sidebar'.($i +1),
        'name' => sprintf(esc_html__('Footer Widgets Column %s', 'twotwentyfive'), $i +1),
        'description' => esc_html__('Footer Widgets', 'twotwentyfive'),
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget %2$s" >',
        'after_widget' => '</section> <hr>',
        'before_title' => '<h4 style="color:black">',
        'after_title' => '</h4>'
    )); 
}

add_action('widgets_init', 'twotwentyfive_sidebar_widgets');