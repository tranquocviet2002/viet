<?php
/**
 * United Soccer Club: Customizer
 *
 * @subpackage United Soccer Club
 * @since 1.0
 */

use WPTRT\Customize\Section\Luzuk_United_Soccer_Club_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Luzuk_United_Soccer_Club_Button::class );

	$manager->add_section(
		new Luzuk_United_Soccer_Club_Button( $manager, 'luzuk_united_soccer_club_pro', [
			'title' => __( 'United Soccer Club Pro', 'united-soccer-club' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'united-soccer-club' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/soccer-club-wp-theme/', 'united-soccer-club')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'united-soccer-club-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'united-soccer-club-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function luzuk_united_soccer_club_customize_register( $wp_customize ) {

	$wp_customize->add_setting('luzuk_united_soccer_club_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_logo_padding',array(
		'label' => __('Logo Margin','united-soccer-club'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_float'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','united-soccer-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_float'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','united-soccer-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_float'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','united-soccer-club'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_float'
 	));
 	$wp_customize->add_control('luzuk_united_soccer_club_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','united-soccer-club'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('luzuk_united_soccer_club_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','united-soccer-club'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('luzuk_united_soccer_club_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','united-soccer-club'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'luzuk_united_soccer_club_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'united-soccer-club' ),
		'description' => __( 'Description of what this panel does.', 'united-soccer-club' ),
	) );

	$wp_customize->add_section( 'luzuk_united_soccer_club_theme_options_section', array(
    	'title'      => __( 'General Settings', 'united-soccer-club' ),
		'priority'   => 30,
		'panel' => 'luzuk_united_soccer_club_panel_id'
	) );

	$wp_customize->add_setting('luzuk_united_soccer_club_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_united_soccer_club_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','united-soccer-club'),
		'section' => 'luzuk_united_soccer_club_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','united-soccer-club'),
		   'Right Sidebar' => __('Right Sidebar','united-soccer-club'),
		   'One Column' => __('One Column','united-soccer-club')
		),
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'luzuk_united_soccer_club_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','united-soccer-club'),
        'section' => 'luzuk_united_soccer_club_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','united-soccer-club'),
            'Right Sidebar' => __('Right Sidebar','united-soccer-club'),
            'One Column' => __('One Column','united-soccer-club')
        ),
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_united_soccer_club_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','united-soccer-club'),
        'section' => 'luzuk_united_soccer_club_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','united-soccer-club'),
            'Right Sidebar' => __('Right Sidebar','united-soccer-club'),
            'One Column' => __('One Column','united-soccer-club')
        ),
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_united_soccer_club_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','united-soccer-club'),
        'section' => 'luzuk_united_soccer_club_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','united-soccer-club'),
            'Right Sidebar' => __('Right Sidebar','united-soccer-club'),
            'One Column' => __('One Column','united-soccer-club')
        ),
	));


	//Header
	$wp_customize->add_section( 'luzuk_united_soccer_club_header' , array(
    	'title'    => __( 'Header Settings', 'united-soccer-club' ),
		'priority' => null,
		'panel' => 'luzuk_united_soccer_club_panel_id'
	) );

	$wp_customize->add_setting('luzuk_united_soccer_club_header_btntext',array(
    	'default' => 'Join Now',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_header_btntext',array(
	   	'type' => 'text',
	   	'label' => __('Button Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_header',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_header_btnlink',array(
		'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_header_btnlink',array(
	   	'type' => 'text',
	   	'label' => __('Button Link','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_header',
	));	
	
	$wp_customize->add_setting( 'luzuk_united_soccer_club_headermenubg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_headermenubg_col', array(
		'label' => 'BG Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_menuhover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_menuhover_color', array(
		'label' => 'Menu Hover Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));


	$wp_customize->add_setting( 'luzuk_united_soccer_club_submenu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_submenu_color', array(
		'label' => 'Submenu Text Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_submenubg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_submenubg_color', array(
		'label' => 'Submenu BG Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_headerbtntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_headerbtntext_color', array(
		'label' => 'Button Text Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_headerbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_headerbtnbg_color', array(
		'label' => 'Button BG Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_headerbtnbghrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_headerbtnbghrv_color', array(
		'label' => 'Button BG Hover Color',
		'section' => 'luzuk_united_soccer_club_header',
	)));


	//home page slider
	$wp_customize->add_section( 'luzuk_united_soccer_club_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'united-soccer-club' ),
		'description'=> __('<b>Note :</b> Please Add PNG Image in 559*729 Ratio.','united-soccer-club'),
		'priority' => null,
		'panel' => 'luzuk_united_soccer_club_panel_id'
	) );

	$wp_customize->add_setting('luzuk_united_soccer_club_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'luzuk_united_soccer_club_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'luzuk_united_soccer_club_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'luzuk_united_soccer_club_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'united-soccer-club' ),
			'section' => 'luzuk_united_soccer_club_slider_section',
			'type' => 'dropdown-pages'
		));
	}


	$wp_customize->add_setting('luzuk_united_soccer_club_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_float'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Description Excerpt Length','united-soccer-club'),
		'section' => 'luzuk_united_soccer_club_slider_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_sliderheading',array(
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_sliderheading',array(
	   	'type' => 'text',
	   	'label' => __('SubTitle','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_slider_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_sliderplaynow',array(
    	'default' => 'Play Now',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_sliderplaynow',array(
	   	'type' => 'text',
	   	'label' => __('Play Now Button Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_slider_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_sliderplaynowlink',array(
    	'default' => '#',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('luzuk_united_soccer_club_sliderplaynowlink',array(
	   	'type' => 'url',
	   	'label' => __('Play Now Button Link','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_slider_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_sliderbtntext',array(
    	'default' => 'SHOP NOW',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_sliderbtntext',array(
	   	'type' => 'text',
	   	'label' => __('Start Now Button Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_slider_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_sliderbtnlink',array(
    	'default' => '#',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('luzuk_united_soccer_club_sliderbtnlink',array(
	   	'type' => 'url',
	   	'label' => __('Button Link','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_slider_section',
	));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_bg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_bg_color', array(
		'label' => 'BG Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_bgwave_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_bgwave_color', array(
		'label' => 'Wave BG Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_heading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_heading_color', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_title_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));
	

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_description_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_description_color', array(
		'label' => 'Description Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionplaynowbtntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionplaynowbtntext_color', array(
		'label' => 'Play Now Button Text Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionplaynowbtnicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionplaynowbtnicon_color', array(
		'label' => 'Play Now Button Icon Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionplaynowbtniconbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionplaynowbtniconbg_color', array(
		'label' => 'Play Now Button Icon BG Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionplaynowbtntexthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionplaynowbtntexthrv_color', array(
		'label' => 'Play Now Button Text Hover Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionshopnowbtntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionshopnowbtntext_color', array(
		'label' => 'Shop Now Button Text Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionshopnowbtnicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionshopnowbtnicon_color', array(
		'label' => 'Shop Now Button Icon Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionshopnowbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionshopnowbtnbg_color', array(
		'label' => 'Shop Now Button BG Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_slider_sectionshopnowbtntxthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_slider_sectionshopnowbtntxthrv_color', array(
		'label' => 'Shop Now Button Text Hover Color',
		'section' => 'luzuk_united_soccer_club_slider_section',
	)));


	//counter Section
	$wp_customize->add_section('luzuk_united_soccer_club_counter_section',array(
		'title'	=> __('Our Counter Settings','united-soccer-club'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','united-soccer-club'),
		'panel' => 'luzuk_united_soccer_club_panel_id',
	));

	
	$wp_customize->add_setting('luzuk_united_soccer_club_counterheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_counterheading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countersubheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countersubheading',array(
	   	'type' => 'text',
	   	'label' => __('Sub Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countertotalawardsnum',array(
    	'default' => '40',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countertotalawardsnum',array(
	   	'type' => 'text',
	   	'label' => __('Total Awards Number','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countertotalawardstext',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countertotalawardstext',array(
	   	'type' => 'text',
	   	'label' => __('Total Awards Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_counterteammembernum',array(
    	'default' => '30',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_counterteammembernum',array(
	   	'type' => 'text',
	   	'label' => __('Team Members Number','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_counterteammembertext',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_counterteammembertext',array(
	   	'type' => 'text',
	   	'label' => __('Team Members Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_counteryearexpriencenum',array(
    	'default' => '40',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_counteryearexpriencenum',array(
	   	'type' => 'text',
	   	'label' => __('Year Of Experience Number','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_counteryearexpriencetext',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_counteryearexpriencetext',array(
	   	'type' => 'text',
	   	'label' => __('Year Of Experience Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countermatchesplayednum',array(
    	'default' => '60',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countermatchesplayednum',array(
	   	'type' => 'text',
	   	'label' => __('Matches Played Number','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countermatchesplayedtext',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countermatchesplayedtext',array(
	   	'type' => 'text',
	   	'label' => __('Matches Played Text','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('united_soccer_club_banneryoutubevideourl',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('united_soccer_club_banneryoutubevideourl',array(
		'label'	=> __('Youtube Video URL','united-soccer-club'),
		'section' => 'luzuk_united_soccer_club_counter_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countervideoheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countervideoheading',array(
	   	'type' => 'text',
	   	'label' => __('Video Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_countervideosubheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_countervideosubheading',array(
	   	'type' => 'text',
	   	'label' => __('Video Sub Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_counter_section',
	));
	

	$wp_customize->add_setting( 'luzuk_united_soccer_club_counterbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_counterbg_color', array(
		'label' => 'Counter BG Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_counterheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_counterheading_color', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_countersubheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_countersubheading_color', array(
		'label' => 'Sub Heading Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_counternumbers_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_counternumbers_color', array(
		'label' => 'Counter Numbers Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_countertext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_countertext_color', array(
		'label' => 'Counter Text Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_counternumberbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_counternumberbg_color', array(
		'label' => 'Counter Number BG Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_countervideobg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_countervideobg_color', array(
		'label' => 'Video BG Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_countervideheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_countervideheading_color', array(
		'label' => 'Video Heading Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_countervidedubheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_countervidedubheading_color', array(
		'label' => 'Video Sub Heading Color',
		'section' => 'luzuk_united_soccer_club_counter_section',
	)));


	//whatweoffer Section
	$wp_customize->add_section('luzuk_united_soccer_club_whatweoffer_section',array(
		'title'	=> __('What We Offer Settings','united-soccer-club'),
		'description'=> __('<b>Note :</b> This section will appear below the Our Counter Section.','united-soccer-club'),
		'panel' => 'luzuk_united_soccer_club_panel_id',
	));

	
	$wp_customize->add_setting('luzuk_united_soccer_club_whatweoffersubheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_whatweoffersubheading',array(
	   	'type' => 'text',
	   	'label' => __('Sub Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_whatweofferheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_whatweofferheading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_whatweofferdescription',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_whatweofferdescription',array(
	   	'type' => 'text',
	   	'label' => __('Description','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	));

	$pages = get_pages(); // Retrieve pages
	$page_options = array(); // Initialize page options array
	foreach ($pages as $page) {
		$page_options[$page->ID] = $page->post_title; // Store page ID and title in options array
	}

	$wp_customize->add_setting('luzuk_united_soccer_club_servicespage_setting_1', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_servicespage_setting_1', array(
		'label'    => __('Select Page 1', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_whatweoffer_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_servicesicon1',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_servicesicon1',array(
	   	'type' => 'text',
	   	'label' => __('Icon 1','united-soccer-club'),
		'description' => __('Like this "fa-solid fa-calendar-days"','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_servicespage_setting_2', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_servicespage_setting_2', array(
		'label'    => __('Select Page 2', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_whatweoffer_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_servicesicon2',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_servicesicon2',array(
	   	'type' => 'text',
	   	'label' => __('Icon 2','united-soccer-club'),
		'description' => __('Like this "fa-solid fa-calendar-days"','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_servicespage_setting_3', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_servicespage_setting_3', array(
		'label'    => __('Select Page 3', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_whatweoffer_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_servicesicon3',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_servicesicon3',array(
	   	'type' => 'text',
	   	'label' => __('Icon 3','united-soccer-club'),
		'description' => __('Like this "fa-solid fa-calendar-days"','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	));


	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweoffersubheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweoffersubheading_color', array(
		'label' => 'Sub Heading Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweofferheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweofferheading_color', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweofferdescription_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweofferdescription_color', array(
		'label' => 'Description Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweoffericon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweoffericon_color', array(
		'label' => 'Icon Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweoffertitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweoffertitle_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweofferboxdescription_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweofferboxdescription_color', array(
		'label' => 'Description Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_whatweofferbtnicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_whatweofferbtnicon_color', array(
		'label' => 'Button Icon Color',
		'section' => 'luzuk_united_soccer_club_whatweoffer_section',
	)));

	
	//soccerclubactivities Section
	$wp_customize->add_section('luzuk_united_soccer_club_soccerclubactivities_section',array(
		'title'	=> __('Activities Settings','united-soccer-club'),
		'description'=> __('<b>Note :</b> This section will appear below the What We Offer Section.','united-soccer-club'),
		'panel' => 'luzuk_united_soccer_club_panel_id',
	));


	$wp_customize->add_setting('luzuk_united_soccer_club_soccerclubactivitiesheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_united_soccer_club_soccerclubactivitiesheading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','united-soccer-club'),
	   	'section' => 'luzuk_united_soccer_club_soccerclubactivities_section',
	));


	$pages = get_pages(); // Retrieve pages
	$page_options = array(); // Initialize page options array
	foreach ($pages as $page) {
		$page_options[$page->ID] = $page->post_title; // Store page ID and title in options array
	}

	$wp_customize->add_setting('luzuk_united_soccer_club_soccerclubactivities_setting_1', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_soccerclubactivities_setting_1', array(
		'label'    => __('Select Page 1', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_soccerclubactivities_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_soccerclubactivities_setting_2', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_soccerclubactivities_setting_2', array(
		'label'    => __('Select Page 2', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_soccerclubactivities_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_soccerclubactivities_setting_3', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_soccerclubactivities_setting_3', array(
		'label'    => __('Select Page 3', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_soccerclubactivities_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting('luzuk_united_soccer_club_soccerclubactivities_setting_4', array(
		'default'            => '',
		'sanitize_callback'  => 'absint', // Use absint to ensure the value is an integer
	));

	$wp_customize->add_control('luzuk_united_soccer_club_soccerclubactivities_setting_4', array(
		'label'    => __('Select Page 4', 'united-soccer-club'),
		'section'  => 'luzuk_united_soccer_club_soccerclubactivities_section', 
		'type'     => 'dropdown-pages',
	));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_activitiesheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_activitiesheading_color', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_united_soccer_club_soccerclubactivities_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_activitiestitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_activitiestitle_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_united_soccer_club_soccerclubactivities_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_activitiesdescription_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_activitiesdescription_color', array(
		'label' => 'Description Color',
		'section' => 'luzuk_united_soccer_club_soccerclubactivities_section',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_activitiesbtnicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_activitiesbtnicon_color', array(
		'label' => 'Button Icon Color',
		'section' => 'luzuk_united_soccer_club_soccerclubactivities_section',
	)));




	//Footer
    $wp_customize->add_section( 'luzuk_united_soccer_club_footer', array(
    	'title'  => __( 'Footer Settings', 'united-soccer-club' ),
		'priority' => null,
		'panel' => 'luzuk_united_soccer_club_panel_id'
	) );

	$wp_customize->add_setting('luzuk_united_soccer_club_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'luzuk_united_soccer_club_sanitize_checkbox'
    ));
    $wp_customize->add_control('luzuk_united_soccer_club_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','united-soccer-club'),
       'section' => 'luzuk_united_soccer_club_footer'
    ));

    $wp_customize->add_setting('luzuk_united_soccer_club_footer_copy',array(
		'default' => 'United Soccer Club WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('luzuk_united_soccer_club_footer_copy',array(
		'label'	=> __('Copyright Text','united-soccer-club'),
		'section' => 'luzuk_united_soccer_club_footer',
		'setting' => 'luzuk_united_soccer_club_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footertitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footertitle_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footertext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footertext_color', array(
		'label' => 'Text Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footerbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footerbg_color', array(
		'label' => 'BG Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footercopyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footercopyright_color', array(
		'label' => 'Copyright Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footerscrolltotoptext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footerscrolltotoptext_color', array(
		'label' => 'Scroll To Top Text Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footerscrolltotopbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footerscrolltotopbg_color', array(
		'label' => 'Scroll To Top BG Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footerscrolltotoptexthover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footerscrolltotoptexthover_color', array(
		'label' => 'Scroll To Top Text Hover Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));

	$wp_customize->add_setting( 'luzuk_united_soccer_club_footerscrolltotophover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_united_soccer_club_footerscrolltotophover_color', array(
		'label' => 'Scroll To Top Hover Color',
		'section' => 'luzuk_united_soccer_club_footer',
	)));




	

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'luzuk_united_soccer_club_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'luzuk_united_soccer_club_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'luzuk_united_soccer_club_customize_register' );

function luzuk_united_soccer_club_customize_partial_blogname() {
	bloginfo( 'name' );
}

function luzuk_united_soccer_club_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Luzuk_United_Soccer_Club_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="united-soccer-club-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="united-soccer-club-icon-list clearfix">
	                <?php
	                $luzuk_united_soccer_club_font_awesome_icon_array = luzuk_united_soccer_club_font_awesome_icon_array();
	                foreach ($luzuk_united_soccer_club_font_awesome_icon_array as $luzuk_united_soccer_club_font_awesome_icon) {
	                   $icon_class = $this->value() == $luzuk_united_soccer_club_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($luzuk_united_soccer_club_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function luzuk_united_soccer_club_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'luzuk_united_soccer_club_customizer_script' );