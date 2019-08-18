<?php
   
   function twotwentyfive_metaboxes_admin_assets(){
       global $pagenow;
       if(   $pagenow !== 'post.php') return;
        wp_enqueue_style('twotwentyfive-metaboxes_admin-stylesheet', plugins_url('twotwentyfive-metaboxes/dist/assets/css/admin.css'), array(),'1.0.0', 'all');
        wp_enqueue_script('twotwentyfive-metaboxes_admin-scripts', plugins_url('twotwentyfive-metaboxes/dist/assets/js/admin.js'), array('jquery'), '1.0.0', true);
    }
    add_action('admin_enqueue_scripts', 'twotwentyfive_metaboxes_admin_assets');

  
  
?>