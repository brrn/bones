<?php 
/* 
 * This is where the theme option fields are imported. To change, use ACF's GUI and export to php, paste new code here. 
 */ 

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_theme-options-2',
        'title' => 'Theme Options',
        'fields' => array (
            array (
                'key' => 'field_51ddbbe8729f1',
                'label' => 'Global',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_51ddbbf1729f2',
                'label' => 'Maintenance Mode',
                'name' => 'maintenance_mode',
                'type' => 'radio',
                'choices' => array (
                    'on' => 'Activate',
                    'off' => 'Deactivate',
                ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array (
                'key' => 'field_51ddbcf890eac',
                'label' => 'Environment',
                'name' => 'environment',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_51ddbd4290ead',
                        'label' => 'Staging Address',
                        'name' => 'staging_address',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'formatting' => 'none',
                    ),
                    array (
                        'key' => 'field_51ddbd5490eae',
                        'label' => 'Live Address',
                        'name' => 'live_address',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'formatting' => 'none',
                    ),
                ),
                'row_min' => 1,
                'row_limit' => 1,
                'layout' => 'row',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_51ddbd7390eaf',
                'label' => 'Google Analytics UA Code',
                'name' => 'google_analytics_ua_code',
                'type' => 'text',
                'default_value' => '',
                'formatting' => 'none',
            ),
            array (
                'key' => 'field_51ddbd9d90eb0',
                'label' => 'Theme',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_51ddbda890eb1',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_51ddbdc390eb2',
                'label' => 'Social Media Profiles',
                'name' => 'social_media',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_51ddbdd690eb3',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'id',
                        'preview_size' => 'thumbnail',
                    ),
                    array (
                        'key' => 'field_51ddbde990eb4',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'formatting' => 'html',
                    ),
                ),
                'row_min' => 0,
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Profile',
            ),
        ),
        'location' => array (
            'rules' => array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                    'order_no' => 0,
                ),
            ),
            'allorany' => 'all',
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

?>