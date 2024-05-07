<?php

global $statistics_options, $statistics_section_title, $show_statistics_section;


if ($statistics_options &&  $show_statistics_section) {
?>
    <section id="statistics">
        <div class="section-heading">
            <h6>Lets See </h6>
            <h3><?php echo $statistics_section_title; ?></h3>
        </div>
        <div class="container mt-5 mb-5 pt-3">
            <div class="row row-cols-2 row-cols-md-4 g-3">
            <?php
                foreach ($statistics_options as $key => $value) {
                    if (isset($value['statistic_name'])) {
                        $statistic_name = isset($value['statistic_name']) ? $value['statistic_name'] : '';
                        $statistic = isset($value['statistic']) ? shortNumber($value['statistic']) : 0;
                        $statistic_icon = isset($value['statistic_icon']) ? $value['statistic_icon'] : '';

                ?>
                <div class="box-wrapper col">
                    <div class="box">
                        <i class="<?php echo $statistic_icon; ?>"></i>
                        <span class="number"><?php echo $statistic; ?></span>
                        <span class="text"><?php echo $statistic_name; ?></span>
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
