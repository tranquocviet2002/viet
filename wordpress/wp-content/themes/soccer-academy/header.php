<?php
/**
 * The header for our theme
 *
 * @subpackage Soccer Academy
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'soccer-academy' ); ?></a>
<?php if( get_option('soccer_academy_theme_loader',true) != 'off'){ ?>
	<?php $soccer_academy_loader_option = get_theme_mod( 'soccer_academy_loader_style','style_one');
		if($soccer_academy_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($soccer_academy_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
<?php }?>
<div id="page" class="site">
	<div id="header">
		<div class="wrap_figure">
			<div class="container">
				<div class="menu_header  py-3 px-2 wow fadeInDown">
					<div class="row mx-0">
						<div class="col-lg-2 col-md-4 align-self-center text-md-start text-center">
							<div class="logo text-md-start text-center">
								<?php if ( has_custom_logo() ) : ?>
					            	<?php the_custom_logo(); ?>
						    	<?php endif; ?>
					        	<?php $soccer_academy_blog_info = get_bloginfo( 'name' ); ?>
						        	<?php if ( ! empty( $soccer_academy_blog_info ) ) : ?>
						            	<?php if ( is_front_page() && is_home() ) : ?>
											<?php if( get_option('soccer_academy_logo_title',false) != 'off'){ ?>
						                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
											<?php }?>
						            	<?php else : ?>
										<?php if( get_option('soccer_academy_logo_title',false) != 'off'){ ?>
					                      	<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php }?>
					            	<?php endif; ?>
						        <?php endif; ?>
						        <?php
					                $soccer_academy_description = get_bloginfo( 'description', 'display' );
						            if ( $soccer_academy_description || is_customize_preview() ) :
						        ?>
								<?php if( get_option('soccer_academy_logo_text',true) != 'off'){ ?>
					                <p class="site-description"><?php echo esc_html($soccer_academy_description); ?></p>
					            <?php }?>
					        	<?php endif; ?>
							</div>
						</div>
						<div class="contact col-lg-3 col-md-4  col-sm-6 align-self-center">
							<?php if( get_theme_mod('soccer_academy_call_number') != '' || get_theme_mod('soccer_academy_email_address') != '' ){ ?>
								<div class="row contact-details py-1">
									<div class="col-lg-2 col-md-3 col-3 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('soccer_academy_contact_icon','fas fa-phone-volume')); ?>"></i>
									</div>
									
									<div class="col-lg-10 col-md-9 col-9 align-self-center">
										<p class="mb-0"><?php echo esc_html(get_theme_mod('soccer_academy_call_number','')); ?></p>
										<p class="mb-0"><?php echo esc_html(get_theme_mod('soccer_academy_email_address','')); ?></p>
									</div>	
								</div>
							<?php }?>
						</div>
						<div class="col-lg-6 col-md-2 col-sm-3 col-6 align-self-center">
							<div class="toggle-menu gb_menu text-center">
								<button onclick="soccer_academy_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','soccer-academy'); ?></p></button>
							</div>
				   			<?php get_template_part('template-parts/navigation/navigation'); ?>
						</div>
						<div class="col-lg-1 col-md-2 col-sm-3 col-6 align-self-center">
							<div class="header-search">
              					<div class="header-search-wrapper">
					                <span class="search-main">
					                    <i class="search-icon fas fa-search"></i>
					                </span>
					                <span class="search-close-icon"><i class="fas fa-xmark"></i>
					                </span>
					                <div class="search-form-main clearfix">
					                  <?php get_search_form(); ?>
					                </div>
              					</div>
            				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

