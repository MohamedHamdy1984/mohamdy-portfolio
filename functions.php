<?php

defined('ABSPATH') || exit; 

$base = get_template_directory_uri() . '/';

if (!function_exists('mohamdy_portfolio_load_assets')) {
    function mohamdy_portfolio_load_assets()
    {
        global $base;
        wp_enqueue_style('mohamdy_portfolio_bootstrap', $base . 'assets/css/bootstrap.min.css', [], null);
        wp_enqueue_style('mohamdy_portfolio_fontawesome', $base . 'assets/css/all.min.css', ['mohamdy_portfolio_bootstrap'], null);
        wp_enqueue_style('mohamdy_portfolio_style', $base . 'assets/css/style.css', [], null);
        wp_enqueue_style('mohamdy_portfolio_theme_style', $base . 'style.css', [], rand(1, 10000));
        wp_enqueue_script('mohamdy_portfolio_bootstrap', $base . 'assets/js/bootstrap.bundle.min.js', [], null, true);
        wp_enqueue_script('mohamdy_portfolio_custom', $base . 'assets/js/main.js', [], null, true);
        wp_enqueue_script('comment-reply');
    }
    add_action('wp_enqueue_scripts', 'mohamdy_portfolio_load_assets');
}



if (!function_exists('mohamdy_portfolio_setup')) {
    function mohamdy_portfolio_setup()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        register_nav_menu('top-menu', 'Top Menu');
        add_theme_support('custom-logo');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('html5', [
            'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
        ]);
        add_theme_support( 'automatic-feed-links' );
    }
    add_action('after_setup_theme', 'mohamdy_portfolio_setup');
}


/**
 * Rename default post type to Projects
 *
 * @param object $labels
 * @hooked post_type_labels_post
 * @return object $labels
 */

if (!function_exists('mohamdy_portfolio_rename_post_labels')) {

    function mohamdy_portfolio_rename_post_labels($labels)
    {
        # Labels
        $labels->name = __('Projects', 'mohamdy-portfolio');
        $labels->singular_name = __('Project', 'mohamdy-portfolio');
        $labels->add_new = __('Add Project', 'mohamdy-portfolio');
        $labels->add_new_item = __('Add Project', 'mohamdy-portfolio');
        $labels->edit_item = __('Edit Project', 'mohamdy-portfolio');
        $labels->new_item = __('New Project', 'mohamdy-portfolio');
        $labels->view_item = __('View Project', 'mohamdy-portfolio');
        $labels->view_items = __('View Projects', 'mohamdy-portfolio');
        $labels->search_items = __('Search Projects', 'mohamdy-portfolio');
        $labels->not_found = __('No Projects found.', 'mohamdy-portfolio');
        $labels->not_found_in_trash = __('No Projects found in Trash.', 'mohamdy-portfolio');
        $labels->archives = __('Project Archives', 'mohamdy-portfolio');
        $labels->attributes = __('Project Attributes', 'mohamdy-portfolio');
        $labels->insert_into_item = __('Insert into Project', 'mohamdy-portfolio');
        $labels->uploaded_to_this_item = __('Uploaded to this Project', 'mohamdy-portfolio');
        $labels->filter_items_list = __('Filter projects list ', 'mohamdy-portfolio');
        $labels->items_list_navigation = __('Projects list navigation', 'mohamdy-portfolio');
        $labels->items_list = __('Projects list', 'mohamdy-portfolio');

        # Menu
        $labels->menu_name = __('Projects', 'mohamdy-portfolio');
        $labels->all_items = __('All Projects', 'mohamdy-portfolio');
        $labels->name_admin_bar = __('Project', 'mohamdy-portfolio');
        $labels->item_published = __('Project published', 'mohamdy-portfolio');
        $labels->item_published_privately = __('Project published privately', 'mohamdy-portfolio');
        $labels->item_reverted_to_draft = __('Project reverted to draft', 'mohamdy-portfolio');
        $labels->item_trashed = __('Project trashed', 'mohamdy-portfolio');
        $labels->item_scheduled = __('Project scheduled', 'mohamdy-portfolio');
        $labels->item_updated = __('Project updated', 'mohamdy-portfolio');
        $labels->item_link = __('Project Link', 'mohamdy-portfolio');
        $labels->item_link_description = __('A link to a Project', 'mohamdy-portfolio');

        return $labels;
    }

    add_filter('post_type_labels_post', 'mohamdy_portfolio_rename_post_labels');
}


// Add bootstrap claesses to tags in projects section
if (!function_exists('mohamdy_portfolio_bbotstrap_classes_post_tag')) {

    function mohamdy_portfolio_bbotstrap_classes_post_tag($links)
    {
        $output = [];
        foreach ($links as $link) {
            $link = substr_replace($link, ' class="btn col col text-nowrap btn-sm"', 2, 0);
            $output[] = $link;
        }
        return $output;
    }

    add_filter('term_links-post_tag', 'mohamdy_portfolio_bbotstrap_classes_post_tag');
}



/**
 * Add a sidebar in the footer.
 */
if (!function_exists('mohamdy_portfolio_register_sidebar')) {

    function mohamdy_portfolio_register_sidebar()
    {
        register_sidebar([
            'name'          => __('Footer Sidebar', 'mohamdy-portfolio'),
            'id'            => 'sidebar-1',
            'description'   => __('Widgets in this area will be shown in the middle of footer on all posts and pages.', 'mohamdy-portfolio')
        ]);
    }

    add_action('widgets_init', 'mohamdy_portfolio_register_sidebar');
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


if (!function_exists('mohamdy_portfolio_comment_callback')) {
    function mohamdy_portfolio_comment_callback($comment, $args, $depth)
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
                                __('%s ago', 'mohamdy-portfolio'),
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
                            'reply_text' => __('Reply', 'mohamdy-portfolio'),
                        ]);
                        edit_comment_link(__('Edit Comment', 'mohamdy-portfolio'));
                        ?>
                    </span>
                </div>
            </div> <!-- end comment-content -->
    <?php
    }
}

add_filter('comment_reply_link', function($link) {
    return str_replace("class='", "class='btn mohamdy-portfolio-btn btn-sm ", $link);
});



if (!function_exists('mohamdy_portfolio_comments_pagination_attributes')) {
    add_filter('next_comments_link_attributes', 'mohamdy_portfolio_comments_pagination_attributes');
    add_filter('previous_comments_link_attributes', 'mohamdy_portfolio_comments_pagination_attributes');
    function mohamdy_portfolio_comments_pagination_attributes()
    {
        return 'class="btn mohamdy-portfolio-color"';
    }
}



add_filter('edit_comment_link', function($link) {
    return str_replace('class="', 'class="btn mohamdy-portfolio-btn btn-sm ms-2 ', $link);
});
//////////////////////////////

require get_template_directory() . '/walkers/walkers.php';
require get_template_directory() . '/customize/customize.php';
require get_template_directory() . '/theme_sections/settings/init.php';
