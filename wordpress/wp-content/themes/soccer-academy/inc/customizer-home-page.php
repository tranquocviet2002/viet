<?php
/**
 * Soccer Academy: Customizer-home-page
 *
 * @subpackage Soccer Academy
 * @since 1.0
 */

	//  Home Page Panel
	$wp_customize->add_panel( 'soccer_academy_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'soccer-academy' ),
		'priority' => 2,
	));
	// Top Header
    $wp_customize->add_section('soccer_academy_top',array(
        'title' => __('Contact info', 'soccer-academy'),
        'panel' => 'soccer_academy_custompage_panel',
    ) );
    $wp_customize->add_setting( 'soccer_academy_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_contact_heading', array(
		'label'       => esc_html__( 'Contact Settings', 'soccer-academy' ),	
		'description' => __( 'Add contact info in the below feilds', 'soccer-academy' ),		
		'section'     => 'soccer_academy_top',
		'settings'    => 'soccer_academy_section_contact_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_contact_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_contact_icon',array(
		'label'	=> __('Add Contact Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_top',
		'setting'	=> 'soccer_academy_contact_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('soccer_academy_call_number',array(
		'default' => '',
		'sanitize_callback' => 'soccer_academy_sanitize_phone_number'
	)); 
	$wp_customize->add_control('soccer_academy_call_number',array(
		'label' => esc_html__('Add Phone Number','soccer-academy'),
		'section' => 'soccer_academy_top',
		'setting' => 'soccer_academy_call_number',
		'type'    => 'text'
	));
    $wp_customize->add_setting('soccer_academy_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	)); 
	$wp_customize->add_control('soccer_academy_email_address',array(
		'label' => esc_html__('Add Email Address','soccer-academy'),
		'section' => 'soccer_academy_top',
		'setting' => 'soccer_academy_email_address',
		'type'    => 'text'
	));

	// Social Media
    $wp_customize->add_section('soccer_academy_urls',array(
        'title' => __('Social Media', 'soccer-academy'),
        'panel' => 'soccer_academy_custompage_panel',
    ) );
    $wp_customize->add_setting( 'soccer_academy_section_social_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'soccer-academy' ),
		'description' => __( 'Add social media links in the below feilds', 'soccer-academy' ),			
		'section'     => 'soccer_academy_urls',
		'settings'    => 'soccer_academy_section_social_heading',
	) ) );
	$wp_customize->add_setting(
		'header_social_icon_enable',
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
			'header_social_icon_enable',
			array(
				'settings'        => 'header_social_icon_enable',
				'section'         => 'soccer_academy_urls',
				'label'           => __( 'Check to show social fields', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_section_twitter_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Settings', 'soccer-academy' ),			
		'section'     => 'soccer_academy_urls',
		'settings'    => 'soccer_academy_section_twitter_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_twitter_icon',array(
		'default'	=> 'fab fa-x-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_twitter_icon',array(
		'label'	=> __('Add Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_urls',
		'setting'	=> 'soccer_academy_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'soccer_academy_twitter', array(
		'selector' => '.social-icon a i',
		'render_callback' => 'soccer_academy_customize_partial_soccer_academy_twitter',
	) );
	$wp_customize->add_setting('soccer_academy_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('soccer_academy_twitter',array(
		'label' => esc_html__('Add URL','soccer-academy'),
		'section' => 'soccer_academy_urls',
		'setting' => 'soccer_academy_twitter',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'soccer_academy_header_twt_target',
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
			'soccer_academy_header_twt_target',
			array(
				'settings'        => 'soccer_academy_header_twt_target',
				'section'         => 'soccer_academy_urls',
				'label'           => __( 'Open link in a new tab', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_section_linkedin_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_linkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Settings', 'soccer-academy' ),			
		'section'     => 'soccer_academy_urls',
		'settings'    => 'soccer_academy_section_linkedin_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_linkedin_icon',array(
		'label'	=> __('Add Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_urls',
		'setting'	=> 'soccer_academy_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('soccer_academy_linkedin',array(
		'label' => esc_html__('Add URL','soccer-academy'),
		'section' => 'soccer_academy_urls',
		'setting' => 'soccer_academy_linkedin',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'soccer_academy_header_linkedin_target',
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
			'soccer_academy_header_linkedin_target',
			array(
				'settings'        => 'soccer_academy_header_linkedin_target',
				'section'         => 'soccer_academy_urls',
				'label'           => __( 'Open link in a new tab', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_section_youtube_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_youtube_heading', array(
		'label'       => esc_html__( 'Youtube Settings', 'soccer-academy' ),			
		'section'     => 'soccer_academy_urls',
		'settings'    => 'soccer_academy_section_youtube_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_youtube_icon',array(
		'label'	=> __('Add Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_urls',
		'setting'	=> 'soccer_academy_youtube_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('soccer_academy_youtube',array(
		'label' => esc_html__('Add URL','soccer-academy'),
		'section' => 'soccer_academy_urls',
		'setting' => 'soccer_academy_youtube',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'soccer_academy_header_youtube_target',
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
			'soccer_academy_header_youtube_target',
			array(
				'settings'        => 'soccer_academy_header_youtube_target',
				'section'         => 'soccer_academy_urls',
				'label'           => __( 'Open link in a new tab', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'soccer_academy_section_instagram_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_instagram_heading', array(
		'label'       => esc_html__( 'Instagram Settings', 'soccer-academy' ),			
		'section'     => 'soccer_academy_urls',
		'settings'    => 'soccer_academy_section_instagram_heading',
	) ) );
	$wp_customize->add_setting('soccer_academy_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Soccer_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'soccer_academy_instagram_icon',array(
		'label'	=> __('Add Icon','soccer-academy'),
		'transport' => 'refresh',
		'section'	=> 'soccer_academy_urls',
		'setting'	=> 'soccer_academy_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('soccer_academy_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('soccer_academy_instagram',array(
		'label' => esc_html__('Add URL','soccer-academy'),
		'section' => 'soccer_academy_urls',
		'setting' => 'soccer_academy_instagram',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'soccer_academy_header_instagram_target',
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
			'soccer_academy_header_instagram_target',
			array(
				'settings'        => 'soccer_academy_header_instagram_target',
				'section'         => 'soccer_academy_urls',
				'label'           => __( 'Open link in a new tab', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'soccer_academy_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'soccer-academy' ),
    	'panel' => 'soccer_academy_custompage_panel',
	) );
	$wp_customize->add_setting( 'soccer_academy_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'soccer-academy' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'soccer-academy' ),		
		'section'     => 'soccer_academy_slider_section',
		'settings'    => 'soccer_academy_section_slide_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_slider_arrows',
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
			'soccer_academy_slider_arrows',
			array(
				'settings'        => 'soccer_academy_slider_arrows',
				'section'         => 'soccer_academy_slider_section',
				'label'           => __( 'Check To Show Slider', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_slide_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('soccer_academy_slide_heading',array(
		'label' => esc_html__('Slider Text','soccer-academy'),
		'section' => 'soccer_academy_slider_section',
		'setting' => 'soccer_academy_slide_heading',
		'type'    => 'text',
	));
	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]= __('Select','soccer-academy');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('soccer_academy_post_setting'.$i,array(
			'sanitize_callback' => 'soccer_academy_sanitize_select',
		));
		$wp_customize->add_control('soccer_academy_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','soccer-academy'),
			'section' => 'soccer_academy_slider_section',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting(
		'soccer_academy_slider_excerpt_show_hide',
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
			'soccer_academy_slider_excerpt_show_hide',
			array(
				'settings'        => 'soccer_academy_slider_excerpt_show_hide',
				'section'         => 'soccer_academy_slider_section',
				'label'           => __( 'Show Hide excerpt', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_slider_excerpt_count',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'soccer_academy_sanitize_integer'
	));
	$wp_customize->add_control(new Soccer_Academy_Slider_Custom_Control( $wp_customize, 'soccer_academy_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','soccer-academy' ),
		'section'=> 'soccer_academy_slider_section',
		'settings'=>'soccer_academy_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));
	$wp_customize->add_setting(
		'soccer_academy_slider_button_show_hide',
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
			'soccer_academy_slider_button_show_hide',
			array(
				'settings'        => 'soccer_academy_slider_button_show_hide',
				'section'         => 'soccer_academy_slider_section',
				'label'           => __( 'Show Hide Button', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_slider_read_more',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('soccer_academy_slider_read_more',array(
		'label' => esc_html__('Button Text','soccer-academy'),
		'section' => 'soccer_academy_slider_section',
		'setting' => 'soccer_academy_slider_read_more',
		'type'    => 'text',
	));
	
	$wp_customize->add_setting( 'soccer_academy_slider_content_alignment',
		array(
			'default' => 'LEFT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'soccer_academy_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Text_Radio_Button_Custom_Control( $wp_customize, 'soccer_academy_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'soccer-academy' ),
			'section' => 'soccer_academy_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','soccer-academy'),
	            'CENTER-ALIGN' => __('CENTER','soccer-academy'),
	            'RIGHT-ALIGN' => __('RIGHT','soccer-academy'),
			),
		)
	) );

	//top player
	$wp_customize->add_section( 'soccer_academy_top_player_section' , array(
    	'title'      => __( 'Player Section', 'soccer-academy' ),
    	'panel' => 'soccer_academy_custompage_panel',
	) );
	$wp_customize->add_setting( 'soccer_academy_section_top_player_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_top_player_heading', array(
		'label'       => esc_html__( 'Player Section Settings', 'soccer-academy' ),		
		'section'     => 'soccer_academy_top_player_section',
		'settings'    => 'soccer_academy_section_top_player_heading',
	) ) );
	$wp_customize->add_setting(
		'soccer_academy_player_show_hide',
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
			'soccer_academy_player_show_hide',
			array(
				'settings'        => 'soccer_academy_player_show_hide',
				'section'         => 'soccer_academy_top_player_section',
				'label'           => __( 'Check To Show Section', 'soccer-academy' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'soccer-academy' ),
					'off'    => __( 'Off', 'soccer-academy' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('soccer_academy_player_sub_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('soccer_academy_player_sub_heading',array(
		'label' => esc_html__('Sub Heading','soccer-academy'),
		'section' => 'soccer_academy_top_player_section',
		'setting' => 'soccer_academy_player_sub_heading',
		'type'    => 'text'
	));
	$wp_customize->add_setting('soccer_academy_player_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('soccer_academy_player_heading',array(
		'label' => esc_html__('Heading','soccer-academy'),
		'section' => 'soccer_academy_top_player_section',
		'setting' => 'soccer_academy_player_heading',
		'type'    => 'text'
	));
	$wp_customize->add_setting('soccer_academy_top_player_counter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('soccer_academy_top_player_counter',array(
		'label'	=> esc_html__('Slider Increament','soccer-academy'),
		'section'	=> 'soccer_academy_top_player_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 3,
		)
	));
	$soccer_academy_top_player = get_theme_mod('soccer_academy_top_player_counter');
	for ($soccer_academy_top_i=1; $soccer_academy_top_i <= $soccer_academy_top_player ; $soccer_academy_top_i++) {
	    $wp_customize->add_setting( 'soccer_academy_top_player_images'.$soccer_academy_top_i, array(
	       'default' => '',
	       'transport' => 'refresh',
	       'sanitize_callback' => 'esc_url_raw'
	    ));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'soccer_academy_top_player_images'.$soccer_academy_top_i, array(
	       'label'	=> esc_html__('Player Image ','soccer-academy').$soccer_academy_top_i,
	       'section' => 'soccer_academy_top_player_section',
	   
	    ) ) );
		$wp_customize->add_setting('soccer_academy_player_1'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_player_1'.$soccer_academy_top_i,array(
			'label' => esc_html__('Heading 1','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_player_1'.$soccer_academy_top_i,
			'type'    => 'text',
		));
		$wp_customize->add_setting('soccer_academy_team_name'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_team_name'.$soccer_academy_top_i,array(
			'label' => esc_html__('Team Name','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_team_name'.$soccer_academy_top_i,
			'type'    => 'text',
		));
		$wp_customize->add_setting('soccer_academy_player_no'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_player_no'.$soccer_academy_top_i,array(
			'label' => esc_html__('Player No','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_player_no'.$soccer_academy_top_i,
			'type'    => 'text',
		));
		$wp_customize->add_setting('soccer_academy_player_b'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_player_b'.$soccer_academy_top_i,array(
			'label' => esc_html__('Birth Date','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_player_b'.$soccer_academy_top_i,
			'type'    => 'text',
			'input_attrs' => array(
            	'placeholder' => __( 'Ex: 16 Feb 1988','soccer-academy' ),
        	),
		));
		$wp_customize->add_setting('soccer_academy_player_a'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_player_a'.$soccer_academy_top_i,array(
			'label' => esc_html__('Age','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_player_a'.$soccer_academy_top_i,
			'type'    => 'text',
			'input_attrs' => array(
            	'placeholder' => __( 'Ex:40 Years', 'soccer-academy'),
        	),
		));
		$wp_customize->add_setting('soccer_academy_player_c'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_player_c'.$soccer_academy_top_i,array(
			'label' => esc_html__('Country','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_player_c'.$soccer_academy_top_i,
			'type'    => 'text',
		));
		$wp_customize->add_setting('soccer_academy_height'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_height'.$soccer_academy_top_i,array(
			'label' => esc_html__('Height','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_height'.$soccer_academy_top_i,
			'type'    => 'text',
		));
		$wp_customize->add_setting('soccer_academy_weight'.$soccer_academy_top_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('soccer_academy_weight'.$soccer_academy_top_i,array(
			'label' => esc_html__('Weight','soccer-academy'),
			'section' => 'soccer_academy_top_player_section',
			'setting' => 'soccer_academy_weight'.$soccer_academy_top_i,
			'type'    => 'text',
		));
	}

	//Footer
    $wp_customize->add_section( 'soccer_academy_footer_copyright', array(
    	'panel' => 'soccer_academy_custompage_panel',
    	'title'      => esc_html__( 'Footer Text', 'soccer-academy' ),
	) );
	$wp_customize->add_setting( 'soccer_academy_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Soccer_Academy_Customizer_Customcontrol_Section_Heading( $wp_customize, 'soccer_academy_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'soccer-academy' ),		
		'section'     => 'soccer_academy_footer_copyright',
		'settings'    => 'soccer_academy_section_footer_heading',
	) ) );
    $wp_customize->add_setting('soccer_academy_footer_text',array(
		'default'	=> 'Soccer Academy WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('soccer_academy_footer_text',array(
		'label'	=> esc_html__('Copyright Text','soccer-academy'),
		'section'	=> 'soccer_academy_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->add_setting( 'soccer_academy_footer_content_alignment',
		array(
			'default' => 'CENTER-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'soccer_academy_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Text_Radio_Button_Custom_Control( $wp_customize, 'soccer_academy_footer_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Footer Content Alignment', 'soccer-academy' ),
			'section' => 'soccer_academy_footer_copyright',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','soccer-academy'),
	            'CENTER-ALIGN' => __('CENTER','soccer-academy'),
	            'RIGHT-ALIGN' => __('RIGHT','soccer-academy'),
			),
			'active_callback' => '',
		)
	) );
	$wp_customize->add_setting( 'soccer_academy_footer_widget',
		array(
			'default' => '4',
			'transport' => 'refresh',
			'sanitize_callback' => 'soccer_academy_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Soccer_Academy_Text_Radio_Button_Custom_Control( $wp_customize, 'soccer_academy_footer_widget',
		array(
			'type' => 'select',
			'label' => esc_html__('Footer Per Column','soccer-academy'),
			'section' => 'soccer_academy_footer_copyright',
			'choices' => array(
				'1' => __('1','soccer-academy'),
	            '2' => __('2','soccer-academy'),
	            '3' => __('3','soccer-academy'),
	            '4' => __('4','soccer-academy'),
			)
		)
	) );