<?php 

$soccer_academy_custom_style= "";

if (false === get_option('soccer_academy_sticky_header')) {
    add_option('soccer_academy_sticky_header', 'off');
}

// Define the custom CSS based on the 'soccer_academy_sticky_header' option

if (get_option('soccer_academy_sticky_header', 'off') !== 'on') {
    $soccer_academy_custom_style .= '.menu_header.fixed {';
    $soccer_academy_custom_style .= 'position: static;';
    $soccer_academy_custom_style .= '}';

    $soccer_academy_custom_style .= '.page-template-custom-home-page .menu_header.fixed {';
    $soccer_academy_custom_style .= 'position: static;';
    $soccer_academy_custom_style .= '}';
}

if (get_option('soccer_academy_sticky_header', 'off') !== 'off') {
    $soccer_academy_custom_style .= '.menu_header.fixed {';
    $soccer_academy_custom_style .= 'position: fixed; background: #fff; box-shadow: 0px 3px 10px 2px #eee;';
    $soccer_academy_custom_style .= '}';

    $soccer_academy_custom_style .= '.admin-bar .fixed {';
    $soccer_academy_custom_style .= ' margin-top: 32px;';
    $soccer_academy_custom_style .= '}';

    $soccer_academy_custom_style .= '.page-template-custom-home-page .menu_header.fixed {';
    $soccer_academy_custom_style .= 'position: fixed;';
    $soccer_academy_custom_style .= '}';
}

/*---------------------------Scroll-top-position -------------------*/

$soccer_academy_scroll_options = get_theme_mod( 'soccer_academy_scroll_options','right_align');

if($soccer_academy_scroll_options == 'right_align'){

$soccer_academy_custom_style .='.scroll-top button{';

	$soccer_academy_custom_style .='';

$soccer_academy_custom_style .='}';

}else if($soccer_academy_scroll_options == 'center_align'){

$soccer_academy_custom_style .='.scroll-top button{';

	$soccer_academy_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$soccer_academy_custom_style .='}';

}else if($soccer_academy_scroll_options == 'left_align'){

$soccer_academy_custom_style .='.scroll-top button{';

	$soccer_academy_custom_style .='right: auto; left:5%; margin: 0 auto';

$soccer_academy_custom_style .='}';
}
/*---------------------------text-transform-------------------*/

$soccer_academy_text_transform = get_theme_mod( 'soccer_academy_menu_text_transform','CAPITALISE');
if($soccer_academy_text_transform == 'CAPITALISE'){

$soccer_academy_custom_style .='nav#top_gb_menu ul li a{';

	$soccer_academy_custom_style .='text-transform: capitalize ; font-size: 14px;';

$soccer_academy_custom_style .='}';

}else if($soccer_academy_text_transform == 'UPPERCASE'){

$soccer_academy_custom_style .='nav#top_gb_menu ul li a{';

	$soccer_academy_custom_style .='text-transform: uppercase ; font-size: 14px;';

$soccer_academy_custom_style .='}';

}else if($soccer_academy_text_transform == 'LOWERCASE'){

$soccer_academy_custom_style .='nav#top_gb_menu ul li a{';

	$soccer_academy_custom_style .='text-transform: lowercase ; font-size: 14px;';

$soccer_academy_custom_style .='}';
}

/*-------------------------Slider-content-alignment-------------------*/

$soccer_academy_slider_content_alignment = get_theme_mod( 'soccer_academy_slider_content_alignment','LEFT-ALIGN');

