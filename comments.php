<?php


// echo '<hr class="mt-5">';

comment_form([
    'class_container' => 'comments-form m-3 form-color',
    'title_reply_before' => '<div class="p-3"><h6>',
    'title_reply_after' => '</h6></div>',
    'comment_notes_before' => '<div class="ps-2">Your email address will not be published.</div>',
    'comment_notes_after' => '<div class="ps-2">Required fields are marked *</div>',
    'class_submit' => 'btn mohamdy-portfolio-btn m-3',
    'fields' => [
        'author' => '<input name="author" type="text" class="form-control" placeholder="' . esc_attr(__('* Your name', 'mohamdy-portfolio')) . '">',
        'email' => '<input name="email" type="text" class="form-control" placeholder="' . esc_attr(__('* Email address', 'mohamdy-portfolio')) . '">',
        'url' => '<input name="url" type="text" class="form-control" placeholder="' . esc_attr(__('Website', 'mohamdy-portfolio')) . '">',
    ],
    'comment_field' => '<textarea name="comment" class="form-control" placeholder="' . esc_attr(__('Your comment', 'mohamdy-portfolio')) . '"></textarea>',
]);

if (have_comments()) {

?>
    <div class="p-3">
        <h6>
            <?php printf(
                _n('%s Comment', '%s Comments', get_comments_number(), 'mohamdy-portfolio'),
                number_format_i18n(get_comments_number())
            ); ?>
        </h6>
    </div>
    <div class="comments-box mt-2" id="comments">
        <?php
        wp_list_comments([
            'avatar_size' => 50,
            'style'       => 'div',
            'callback'    => 'mohamdy_portfolio_comment_callback',
            'max_depth'   => 2
        ]);
        ?>
        <hr class="mt-3">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                
                <?php previous_comments_link(__('<i class="fa-solid fa-angle-left fa-l"></i>  Previous Comments', 'mohamdy-portfolio')); ?>
            </div>
            <div class="d-flex">
                <?php next_comments_link(__('Next Comments  <i class="fa-solid fa-chevron-right fa-l"></i>', 'mohamdy-portfolio')); ?>
            </div>
        </div>
    </div> <!-- end comments-box -->

<?php
}
