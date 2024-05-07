<?php

global $testimonials_options, $testimonials_section_title, $show_testimonials_section;


if ($testimonials_options &&  $show_testimonials_section) {
?>
    <section id="testimonials">
        <div class="section-heading">
            <h6>Now, Let's See : </h6>
            <h3><?php echo $testimonials_section_title; ?></h3>
        </div>
        <div class="container mt-5 pt-3">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gx-3 gy-5">
                <?php
                foreach ($testimonials_options as $key => $value) {
                    if (isset($value['client_name'])) {
                        $client_name = isset($value['client_name']) ? $value['client_name'] : '';
                        $client_photo = isset($value['client_photo']) ? $value['client_photo'] : 0;
                        $job_title = isset($value['job_title']) ? $value['job_title'] : '';
                        $client_rate = isset($value['client_rate']) ? $value['client_rate'] : 0;
                        $client_review = isset($value['client_review']) ? $value['client_review'] : '';
                ?>
                        <div class="col box-wrapper">
                            <div class="box">
                                <img decoding="async" src="<?php echo wp_get_attachment_image_url($client_photo); ?>" alt="" />
                                <h3><?php echo $client_name; ?></h3>
                                <span class="title"><?php echo $job_title; ?></span>
                                <div class="rate">
                                    <?php
                                    if($client_rate >= 1){
                                        for ($x = 1; $x <= 5; $x++) {
                                            if($client_rate != 0){
                                                echo '<i class="filled fas fa-star"></i>';
                                                $client_rate--;
                                            } else {
                                                echo '<i class="far fa-star"></i>';
                                            }
                                        }
                                    }
                                    ?>
                                
                                </div>
                                <p>
                                    <?php echo $client_review; ?>
                                </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