if($soccer_academy_slider_content_alignment == 'LEFT-ALIGN'){

$soccer_academy_custom_style .='#slider .carousel-caption{';

	$soccer_academy_custom_style .='text-align:left; right: 45%; left: 19%';

$soccer_academy_custom_style .='}';

$soccer_academy_custom_style .='@media screen and (max-width:1199px){';

$soccer_academy_custom_style .='#slider .carousel-caption{';

    $soccer_academy_custom_style .='right: 20%; left: 19%';
    
$soccer_academy_custom_style .='} }';

$soccer_academy_custom_style .='@media screen and (max-width:991px){';

$soccer_academy_custom_style .='#slider .carousel-caption{';

    $soccer_academy_custom_style .='right: 15%; left: 19%';
    
$soccer_academy_custom_style .='} }';


}else if($soccer_academy_slider_content_alignment == 'CENTER-ALIGN'){

$soccer_academy_custom_style .='#slider .carousel-caption{';

	$soccer_academy_custom_style .='text-align:center; left: 15%; right: 15%;';

$soccer_academy_custom_style .='}';


}else if($soccer_academy_slider_content_alignment == 'RIGHT-ALIGN'){

$soccer_academy_custom_style .='#slider .carousel-caption{';

	$soccer_academy_custom_style .='text-align:right; left: 45%; right: 19%;';

$soccer_academy_custom_style .='}';

$soccer_academy_custom_style .='@media screen and (max-width:1199px){';

$soccer_academy_custom_style .='#slider .carousel-caption{';

    $soccer_academy_custom_style .='left: 20%; right: 19%';
    
$soccer_academy_custom_style .='} }';

$soccer_academy_custom_style .='@media screen and (max-width:991px){';

$soccer_academy_custom_style .='#slider .carousel-caption{';

    $soccer_academy_custom_style .='left: 15%; right: 19%';
    
$soccer_academy_custom_style .='} }';

}
//---------------------------------Logo-Max-height---------	
$soccer_academy_logo_max_height = get_theme_mod('soccer_academy_logo_max_height','100');

if($soccer_academy_logo_max_height != false){

$soccer_academy_custom_style .='.custom-logo-link img{';

	$soccer_academy_custom_style .='max-height: '.esc_html($soccer_academy_logo_max_height).'px;';

$soccer_academy_custom_style .='}';
}

/*---------------------------Width -------------------*/
	
$soccer_academy_theme_width = get_theme_mod( 'soccer_academy_width_options','full_width');

if($soccer_academy_theme_width == 'full_width'){

$soccer_academy_custom_style .='body{';

	$soccer_academy_custom_style .='max-width: 100%;';

$soccer_academy_custom_style .='}';

}else if($soccer_academy_theme_width == 'container'){

$soccer_academy_custom_style .='body{';

	$soccer_academy_custom_style .='width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

$soccer_academy_custom_style .='}';

$soccer_academy_custom_style .='@media screen and (min-width: 601px){';

$soccer_academy_custom_style .='body{';

    $soccer_academy_custom_style .='max-width: 720px;';
    
$soccer_academy_custom_style .='} }';

$soccer_academy_custom_style .='@media screen and (min-width: 992px){';

$soccer_academy_custom_style .='body{';

    $soccer_academy_custom_style .='max-width: 960px;';
    
$soccer_academy_custom_style .='} }';

$soccer_academy_custom_style .='@media screen and (min-width: 1200px){';

$soccer_academy_custom_style .='body{';

    $soccer_academy_custom_style .='max-width: 1140px;';
    
$soccer_academy_custom_style .='} }';

$soccer_academy_custom_style .='@media screen and (min-width: 1400px){';

$soccer_academy_custom_style .='body{';

    $soccer_academy_custom_style .='max-width: 1320px;';
    
$soccer_academy_custom_style .='} }';

$soccer_academy_custom_style .='@media screen and (max-width:600px){';

$soccer_academy_custom_style .='body{';

    $soccer_academy_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$soccer_academy_custom_style .='} }';


}else if($soccer_academy_theme_width == 'container_fluid'){

$soccer_academy_custom_style .='body{';

	$soccer_academy_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$soccer_academy_custom_style .='}';

$soccer_academy_custom_style .='@media screen and (max-width:600px){';

$soccer_academy_custom_style .='body{';

    $soccer_academy_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$soccer_academy_custom_style .='} }';
}
//related products
if( get_option( 'soccer_academy_related_product',true) != 'on') {

$soccer_academy_custom_style .='.related.products{';

	$soccer_academy_custom_style .='display: none;';
	
$soccer_academy_custom_style .='}';
}

if( get_option( 'soccer_academy_related_product',true) != 'off') {

$soccer_academy_custom_style .='.related.products{';

	$soccer_academy_custom_style .='display: block;';
	
$soccer_academy_custom_style .='}';
}

