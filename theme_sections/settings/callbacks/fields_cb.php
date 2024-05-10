<?php
// Callbacks for settings
// Fields Element Callbacks
if (!function_exists('mohamdy_portfolio_section_guide_callback')) {
    function mohamdy_portfolio_section_guide_callback($args)
    {
        $field_id = $args['label_for'];
        $image_url = '';
        switch ($field_id){
            case 'services_section_guide':
                $image_url = '/assets/img/services/services_map.png';
                break;
            case 'testimonials_section_guide':
                $image_url = '/assets/img/testimonial/testimonial_map.png';
                break;
            case 'statistics_section_guide':
                $image_url = '/assets/img/statistics/statistics_map.png';
                break;
        }
?>
        <img src="<?php echo esc_url(get_template_directory_uri()) . $image_url?>" alt="<?php echo $field_id; ?>">
    <?php
    }
}


if (!function_exists('mohamdy_portfolio_checkbox_element_callback')) {
    function mohamdy_portfolio_checkbox_element_callback($args)
    {
        $field_id = $args['label_for'];
        $option_name = $args['option_name'];
        $option = get_option($option_name, []);
        $option = is_array($option) ? $option : [];


        $checked = isset($option[$field_id]) ? $option[$field_id] : '';

    ?>
        <input type="checkbox" class="" id="<?php echo $field_id ?>" name="<?php echo $option_name.'['.$field_id.']'; ?>" value="show" <?php checked(1, $checked) ?> />
        &nbsp;
        <label for="<?php echo $field_id ?>">In case of hide This section, the data won't be deleted</label>
    <?php
    }
}

if (!function_exists('mohamdy_portfolio_text_element_callback')) {
    function mohamdy_portfolio_text_element_callback($args)
    {
        $field_id = isset($args['label_for']) ? $args['label_for'] : '';
        $option_name = isset($args['option_name']) ? $args['option_name'] : '';
        $option = get_option($option_name, []);

        $option = is_array($option) ? map_deep($option, 'sanitize_textarea_field') : [];

        $section_name = isset($args['section_name']) ? $args['section_name'] : '';

        $placeholder = isset($args['placeholder']) ? $args['placeholder'] : '';
        $required = isset($args['required']) ? $args['required'] : '';
        $label = isset($args['label']) ? $args['label'] : '';
        $section_dynamin_fields = ['services_dynamic_section', 'testimonials_dynamic_section', 'statistics_dynamic_section'];
        $value = '';
        $readonly = '';
        if( in_array($section_name, $section_dynamin_fields)){
            if(isset($_POST['edit'])){
                $value = isset($option[$_POST['edit']][$field_id]) ? $option[$_POST['edit']][$field_id] : '';
                if(in_array($field_id, ['service_name', 'client_name', 'statistic_name'])) $readonly = 'readonly';
            }
        }
        else{
            $value = isset($option[$field_id]) ? $option[$field_id] : '';
        }


    ?>
        <input type="text" class="w3-input w3-border" id="<?php echo $field_id ?>" name="<?php echo $option_name.'['.$field_id.']'; ?>" value="<?php echo $value; ?>" <?php echo $readonly; ?> placeholder="<?php echo $placeholder; ?> " <?php echo $required; ?>>
    <?php
    if($label){
        echo '<label>'.$label.'</label>';
    }
    }
}



if (!function_exists('mohamdy_portfolio_num_element_callback')) {
    function mohamdy_portfolio_num_element_callback($args)
    {
        $field_id = isset($args['label_for']) ? $args['label_for'] : '';
        $option_name = isset($args['option_name']) ? $args['option_name'] : '';
        $option = get_option($option_name, []);

        $option = is_array($option) ? map_deep($option, 'sanitize_textarea_field') : [];

        $section_name = isset($args['section_name']) ? $args['section_name'] : '';

        $label = isset($args['label']) ? $args['label'] : '';
        $min = isset($args['min']) ? $args['min'] : '';
        $max = isset($args['max']) ? $args['max'] : '';
        $section_dynamin_fields = ['services_dynamic_section', 'testimonials_dynamic_section'];
        $value = '';

        if( in_array($section_name, $section_dynamin_fields)){
            if(isset($_POST['edit'])){
                $value = isset($option[$_POST['edit']][$field_id]) ? $option[$_POST['edit']][$field_id] : '';;
            }
        }
        else{
            $value = isset($option[$field_id]) ? $option[$field_id] : '';
        }


    ?>
        <input type="number" class="" id="<?php echo $field_id ?>" name="<?php echo $option_name.'['.$field_id.']'; ?>" value="<?php echo $value; ?>" min="<?php echo $min; ?>" max="<?php echo $max; ?>">
    <?php
    if($label){
        echo '<label>'.$label.'</label>';
    }
    }
}




if (!function_exists('mohamdy_portfolio_textarea_element_callback')) {
    function mohamdy_portfolio_textarea_element_callback($args)
    {
        $field_id = isset($args['label_for']) ? $args['label_for'] : '';
        $option_name = isset($args['option_name']) ? $args['option_name'] : '';
        $option = get_option($option_name, []);
        $option = is_array($option) ? $option : [];

        $section_name = isset($args['section_name']) ? $args['section_name'] : '';
        $section_dynamin_fields = ['services_dynamic_section', 'testimonials_dynamic_section'];
        $value = '';
        if( in_array($section_name, $section_dynamin_fields)){
            if(isset($_POST['edit'])){
                $value = isset($option[$_POST['edit']][$field_id]) ? $option[$_POST['edit']][$field_id] : '';
            }
        }
        else{
            $value = isset($option[$field_id]) ? $option[$field_id] : '';
        }


    ?>
        <textarea class="w3-input w3-border" id="<?php echo $field_id ?>" name="<?php echo $option_name.'['.$field_id.']'; ?>" value="<?php echo $value; ?>" rows="5" cols="50"><?php echo $value ?></textarea>
        <?php
    }
}

if (!function_exists('mohamdy_portfolio_image_element_callback')) {
    function mohamdy_portfolio_image_element_callback($args)
    {
        $field_id = isset($args['label_for']) ? $args['label_for'] : '';
        $option_name = isset($args['option_name']) ? $args['option_name'] : '';
        $option = get_option($option_name, []);
        $option = is_array($option) ? $option : [];
        
        $section_name = isset($args['section_name']) ? $args['section_name'] : '';
        $section_dynamin_fields = ['services_dynamic_section', 'testimonials_dynamic_section'];

        if( in_array($section_name, $section_dynamin_fields)){
            if(isset($_POST['edit'])){
                $image_id = isset($option[$_POST['edit']][$field_id]) ? $option[$_POST['edit']][$field_id] : '';
            } else {
                $image_id = '';
            }
        }
        else{
            $image_id = isset($option[$field_id]) ? esc_attr($option[$field_id]) : '';
        }

        $image = wp_get_attachment_image_url($image_id, 'medium');

        if ($image) : ?>
            <a href="#" class="image-upload">
                <img src="<?php echo esc_url($image) ?>" />
            </a>
            <a href="#" class="image-remove">Remove image</a>
            <input type="hidden" name="<?php echo $option_name.'['.$field_id.']'; ?>" value="<?php echo absint($image_id) ?>">
        <?php else : ?>
            <a href="#" class="button image-upload align-element-left">Upload image</a>
            <a href="#" class="image-remove" style="display:none">Remove image</a>
            <input type="hidden" name="<?php echo $option_name.'['.$field_id.']'; ?>" value="">
        <?php endif;
    }
}



