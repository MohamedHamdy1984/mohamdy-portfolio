<?php

defined('ABSPATH') || exit; 

$base = get_template_directory_uri() . '/';

if (!function_exists('mohamdy_load_assets')) {
    function mohamdy_load_assets()
    {
        global $base;
        wp_enqueue_style('mohamdy_bootstrap', $base . 'assets/css/bootstrap.min.css', [], null);
        wp_enqueue_style('mohamdy_fontawesome', $base . 'assets/css/all.min.css', ['mohamdy_bootstrap'], null);
        wp_enqueue_style('mohamdy_style', $base . 'assets/css/style.css', [], null);
        wp_enqueue_style('mohamdy_theme_style', $base . 'style.css', [], rand(1, 10000));
        wp_enqueue_script('mohamdy_bootstrap', $base . 'assets/js/bootstrap.bundle.min.js', [], null, true);
        wp_enqueue_script('mohamdy_custom', $base . 'assets/js/main.js', [], null, true);
        wp_enqueue_script('comment-reply');
    }
    add_action('wp_enqueue_scripts', 'mohamdy_load_assets');
}



if (!function_exists('mohamdy_setup')) {
    function mohamdy_setup()
    {
        add_theme_support('post-thumbnails');
        register_nav_menu('top-menu', 'Top Menu');
        add_theme_support('custom-logo');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('html5', [
            'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
        ]);
    }
    add_action('after_setup_theme', 'mohamdy_setup');
}


/**
 * Rename default post type to Projects
 *
 * @param object $labels
 * @hooked post_type_labels_post
 * @return object $labels
 */

if (!function_exists('mohamdy_rename_post_labels')) {

    function mohamdy_rename_post_labels($labels)
    {
        # Labels
        $labels->name = __('Projects', 'mohamdy');
        $labels->singular_name = __('Project', 'mohamdy');
        $labels->add_new = __('Add Project', 'mohamdy');
        $labels->add_new_item = __('Add Project', 'mohamdy');
        $labels->edit_item = __('Edit Project', 'mohamdy');
        $labels->new_item = __('New Project', 'mohamdy');
        $labels->view_item = __('View Project', 'mohamdy');
        $labels->view_items = __('View Projects', 'mohamdy');
        $labels->search_items = __('Search Projects', 'mohamdy');
        $labels->not_found = __('No Projects found.', 'mohamdy');
        $labels->not_found_in_trash = __('No Projects found in Trash.', 'mohamdy');
        $labels->archives = __('Project Archives', 'mohamdy');
        $labels->attributes = __('Project Attributes', 'mohamdy');
        $labels->insert_into_item = __('Insert into Project', 'mohamdy');
        $labels->uploaded_to_this_item = __('Uploaded to this Project', 'mohamdy');
        $labels->filter_items_list = __('Filter projects list ', 'mohamdy');
        $labels->items_list_navigation = __('Projects list navigation', 'mohamdy');
        $labels->items_list = __('Projects list', 'mohamdy');

        # Menu
        $labels->menu_name = __('Projects', 'mohamdy');
        $labels->all_items = __('All Projects', 'mohamdy');
        $labels->name_admin_bar = __('Project', 'mohamdy');
        $labels->item_published = __('Project published', 'mohamdy');
        $labels->item_published_privately = __('Project published privately', 'mohamdy');
        $labels->item_reverted_to_draft = __('Project reverted to draft', 'mohamdy');
        $labels->item_trashed = __('Project trashed', 'mohamdy');
        $labels->item_scheduled = __('Project scheduled', 'mohamdy');
        $labels->item_updated = __('Project updated', 'mohamdy');
        $labels->item_link = __('Project Link', 'mohamdy');
        $labels->item_link_description = __('A link to a Project', 'mohamdy');

        return $labels;
    }

    add_filter('post_type_labels_post', 'mohamdy_rename_post_labels');
}


// Add bootstrap claesses to tags in projects section
if (!function_exists('mohamdy_bbotstrap_classes_post_tag')) {

    function mohamdy_bbotstrap_classes_post_tag($links)
    {
        $output = [];
        foreach ($links as $link) {
            $link = substr_replace($link, ' class="btn col col text-nowrap btn-sm"', 2, 0);
            $output[] = $link;
        }
        return $output;
    }

    add_filter('term_links-post_tag', 'mohamdy_bbotstrap_classes_post_tag');
}



/**
 * Add a sidebar in the footer.
 */
if (!function_exists('mohamdy_register_sidebar')) {

    function mohamdy_register_sidebar()
    {
        register_sidebar([
            'name'          => __('Footer Sidebar', 'mohamdy'),
            'id'            => 'sidebar-1',
            'description'   => __('Widgets in this area will be shown in the middle of footer on all posts and pages.', 'mohamdy')
        ]);
    }

    add_action('widgets_init', 'mohamdy_register_sidebar');
}

/**
 * change fields order in comments
 */

add_filter('comment_form_fields', function ($fields) {
    return [
        'author' => $fields['author'],
        'email' => $fields['email'],
        'url' => $fields['url'],
        'comment' => $fields['comment'],
    ];
});

/**
 * comments and reply
 */


if (!function_exists('mohamdy_comment_callback')) {
    function mohamdy_comment_callback($comment, $args, $depth)
    {
?>
        <div <?php comment_class('d-flex flex-row p-3 single-comment') ?> id="comment-<?php echo $comment->comment_ID; ?>">
            <!-- <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle me-3"> -->
            <?php echo get_avatar($comment, $args['avatar_size'], false, false, ['class' => 'rounded-circle me-3']) ?>
            <div class="w-75 comment-content">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center">
                        <span class="me-2"><?php echo get_comment_author_link($comment); ?> </span>
                    </div>
                    <small><?php printf(
                                /* translators: %s is a time difference */
                                __('%s ago', 'mohamdy'),
                                human_time_diff(get_comment_time('U'), current_time('U'))
                            ); ?></small>
                </div>
                <p class="text-justify comment-text mb-0"><?php comment_text(); ?></p>
                <div class="d-flex flex-row user-feed">
                    <span class="ml-3">
                        <?php
                        comment_reply_link([
                            'depth'      => $depth,
                            'max_depth'  => $args['max_depth'],
                            'reply_text' => __('Reply', 'mohamdy'),
                        ]);
                        edit_comment_link(__('Edit Comment', 'mohamdy'));
                        ?>
                    </span>
                </div>
            </div> <!-- end comment-content -->
    <?php
    }
}

add_filter('comment_reply_link', function($link) {
    return str_replace("class='", "class='btn mohamdy-btn btn-sm ", $link);
});



if (!function_exists('mohamdy_comments_pagination_attributes')) {
    add_filter('next_comments_link_attributes', 'mohamdy_comments_pagination_attributes');
    add_filter('previous_comments_link_attributes', 'mohamdy_comments_pagination_attributes');
    function mohamdy_comments_pagination_attributes()
    {
        return 'class="btn mohamdy-color"';
    }
}



add_filter('edit_comment_link', function($link) {
    return str_replace('class="', 'class="btn mohamdy-btn btn-sm ms-2 ', $link);
});
//////////////////////////////

require get_template_directory() . '/walkers/walkers.php';
require get_template_directory() . '/customize/customize.php';
require get_template_directory() . '/theme_sections/settings/init.php';
