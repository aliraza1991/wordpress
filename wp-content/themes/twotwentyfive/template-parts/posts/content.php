<article <?php post_class('c-post') ?>>
    <h2 class="c-post__title">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title(); ?></a>
    </h2>
    <div class="c-post__meta">
    <?php twotwentyfive_post_meta(); ?>
    </div>
    <div class="c-post__excerpt">
        <p>
            <?php esc_html(the_excerpt()); ?>
        </p>
    </div>
        <?php twotwentyfive_readmore_link(); ?>
        <?php echo twotwentyfive_delete_post(); ?>
</article>