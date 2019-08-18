<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>>

    <header role="banner">
        <div class="bg-light mb-0">
            <div class="p-4">
                <div class="container d-flex justify-content-between">
                    <div class="logo">
                        <?php if(has_custom_logo()){
                            the_custom_logo();
                        } else { ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>" class="logo_header"><?php esc_html(bloginfo('name')); ?></a>
                        <?php } ?>
                    </div>
                    <?php get_search_form(true) ;?>
                </div>
            </div>
        </div>

        <div class="bg-dark mb-2">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    
                            <?php wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'container' => '',
                                'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
                                'item_spacing' => ''
                                ));
                            ?>
                        
                    </div> 
                </nav>
            </div>
        </div>
    </header>