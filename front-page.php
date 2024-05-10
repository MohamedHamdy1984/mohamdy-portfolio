<?php
get_header();
?>

<aside id="sidebar">
  <ul class="nav nav-pills flex-column justify-content-center vh-100">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#home">
        <i class="fa-solid fa-house"></i>
        <div class="extend">
          <h5 class="my-auto">Home</h5>
        </div>
      </a>

    </li>
    <?php

    $services_options = get_option('services_options', []);
    $services_section_title = isset($services_options['services_section_title']) ? $services_options['services_section_title'] : 'My Services';
    $services_section_icon = isset($services_options['services_section_icon']) ? $services_options['services_section_icon'] : 'fa-regular fa-file-code';
    $show_services_section = isset($services_options['show_services_section']) ? $services_options['show_services_section'] : '';

    $testimonials_options = get_option('testimonials_options', []);
    $testimonials_section_title = isset($testimonials_options['testimonials_section_title']) ? $testimonials_options['testimonials_section_title'] : 'Testimonials';
    $testimonials_section_icon = isset($testimonials_options['testimonials_section_icon']) ? $testimonials_options['testimonials_section_icon'] : 'fa-solid fa-thumbs-up';
    $show_testimonials_section = isset($testimonials_options['show_testimonials_section']) ? $testimonials_options['show_testimonials_section'] : '';

    $statistics_options = get_option('statistics_options', []);
    $statistics_section_title = isset($statistics_options['statistics_section_title']) ? $statistics_options['statistics_section_title'] : 'Our Statistics';
    $statistics_section_icon = isset($statistics_options['statistics_section_icon']) ? $statistics_options['statistics_section_icon'] : 'fa-solid fa-chart-line';
    $show_statistics_section = isset($statistics_options['show_statistics_section']) ? $statistics_options['show_statistics_section'] : '';
    ?>

    <?php if ($services_options && $show_services_section) { ?>
      <li class="nav-item">
        <a class="nav-link" href="#services">
          <i class="<?php echo $services_section_icon; ?>"></i>
          <div class="extend">
            <h5 class="my-auto"><?php echo $services_section_title; ?></h5>
          </div>
        </a>
      </li>
    <?php } ?>

    <li class="nav-item">
      <a class="nav-link" href="#projects">
        <i class="fa-solid fa-rectangle-list"></i>
        <div class="extend">
          <h5 class="my-auto">Projects</h5>
        </div>
      </a>
    </li>

    <?php if ($testimonials_options &&  $show_testimonials_section) { ?>
      <li class="nav-item">
        <a class="nav-link" href="#testimonials">
          <i class="<?php echo $testimonials_section_icon; ?>"></i>
          <div class="extend">
            <h5 class="my-auto"><?php echo $testimonials_section_title; ?></h5>
          </div>
        </a>
      </li>
    <?php } ?>

    <?php if ($statistics_options &&  $show_statistics_section) { ?>
      <li class="nav-item">
        <a class="nav-link" href="#statistics">
          <i class="fa-solid fa-chart-line"></i>
          <div class="extend">
            <h5 class="my-auto">Statistics</h5>
          </div>
        </a>
      </li>
    <?php } ?>

  </ul>

</aside>





<main class="flex-fill">
  <section id="home" class="d-flex align-items-center">

    <div class="container">
      <div class="row justify-content-between">
        <div class="welcome col-lg-5">
          <p class="intro lh-lg text-body-secondary fs-6 my-3 py-3">__Introducing</p>
          <h2 class="hello">Hello ... </h2>
          <h2 class="title mb-2 pb-2">I am <span id="name"><?php echo esc_html(get_theme_mod('main_portfolio_name', __('(Add your Name)', 'mohamdy-portfolio'))); ?></span></h2>
          <div class="job-title">
            <div class="text-container">
              <div class="content">
                <div class="content__container">
                  <p class="content__container__text">
                    <?php echo esc_html(get_theme_mod('job_title', __('(Add Job Title)', 'mohamdy-portfolio'))); ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="skills">
            <?php
            $skills = get_theme_mod('mohamdy_portfolio_skills', []);

            for ($x = 0; $x <= 5; $x++) {
              if (!isset($skills[$x])) continue;
              if ($skills[$x]) {
                echo '<img src="' . wp_get_attachment_image_url($skills[$x]) . '" id="skill-' . $x . '">';
              }
            } 
            ?>
          </div>

        </div>
        <div class="wrapper col-lg-6 order-first order-lg-last">
          <div class="spacer"></div>
          <div class="photo d-flex align-items-end">

          </div>
        </div>
      </div>

    </div>
    <?php


    if ($services_options && $show_services_section) { ?>
      <!-- 
      Custom Shape Divider 
      https://www.shapedivider.app/
  -->
      <div class="custom-shape-divider-bottom-1708362943">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
      </div>
    <?php } ?>
  </section>


  <!-- Service Section -->
  <?php get_template_part('theme_sections/services'); ?>







  <section id="projects" class="text-center projects">
    <div class="section-heading">
      <h6>Let's See My work</h6>
      <h3>My Projects</h3>
    </div>

    <div class="projects-filter btn-group" role="group" aria-label="Basic radio toggle button group">
      <input type="radio" class="btn-check" name="btnradio" id="all" autocomplete="off" checked>
      <label class="btn col" for="all">All</label>

      <?php
      // get all categories and show them at project-filter
      // Exclude uncateorized category
      $all_categories = get_terms([
        'taxonomy' => 'category',
        'exclude'   => 1
      ]);
      $all_categories = wp_list_pluck($all_categories, 'name');
      $all_categories = str_replace(' ', '-', $all_categories);

      if (!empty($all_categories) && !is_wp_error($all_categories)) {
        foreach ($all_categories as $category) {
          echo '<input type="radio" class="btn-check" name="btnradio" id="' . $category . '" autocomplete="off">';
          echo '<label class="btn" for="' . $category . '">' . $category . '</label>';
        }
      }

      ?>
    </div>
    <div class="container">

      <?php get_template_part('template_parts/cards'); ?>

      <?php
$args = array (
	'before'      		=> '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'mohamdy-portfolio' ) . '</span>',
	'after'       		=> '</div>',
	'link_before' 		=> '<span class="page-link">',
	'link_after'  		=> '</span>',
	'next_or_number'	=> 'next',
	'separator'			=> ' | ',
	'nextpagelink'		=> __( 'Next &raquo', 'mohamdy-portfolio' ),
	'previouspagelink'	=> __( '&laquo Previous', 'mohamdy-portfolio' ),
);

wp_link_pages( $args );
?>

    </div> <!-- end container -->



    <!-- 
      Custom Shape Divider 
      https://www.shapedivider.app/
    -->
    <div class="custom-shape-divider-bottom-1708362943">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
      </svg>
    </div>

  </section>


  <!-- Testimonials Section -->
  <?php get_template_part('theme_sections/testimonials'); ?>

  <!-- Testimonials Section -->
  <?php get_template_part('theme_sections/statistics'); ?>

  <?php
  get_footer();
