<?php 
get_header();
?>   
    
<main class="flex-fill">

  <div class="container  mt-5 pt-5">
    <div class="page-title p-3 m-3 shadow text-capitalize font-monospace">
      <h2 class="pe-4"><?php the_title(); ?></h2>
    </div>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </div>



<?php
get_footer();

