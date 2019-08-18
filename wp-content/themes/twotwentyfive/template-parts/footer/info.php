<?php 
$footer_bg =  get_theme_mod('twotwentyfive_footer_bg'); 
$site_info = get_theme_mod('twotwentyfive_site_info', ''); 
?>
<?php if($site_info){ ?>
<div>
    <div class="o-container" style="background-color: <?php echo $footer_bg; ?>; text-align: center; padding:10px;opacity:0.8">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 footerr">
                <?php 
                 $allowed = array('a' => array(
                    'href' => array(),
                    'title' => array()
                ));
                ?>
                 <?php echo wp_kses($site_info, $allowed); ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>