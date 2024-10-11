<?php
/**
 * Custom header
 */

function soccer_academy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'soccer_academy_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img.jpg' ),
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'flex-width'			 => true,
		'flex-height'			 => true,
		'wp-head-callback'       => 'soccer_academy_header_style',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header-img.jpg',
			'thumbnail_url' => '%s/assets/images/header-img.jpg',
			'description'   => __( 'Default Header Image', 'soccer-academy' ),
		),
	) );
}

add_action( 'after_setup_theme', 'soccer_academy_custom_header_setup' );

if ( ! function_exists( 'soccer_academy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see soccer_academy_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'soccer_academy_header_style' );
function soccer_academy_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
		.header-image, .woocommerce-page .single-post-image {
			background-image:url('".esc_url(get_header_image())."');
			background-position: top;
			background-size:cover;
			background-repeat:no-repeat;
		}";
	   	wp_add_inline_style( 'soccer-academy-style', $custom_css );
	endif;
}
endif;


