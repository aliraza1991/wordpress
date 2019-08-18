<?php
    function twotwentyfive_assets(){
        wp_enqueue_style('main_file',get_stylesheet_uri()); 
        wp_enqueue_style('twotwentyfive-stylesheet', get_template_directory_uri().'/dist/assets/css/bundle.css', array(),'1.0.0', 'all');
        include(get_template_directory().'/lib/inline-css.php');
        wp_add_inline_style('twotwentyfive-stylesheet', $inline_styles);

        wp_enqueue_style('twotwentyfive-boostrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(),'1.0.0', 'all');
        wp_enqueue_style('twotwentyfive-fontawasome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(),'1.0.0', 'all');
        wp_enqueue_script('twotwentyfive-scripts', get_template_directory_uri().'/dist/assets/js/bundle.js', array('jquery'), '1.0.0', true);
        // wp_enqueue_script('twotwentyfive-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js', array(), '1.0.0', true);
        wp_enqueue_script('twotwentyfive-popper.js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1.0.0', true);
        wp_enqueue_script('twotwentyfive-bootstrap.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '1.0.0', true);
        
        // wp_enqueue_script('jquery');
    }
    add_action('wp_enqueue_scripts', 'twotwentyfive_assets');

    function twotwentyfive_admin_assets(){
        wp_enqueue_style('twotwentyfive-admin-stylesheet', get_template_directory_uri().'/dist/assets/css/admin.css', array(),'1.0.0', 'all');
        wp_enqueue_script('twotwentyfive-admin-scripts', get_template_directory_uri().'/dist/assets/js/admin.js', array(), '1.0.0', true);
    }
    add_action('admin_enqueue_scripts', 'twotwentyfive_admin_assets');

    function twotwentyfive_customize_preview_js() {
        wp_enqueue_script('twotwentyfive-customize-preview', get_template_directory_uri().'/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);
        include(get_template_directory().'/lib/inline-css.php');
        wp_localize_script('twotwentyfive-customize-preview', 'twotwentyfive', array('x' => $inline_styles));
    }

    add_action('customize_preview_init', 'twotwentyfive_customize_preview_js');
  
?>