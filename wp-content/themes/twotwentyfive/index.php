<?php get_header(); ?>
<div class="o-container">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-<?php echo is_active_sidebar('primary-sidebar')?'8':'12'; ?>">
            <main role="main">
               <?php get_template_part('loop', 'index') ?>                
            </main>
        </div>
        <?php if(is_active_sidebar('primary-sidebar')) { ?>
            <div class="o-row__column o-row__column--span-4">
                <?php get_sidebar();  ?>
            </div>
        <?php }  ?>
    </div>
</div>
<?php get_footer(); ?>

