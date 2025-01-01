<?php
require_once ATFIT_PLUGIN_DIR . 'admin/inc/Image.class.php';

class ATFIT_Trigger
{
    private static $_instance = null;
    public $image = null;
    public static function instance()
    {
        if (null === self::$_instance)
        {
            self::$_instance = new self();
            self::$_instance->hooks();
            self::$_instance->image = new ATFIT_Image();
        }
        return self::$_instance;
    }

    public function hooks()
    {
        $settings = get_option('atfit_settings');

        $post_types = $settings['post_types'];
        if (empty($post_types) || !is_array($post_types))
        {
            $post_types = array();
        }



        foreach ($post_types as $post_type)
        {


            add_action('save_post_' . $post_type, array(
                $this,
                'schedule_after_save_actions'
            ), 15, 3);
        }
    }


    public function schedule_after_save_actions($post_id, $post, $update)
    {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        {
            return;
        }


        if (!current_user_can('edit_post', $post_id))
        {
            return;
        }





        $settings = get_option('atfit_settings');

        if ($settings['background_source_query'] == 'custom-field')
        {
            // Wait finish saving post
            add_action('shutdown', function () use ($post_id, $post, $update)
            {
                $this->generate_featured_image($post_id, $post, $update);
            });
        }
        else
        {
            $this->generate_featured_image($post_id, $post, $update);
        }
    }


    public function generate_featured_image($post_id, $post, $update)
    {

        $post = get_post($post_id);


        $settings = get_option('atfit_settings');
        $post_types = $settings['post_types'];
        $post_status = $settings['post_status'];
        $post_with_tags = $settings['post_with_tags'];
        $post_type = $post->post_type;

        if (empty($post_types) || !is_array($post_types))
        {
            $post_types = array();
        }







        if (
            in_array($post_type, $post_types) &&
            in_array($post->post_status, $post_status) &&
            // Check if post has tags
            (empty($post_with_tags) || !is_array($post_with_tags) || has_term($post_with_tags, 'post_tag', $post_id))
        )
        {
            $post_id = $post->ID;
            $post_content = $post->post_content;




            $atfit_disable = get_post_meta($post_id, 'atfit_disable', true);
            if ($atfit_disable)
            {
                return;
            }
            // Check if dont have featured image
            if (!has_post_thumbnail($post_id))
            {


                $query = $this->image->get_query($post, $settings);


                $image = $this->image->get_from_source($query, $settings, $post);




                if ($image)
                {
                    $attachment_id = $this->image->generate($post, $image, $settings, true);
                    if ($attachment_id)
                    {
                        set_post_thumbnail($post_id, $attachment_id);
                        // set post_parent to attachment
                        $attachment = array(
                            'ID' => $attachment_id,
                            'post_parent' => $post_id
                        );
                        wp_update_post($attachment);

                        // Increase sum of generated images
                        $sum = get_option('atfit_images_generated');
                        $sum++;
                        update_option('atfit_images_generated', $sum);
                    }
                }
            }
        }
    }
}
