<?php 

	$luzuk_united_soccer_club_custom_style = '';

	// Logo Size
	$luzuk_united_soccer_club_logo_top_padding = get_theme_mod('luzuk_united_soccer_club_logo_top_padding');
	$luzuk_united_soccer_club_logo_bottom_padding = get_theme_mod('luzuk_united_soccer_club_logo_bottom_padding');
	$luzuk_united_soccer_club_logo_left_padding = get_theme_mod('luzuk_united_soccer_club_logo_left_padding');
	$luzuk_united_soccer_club_logo_right_padding = get_theme_mod('luzuk_united_soccer_club_logo_right_padding');

	if( $luzuk_united_soccer_club_logo_top_padding != '' || $luzuk_united_soccer_club_logo_bottom_padding != '' || $luzuk_united_soccer_club_logo_left_padding != '' || $luzuk_united_soccer_club_logo_right_padding != ''){
		$luzuk_united_soccer_club_custom_style .=' .logo {';
			$luzuk_united_soccer_club_custom_style .=' padding-top: '.esc_attr($luzuk_united_soccer_club_logo_top_padding).'px; padding-bottom: '.esc_attr($luzuk_united_soccer_club_logo_bottom_padding).'px; padding-left: '.esc_attr($luzuk_united_soccer_club_logo_left_padding).'px; padding-right: '.esc_attr($luzuk_united_soccer_club_logo_right_padding).'px;';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	// Header Image
	$header_image_url = luzuk_united_soccer_club_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$luzuk_united_soccer_club_custom_style .=' #inner-pages-header {';
			$luzuk_united_soccer_club_custom_style .=' background-image: url('. esc_url( $header_image_url ).') !important; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$luzuk_united_soccer_club_custom_style .=' }';

		$luzuk_united_soccer_club_custom_style .='  #header .top-head {';
			$luzuk_united_soccer_club_custom_style .=' background: none ';
		$luzuk_united_soccer_club_custom_style .=' }';
	} else {
		$luzuk_united_soccer_club_custom_style .=' #inner-pages-header {';
			$luzuk_united_soccer_club_custom_style .=' background: radial-gradient(circle at center, rgba(0,0,0,0) 0%, #000000 100%); ';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_hide_show = get_theme_mod('luzuk_united_soccer_club_slider_hide_show',false);
	if( $luzuk_united_soccer_club_slider_hide_show == true){
		$luzuk_united_soccer_club_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$luzuk_united_soccer_club_custom_style .=' display:none;';
		$luzuk_united_soccer_club_custom_style .=' }';
	}


	$luzuk_united_soccer_club_headermenubg_col = get_theme_mod('luzuk_united_soccer_club_headermenubg_col');
	if ( $luzuk_united_soccer_club_headermenubg_col != '') {
		$luzuk_united_soccer_club_custom_style .=' #header .tph-inn {';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_headermenubg_col).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_menu_color = get_theme_mod('luzuk_united_soccer_club_menu_color');
	if ( $luzuk_united_soccer_club_menu_color != '') {
		$luzuk_united_soccer_club_custom_style .=' .primary-menu a, .primary-menu li .icon{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_menu_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_menuhover_color = get_theme_mod('luzuk_united_soccer_club_menuhover_color');
	if ( $luzuk_united_soccer_club_menuhover_color != '') {
		$luzuk_united_soccer_club_custom_style .='.primary-menu li:hover .icon, .primary-menu li a:hover{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_menuhover_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_submenu_color = get_theme_mod('luzuk_united_soccer_club_submenu_color');
	if ( $luzuk_united_soccer_club_submenu_color != '') {
		$luzuk_united_soccer_club_custom_style .='.primary-menu ul a{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_submenu_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_submenubg_color = get_theme_mod('luzuk_united_soccer_club_submenubg_color');
	if ( $luzuk_united_soccer_club_submenubg_color != '') {
		$luzuk_united_soccer_club_custom_style .='.primary-menu ul{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_submenubg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_headerbtntext_color = get_theme_mod('luzuk_united_soccer_club_headerbtntext_color');
	if ( $luzuk_united_soccer_club_headerbtntext_color != '') {
		$luzuk_united_soccer_club_custom_style .='#header .headerbtn a{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_headerbtntext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_headerbtnbg_color = get_theme_mod('luzuk_united_soccer_club_headerbtnbg_color');
	if ( $luzuk_united_soccer_club_headerbtnbg_color != '') {
		$luzuk_united_soccer_club_custom_style .='#header .headerbtn a{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_headerbtnbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_headerbtnbghrv_color = get_theme_mod('luzuk_united_soccer_club_headerbtnbghrv_color');
	if ( $luzuk_united_soccer_club_headerbtnbghrv_color != '') {
		$luzuk_united_soccer_club_custom_style .='#header .headerbtn a:hover{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_headerbtnbghrv_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}



	// slider

	
	$luzuk_united_soccer_club_slider_sectionplaynowbtntext_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionplaynowbtntext_color');
	if ( $luzuk_united_soccer_club_slider_sectionplaynowbtntext_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_sectionplaynowbtntext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';

	}

	$luzuk_united_soccer_club_slider_sectionplaynowbtnicon_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionplaynowbtnicon_color');
	if ( $luzuk_united_soccer_club_slider_sectionplaynowbtnicon_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1 svg path {';
			$luzuk_united_soccer_club_custom_style .=' fill:'.esc_attr($luzuk_united_soccer_club_slider_sectionplaynowbtnicon_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}
	

	$luzuk_united_soccer_club_slider_sectionplaynowbtniconbg_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionplaynowbtniconbg_color');
	if ( $luzuk_united_soccer_club_slider_sectionplaynowbtniconbg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1 svg ellipse {';
			$luzuk_united_soccer_club_custom_style .=' fill:'.esc_attr($luzuk_united_soccer_club_slider_sectionplaynowbtniconbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_sectionplaynowbtntexthrv_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionplaynowbtntexthrv_color');
	if ( $luzuk_united_soccer_club_slider_sectionplaynowbtntexthrv_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1:hover {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_sectionplaynowbtntexthrv_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_sectionshopnowbtntext_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionshopnowbtntext_color');
	if ( $luzuk_united_soccer_club_slider_sectionshopnowbtntext_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn2 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_sectionshopnowbtntext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_sectionshopnowbtnicon_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionshopnowbtnicon_color');
	if ( $luzuk_united_soccer_club_slider_sectionshopnowbtnicon_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn2 svg path {';
			$luzuk_united_soccer_club_custom_style .=' fill:'.esc_attr($luzuk_united_soccer_club_slider_sectionshopnowbtnicon_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_sectionshopnowbtnbg_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionshopnowbtnbg_color');
	if ( $luzuk_united_soccer_club_slider_sectionshopnowbtnbg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn2 {';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_slider_sectionshopnowbtnbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_sectionshopnowbtntxthrv_color = get_theme_mod('luzuk_united_soccer_club_slider_sectionshopnowbtntxthrv_color');
	if ( $luzuk_united_soccer_club_slider_sectionshopnowbtntxthrv_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn2:hover {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_sectionshopnowbtntxthrv_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}



	// counter section

	$luzuk_united_soccer_club_counterbg_color = get_theme_mod('luzuk_united_soccer_club_counterbg_color');
	if ( $luzuk_united_soccer_club_counterbg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #counter-section .lhsbx {';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_counterbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_counterheading_color = get_theme_mod('luzuk_united_soccer_club_counterheading_color');
	if ( $luzuk_united_soccer_club_counterheading_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #counter-section .hedngbx h2 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_counterheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_countersubheading_color = get_theme_mod('luzuk_united_soccer_club_countersubheading_color');
	if ( $luzuk_united_soccer_club_countersubheading_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section .hedngbx h3 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_countersubheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_counternumbers_color = get_theme_mod('luzuk_united_soccer_club_counternumbers_color');
	if ( $luzuk_united_soccer_club_counternumbers_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section .num {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_counternumbers_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_countertext_color = get_theme_mod('luzuk_united_soccer_club_countertext_color');
	if ( $luzuk_united_soccer_club_countertext_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section .countbxinn h2 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_countertext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_counternumberbg_color = get_theme_mod('luzuk_united_soccer_club_counternumberbg_color');
	if ( $luzuk_united_soccer_club_counternumberbg_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section .c_bx{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_counternumberbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_countervideobg_color = get_theme_mod('luzuk_united_soccer_club_countervideobg_color');
	if ( $luzuk_united_soccer_club_countervideobg_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section .rhs{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_countervideobg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_countervideheading_color = get_theme_mod('luzuk_united_soccer_club_countervideheading_color');
	if ( $luzuk_united_soccer_club_countervideheading_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section #titlebx h2{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_countervideheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_countervidedubheading_color = get_theme_mod('luzuk_united_soccer_club_countervidedubheading_color');
	if ( $luzuk_united_soccer_club_countervidedubheading_color != '') {
		$luzuk_united_soccer_club_custom_style .='#counter-section .rhs p{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_countervidedubheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}


	// what we offer

	$luzuk_united_soccer_club_whatweoffersubheading_color = get_theme_mod('luzuk_united_soccer_club_whatweoffersubheading_color');
	if ( $luzuk_united_soccer_club_whatweoffersubheading_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section h2 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweoffersubheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_whatweofferheading_color = get_theme_mod('luzuk_united_soccer_club_whatweofferheading_color');
	if ( $luzuk_united_soccer_club_whatweofferheading_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section h3 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweofferheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_whatweofferdescription_color = get_theme_mod('luzuk_united_soccer_club_whatweofferdescription_color');
	if ( $luzuk_united_soccer_club_whatweofferdescription_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section .r-abt p {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweofferdescription_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	
	$luzuk_united_soccer_club_whatweoffericon_color = get_theme_mod('luzuk_united_soccer_club_whatweoffericon_color');
	if ( $luzuk_united_soccer_club_whatweoffericon_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section .icon i {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweoffericon_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_whatweoffertitle_color = get_theme_mod('luzuk_united_soccer_club_whatweoffertitle_color');
	if ( $luzuk_united_soccer_club_whatweoffertitle_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section .conbx h4 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweoffertitle_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_whatweofferboxdescription_color = get_theme_mod('luzuk_united_soccer_club_whatweofferboxdescription_color');
	if ( $luzuk_united_soccer_club_whatweofferboxdescription_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section .conbx p {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweofferboxdescription_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_whatweofferbtnicon_color = get_theme_mod('luzuk_united_soccer_club_whatweofferbtnicon_color');
	if ( $luzuk_united_soccer_club_whatweofferbtnicon_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #whatweoffer-section .feabtn i {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_whatweofferbtnicon_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}


	// Activities

	$luzuk_united_soccer_club_activitiesheading_color = get_theme_mod('luzuk_united_soccer_club_activitiesheading_color');
	if ( $luzuk_united_soccer_club_activitiesheading_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #soccerclubactivities-section .heading h2 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_activitiesheading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_activitiestitle_color = get_theme_mod('luzuk_united_soccer_club_activitiestitle_color');
	if ( $luzuk_united_soccer_club_activitiestitle_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #soccerclubactivities-section .activitiesinn h4 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_activitiestitle_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_activitiesdescription_color = get_theme_mod('luzuk_united_soccer_club_activitiesdescription_color');
	if ( $luzuk_united_soccer_club_activitiesdescription_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #soccerclubactivities-section .activitiesinn p {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_activitiesdescription_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_activitiesbtnicon_color = get_theme_mod('luzuk_united_soccer_club_activitiesbtnicon_color');
	if ( $luzuk_united_soccer_club_activitiesbtnicon_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #soccerclubactivities-section .feabtn a i {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_activitiesbtnicon_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

		

	//site title tagline
	$luzuk_united_soccer_club_site_title_color = get_theme_mod('luzuk_united_soccer_club_site_title_color');
	if ( $luzuk_united_soccer_club_site_title_color != '') {
		$luzuk_united_soccer_club_custom_style .=' h1.site-title a, p.site-title a{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_site_title_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_site_tagline_color = get_theme_mod('luzuk_united_soccer_club_site_tagline_color');
	if ( $luzuk_united_soccer_club_site_tagline_color != '') {
		$luzuk_united_soccer_club_custom_style .=' p.site-description{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_site_tagline_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}



	//slider colors

	$luzuk_united_soccer_club_slider_bg_color = get_theme_mod('luzuk_united_soccer_club_slider_bg_color');
	if ( $luzuk_united_soccer_club_slider_bg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_slider_bg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_bgwave_color = get_theme_mod('luzuk_united_soccer_club_slider_bgwave_color');
	if ( $luzuk_united_soccer_club_slider_bgwave_color != '') {
		$luzuk_united_soccer_club_custom_style .='#slider .slider-mask{';
			$luzuk_united_soccer_club_custom_style .=' background:transparent linear-gradient(270deg, '.esc_attr($luzuk_united_soccer_club_slider_bgwave_color).' 0%, '.esc_attr($luzuk_united_soccer_club_slider_bgwave_color).' 100%);';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_heading_color = get_theme_mod('luzuk_united_soccer_club_slider_heading_color');
	if ( $luzuk_united_soccer_club_slider_heading_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .content h3 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_heading_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_title_color = get_theme_mod('luzuk_united_soccer_club_slider_title_color');
	if ( $luzuk_united_soccer_club_slider_title_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider h2 {';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_title_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}


	$luzuk_united_soccer_club_slider_description_color = get_theme_mod('luzuk_united_soccer_club_slider_description_color');
	if ( $luzuk_united_soccer_club_slider_description_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider p{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_description_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_btntext_color = get_theme_mod('luzuk_united_soccer_club_slider_btntext_color');
	if ( $luzuk_united_soccer_club_slider_btntext_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_btntext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_btnbg_color = get_theme_mod('luzuk_united_soccer_club_slider_btnbg_color');
	if ( $luzuk_united_soccer_club_slider_btnbg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_slider_btnbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_btntexthrv_color = get_theme_mod('luzuk_united_soccer_club_slider_btntexthrv_color');
	if ( $luzuk_united_soccer_club_slider_btntexthrv_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1:hover{';
			$luzuk_united_soccer_club_custom_style .=' color:'.esc_attr($luzuk_united_soccer_club_slider_btntexthrv_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_slider_btnbghrv_color = get_theme_mod('luzuk_united_soccer_club_slider_btnbghrv_color');
	if ( $luzuk_united_soccer_club_slider_btnbghrv_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #slider .sbtn1:hover{';
			$luzuk_united_soccer_club_custom_style .=' background:'.esc_attr($luzuk_united_soccer_club_slider_btnbghrv_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}


	//footer colors

	$luzuk_united_soccer_club_footertitle_color = get_theme_mod('luzuk_united_soccer_club_footertitle_color');
	if ( $luzuk_united_soccer_club_footertitle_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #colophon h1, #colophon h2, #colophon h3, #colophon h4, #colophon h5,
		 #colophon h6{';
			$luzuk_united_soccer_club_custom_style .=' color: '.esc_attr($luzuk_united_soccer_club_footertitle_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}	

	$luzuk_united_soccer_club_footertext_color = get_theme_mod('luzuk_united_soccer_club_footertext_color');
	if ( $luzuk_united_soccer_club_footertext_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #colophon,#colophon p,.site-footer a, .site-footer p, #colophon caption, .site-footer .widget_rss .rss-date,
		  .site-footer .widget_rss li cite {';
			$luzuk_united_soccer_club_custom_style .=' color: '.esc_attr($luzuk_united_soccer_club_footertext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}	

	$luzuk_united_soccer_club_footerbg_color = get_theme_mod('luzuk_united_soccer_club_footerbg_color');
	if ( $luzuk_united_soccer_club_footerbg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' .footer-overlay, .copyright {';
			$luzuk_united_soccer_club_custom_style .=' background: '.esc_attr($luzuk_united_soccer_club_footerbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}


	$luzuk_united_soccer_club_footercopyright_color = get_theme_mod('luzuk_united_soccer_club_footercopyright_color');
	if ( $luzuk_united_soccer_club_footercopyright_color != '') {
		$luzuk_united_soccer_club_custom_style .=' #colophon .site-info p {';
			$luzuk_united_soccer_club_custom_style .=' color: '.esc_attr($luzuk_united_soccer_club_footercopyright_color).' !important;';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_footerscrolltotoptext_color = get_theme_mod('luzuk_united_soccer_club_footerscrolltotoptext_color');
	if ( $luzuk_united_soccer_club_footerscrolltotoptext_color != '') {
		$luzuk_united_soccer_club_custom_style .=' .back-to-top {';
			$luzuk_united_soccer_club_custom_style .=' color: '.esc_attr($luzuk_united_soccer_club_footerscrolltotoptext_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_footerscrolltotopbg_color = get_theme_mod('luzuk_united_soccer_club_footerscrolltotopbg_color');
	if ( $luzuk_united_soccer_club_footerscrolltotopbg_color != '') {
		$luzuk_united_soccer_club_custom_style .=' .back-to-top {';
			$luzuk_united_soccer_club_custom_style .=' background: '.esc_attr($luzuk_united_soccer_club_footerscrolltotopbg_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_footerscrolltotoptexthover_color = get_theme_mod('luzuk_united_soccer_club_footerscrolltotoptexthover_color');
	if ( $luzuk_united_soccer_club_footerscrolltotoptexthover_color != '') {
		$luzuk_united_soccer_club_custom_style .=' .back-to-top:hover .back-to-top-text {';
			$luzuk_united_soccer_club_custom_style .=' color: '.esc_attr($luzuk_united_soccer_club_footerscrolltotoptexthover_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}

	$luzuk_united_soccer_club_footerscrolltotophover_color = get_theme_mod('luzuk_united_soccer_club_footerscrolltotophover_color');
	if ( $luzuk_united_soccer_club_footerscrolltotophover_color != '') {
		$luzuk_united_soccer_club_custom_style .=' .back-to-top:hover::after {';
			$luzuk_united_soccer_club_custom_style .=' background: '.esc_attr($luzuk_united_soccer_club_footerscrolltotophover_color).';';
		$luzuk_united_soccer_club_custom_style .=' }';
	}