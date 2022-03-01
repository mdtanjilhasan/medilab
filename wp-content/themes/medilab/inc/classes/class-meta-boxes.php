<?php
/*
 *  Register Meta boxes
 * */

namespace MEDILAB_THEME\Inc;

use MEDILAB_THEME\Inc\Traits\Singleton;

class Meta_Boxes
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action('save_post', [$this, 'save_post_data']);
    }

    public function add_custom_meta_box()
    {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title', // Unique ID
                __('Hide Page Title', 'medilab'), // Box title
                [$this, 'custom_meta_box_html'], // Content Callback, Must be type of callable
                $screen, // post type,
            'side'
            );
        }
    }

    public function custom_meta_box_html($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_title', true);
        // csrf support which is known as nonce
        wp_nonce_field(plugin_basename(__FILE__), 'medilab_hide_page_title_token');
        ?>
        <div class="form-group">
<!--            <label for="hide_page_title">--><?php //esc_html_e('Hide the page title', 'medilab');?><!--</label>-->
            <select name="medilab_hide_page_title" id="hide_page_title" style="width: 88%">
                <option value=""><?php esc_html_e('Select', 'medilab');?></option>
                <option value="1" <?php selected($value, '1')?>><?php esc_html_e('Yes', 'medilab');?></option>
                <option value="0" <?php selected($value, '0')?>><?php esc_html_e('No', 'medilab');?></option>
            </select>
        </div>

<?php
    }

    public function save_post_data($post_id)
    {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // checking csrf is valid

        if (!isset($_POST['medilab_hide_page_title_token']) || !wp_verify_nonce($_POST['medilab_hide_page_title_token'], plugin_basename(__FILE__))) {
            return;
        }

        if (array_key_exists('medilab_hide_page_title', $_POST)) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['medilab_hide_page_title']
            );
        }
    }
}
