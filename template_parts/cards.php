    <!-- cards -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php 
    // second loop to get post details and show them at cards and modals
    if(have_posts()){
        $i = 0;
        while(have_posts()){
        $i++;
        the_post();
        // $post = get_post();
        $project_name = get_the_title();
        $project_tags = get_the_term_list( $post->ID, 'post_tag', '<div class="row row-cols-auto m-1 post-tags">', '', '</div>' );
        $excerpt = get_the_excerpt();
        $excerpt = substr($excerpt, 0, 100);
        $project_excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

        // get all categories for each post
        //this return an array of WP|term objects
        $post_categories = get_the_category($post->ID);

        // return array of categories names
        $post_categories = wp_list_pluck( $post_categories, 'name' );

        // if we have a contegory consists of more than one word => convert it to one word
        $post_categories = str_replace(' ', '-', $post_categories);

        // convert categoies list to string with space separator 
        $categories_string = wp_strip_all_tags( implode(" ",$post_categories) );
        $categories_string = str_replace("Uncategorized", "",$categories_string);
    ?>

    <!-- Card <?php echo $i;?> -->
    <div class="card-box <?php echo $categories_string;?>" >
        <div class="card col h-100 ">
        <?php
            if(get_the_post_thumbnail()){
            echo get_the_post_thumbnail($post, 'post-thumbnail', ['class'=>'card-img-top', 'alt'=>$project_name . '\'s featured image']); 
            } else {
            echo '<img src="'. get_template_directory_uri() .'/assets/img/cards/Card Size.jpg" class="card-img-top" alt="' . $project_name . '\'s featured image"> ';
            }
        ?>
        <div class="card-body d-flex justify-content-end flex-column text-start">
            <h5 class="card-title"><?php echo $project_name; ?></h5>
            
            <?php 
            if ( ! empty( $project_tags ) && ! is_wp_error( $project_tags ) ){
            echo $project_tags; 
            } 
            ?>
            <p class="card-text"><?php echo $project_excerpt; ?></p>
            <button type="button" class="btn mohamdy-btn" data-bs-toggle="modal" data-bs-target="#card<?php echo $i;?>Modal">
                More Details
            </button>
        </div>
        </div>
    </div>
    
    <!-- Modal <?php echo $i;?> -->
    <div class="modal fade" id="card<?php echo $i;?>Modal" tabindex="-1" aria-labelledby="card<?php echo $i;?>ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content px-3 m-3">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="card<?php echo $i;?>ModalLabel"><?php echo $project_name; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start py-3">
                <?php the_content( 'Read more ...' ); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn mohamdy-btn"><a class="text-light" target="_blank" href="<?php echo get_permalink(); ?>">Go to Project page</a></button>
                <!-- <button type="button" class="btn btn-primary"><a href="<?php //echo get_permalink(); ?>">Go to Project</a></button> -->
            </div>
            </div>
        </div>
    </div>
    <?php 
        } // End While
    } else {
        echo '<div class="alert alert-danger w-100" role="alert">No Projects added yet</div>';
    }
    ?>
    </div> <!-- end row -->