// footer text alignment
$soccer_academy_footer_content_alignment = get_theme_mod( 'soccer_academy_footer_content_alignment','CENTER-ALIGN');

if($soccer_academy_footer_content_alignment == 'LEFT-ALIGN'){

$soccer_academy_custom_style .='.site-info{';

	$soccer_academy_custom_style .='text-align:left; padding-left: 30px;';

$soccer_academy_custom_style .='}';

$soccer_academy_custom_style .='.site-info a{';

	$soccer_academy_custom_style .='padding-left: 30px;';

$soccer_academy_custom_style .='}';


}else if($soccer_academy_footer_content_alignment == 'CENTER-ALIGN'){

$soccer_academy_custom_style .='.site-info{';

	$soccer_academy_custom_style .='text-align:center;';

$soccer_academy_custom_style .='}';


}else if($soccer_academy_footer_content_alignment == 'RIGHT-ALIGN'){

$soccer_academy_custom_style .='.site-info{';

	$soccer_academy_custom_style .='text-align:right; padding-right: 30px;';

$soccer_academy_custom_style .='}';

$soccer_academy_custom_style .='.site-info a{';

	$soccer_academy_custom_style .='padding-right: 30px;';

$soccer_academy_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('soccer_academy_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('soccer_academy_slider_button_show_hide', '1');

$soccer_academy_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $soccer_academy_custom_style .= 'display: none;';
}

$soccer_academy_custom_style .= '}';

// Add media query for mobile devices
$soccer_academy_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $soccer_academy_custom_style .= '#slider .home-btn { display: none; }';
}
$soccer_academy_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('soccer_academy_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('soccer_academy_scroll_enable', '1');

$soccer_academy_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $soccer_academy_custom_style .= 'display: none;';
}

$soccer_academy_custom_style .= '}';

// Add media query for mobile devices
$soccer_academy_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $soccer_academy_custom_style .= '.scrollup { display: none; }';
}
$soccer_academy_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('soccer_academy_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('soccer_academy_enable_breadcrumb', '1');

$soccer_academy_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $soccer_academy_custom_style .= 'display: none;';
}

$soccer_academy_custom_style .= '}';

// Add media query for mobile devices
$soccer_academy_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $soccer_academy_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$soccer_academy_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('soccer_academy_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('soccer_academy_single_enable_breadcrumb', '1');

$soccer_academy_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $soccer_academy_custom_style .= 'display: none;';
}

$soccer_academy_custom_style .= '}';

// Add media query for mobile devices
$soccer_academy_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $soccer_academy_custom_style .= '.single_breadcrumb { display: none; }';
}
$soccer_academy_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('soccer_academy_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('soccer_academy_woocommerce_enable_breadcrumb', '1');

$soccer_academy_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $soccer_academy_custom_style .= 'display: none;';
}

$soccer_academy_custom_style .= '}';

// Add media query for mobile devices
$soccer_academy_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $soccer_academy_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$soccer_academy_custom_style .= '}';

//colors
$color = get_theme_mod('soccer_academy_primary_color', '#fe5900');
$color_light = get_theme_mod('soccer_academy_primary_light', '#ffeee5');
$color_bg = get_theme_mod('soccer_academy_player_bg', '#1F1A33');
$color_text_bg = get_theme_mod('soccer_academy_player_text_bg', '#2b2348');
$color_height_box_1 = get_theme_mod('soccer_academy_player_color1', '#FF7B31');
$color_height_box_2 = get_theme_mod('soccer_academy_player_color2', '#ff9255');
$soccer_academy_custom_style .= ":root {";
    $soccer_academy_custom_style .= "--theme-primary-color: {$color};";
    $soccer_academy_custom_style .= "--theme-primary-light: {$color_light};";
    $soccer_academy_custom_style .= "--theme-player-bg-color: {$color_bg};";
    $soccer_academy_custom_style .= "--theme-player-text-bg-color: {$color_text_bg};";
    $soccer_academy_custom_style .= "--theme-player-height-box-color1: {$color_height_box_1};";
    $soccer_academy_custom_style .= "--theme-player-height-box-color2: {$color_height_box_2};";
$soccer_academy_custom_style .= "}";