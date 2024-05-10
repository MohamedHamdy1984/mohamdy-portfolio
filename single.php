<?php
get_header();
?>

<main class="flex-fill">
  <div class="container  mt-5 pt-5">
    <div class="page-title p-3 m-3 shadow text-capitalize font-monospace">
      <h2 class="pe-4"><?php the_title(); ?></h2>
    </div>

    <div class="single-tags">
      <?php
      $project_tags = get_the_term_list($post->ID, 'post_tag', '<div class="row row-cols-auto m-1 post-tags">', '', '</div>');
      if (!empty($project_tags) && !is_wp_error($project_tags)) {
        echo $project_tags;
      }
      ?>
    </div>
    <div id="post-<?php the_ID(); ?>" <?php post_class( 'content pb-5 ' ); ?>>
      <?php the_content(); ?>
    </div>
  </div>



  <section id="comments" class="container mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col-md-9">
        <div class="card">
          <div class="p-3">
            <h6>
              <?php printf(
                _n('%s Comment', '%s Comments', get_comments_number(), 'mohamdy-portfolio'),
                number_format_i18n(get_comments_number())
              ); ?>
            </h6>
          <?php comments_template();
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- <section id="comments" class="container mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col-md-9">
        <div class="card">
          <div class="p-3">
            <h6>Comments</h6>
          </div>
          <div class="comments-form mt-3 d-flex flex-row align-items-center p-3 form-color"> <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle me-2"> <input type="text" class="form-control" placeholder="Enter your comment..."> </div>
          <div class="comments-box mt-2">
            <div class="d-flex flex-row p-3"> <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle me-3">
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="me-2">Brian selter</span> <small class="c-badge">Top Comment</small> </div> <small>12h ago</small>
                </div>
                <p class="text-justify comment-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <div class="d-flex flex-row user-feed"> <span class="wish"><i class="fa fa-heartbeat me-2"></i>24</span> <span class="ml-3"><i class="fa fa-comments-o me-2"></i>Reply</span> </div>
              </div>
            </div>
            <div class="d-flex flex-row p-3"> <img src="https://i.imgur.com/3J8lTLm.jpg" width="40" height="40" class="rounded-circle me-3">
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="me-2">Seltos Majito</span> <small class="c-badge">Top Comment</small> </div> <small>2h ago</small>
                </div>
                <p class="text-justify comment-text mb-0">Tellus in hac habitasse platea dictumst vestibulum. Lectus nulla at volutpat diam ut venenatis tellus. Aliquam etiam erat velit scelerisque in dictum non consectetur. Sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Aliquam faucibus purus in massa.</p>
                <div class="d-flex flex-row user-feed"> <span class="wish"><i class="fa fa-heartbeat me-2"></i>14</span> <span class="ml-3"><i class="fa fa-comments-o me-2"></i>Reply</span> </div>
              </div>
            </div>
            <div class="d-flex flex-row p-3"> <img src="https://i.imgur.com/agRGhBc.jpg" width="40" height="40" class="rounded-circle me-3">
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="me-2">Maria Santola</span> <small class="c-badge">Top Comment</small> </div> <small>12h ago</small>
                </div>
                <p class="text-justify comment-text mb-0"> Id eu nisl nunc mi ipsum faucibus. Massa massa ultricies mi quis hendrerit dolor. Arcu bibendum at varius vel pharetra vel turpis nunc eget. Habitasse platea dictumst quisque sagittis purus sit amet volutpat. Urna condimentum mattis pellentesque id.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <div class="d-flex flex-row user-feed"> <span class="wish"><i class="fa fa-heartbeat me-2"></i>54</span> <span class="ml-3"><i class="fa fa-comments-o me-2"></i>Reply</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->



  <?php
  get_footer();
