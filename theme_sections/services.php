<?php
global $services_options, $services_section_title, $show_services_section;

$services_section_image = isset($services_options['services_section_image']) ? $services_options['services_section_image'] : '';
$services_section_intro = isset($services_options['services_section_intro']) ? $services_options['services_section_intro'] : 'Add a brief description of the service you can provide';


if ($services_options && $show_services_section) {
?>
    <section id="services">
        <div class="section-heading">
            <h6>Let's speak about:</h6>
            <h3><?php echo $services_section_title; ?></h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="service-description col-lg-6">
                    <p class="mt-5 mb-5">
                        <?php echo $services_section_intro; ?>.<br>
                        <?php echo $services_section_title; ?> includes:<br>
                    </p>
                    <div class="accordion" id="accordionExample">
                        <?php
                        $i=0;
                        foreach($services_options as $key=>$value){
                            if(isset($value['service_name'])){
                                $i++;
                                $service_name = isset($value['service_name']) ? $value['service_name'] : '';
                                $service_detail = isset($value['service_detail']) ? $value['service_detail'] : '';
                                $service_description = isset($value['service_description']) ? $value['service_description'] : '';
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $i; ?>">
                                        <?php echo $service_name; ?>
                                    </button>
                                </h2>
                                <div id="collapse-<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 1)? 'show' : ''; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong> <?php echo $service_detail; ?></strong><br><?php echo $service_description; ?>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="service-image col-lg-6 d-none d-lg-block">
                    <img src="<?php
                                if ($services_section_image) {
                                    echo wp_get_attachment_image_url($services_section_image, 'medium');
                                } else {
                                    echo get_template_directory_uri() . '/assets/img/services/web-design-4875186_640.jpg';
                                } ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
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

<?php
}
