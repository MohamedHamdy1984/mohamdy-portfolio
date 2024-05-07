<?php

// Callback for testimonials section page

if (!function_exists('mohamdy_testimonials_page_cb')) {
    function mohamdy_testimonials_page_cb()
    {
        $testimonials_options = get_option('testimonials_options', []);
?>
        <h2 class="w3-panel w3-flat-belize-hole w3-flat-emerald w3-center"><?php _e('My testimonials Section Settings', 'mohamdy'); ?></h2>
        <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php
            settings_fields('testimonials_section_content');
            echo '<table class="form-table" role="presentation">';
            do_settings_fields('testimonials_section_content', 'testimonials_section');
            echo '</table>';
            submit_button('Save Settings');
            ?>
        </form>

        <div class="w3-container">
            <h2><?php _e('testimonials Table', 'mohamdy'); ?></h2>

            <table class="w3-table-all w3-hoverable">
                <thead>
                    <tr class="w3-light-grey">
                        <th><?php _e('no.', 'mohamdy'); ?></th>
                        <th><?php _e('Client Name', 'mohamdy'); ?></th>
                        <th><?php _e('Client Photo', 'mohamdy'); ?></th>
                        <th><?php _e('Job Title', 'mohamdy'); ?></th>
                        <th><?php _e('Client rate', 'mohamdy'); ?></th>
                        <th><?php _e('Client review', 'mohamdy'); ?></th>
                        <th><?php _e('Action', 'mohamdy'); ?></th>
                    </tr>
                </thead>
                <div class="w3-bar w3-margin-bottom">
                    <!-- Trigger/Open the Modal -->
                    <button onclick="document.getElementById('add-testimonial').style.display='block'" class="w3-button w3-flat-belize-hole w3-round w3-small w3-margin-right w3-margin-left"><?php _e('Add testimonial', 'mohamdy'); ?></button>
                    <button onclick="document.getElementById('delete-all').style.display='block'" class="w3-button w3-flat-pomegranate w3-round w3-small w3-margin-right w3-margin-right"><?php _e('Delete All testimonials', 'mohamdy'); ?></button>
                </div>
                <?php
                $i = 1;
                foreach ($testimonials_options as $key => $value) {
                    if (!isset($value['client_name'])) continue;
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $value['client_name'] . '</td>';
                    echo '<td> <img src="' . wp_get_attachment_image_url($value['client_photo']) . '" class="small-img"> </td>';
                    echo '<td>' . $value['job_title'] . '</td>';
                    echo '<td>' . $value['client_rate'] . '/5</td>';
                    echo '<td>' . $value['client_review'] . '</td>';

                    /*Action Table cell for  Delete & Edit buttons**/
                    echo '<td class="mohamdy-action-cell">';

                    /** A Form for Edit testimonial */
                    echo '<form method="post" action="" class="w3-show-inline-block">';
                    echo '<input type="hidden" name="edit" value="' . $value['client_name'] . '">';
                    submit_button(__('Edit', 'mohamdy'), 'primary small', 'submit', false);
                    echo '</form> ';

                    /*A Form for delete testimonial**/
                    echo '<form action="options.php" method="post" class="w3-show-inline-block">';
                    settings_fields('testimonials_section_content');
                    echo '<input type="hidden" name="remove" value="' . $value['client_name'] . '">';
                    submit_button(__('Delete', 'mohamdy'), 'delete small', 'submit', false, [
                        'onclick' => 'return confirm("Are you sure you want to delete this testimonial? ");'
                    ]);
                    echo  '</form>
                    </td>
                    </tr>';
                    $i++;
                }
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>



            <!-- Add testimonial Modal -->
            <div id="add-testimonial" class="w3-modal w3-animate-opacity w3-center" <?php echo (isset($_POST['edit'])) ? 'style="display:block"' : ''; ?>>
                <form class="madal-form" action="options.php" method="post">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-flat-clouds">
                            <span onclick="document.getElementById('add-testimonial').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2><?php _e('Add testimonial', 'mohamdy'); ?></h2>
                        </header>
                        <div class="w3-container">
                            <?php
                            settings_fields('testimonials_section_content');

                            echo '<table class="form-table testimonial-dynamic-section" role="presentation">';
                            do_settings_fields('testimonials_section_content', 'testimonials_dynamic_section');
                            echo '</table>';
                            ?>
                            <input type="hidden" name="dynamic" value="1">
                        </div>
                        <footer class="w3-container w3-flat-clouds">
                            <?php
                            if (isset($_POST['edit'])) {
                                submit_button(__('Edit testimonial', 'mohamdy'), 'primary w3-margin w3-right', 'submit', false);
                            } else {
                                submit_button(__('Add testimonial', 'mohamdy'), 'primary w3-margin w3-right', 'submit', false);
                            }
                            ?>
                        </footer>
                    </div>
                </form>
            </div>


            <!-- Delete all testimonials Modal -->
            <div id="delete-all" class="w3-modal w3-animate-opacity w3-center">
                <form class="madal-form" action="options.php" method="post">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-flat-clouds">
                            <span onclick="document.getElementById('delete-all').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2><?php _e('Delete All testimonials', 'mohamdy'); ?></h2>
                        </header>
                        <div class="w3-container w3-center">
                            <?php
                            settings_fields('testimonials_section_content');

                            ?>
                            <div class="w3-panel w3-flat-pomegranate">
                                <h2 class="w3-wide" style=" text-shadow:1px 1px 0 #444;">Warning</h2>
                            </div>
                            <p>Are you sure you want to delete all testimonials?</p>
                            <p>This can't be undo</p>
                            <input type="hidden" name="deleteAll" value="1">
                        </div>
                        <footer class="w3-container w3-flat-clouds">
                            <?php
                            submit_button(__('Delete All testimonials', 'mohamdy'), 'primary w3-margin w3-right', 'submit', false);
                            ?>
                        </footer>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}




if (!function_exists('testimonials_sanitize_cb')) {
    function testimonials_sanitize_cb($input)
    {

        // Detect multiple sanitizing passes and skip the second one
        // See Documentation : https://developer.wordpress.org/reference/functions/register_setting/#comment-2488
        static $pass_count = 0;
        $pass_count++;
        if ($pass_count > 1) {
            return $input;
        }


        $option = get_option('testimonials_options', []);

        $option = map_deep($option, 'sanitize_textarea_field');


        // delete All testimonial
        if (isset($_POST['deleteAll'])) {
            foreach ($option as $key => $value) {
                if (isset($value['client_name'])) {
                    unset($option[$key]);
                }
            }
            return $option;
        }
        // delete testimonial
        if (isset($_POST['remove'])) {
            unset($option[$_POST['remove']]);
            return $option;
        }

        // dynamic part of the section
        if (isset($_POST['dynamic'])) {

            if ( isset($input['client_name']) ) {
                $input['client_name'] = ($input['client_name']) ? sanitize_text_field($input['client_name']) : wp_die('Client name is required');
            } else {
                wp_die('Client name is required');
            }




            $option_keys_lowercase = array_change_key_case($option, CASE_LOWER);
            $testimonial_lowercase = strtolower($input['client_name']);

            if (array_key_exists($testimonial_lowercase, $option_keys_lowercase) && $_POST['submit'] != 'Edit testimonial') {
                wp_die(__('testimonial already exist'), 'mohamdy');
            }

            if (isset($input['client_photo'])) {
    
                $option['client_photo'] = absint($input['client_photo']);
            }

            $input['job_title'] = sanitize_text_field($input['job_title']);

            $input['client_rate'] = absint($input['client_rate']);

            $input['client_review'] = sanitize_textarea_field($input['client_review']);

            $option[$input['client_name']] = $input;
            return $option;
        }




        // Constant part of the section
        if (isset($input['show_testimonials_section'])) {
            $option['show_testimonials_section'] = ($input['show_testimonials_section'] == 'show') ? 1 : 0;
        } else {
            $option['show_testimonials_section'] = 0;
        }

        $option['testimonials_section_title'] = isset($input['testimonials_section_title']) ? sanitize_text_field($input['testimonials_section_title']) : wp_die('Section Title is required');


        $option['testimonials_section_intro'] = sanitize_textarea_field($input['testimonials_section_intro']);

        $option['testimonials_section_icon'] = preg_replace('/^<i class="/', '', $input['testimonials_section_icon']);
        $option['testimonials_section_icon'] = preg_replace('/"><\/i>$/', '', $option['testimonials_section_icon']);
        $option['testimonials_section_icon'] = sanitize_text_field($option['testimonials_section_icon']);

        return $option;
    }
}
