<?php
/**
 * The header for our theme
 *
 * @subpackage United Soccer Club
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'united-soccer-club' ); ?></a>

<div id="header">
	<div class="main-header">
		<div class="top-head">
			<div class="container">
				<div class="tph-inn">
					<div class="row m-0">
						<div class="col-lg-3 col-md-3 col-sm-6 col-6">
							<div class="logo ">
								<?php if ( has_custom_logo() ) : ?>
									<?php the_custom_logo(); ?>
								<?php endif; ?>
								<?php if (get_theme_mod('luzuk_united_soccer_club_show_site_title',true)) {?>
									<?php $blog_info = get_bloginfo( 'name' ); ?>
									<?php if ( ! empty( $blog_info ) ) : ?>
										<?php if ( is_front_page() && is_home() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php else : ?>
											<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php endif; ?>
									<?php endif; ?>
								<?php }?>
								<?php if (get_theme_mod('luzuk_united_soccer_club_show_tagline',true)) {?>
									<?php $description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
										<p class="site-description"><?php echo esc_html($description); ?></p>
									<?php endif; ?>
								<?php }?>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-6 col-6">
							<div class="m-head">					
								<div class="row mr-0">
									<div class="col-lg-9 col-md-6 col-sm-6 col-4 pr-0 mbox">
										<div class="header-inner section-inner">
											<div class="header-titles-wrapper">
												<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
													<span class="toggle-inner">
														<span class="toggle-icon">
															<i class="fas fa-bars"></i>
														</span>
														<!-- <span class="toggle-text"><//?php _e( 'Menu', 'united-soccer-club' ); ?></span> -->
													</span>
												</button><!-- .nav-toggle -->
											</div><!-- .header-titles-wrapper -->

											<div class="header-navigation-wrapper">
												<?php
												if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
													?>
													<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'united-soccer-club' ); ?>">
														<ul class="primary-menu reset-list-style">
															<?php
															if ( has_nav_menu( 'primary' ) ) {

																wp_nav_menu(
																	array(
																		'container'  => '',
																		'items_wrap' => '%3$s',
																		'theme_location' => 'primary',
																	)
																);

															} elseif ( ! has_nav_menu( 'expanded' ) ) {

																wp_list_pages(
																	array(
																		'match_menu_classes' => true,
																		'show_sub_menu_icons' => true,
																		'title_li' => false,
																		'walker'   => new United_Soccer_Club_Walker_Page(),
																	)
																);

															}
															?>
														</ul>
													</nav><!-- .primary-menu-wrapper -->
												<?php } ?>
											</div><!-- .header-navigation-wrapper -->
										</div><!-- .header-inner -->
										<?php
											// Output the menu modal.
											get_template_part( '/inc/modal-menu' );
										?>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-10 col-10">
										<div class="headerbtn">
											<?php $header_btntext = esc_html(get_theme_mod('luzuk_united_soccer_club_header_btntext', 'Join Now')); ?>
											<a href="<?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_header_btnlink')); ?>">
												<?php echo $header_btntext; ?>
											</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="innheader-border"></div>
		      	<div class="theme-breadcrumb mt-2">
					<?php luzuk_united_soccer_club_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>