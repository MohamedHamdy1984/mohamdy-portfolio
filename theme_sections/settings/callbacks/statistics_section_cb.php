<?php

// Callback for statistics section page

if (!function_exists('mohamdy_portfolio_statistics_page_cb')) {
    function mohamdy_portfolio_statistics_page_cb()
    {
        $statistics_options = get_option('statistics_options', []);
?>
        <h2 class="w3-panel w3-flat-belize-hole w3-flat-emerald w3-center"><?php _e('My statistics Section Settings', 'mohamdy-portfolio'); ?></h2>
        <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php
            settings_fields('statistics_section_content');
            echo '<table class="form-table" role="presentation">';
            do_settings_fields('statistics_section_content', 'statistics_section');
            echo '</table>';
            submit_button('Save Settings');
            ?>
        </form>

        <div class="w3-container">
            <h2><?php _e('statistics Table', 'mohamdy-portfolio'); ?></h2>

            <table class="w3-table-all w3-hoverable">
                <thead>
                    <tr class="w3-light-grey">
                        <th><?php _e('no.', 'mohamdy-portfolio'); ?></th>
                        <th><?php _e('Statistic Name', 'mohamdy-portfolio'); ?></th>
                        <th><?php _e('Statistic', 'mohamdy-portfolio'); ?></th>
                        <th><?php _e('Statistic icon', 'mohamdy-portfolio'); ?></th>
                        <th><?php _e('Action', 'mohamdy-portfolio'); ?></th>
                    </tr>
                </thead>
                <div class="w3-bar w3-margin-bottom">
                    <!-- Trigger/Open the Modal -->
                    <button onclick="document.getElementById('add-statistic').style.display='block'" class="w3-button w3-flat-belize-hole w3-round w3-small w3-margin-right w3-margin-left"><?php _e('Add statistic', 'mohamdy-portfolio'); ?></button>
                    <button onclick="document.getElementById('delete-all').style.display='block'" class="w3-button w3-flat-pomegranate w3-round w3-small w3-margin-right w3-margin-right"><?php _e('Delete All statistics', 'mohamdy-portfolio'); ?></button>
                </div>
                <?php
                $i = 1;
                foreach ($statistics_options as $key => $value) {
                    if (!isset($value['statistic_name'])) continue;
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $value['statistic_name'] . '</td>';
                    echo '<td>' . shortNumber($value['statistic']) . '</td>';
                    echo '<td>' . $value['statistic_icon'] . '</td>';

                    /*Action Table cell for  Delete & Edit buttons**/
                    echo '<td class="mohamdy-portfolio-action-cell">';

                    /** A Form for Edit statistic */
                    echo '<form method="post" action="" class="w3-show-inline-block">';
                    echo '<input type="hidden" name="edit" value="' . $value['statistic_name'] . '">';
                    submit_button(__('Edit', 'mohamdy-portfolio'), 'primary small', 'submit', false);
                    echo '</form> ';

                    /*A Form for delete statistic**/
                    echo '<form action="options.php" method="post" class="w3-show-inline-block">';
                    settings_fields('statistics_section_content');
                    echo '<input type="hidden" name="remove" value="' . $value['statistic_name'] . '">';
                    submit_button(__('Delete', 'mohamdy-portfolio'), 'delete small', 'submit', false, [
                        'onclick' => 'return confirm("Are you sure you want to delete this statistic? ");'
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



            <!-- Add statistic Modal -->
            <div id="add-statistic" class="w3-modal w3-animate-opacity w3-center" <?php echo (isset($_POST['edit'])) ? 'style="display:block"' : ''; ?>>
                <form class="madal-form" action="options.php" method="post">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-flat-clouds">
                            <span onclick="document.getElementById('add-statistic').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2><?php _e('Add statistic', 'mohamdy-portfolio'); ?></h2>
                        </header>
                        <div class="w3-container">
                            <?php
                            settings_fields('statistics_section_content');

                            echo '<table class="form-table statistic-dynamic-section" role="presentation">';
                            do_settings_fields('statistics_section_content', 'statistics_dynamic_section');
                            echo '</table>';
                            ?>
                            <input type="hidden" name="dynamic" value="1">
                        </div>
                        <footer class="w3-container w3-flat-clouds">
                            <?php
                            if (isset($_POST['edit'])) {
                                submit_button(__('Edit statistic', 'mohamdy-portfolio'), 'primary w3-margin w3-right', 'submit', false);
                            } else {
                                submit_button(__('Add statistic', 'mohamdy-portfolio'), 'primary w3-margin w3-right', 'submit', false);
                            }
                            ?>
                        </footer>
                    </div>
                </form>
            </div>


            <!-- Delete all statistics Modal -->
            <div id="delete-all" class="w3-modal w3-animate-opacity w3-center">
                <form class="madal-form" action="options.php" method="post">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-flat-clouds">
                            <span onclick="document.getElementById('delete-all').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2><?php _e('Delete All statistics', 'mohamdy-portfolio'); ?></h2>
                        </header>
                        <div class="w3-container w3-center">
                            <?php
                            settings_fields('statistics_section_content');

                            ?>
                            <div class="w3-panel w3-flat-pomegranate">
                                <h2 class="w3-wide" style=" text-shadow:1px 1px 0 #444;">Warning</h2>
                            </div>
                            <p>Are you sure you want to delete all statistics?</p>
                            <p>This can't be undo</p>
                            <input type="hidden" name="deleteAll" value="1">
                        </div>
                        <footer class="w3-container w3-flat-clouds">
                            <?php
                            submit_button(__('Delete All statistics', 'mohamdy-portfolio'), 'primary w3-margin w3-right', 'submit', false);
                            ?>
                        </footer>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}




if (!function_exists('statistics_sanitize_cb')) {
    function statistics_sanitize_cb($input)
    {

        // Detect multiple sanitizing passes and skip the second one
        // See Documentation : https://developer.wordpress.org/reference/functions/register_setting/#comment-2488
        static $pass_count = 0;
        $pass_count++;
        if ($pass_count > 1) {
            return $input;
        }


        $option = get_option('statistics_options', []);

        $option = map_deep($option, 'sanitize_textarea_field');


        // delete All statistic
        if (isset($_POST['deleteAll'])) {
            foreach ($option as $key => $value) {
                if (isset($value['statistic_name'])) {
                    unset($option[$key]);
                }
            }
            return $option;
        }
        // delete statistic
        if (isset($_POST['remove'])) {
            unset($option[$_POST['remove']]);
            return $option;
        }

        // dynamic part of the section
        if (isset($_POST['dynamic'])) {

            if ( isset($input['statistic_name']) ) {
                $input['statistic_name'] = ($input['statistic_name']) ? sanitize_text_field($input['statistic_name']) : wp_die(__('statistic name is required', 'mohamdy-portfolio'));
            } else {
                wp_die(__('statistic name is required', 'mohamdy-portfolio'));
            }




            $option_keys_lowercase = array_change_key_case($option, CASE_LOWER);
            $statistic_lowercase = strtolower($input['statistic_name']);

            if (array_key_exists($statistic_lowercase, $option_keys_lowercase) && $_POST['submit'] != 'Edit statistic') {
                wp_die(__('statistic already exist', 'mohamdy-portfolio'));
            }

            $input['statistic'] = absint($input['statistic']);

            $input['statistic_icon'] = preg_replace('/^<i class="/', '', $input['statistic_icon']);
            $input['statistic_icon'] = preg_replace('/"><\/i>$/', '', $input['statistic_icon']);
            $input['statistic_icon'] = sanitize_text_field($input['statistic_icon']);

            $option[$input['statistic_name']] = $input;
            return $option;
        }




        // Constant part of the section
        if (isset($input['show_statistics_section'])) {
            $option['show_statistics_section'] = ($input['show_statistics_section'] == 'show') ? 1 : 0;
        } else {
            $option['show_statistics_section'] = 0;
        }

        $option['statistics_section_title'] = isset($input['statistics_section_title']) ? sanitize_text_field($input['statistics_section_title']) : wp_die(__('Section Title is required', 'mohamdy-portfolio'));


        $option['statistics_section_icon'] = preg_replace('/^<i class="/', '', $input['statistics_section_icon']);
        $option['statistics_section_icon'] = preg_replace('/"><\/i>$/', '', $option['statistics_section_icon']);
        $option['statistics_section_icon'] = sanitize_text_field($option['statistics_section_icon']);

        return $option;
    }
}
