<?php 
   $footer_layouts = sanitize_text_field(get_theme_mod('twotwentyfive_footer_widget_layout','3,3,3,3'));
   $footer_layouts = preg_replace('/\s+/','', $footer_layouts);
    $columns = explode(',', $footer_layouts);
    $footer_bg =  get_theme_mod('twotwentyfive_footer_bg'); 
    $widget_active = false;
    foreach($columns as $i => $column){
        if(is_active_sidebar('footer-sidebar'). ($i+1)) {
            $widget_active = true;
        }
    }
?>
<?php  if($widget_active){ ?>
<div class="o-container">
    <div class="o-row" style="background: <?php echo $footer_bg; ?>">
        <?php foreach($columns as $i => $column) { ?>
            <div class="o-row__column o-row__column--span-<?php echo $column; ?>" >
                <?php if(is_active_sidebar('footer-sidebar'). ($i+1)) {
                     dynamic_sidebar('footer-sidebar'. ($i+1)) ;
                 } ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
