<?php
/**
 * Urban Elementor WP functions and definitions
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Global CTA
function urban_elementor_customize_register( $wp_customize ) {
    // Add Urban Elementor Customizations Section
    $wp_customize->add_section('urban_elementor_customizations', array(
        'title'    => __('Urban Elementor Customizations', 'urban-elementor'),
        'priority' => 30,
    ));

    // Header CTA Background Color
    $wp_customize->add_setting('header_cta_bg_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_cta_bg_color_control', array(
        'label'    => __('Header CTA Background Color', 'urban-elementor'),
        'section'  => 'urban_elementor_customizations',
        'settings' => 'header_cta_bg_color',
    )));

    // Header CTA Background Hover Color
    $wp_customize->add_setting('header_cta_bg_hover_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_cta_bg_hover_color_control', array(
        'label'    => __('Header CTA Background Hover Color', 'urban-elementor'),
        'section'  => 'urban_elementor_customizations',
        'settings' => 'header_cta_bg_hover_color',
    )));

    // Header CTA Text Color
    $wp_customize->add_setting('header_cta_text_color', array(
        'default'   => '#FFFFFF',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_cta_text_color_control', array(
        'label'    => __('Header CTA Text Color', 'urban-elementor'),
        'section'  => 'urban_elementor_customizations',
        'settings' => 'header_cta_text_color',
    )));

    // Page Title Background Color Setting
    $wp_customize->add_setting('urban_elementor_title_bg_color', array(
        'default' => 'rgba(0, 0, 0, 0.5)', // Default semi-transparent black
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_rgba_color',
    ));
    
    // Page Title Background Color Control
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'urban_elementor_title_bg_color', array(
        'section' => 'urban_elementor_customizations',
        'label'   => __('Title Background Color', 'urban_elementor'),
    )));

    // Page Title Background Opacity Setting
    $wp_customize->add_setting('urban_elementor_title_bg_opacity', array(
        'default' => '0.5',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_opacity_value',
    ));
    
    // Page Title Background Opacity Control
    $wp_customize->add_control('urban_elementor_title_bg_opacity', array(
        'type' => 'number',
        'section' => 'urban_elementor_customizations',
        'label' => __('Title Background Color Opacity', 'urban_elementor'),
        'input_attrs' => array(
            'min' => '0',
            'max' => '1',
            'step' => '0.01',
        ),
    ));

    // Page Title Text Color Setting
    $wp_customize->add_setting('urban_elementor_title_text_color', array(
        'default' => '#FFFFFF', // Default white
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    // Page Title Text Color Control
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'urban_elementor_title_text_color', array(
        'section' => 'urban_elementor_customizations',
        'label'   => __('Title Text Color', 'urban_elementor'),
    )));

    // Add a new panel for 'Call To Action'
    $wp_customize->add_panel( 'call_to_action_panel', array(
        'title'       => __( 'Urban Elementor Call To Action', 'urban-elementor' ),
        'description' => 'Global Call To Action', // Optional description
        'priority'    => 30, // Adjust the priority to position it
    ));

    // Add a section within the panel
    $wp_customize->add_section( 'call_to_action_section', array(
        'title' => __( 'Settings', 'urban-elementor' ),
        'panel' => 'call_to_action_panel',
    ));

    // Add settings to the section
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'heading', 'Heading', 'text' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'text', 'Text', 'textarea' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_text', 'Button Text', 'text' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_url', 'Button URL', 'url' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'background_color', 'Background Color', 'color' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'text_color', 'Text Color', 'color' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_background_color', 'Button Background Color', 'color' );
    urban_elementor_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_text_color', 'Button Text Color', 'color' );

    // Add a new panel for the Footer
    $wp_customize->add_panel('footer_panel', array(
        'title' => __('Urban Elementor Footer', 'urban-elementor'),
        'priority' => 90, // Adjust the priority to position it
    ));

    // Add a section within the panel
    $wp_customize->add_section('footer_settings_section', array(
        'title' => __('Footer Settings', 'urban-elementor'),
        'panel' => 'footer_panel',
        'priority' => 90, // Adjust the priority to position it
    ));

    // Add settings for logo upload
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => __('Footer Logo', 'urban-elementor'),
        'section' => 'footer_settings_section',
        'settings' => 'footer_logo',
    )));

    // Add settings for the text area
    $wp_customize->add_setting('footer_text', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_text', array(
        'type' => 'textarea',
        'label' => __('Footer Text', 'urban-elementor'),
        'section' => 'footer_settings_section',
    ));

    // Footer Copyright
    $wp_customize->add_setting('footer_copyright_text', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_copyright_text', array(
        'type' => 'textarea',
        'label' => __('Footer Copyright Text', 'urban-elementor'),
        'section' => 'footer_settings_section',
    ));
}
add_action( 'customize_register', 'urban_elementor_customize_register' );

function sanitize_rgba_color($color) {
    if (empty($color) || is_array($color)) {
        return 'rgba(0, 0, 0, 0.5)';
    }
    
    if (false === strpos($color, 'rgba')) {
        return sanitize_hex_color($color);
    }

    $color = str_replace(' ', '', $color);
    sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);

    return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

function urban_elementor_add_customizer_setting( $wp_customize, $section, $setting_id, $label, $type ) {
  $wp_customize->add_setting( $setting_id, array(
      'default' => '',
      'sanitize_callback' => 'wp_kses_post',
  ));

  $control_type = 'WP_Customize_Control';
  if ( $type === 'textarea' ) {
      $control_type = 'WP_Customize_Control';
      $type = 'textarea';
  } elseif ( $type === 'color' ) {
      $control_type = 'WP_Customize_Color_Control';
  }

  $wp_customize->add_control( new $control_type( $wp_customize, $setting_id, array(
      'label' => $label,
      'section' => $section,
      'settings' => $setting_id,
      'type' => $type,
  )));
}


