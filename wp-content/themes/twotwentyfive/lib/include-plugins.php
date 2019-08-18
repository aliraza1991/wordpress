<?php
include_once  get_template_directory().'/lib/class-tgm-plugin-activation.php';

function twotwentyfive_register_required_plugins() {
    $plugins = array(
        array(
            'name' => 'twotwentyfive metaboxes',
            'slug' => 'twotwentyfive-metaboxes',
            'source' => get_template_directory_uri(). '/lib/plugins/twotwentyfive-metaboxes.zip',
            'version' => '1.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
        )
    );
    $config = array(

    );
    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'twotwentyfive_register_required_plugins');
