<?php if(have_posts()){ ?>
    <?php while(have_posts()){ ?>
    <?php the_post(); ?>
    <?php get_template_part('template-parts/posts/content'); ?>
    <?php } ?>
    <?php the_posts_pagination(); ?>
    <?php do_action('twotwentyfive_after_pagination'); ?>
<?php } else { ?>
    
   <?php get_template_part('template-parts/posts/content', 'none'); ?>
   <?php
        $city = 'delhi';
    echo esc_html__('Your City is :', 'twotwentyfive').$city;

    printf(
            esc_html__('Your City is: %s', 'twotwentyfive'),$city
    );
    ?>
<?php }  
wp_reset_postdata();
?>