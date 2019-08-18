<?php
function twotwentyfive_add_meta_box() {
    add_meta_box('twotwentyfive_meta_id',
    'Post Setting',
    'twotwentyfive_post_metabox_html',
    'post',
    'normal',
    'default'
    );
}

add_action('add_meta_boxes', 'twotwentyfive_add_meta_box');

function twotwentyfive_post_metabox_html($post) {
   $subtitle = get_post_meta($post->ID, 'twotwentyfive_post_subtitle', true);
   $layout = get_post_meta($post->ID, 'twotwentyfive_post_layout', true);

   wp_nonce_field('twotwentyfive_update_post_metabox', 'twotwentyfive_update_post_nonce');
   ?>
    <p>
        <label for="twotwentyfive_post_metabox_html"><?php esc_attr_e('Post SubTitle', 'twotwentyfive') ?></label>
        <br>
        <input type="text" name="twotwentyfive_post_subtitle_field" value="<?php echo esc_attr($subtitle) ?>" id="twotwentyfive_post_metabox_html" class="widefat">
        <label for="twotwentyfive_post_layout_field"><?php esc_html_e('Layout', 'twotwentyfive') ?></label> <br>
        <select name="twotwentyfive_post_layout_field" class="widefat" id="twotwentyfive_post_layout_field">
            <option <?php selected($layout, 'full') ?> value="full"><?php esc_html_e('Full Width', 'twotwentyfive') ?></option>
            <option <?php selected($layout, 'sidebar') ?> value="sidebar"><?php esc_html_e('Post With Sidebar', 'twotwentyfive') ?></option>
        </select>
    </p>
   <?php
}

function twotwentyfive_save_post_metabox($post_id, $post) {
    $edit_cap = get_post_type_object($post->post_type)->cap->edit_post;
    if(!current_user_can($edit_cap,$post_id)) {
        return;
    }
    if(!isset($_POST['twotwentyfive_update_post_nonce']) || 
    !wp_verify_nonce($_POST['twotwentyfive_update_post_nonce'],
     'twotwentyfive_update_post_metabox')) {
        return;
     }

    if(array_key_exists('twotwentyfive_post_subtitle_field', $_POST)) {
            update_post_meta($post_id,
             'twotwentyfive_post_subtitle',
             sanitize_text_field( $_POST['twotwentyfive_post_subtitle_field'])
        );
    }

    if(array_key_exists('twotwentyfive_post_layout_field', $_POST)) {
            update_post_meta($post_id,
            'twotwentyfive_post_layout',
            sanitize_text_field( $_POST['twotwentyfive_post_layout_field'])
        );
    }
}

add_action('save_post', 'twotwentyfive_save_post_metabox', 10, 2);
