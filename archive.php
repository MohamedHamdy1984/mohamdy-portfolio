<?php 
get_header();
?>   
    
<main class="flex-fill">

  <div class="container  mt-5 pt-5">
    <div class="page-title p-3 m-3 shadow text-capitalize font-monospace">
      <h2 class="pe-4"><?php echo get_the_archive_title(  ); ?></h2>  
    </div>
    <section class="projects">
      <?php get_template_part('template_parts/cards'); ?> 
    </section> 


  </div> <!-- end container -->
<?php
get_footer();

