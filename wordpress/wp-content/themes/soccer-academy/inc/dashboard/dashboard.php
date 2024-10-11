<?php

add_action( 'admin_menu', 'soccer_academy_gettingstarted' );
function soccer_academy_gettingstarted() {
	add_theme_page( esc_html__('Begin Installation', 'soccer-academy'), esc_html__('Begin Installation', 'soccer-academy'), 'edit_theme_options', 'soccer-academy-guide-page', 'soccer_academy_guide');
}

function soccer_academy_admin_theme_style() {
   wp_enqueue_style('soccer-academy-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'soccer_academy_admin_theme_style');

if ( ! defined( 'SOCCER_ACADEMY_SUPPORT' ) ) {
	define('SOCCER_ACADEMY_SUPPORT',__('https://wordpress.org/support/theme/soccer-academy/','soccer-academy'));
}
if ( ! defined( 'SOCCER_ACADEMY_REVIEW' ) ) {
	define('SOCCER_ACADEMY_REVIEW',__('https://wordpress.org/support/theme/soccer-academy/reviews/','soccer-academy'));
}
if ( ! defined( 'SOCCER_ACADEMY_LIVE_DEMO' ) ) {
define('SOCCER_ACADEMY_LIVE_DEMO',__('https://trial.ovationthemes.com/soccer-academy/','soccer-academy'));
}
if ( ! defined( 'SOCCER_ACADEMY_BUY_PRO' ) ) {
define('SOCCER_ACADEMY_BUY_PRO',__('https://www.ovationthemes.com/products/soccer-club-wordpress-theme','soccer-academy'));
}
if ( ! defined( 'SOCCER_ACADEMY_PRO_DOC' ) ) {
define('SOCCER_ACADEMY_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-soccer-academy-pro-doc/','soccer-academy'));
}
if ( ! defined( 'SOCCER_ACADEMY_FREE_DOC' ) ) {
define('SOCCER_ACADEMY_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-soccer-academy-free-doc/','soccer-academy'));
}
if ( ! defined( 'SOCCER_ACADEMY_THEME_NAME' ) ) {
define('SOCCER_ACADEMY_THEME_NAME',__('Premium Soccer Theme','soccer-academy'));
}


/**
 * Theme Info Page
 */
function soccer_academy_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$soccer_academy_theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $soccer_academy_theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'soccer-academy'); ?><?php echo esc_html($soccer_academy_theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( SOCCER_ACADEMY_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Theme Documentation', 'soccer-academy'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( SOCCER_ACADEMY_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'soccer-academy'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( SOCCER_ACADEMY_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'soccer-academy'); ?></a>
			</div>
		</div>
	</div>
	<div class="import-box">
		<div class="container">
			<h2><?php esc_html_e( 'DEMO IMPORT', 'soccer-academy' ); ?></h2>
			<p><?php esc_html_e('To import all of the demo content, click the Begin with Demo Import button.','soccer-academy'); ?></p>
			<?php require get_parent_theme_file_path( '/inc/dashboard/setup.php' ); ?>
		</div>
	</div>
	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','soccer-academy'); ?></h3>
					<p><?php esc_html_e('To setup the soccer academy theme follow the below steps.','soccer-academy'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=title_tagline') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','soccer-academy'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=soccer_academy_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','soccer-academy'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','soccer-academy'); ?></a>

					<h4><?php esc_html_e('4. Setup Social Icons','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Social Media >> Add social links.','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=soccer_academy_urls') ); ?>" target="_blank"><?php esc_html_e('Add Social Icons','soccer-academy'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','soccer-academy'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=soccer_academy_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','soccer-academy'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','soccer-academy'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','soccer-academy'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','soccer-academy'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','soccer-academy'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','soccer-academy'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=soccer_academy_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','soccer-academy'); ?></a>

					<h4><?php esc_html_e('3. Setup Player Section','soccer-academy'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post Category >> Add New Post >> Add title, content, select post category and featured image >> Publish it.','soccer-academy'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Player Settings >> Add section heading, Add Details and publish it.','soccer-academy'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=soccer_academy_top_player_section') ); ?>" target="_blank"><?php esc_html_e('Add players','soccer-academy'); ?></a>
				</div>
        	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(SOCCER_ACADEMY_THEME_NAME); ?></h3>
				<img class="soccer_academy_img_responsive" style="width: 100%;" src="<?php echo esc_url( $soccer_academy_theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary livedemo" href="<?php echo esc_url( SOCCER_ACADEMY_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'soccer-academy'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( SOCCER_ACADEMY_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'soccer-academy'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( SOCCER_ACADEMY_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'soccer-academy'); ?></a>
					<hr>
				</div>
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
                   	<li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'soccer-academy');?> </li>
                   	<li class="upsell-soccer_academy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'soccer-academy');?> </li>
                </ul>
        	</div>
		</div>
	</div>

<?php }?>
