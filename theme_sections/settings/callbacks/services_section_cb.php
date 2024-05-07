<?php

// Callback for Service section page

if (!function_exists('mohamdy_services_page_cb')) {
    function mohamdy_services_page_cb()
    {
        $services_options = get_option('services_options', []);
        ?>
        <h2 class="w3-panel w3-flat-belize-hole w3-flat-emerald w3-center"><?php _e('My Services Section Settings', 'mohamdy'); ?></h2>
        <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php
            settings_fields('services_section_content');
            echo '<table class="form-table" role="presentation">';
            do_settings_fields('services_section_content', 'services_section');
            echo '</table>';
            submit_button('Save Settings');
            ?>
        </form>

        <div class="w3-container">
            <h2><?php _e('Services Table', 'mohamdy'); ?></h2>

            <table class="w3-table-all w3-hoverable">
                <thead>
                    <tr class="w3-light-grey">
                        <th><?php _e('no.', 'mohamdy'); ?></th>
                        <th><?php _e('Service Name', 'mohamdy'); ?></th>
                        <th><?php _e('Service detail', 'mohamdy'); ?></th>
                        <th><?php _e('Service Description', 'mohamdy'); ?></th>
                        <th><?php _e('Action', 'mohamdy'); ?></th>
                    </tr>
                </thead>
                <div class="w3-bar w3-margin-bottom">
                    <!-- Trigger/Open the Modal -->
                    <button onclick="document.getElementById('add-services').style.display='block'" class="w3-button w3-flat-belize-hole w3-round w3-small w3-margin-right w3-margin-left"><?php _e('Add Service', 'mohamdy'); ?></button>
                    <button onclick="document.getElementById('delete-all').style.display='block'" class="w3-button w3-flat-pomegranate w3-round w3-small w3-margin-right w3-margin-right"><?php _e('Delete All Services', 'mohamdy'); ?></button>
                </div>
                <?php
                $i = 1 ;
                foreach($services_options as $key=>$value){
                    if( ! isset($value['service_name'])) continue;
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $value['service_name'] . '</td>';
                    echo '<td>' . $value['service_detail'] . '</td>';
                    echo '<td>' . $value['service_description'] . '</td>';

                    /*Action Table cell for  Delete & Edit buttons**/
                    echo '<td class="mohamdy-action-cell">'; 

                    /** A Form for Edit service */
                    echo '<form method="post" action="" class="w3-show-inline-block">';
                    echo '<input type="hidden" name="edit" value="'.$value['service_name'].'">';
                    submit_button(__('Edit', 'mohamdy'), 'primary small', 'submit', false);
                    echo '</form> ';

                    /*A Form for delete service**/
                    echo '<form action="options.php" method="post" class="w3-show-inline-block">';
                    settings_fields('services_section_content');
                    echo '<input type="hidden" name="remove" value="'.$value['service_name'] .'">';
                    submit_button(__('Delete', 'mohamdy'), 'delete small', 'submit', false, [
                            'onclick' => 'return confirm("Are you sure you want to delete this Service? ");'
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
            


            <!-- Add Service Modal -->
            <div id="add-services" class="w3-modal w3-animate-opacity w3-center" <?php echo (isset($_POST['edit']))? 'style="display:block"' : ''; ?>>
                <form class="madal-form" action="options.php" method="post">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-flat-clouds">
                            <span onclick="document.getElementById('add-services').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2><?php _e('Add Service', 'mohamdy'); ?></h2>
                        </header>
                        <div class="w3-container">
                            <?php
                            settings_fields('services_section_content');

                            echo '<table class="form-table" role="presentation">';
                            do_settings_fields('services_section_content', 'services_dynamic_section');
                            echo '</table>';
                            ?>
                            <input type="hidden" name="dynamic" value="1">
                        </div>
                        <footer class="w3-container w3-flat-clouds">
                            <?php
                            if(isset($_POST['edit'])){
                                submit_button(__('Edit Service', 'mohamdy'), 'primary w3-margin w3-right', 'submit', false); 
                            }else{
                                submit_button(__('Add Service', 'mohamdy'), 'primary w3-margin w3-right', 'submit', false); 
                            }
                            ?>
                        </footer>
                    </div>
                </form>
            </div>


            <!-- Delete all Services Modal -->
            <div id="delete-all" class="w3-modal w3-animate-opacity w3-center">
                <form class="madal-form" action="options.php" method="post">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-flat-clouds">
                            <span onclick="document.getElementById('delete-all').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2><?php _e('Delete All Services', 'mohamdy'); ?></h2>
                        </header>
                        <div class="w3-container w3-center">
                            <?php
                            settings_fields('services_section_content');
                            
                            ?>
                            <div class="w3-panel w3-flat-pomegranate">
                                <h2 class="w3-wide style="text-shadow:1px 1px 0 #444"">Warning</h2>
                            </div>
                            <p>Are you sure you want to delete all services?</p>
                            <p>This can't be undo</p>
                            <input type="hidden" name="deleteAll" value="1">
                        </div>
                        <footer class="w3-container w3-flat-clouds">
                            <?php
                                submit_button(__('Delete All Services', 'mohamdy'), 'primary w3-margin w3-right', 'submit', false); 
                            ?>
                        </footer>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
}




if (!function_exists('services_sanitize_cb')) {
    function services_sanitize_cb($input)
    {

        // Detect multiple sanitizing passes and skip the second one
        // See Documentation : https://developer.wordpress.org/reference/functions/register_setting/#comment-2488
        static $pass_count = 0;
        $pass_count++;
        if ($pass_count > 1) {
            return $input;
        }

        
        $option = get_option('services_options', []);
        $option = map_deep($option, 'sanitize_textarea_field');


        // delete All Service
        if(isset($_POST['deleteAll'])){
            foreach($option as $key=>$value){
                if(isset($value['service_name'])){
                    unset($option[$key]);
                }
            }
            return $option;
        }
        // delete Service
        if(isset($_POST['remove'])){
            unset($option[$_POST['remove']]);
            return $option;
        }

        // dynamic part of the section
        if(isset($_POST['dynamic'])){

            if ( isset($input['service_name']) ) {
                $input['service_name'] = ($input['service_name'])? sanitize_text_field($input['service_name']) : wp_die('Service name is required');
            } else {
                wp_die('Service name is required');
            }


            $option_keys_lowercase = array_change_key_case( $option, CASE_LOWER );
            $service_lowercase = strtolower( $input['service_name'] );

            if(array_key_exists( $service_lowercase , $option_keys_lowercase ) && $_POST['submit'] != 'Edit Service' ){
                wp_die(__('Service already exist'), 'mohamdy');
            }

            $input['service_detail'] = sanitize_text_field($input['service_detail']);

            $input['service_description'] = sanitize_textarea_field($input['service_description']);


            $option[$input['service_name']] = $input;
            return $option;
        }



        // Constant part of the section
        if (isset($input['show_services_section'])){
            $option['show_services_section'] = ($input['show_services_section'] == 'show') ? 1 : 0;
        } else {
            $option['show_services_section'] = 0;
        }

        $option['services_section_title'] = isset($input['services_section_title'])? sanitize_text_field($input['services_section_title']) : wp_die('Section Title is required');

        $option['services_section_image'] = absint($input['services_section_image']);

        $option['services_section_intro'] = sanitize_textarea_field($input['services_section_intro']);
        
        // $option['services_section_icon'] = $input['services_section_icon'];

        $option['services_section_icon'] = preg_replace('/^<i class="/', '', $input['services_section_icon']);

        $option['services_section_icon'] = preg_replace('/"><\/i>$/', '', $option['services_section_icon']);
        // echo $option['services_section_icon'];
        // wp_die();
        $option['services_section_icon'] = sanitize_text_field($option['services_section_icon']);
        
        return $option;
    }
}