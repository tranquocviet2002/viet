<?php
/**
 * Soccer Academy: Customizer
 *
 * @subpackage Soccer Academy
 * @since 1.0
 */

function soccer_academy_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Fontawesome icon-picker
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );
  	
  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'Soccer_Academy_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

	// Pro Section
 	$wp_customize->add_section('soccer_academy_pro', array(
        'title'    => __('UPGRADE SOCCER ACADEMY PREMIUM', 'soccer-academy'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('soccer_academy_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Soccer_Academy_Pro_Control($wp_customize, 'soccer_academy_pro', array(
        'label'    => __('SOCCER ACADEMY PREMIUM', 'soccer-academy'),
        'section'  => 'soccer_academy_pro',
        'settings' => 'soccer_academy_pro',
        'priority' => 1,
    )));

     // Logo
    $wp_customize->add_setting('soccer_academy_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'soccer_academy_sanitize_integer'
	));
	$wp_customize->add_control(new Soccer_Academy_Slider_Custom_Control( $wp_customize, 'soccer_academy_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','soccer-academy'),
		'section'=> 'title_tagline',
		'settings'=>'soccer_academy_logo_max_height',
		'priority' => 9,
		'input_attrs' => array(
			'reset'			   => 100,
            'step'             => 10,
			'min'              => 0,
			'max'              => 250,
        ),
	)));
	$wp_customize->add_setting('soccer_academy_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_logo_title',
			array(
				'settings'        => 'soccer_academy_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_logo_text',
			array(
				'settings'        => 'soccer_academy_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);

	//colors
	if ( $wp_customize->get_section( 'colors' ) ) {
        $wp_customize->get_section( 'colors' )->title = __( 'Global Colors', 'soccer-academy' );
        $wp_customize->get_section( 'colors' )->priority = 2;
    }

    $wp_customize->add_setting( 'soccer_academy_global_color_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_global_color_heading', array(
			'label'       => esc_html__( 'Global Colors', 'soccer-academy' ),
			'section'     => 'colors',
			'settings'    => 'soccer_academy_global_color_heading',
			'priority'       => 1,
	) ) );

    $wp_customize->add_setting('soccer_academy_primary_color', array(
	    'default' => '#fe5900',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'soccer_academy_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'soccer-academy'),
	    'priority'       => 1,
	)));

	$wp_customize->add_setting('soccer_academy_primary_light', array(
	    'default' => '#ffeee5',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'soccer_academy_primary_light', array(
	    'section' => 'colors',
	    'label' => esc_html__('Primary Light Color', 'soccer-academy'),
	    'priority'       => 1,
	)));

    if ( $wp_customize->get_setting( 'background_color' ) ) {
        // Change the priority of the 'background_color' setting
        $wp_customize->get_control( 'background_color' )->priority = 2;
    }

    $wp_customize->add_setting( 'soccer_academy_global_color_player_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_global_color_player_heading', array(
			'label'       => esc_html__( 'Player Section Colors', 'soccer-academy' ),
			'section'     => 'colors',
			'settings'    => 'soccer_academy_global_color_player_heading',
	) ) );

	$wp_customize->add_setting('soccer_academy_player_bg', array(
	    'default' => '#1F1A33',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'soccer_academy_player_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Player content Bg', 'soccer-academy'),
	)));

	$wp_customize->add_setting('soccer_academy_player_text_bg', array(
	    'default' => '#2b2348',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'soccer_academy_player_text_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Player text bg', 'soccer-academy'),
	)));

	$wp_customize->add_setting('soccer_academy_player_color1', array(
	    'default' => '#FF7B31',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'soccer_academy_player_color1', array(
	    'section' => 'colors',
	    'label' => esc_html__('Player height/weight Box Color 1', 'soccer-academy'),
	)));

	$wp_customize->add_setting('soccer_academy_player_color2', array(
	    'default' => '#ff9255',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'soccer_academy_player_color2', array(
	    'section' => 'colors',
	    'label' => esc_html__('Player height/weight Box Color 2', 'soccer-academy'),
	)));
	
    // Typography
	$wp_customize->add_section( 'soccer_academy_typography_settings', array(
		'title'       => __( 'Typography Settings', 'soccer-academy' ),
		'priority'       => 2,
	) );
	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'soccer_academy_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_typo_heading', array(
			'label'       => esc_html__( 'Typography Settings', 'soccer-academy' ),
			'section'     => 'soccer_academy_typography_settings',
			'settings'    => 'soccer_academy_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'soccer_academy_headings_text', array(
		'sanitize_callback' => 'soccer_academy_sanitize_fonts',
	));
	$wp_customize->add_control( 'soccer_academy_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'soccer-academy'),
		'section' => 'soccer_academy_typography_settings',
		'choices' => $font_choices
	));
	$wp_customize->add_setting( 'soccer_academy_body_text', array(
		'sanitize_callback' => 'soccer_academy_sanitize_fonts'
	));
	$wp_customize->add_control( 'soccer_academy_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'soccer-academy' ),
		'section' => 'soccer_academy_typography_settings',
		'choices' => $font_choices
	) );

    // Theme General Settings
    $wp_customize->add_section('soccer_academy_theme_settings',array(
        'title' => __('Theme General Settings', 'soccer-academy'),
        'priority' => 2
    ) );
    $wp_customize->add_setting( 'soccer_academy_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky header Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'soccer_academy_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_sticky_header',
			array(
				'settings'        => 'soccer_academy_sticky_header',
				'section'         => 'soccer_academy_theme_settings',
				'label'           => __( 'Show Sticky Header', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_section_site_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_site_loader_heading', array(
		'label'       => esc_html__( 'Loader Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_site_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_theme_loader',
			array(
				'settings'        => 'soccer_academy_theme_loader',
				'section'         => 'soccer_academy_theme_settings',
				'label'           => __( 'Show Site Loader', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('soccer_academy_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'soccer_academy_sanitize_choices'
	));
	$wp_customize->add_control('soccer_academy_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','soccer-academy'),
        'section' => 'soccer_academy_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','soccer-academy'),
            'style_two' => __('Bar','soccer-academy'),
        ),
	) );

	$wp_customize->add_setting( 'soccer_academy_section_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_theme_width_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'soccer_academy_sanitize_choices'
	));
	$wp_customize->add_control('soccer_academy_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','soccer-academy'),
        'section' => 'soccer_academy_theme_settings',
        'choices' => array(
            'full_width' => __('fullwidth','soccer-academy'),
            'container' => __('container','soccer-academy'),
            'container_fluid' => __('container fluid','soccer-academy'),
        ),
	) );
	$wp_customize->add_setting( 'soccer_academy_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_menu_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'soccer_academy_sanitize_choices'
	));
	$wp_customize->add_control('soccer_academy_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','soccer-academy'),
        'section' => 'soccer_academy_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','soccer-academy'),
            'UPPERCASE' => __('UPPERCASE','soccer-academy'),
            'LOWERCASE' => __('LOWERCASE','soccer-academy'),
        ),
	) );
	$wp_customize->add_setting( 'soccer_academy_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_scroll_enable',
			array(
				'settings'        => 'soccer_academy_scroll_enable',
				'section'         => 'soccer_academy_theme_settings',
				'label'           => __( 'show Scroll Top', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_scroll_options',
		array(
			'default' => 'right_align',
			'transport' => 'refresh',
			'sanitize_callback' => 'soccer_academy_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Text_Radio_Button_Custom_Control( $wp_customize, 'soccer_academy_scroll_options',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Scroll Top Alignment', 'soccer-academy' ),
			'section' => 'soccer_academy_theme_settings',
			'choices' => array(
				'left_align' => __('LEFT','soccer-academy'),
				'center_align' => __('CENTER','soccer-academy'),
				'right_align' => __('RIGHT','soccer-academy'),
			)
		)
	) );
	$wp_customize->add_setting('soccer_academy_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_theme_settings',
		'setting'	=> 'soccer_academy_scroll_top_icon',
		'type'		=> 'icon'
	))); 

	$wp_customize->add_setting( 'soccer_academy_section_cursor_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_cursor_heading', array(
		'label'       => esc_html__( 'Cursor Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_cursor_heading',
	) ) );

	$wp_customize->add_setting(
		'soccer_academy_enable_custom_cursor',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_enable_custom_cursor',
			array(
				'settings'        => 'soccer_academy_enable_custom_cursor',
				'section'         => 'soccer_academy_theme_settings',
				'label'           => __( 'show custom cursor', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'soccer_academy_section_animation_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_animation_heading', array(
		'label'       => esc_html__( 'Animation Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_theme_settings',
		'settings'    => 'soccer_academy_section_animation_heading',
	) ) );

	$wp_customize->add_setting(
		'soccer_academy_animation_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_animation_enable',
			array(
				'settings'        => 'soccer_academy_animation_enable',
				'section'         => 'soccer_academy_theme_settings',
				'label'           => __( 'show/Hide Animation', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'soccer_academy_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'soccer-academy' ),
		'priority' => 4,
	));
    $wp_customize->add_section('soccer_academy_layout',array(
        'title' => __('Single-Post Layout', 'soccer-academy'),
        'panel' => 'soccer_academy_post_panel',
    ) );
    $wp_customize->add_setting( 'soccer_academy_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'soccer-academy' ),
		'section'     => 'soccer_academy_layout',
		'settings'    => 'soccer_academy_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'soccer_academy_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Radio_Image_Control( $wp_customize, 'soccer_academy_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'soccer-academy' ),
			'section' => 'soccer_academy_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'soccer-academy' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'soccer-academy' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'soccer-academy' )
				),
			)
		)
	) );
	$wp_customize->add_setting('soccer_academy_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_post_date',
			array(
				'settings'        => 'soccer_academy_single_post_date',
				'section'         => 'soccer_academy_layout',
				'label'           => __( 'Show Date', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_single_post_date',
	) );
	$wp_customize->add_setting('soccer_academy_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_single_date_icon',array(
		'label'	=> __('date Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_layout',
		'setting'	=> 'soccer_academy_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_post_admin',
			array(
				'settings'        => 'soccer_academy_single_post_admin',
				'section'         => 'soccer_academy_layout',
				'label'           => __( 'Show Author/Admin', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_single_post_admin',
	) );
	$wp_customize->add_setting('soccer_academy_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_single_author_icon',array(
		'label'	=> __('Author Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_layout',
		'setting'	=> 'soccer_academy_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_post_comment',
			array(
				'settings'        => 'soccer_academy_single_post_comment',
				'section'         => 'soccer_academy_layout',
				'label'           => __( 'Show Comment', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_single_comment_icon',array(
		'label'	=> __('comment Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_layout',
		'setting'	=> 'soccer_academy_single_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_post_tag_count',
			array(
				'settings'        => 'soccer_academy_single_post_tag_count',
				'section'         => 'soccer_academy_layout',
				'label'           => __( 'Show tag count', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_single_tag_icon',array(
		'label'	=> __('tag Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_layout',
		'setting'	=> 'soccer_academy_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_post_tag',
			array(
				'settings'        => 'soccer_academy_single_post_tag',
				'section'         => 'soccer_academy_layout',
				'label'           => __( 'Show Tags', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_single_post_tag',
	) );
	$wp_customize->add_setting('soccer_academy_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_similar_post',
			array(
				'settings'        => 'soccer_academy_similar_post',
				'section'         => 'soccer_academy_layout',
				'label'           => __( 'Show Similar post', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('soccer_academy_similar_text',array(
		'label' => esc_html__('Similar Post Heading','soccer-academy'),
		'section' => 'soccer_academy_layout',
		'setting' => 'soccer_academy_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('soccer_academy_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'soccer-academy'),
        'panel' => 'soccer_academy_post_panel',
    ) );
	$wp_customize->add_setting( 'soccer_academy_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'soccer-academy' ),
		'section'     => 'soccer_academy_archieve_post_layot',
		'settings'    => 'soccer_academy_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'soccer_academy_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Radio_Image_Control( $wp_customize, 'soccer_academy_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'soccer-academy' ),
			'section' => 'soccer_academy_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'soccer-academy' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'soccer-academy' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'soccer-academy' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'soccer-academy' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'soccer-academy' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'soccer-academy' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'soccer-academy' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'soccer-academy' )
				)
			)
		)
	) );
	$wp_customize->add_setting( 'soccer_academy_grid_column',
		array(
			'default' => '3_column',
			'transport' => 'refresh',
			'sanitize_callback' => 'soccer_academy_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Text_Radio_Button_Custom_Control( $wp_customize, 'soccer_academy_grid_column',
		array(
			'type' => 'select',
			'label' => esc_html__('Grid Post Per Row','soccer-academy'),
			'section' => 'soccer_academy_archieve_post_layot',
			'choices' => array(
				'1_column' => __('1','soccer-academy'),
	            '2_column' => __('2','soccer-academy'),
	            '3_column' => __('3','soccer-academy'),
	            '4_column' => __('4','soccer-academy'),
			)
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'soccer_academy_sanitize_sortable',
    ));
    $wp_customize->add_control(new Soccer_Academy_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'soccer-academy'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'soccer-academy') ,
        'section' => 'soccer_academy_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'soccer-academy') ,
            'image' => __('media', 'soccer-academy') ,
            'meta' => __('meta', 'soccer-academy') ,
            'excerpt' => __('excerpt', 'soccer-academy') ,
            'btn' => __('Read more', 'soccer-academy') ,
        ) ,
    )));
	$wp_customize->add_setting('soccer_academy_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'soccer_academy_sanitize_integer'
	));
	$wp_customize->add_control(new Soccer_Academy_Slider_Custom_Control( $wp_customize, 'soccer_academy_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','soccer-academy' ),
		'section'=> 'soccer_academy_archieve_post_layot',
		'settings'=>'soccer_academy_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('soccer_academy_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('soccer_academy_read_more_text',array(
		'label' => esc_html__('Read More Text','soccer-academy'),
		'section' => 'soccer_academy_archieve_post_layot',
		'setting' => 'soccer_academy_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('soccer_academy_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_date',
			array(
				'settings'        => 'soccer_academy_date',
				'section'         => 'soccer_academy_archieve_post_layot',
				'label'           => __( 'Show Date', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_sticky_icon',array(
		'default'	=> 'fas fa-thumb-tack',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_sticky_icon',array(
		'label'	=> __('Sticky Post Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_archieve_post_layot',
		'setting'	=> 'soccer_academy_sticky_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_date', array(
		'selector' => '.date-box',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_date',
	) );
	$wp_customize->add_setting('soccer_academy_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_date_icon',array(
		'label'	=> __('date Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_archieve_post_layot',
		'setting'	=> 'soccer_academy_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_admin',
			array(
				'settings'        => 'soccer_academy_admin',
				'section'         => 'soccer_academy_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_admin',
	) );
	$wp_customize->add_setting('soccer_academy_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_author_icon',array(
		'label'	=> __('Author Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_archieve_post_layot',
		'setting'	=> 'soccer_academy_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_comment',
			array(
				'settings'        => 'soccer_academy_comment',
				'section'         => 'soccer_academy_archieve_post_layot',
				'label'           => __( 'Show Comment', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_comment',
	) );
	$wp_customize->add_setting('soccer_academy_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_comment_icon',array(
		'label'	=> __('comment Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_archieve_post_layot',
		'setting'	=> 'soccer_academy_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_tag',
			array(
				'settings'        => 'soccer_academy_tag',
				'section'         => 'soccer_academy_archieve_post_layot',
				'label'           => __( 'Show tag count', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_tag', array(
		'selector' => '.tags',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_tag',
	) );
	$wp_customize->add_setting('soccer_academy_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_tag_icon',array(
		'label'	=> __('tag Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_archieve_post_layot',
		'setting'	=> 'soccer_academy_tag_icon',
		'type'		=> 'icon'
	)));
    
    // header-image
	$wp_customize->add_setting( 'soccer_academy_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'soccer-academy' ),
		'section'     => 'header_image',
		'settings'    => 'soccer_academy_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('soccer_academy_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'soccer_academy_sanitize_choices'
	));
	$wp_customize->add_control('soccer_academy_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','soccer-academy'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','soccer-academy'),
            'off' => __('Without Header Image','soccer-academy'),
        ),
	) );

	// Breadcrumb Section
	$wp_customize->add_section('soccer_academy_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'soccer-academy'),
        'priority' => 5,
    ) );
	$wp_customize->add_setting( 'soccer_academy_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Theme Breadcrumb Setting', 'soccer-academy' ),
		'section'     => 'soccer_academy_breadcrumb_settings',
		'settings'    => 'soccer_academy_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_enable_breadcrumb',
			array(
				'settings'        => 'soccer_academy_enable_breadcrumb',
				'section'         => 'soccer_academy_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('soccer_academy_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'soccer-academy'),
        'section' => 'soccer_academy_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'soccer_academy_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'soccer-academy' ),
		'section'     => 'soccer_academy_breadcrumb_settings',
		'settings'    => 'soccer_academy_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_single_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_enable_breadcrumb',
			array(
				'settings'        => 'soccer_academy_single_enable_breadcrumb',
				'section'         => 'soccer_academy_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'soccer_academy_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'soccer-academy' ),
			'section'     => 'soccer_academy_breadcrumb_settings',
			'settings'    => 'soccer_academy_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'soccer_academy_woocommerce_enable_breadcrumb',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Soccer_Academy_Customizer_Customcontrol_Switch(
				$wp_customize,
				'soccer_academy_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'soccer_academy_woocommerce_enable_breadcrumb',
					'section'         => 'soccer_academy_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'soccer-academy' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'soccer-academy' ),
						'off'    => __( 'Off', 'soccer-academy' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'soccer-academy'),
	        'section' => 'soccer_academy_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}
	
	// woocommerce settings	
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_section('soccer_academy_woocoomerce_section',array(
	        'title' => __('Custom Woocommerce Settings', 'soccer-academy'),
	        'panel' => 'woocommerce',
	        'priority' => 4,
	    ) );

		$wp_customize->add_setting( 'soccer_academy_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_shoppage_heading', array(
			'label'       => esc_html__( 'Sidebar Settings', 'soccer-academy' ),
			'section'     => 'soccer_academy_woocoomerce_settings',
			'settings'    => 'soccer_academy_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'soccer_academy_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Soccer_Academy_Radio_Image_Control( $wp_customize, 'soccer_academy_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'soccer-academy' ),
				'section'     => 'soccer_academy_woocoomerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'soccer-academy' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'soccer-academy' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'soccer-academy' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'soccer_academy_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Soccer_Academy_Radio_Image_Control( $wp_customize, 'soccer_academy_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'soccer-academy' ),
				'section'     => 'soccer_academy_woocoomerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'soccer-academy' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'soccer-academy' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'soccer-academy' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'soccer_academy_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'soccer-academy' ),
			'section'     => 'soccer_academy_woocoomerce_settings',
			'settings'    => 'soccer_academy_section_archieve_product_heading',
		) ) );

		$wp_customize->add_setting('soccer_academy_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'soccer_academy_sanitize_choices'
		));

		$wp_customize->add_control('soccer_academy_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','soccer-academy'),
	        'section' => 'soccer_academy_woocoomerce_settings',
	        'choices' => array(
	            '1' => __('One Column','soccer-academy'),
	            '2' => __('Two Column','soccer-academy'),
	            '3' => __('Three Column','soccer-academy'),
	            '4' => __('four Column','soccer-academy'),
	            '5' => __('Five Column','soccer-academy'),
	            '6' => __('Six Column','soccer-academy'),
	        ),
		) );
		$wp_customize->add_setting( 'soccer_academy_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'soccer_academy_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'soccer_academy_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','soccer-academy' ),
			'section'     => 'soccer_academy_woocoomerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'soccer_academy_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'soccer-academy' ),
			'section'     => 'soccer_academy_woocoomerce_settings',
			'settings'    => 'soccer_academy_section_related_heading',
		) ) );
		$wp_customize->add_setting('woocommerce_related_products_heading', array(
	        'default' => 'Related products',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_related_products_heading', array(
	        'label' => __('Related Products Heading', 'soccer-academy'),
	        'section' => 'soccer_academy_woocoomerce_settings',
	        'type' => 'text',
	    ));
		$wp_customize->add_setting('soccer_academy_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'soccer_academy_sanitize_choices'
		));
		$wp_customize->add_control('soccer_academy_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','soccer-academy'),
	        'section' => 'soccer_academy_woocoomerce_settings',
	        'choices' => array(
	            '1' => __('One Column','soccer-academy'),
	            '2' => __('Two Column','soccer-academy'),
	            '3' => __('Three Column','soccer-academy'),
	            '4' => __('four Column','soccer-academy'),
	            '5' => __('Five Column','soccer-academy'),
	            '6' => __('Six Column','soccer-academy'),
	        ),
		) );
		$wp_customize->add_setting( 'soccer_academy_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'soccer_academy_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'soccer_academy_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','soccer-academy' ),
			'section'     => 'soccer_academy_woocoomerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'soccer_academy_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Soccer_Academy_Customizer_Customcontrol_Switch($wp_customize,'soccer_academy_related_product',
			array(
				'settings'        => 'soccer_academy_related_product',
				'section'         => 'soccer_academy_woocoomerce_settings',
				'label'           => __( 'Show Related Products', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		));
	}
	// mobile width
	$wp_customize->add_section('soccer_academy_mobile_options',array(
        'title' => __('Mobile Media settings', 'soccer-academy'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'soccer_academy_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'soccer-academy' ),
		'section'     => 'soccer_academy_mobile_options',
		'settings'    => 'soccer_academy_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_slider_button_mobile_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_slider_button_mobile_show_hide',
			array(
				'settings'        => 'soccer_academy_slider_button_mobile_show_hide',
				'section'         => 'soccer_academy_mobile_options',
				'label'           => __( 'Show Slider Button', 'soccer-academy' ),	
				'description' => __('Control wont function if the button is off in the main slider settings.', 'soccer-academy') ,			
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'soccer_academy_scroll_enable_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_scroll_enable_mobile',
			array(
				'settings'        => 'soccer_academy_scroll_enable_mobile',
				'section'         => 'soccer_academy_mobile_options',
				'label'           => __( 'Show Scroll Top', 'soccer-academy' ),
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'soccer-academy') ,		
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'soccer-academy' ),
		'section'     => 'soccer_academy_mobile_options',
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'soccer-academy') ,
		'settings'    => 'soccer_academy_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_enable_breadcrumb_mobile',
			array(
				'settings'        => 'soccer_academy_enable_breadcrumb_mobile',
				'section'         => 'soccer_academy_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'soccer_academy_single_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Soccer_Academy_Customizer_Customcontrol_Switch(
			$wp_customize,
			'soccer_academy_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'soccer_academy_single_enable_breadcrumb_mobile',
				'section'         => 'soccer_academy_mobile_options',
				'label'           => __( 'Single Post & Page', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'soccer_academy_woocommerce_enable_breadcrumb_mobile',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'soccer_academy_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Soccer_Academy_Customizer_Customcontrol_Switch(
				$wp_customize,
				'soccer_academy_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'soccer_academy_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'soccer_academy_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'soccer-academy' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'soccer-academy' ),
						'off'    => __( 'Off', 'soccer-academy' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'soccer_academy_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'soccer_academy_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'soccer_academy_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'soccer_academy_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'soccer-academy' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'soccer-academy' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'soccer_academy_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'soccer_academy_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'soccer_academy_customize_register' );

function soccer_academy_customize_partial_blogname() {
	bloginfo( 'name' );
}
function soccer_academy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function soccer_academy_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function soccer_academy_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('SOCCER_ACADEMY_PRO_LINK',__('https://www.ovationthemes.com/products/soccer-club-wordpress-theme','soccer-academy'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Soccer_Academy_Pro_Control')):
    class Soccer_Academy_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( SOCCER_ACADEMY_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE SOCCER ACADEMY PREMIUM','soccer-academy');?> </a>
	        </div>
            <div class="col-md">
                <img class="soccer_academy_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('SOCCER ACADEMY PREMIUM - Features', 'soccer-academy'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'soccer-academy');?> </li>
                    <li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'soccer-academy');?> </li>
                   	<li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'soccer-academy');?> </li>
                   	<li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'soccer-academy');?> </li>
                   	<li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Business Friendly', 'soccer-academy');?> </li>
                   	<li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'soccer-academy');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( SOCCER_ACADEMY_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE SOCCER ACADEMY PREMIUM','soccer-academy');?> </a>
		    </div>
        </label>
    <?php } }
endif;