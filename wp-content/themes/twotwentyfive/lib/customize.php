<?php

function twotwentyfive_customize_register( $wp_customize ) {
  
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    
    $wp_customize->selective_refresh->add_partial('blogname', array(
        'selector' => '.logo',
        'container_inclusive' => false,
        'render_callback' => function() {
            bloginfo('name');
        }
    ));

    $wp_customize->selective_refresh->add_partial('twotwentyfive_footer_partial', array(
        'settings' => array('twotwentyfive_site_info','twotwentyfive_footer_bg','twotwentyfive_general_color', 'twotwentyfive_footer_widget_layout'),
        'selector' => '#footer',
        'container_inclusive' => false,
        'render_callback' => function() {
            get_template_part('template-parts/footer/widgets');
            get_template_part('template-parts/footer/info');
               
        }
    ));

    $wp_customize->add_section( 'twotwentyfive_footer_options', array(
        'title' => esc_html__( 'Footer Options', 'twotwentyfive' ),
        'description' => esc_html__('You can change footer option here.', 'twotwentyfive')
    ) );

  $wp_customize->add_setting('twotwentyfive_site_info', array(
      'default' => '',
      'sanitize_callback' => 'twotwentyfive_sanitize_site_info',
      'transport' => 'postMessage'
  ));
 
  $wp_customize->add_control('twotwentyfive_site_info',array(
      'type' => 'text',
      'label' => esc_html__('Site Info', 'twotwentyfive'),
      'section' => 'twotwentyfive_footer_options'
    ));


    $wp_customize->add_section( 'twotwentyfive_colors_settings', array(
        'title' => esc_html__( 'Theme Colors Settings', 'twotwentyfive' ),
        'description' => esc_html__('You can change colours here.', 'twotwentyfive'),
        'priority' => 210,
    ) );

/*####################### footer colour #########################*/

    $wp_customize->add_setting('twotwentyfive_footer_bg', array(
        'default' => '#ddd',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          'twotwentyfive_footer_bg',
          array(
            'label' => esc_html__('Footer Colour', 'twotwentyfive'),
            'section' => 'twotwentyfive_colors_settings',
        )));


/*########################## general colour ###################*/

    $wp_customize->add_setting('twotwentyfive_general_color', array(
        'default' => '#fff',
        // 'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'twotwentyfive_general_color',
        array(
            'label' => esc_html__('Anchor Colour', 'twotwentyfive'),
            'section' => 'twotwentyfive_colors_settings',
    )));



/*######################## Footer widget layout  ##########################*/ 

    $wp_customize->add_setting('twotwentyfive_footer_widget_layout', array(
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'twotwentyfive_validate_footer_layout'
    ));

    $wp_customize->add_control('twotwentyfive_footer_widget_layout',array(
        'type' => 'text',
        'label' => esc_html__('Footer Layout', 'twotwentyfive'),
        'section' => 'twotwentyfive_footer_options'
      ));

}

add_action('customize_register','twotwentyfive_customize_register');

function twotwentyfive_validate_footer_layout($validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/',$value)) {
        $validity->add('invalid_footer_layout',esc_html__('Footer layout is invalid', 'twotwentyfive'));
    }
    return $validity;
}

function twotwentyfive_sanitize_site_info($input){
    $allowed = array('a' => array(
        'href' => array(),
        'title' => array()
    ));
    return wp_kses($input, $allowed);
}



     

