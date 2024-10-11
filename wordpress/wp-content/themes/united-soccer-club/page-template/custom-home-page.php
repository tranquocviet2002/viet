<?php
/**
 * Template Name: Custom Home
 */
get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'luzuk_united_soccer_club_above_slider' ); ?>

	<?php if( get_theme_mod('luzuk_united_soccer_club_slider_hide_show') != ''){ ?>
	<section id="slider">
		<div class="slider-mask"></div>
		<!-- <div class="container"> -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			    <?php $luzuk_united_soccer_club_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'luzuk_united_soccer_club_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $luzuk_united_soccer_club_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($luzuk_united_soccer_club_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $luzuk_united_soccer_club_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				<div class="carousel-inner" role="listbox">
				    <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
				    <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
			    		<div class="slidbx">
							<div class="row">
								<div class="slideimg">
									<?php
										// Check if the post has a thumbnail
										if (has_post_thumbnail()) {
											// If post has thumbnail, display it
											?>
											<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
											<?php
										} else {
											// If post does not have thumbnail, display default image
											?>
											<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/abt1.jpg'); ?>" alt="Default Image" />
											<?php
										}
									?>								
								</div>				
								<div class="content">
									<h3><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_sliderheading')); ?></h3>
									<h2><?php the_title(); ?></h2>
										<?php 
											$luzuk_united_soccer_club_slider_excerpt_length = get_theme_mod('luzuk_united_soccer_club_slider_excerpt_length','15');
										
											if( $luzuk_united_soccer_club_slider_excerpt_length != ''){?>
									<p class="mb-0"><?php $luzuk_united_soccer_club_excerpt = get_the_excerpt(); echo esc_html( luzuk_united_soccer_club_string_limit_words( $luzuk_united_soccer_club_excerpt, esc_attr(get_theme_mod('luzuk_united_soccer_club_slider_excerpt_length','15') ) )); ?></p>
										<?php } ?>
									<div class="btn">
										<?php $slider_btntext = esc_html(get_theme_mod('luzuk_united_soccer_club_sliderplaynow', 'Play Now')); ?>
										
										<a href="<?php echo esc_url(get_theme_mod('luzuk_united_soccer_club_sliderplaynowlink')) ?>" class="read-btn sbtn1">
											<svg width="32" height="33" viewBox="0 0 32 33">
												<ellipse id="Ellipse_1" data-name="Ellipse 1" cx="16" cy="16.5" rx="16" ry="16.5" fill="#fff"></ellipse>
												<path id="Icon_awesome-play" data-name="Icon awesome-play" d="M10.126,5.329,1.727.165A1.139,1.139,0,0,0,0,1.19V11.514a1.145,1.145,0,0,0,1.727,1.025l8.4-5.161A1.214,1.214,0,0,0,10.126,5.329Z" transform="translate(12.158 9.921)" fill="#e40000"></path>
											</svg> <span><?php echo $slider_btntext; ?></span>
										</a>
										<?php $slider_btntext = esc_html(get_theme_mod('luzuk_united_soccer_club_sliderbtntext', 'Start Now')); ?>
										<a href="<?php echo esc_url(get_theme_mod('luzuk_united_soccer_club_sliderbtnlink')) ?>" class="read-btn sbtn2">
											<span><?php echo $slider_btntext; ?></span>
											<svg width="31.473" height="10.672" viewBox="0 0 31.473 10.672">
												<g id="Icon_feather-arrow-right" data-name="Icon feather-arrow-right" transform="translate(0.5 0.707)">
												<path id="Path_3" data-name="Path 3" d="M7.5,18H37.973" transform="translate(-7.5 -13.371)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
												<path id="Path_4" data-name="Path 4" d="M18,7.5l4.451,4.629L18,16.758" transform="translate(8.022 -7.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
												</g>
											</svg>
										</a>
											
									</div>
								</div>
							</div>
						</div>
				    </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
				</div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
			      	<span class="screen-reader-text"><//?php esc_html_e( 'Prev','united-soccer-club' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
			      	<span class="screen-reader-text"><//?php esc_html_e( 'Next','united-soccer-club' );?></span>
			    </a> -->
				<ol class="carousel-indicators">
            <?php for ($j = 0; $j < $i; $j++) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $j; ?>" class="<?php if ($j === 0) echo 'active'; ?>"></li>
            <?php endfor; ?>
        </ol>
			</div>
		  <div class="clearfix"></div>
		<!-- </div> -->
	</section>
	<?php }?>
	
	<?php do_action('luzuk_united_soccer_club_below_slider'); ?>

	<section id="counter-section" >
		<!-- <div class="container">  -->
			<div class="row mr-0"> 
				<div class="col-lg-7 col-md-12 col-sm-12 lhsbx">
					<div class="row">
						<div class="hedngbx">
							<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_counterheading')); ?></h2>
							<h3><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_countersubheading')); ?></h3>
						</div>
						<div class="countbx">
							<div class="row">
								<div class="col-lg-3 col-md-6 col-sm-6 col-6 countbxinn">
									<div class="totalawards c_bx">
										<div id="totalawardsnum" class= "num" data-target="<?php echo esc_attr(get_theme_mod('luzuk_united_soccer_club_countertotalawardsnum', 40)); ?>"><?php _e( '0', 'united-soccer-club' ); ?></div>
										<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_countertotalawardstext')); ?></h2>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6 countbxinn">
									<div class="teammember c_bx">
										<div id="teammembernum" class= "num" data-target="<?php echo esc_attr(get_theme_mod('luzuk_united_soccer_club_counterteammembernum', 40)); ?>"><?php _e( '0', 'united-soccer-club' ); ?></div>
										<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_counterteammembertext')); ?></h2>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6 countbxinn">
									<div class="yearexprience c_bx">
										<div id="yearexpriencenum" class= "num" data-target="<?php echo esc_attr(get_theme_mod('luzuk_united_soccer_club_counteryearexpriencenum', 40)); ?> "><?php _e( '0', 'united-soccer-club' ); ?> </div>
										<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_counteryearexpriencetext')); ?> 
										</h2>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6 countbxinn">
									<div class="matchesplayed c_bx">
										<div id="matchesplayednum" class= "num" data-target="<?php echo esc_attr(get_theme_mod('luzuk_united_soccer_club_countermatchesplayednum', 40)); ?>"><?php _e( '0', 'united-soccer-club' ); ?></div>
										<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_countermatchesplayedtext')); ?></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12 rhs">
					<div class="row">
						<div class="col-lg-4 col-md-5 col-sm-6">
							<div id="yt-player">
								<?php
									$youtube_video_url = get_theme_mod('united_soccer_club_banneryoutubevideourl');

									if (!empty($youtube_video_url)) {
										// Extract video ID from the URL
										$video_id = esc_attr(luzuk_united_soccer_club_get_youtube_video_id($youtube_video_url));

										// Display embedded YouTube video
										echo '<div class="youtube-video">';
										echo '<iframe width="560" height="560" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe>';
										echo '</div>';
									}
								?>
							</div>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-6">
							<div id="titlebx">
								<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_countervideoheading')); ?></h2>
								<p><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_countervideosubheading')); ?></p>
							</div>
						</div>
					</div>
				</div> 
			</div>
		<!-- </div> -->
	</section>

	<?php do_action('luzuk_united_soccer_club_below_counter_section'); ?>
		<section id="whatweoffer-section" class="py-5">
			<div class="container"> 
				<div class="row mr-0"> 
					<div class="col-lg-6 col-md-12 col-sm-12">
						<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_whatweoffersubheading')); ?></h2>
						<h3><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_whatweofferheading')); ?></h3>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 r-abt">
						<p><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_whatweofferdescription')); ?></p>
					</div> 
				</div>

					<div class="row mr-0">
					<?php
					// Check if any page is selected from customizer
					$pages_selected = false;
					for ($i = 1; $i <= 4; $i++) {
						$selected_page_id = get_theme_mod('luzuk_united_soccer_club_servicespage_setting_' . $i);
						if ($selected_page_id) {
							$pages_selected = true;
							break;
						}
					}
					?>

					<!-- <div class="owl-carousel owl-theme row"> -->
						<?php
						// Display pages in slider if selected, otherwise show a message
						if ($pages_selected) {
							// Loop through each selected page and display in the slider
							for ($i = 1; $i <= 4; $i++) {
								$selected_page_id = get_theme_mod('luzuk_united_soccer_club_servicespage_setting_' . $i);
								if ($selected_page_id) {
									$page = get_post($selected_page_id);
									?>
									<div class="serbx col-xl-4 col-lg-4 col-md-6 col-sm-6">
										<div class="serbxinn">	
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-3">				
													<div class="icon">
														<i class="<?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_servicesicon'. $i)); ?>"></i>
													</div>
												</div>
												
												<div class="col-lg-9 col-md-9 col-sm-9">
													<div class="conbx">
														<a href="<?php echo get_permalink($page->ID); ?>">
															<h4><?php echo $page->post_title; ?></h4>
														</a>
														<?php
															$excerpt = wp_trim_words( get_the_excerpt( $page->ID ), 8 );
															if ( $excerpt ) {
																echo '<p>' . esc_html( $excerpt ) . '</p>';
															}
														?>
														<div class="feabtn">
															<a href="<?php echo get_permalink($page->ID); ?>">
																<i class="fa fa-arrow-circle-right"></i>
															</a>										
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php }
							}
						} else {
							// Display message if no pages are selected
						}
						?>
					</div>
			</div>
		</section>

	<?php do_action('luzuk_united_soccer_club_below_counter_section'); ?>

		<section id="soccerclubactivities-section" class="py-5">
			<div class="container"> 
				<div class="heading"> 
					<h2><?php echo esc_html(get_theme_mod('luzuk_united_soccer_club_soccerclubactivitiesheading')); ?></h2>
				</div>
				
				<div class="row mr-0">
				<?php
				// Check if any page is selected from customizer
				$pages_selected = false;
				for ($i = 1; $i <= 4; $i++) {
					$selected_page_id = get_theme_mod('luzuk_united_soccer_club_soccerclubactivities_setting_' . $i);
					if ($selected_page_id) {
						$pages_selected = true;
						break;
					}
				}
				?>

				<!-- <div class="owl-carousel owl-theme row"> -->
					<?php
					// Display pages in slider if selected, otherwise show a message
					if ($pages_selected) {
						// Loop through each selected page and display in the slider
						for ($i = 1; $i <= 4; $i++) {
							$selected_page_id = get_theme_mod('luzuk_united_soccer_club_soccerclubactivities_setting_' . $i);
							if ($selected_page_id) {
								$page = get_post($selected_page_id);
								?>
								<div class="activities col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
									<div class="activitiesinn">	
										<div class="row mr-0">
											
											<a href="<?php echo get_permalink($page->ID); ?>">
												<?php echo get_the_post_thumbnail($page->ID, 'medium'); ?>
											</a>
											<div class="cbx">
												<a href="<?php echo get_permalink($page->ID); ?>">
													<h4><?php echo $page->post_title; ?></h4>
												</a>
												<?php
													$excerpt = wp_trim_words( get_the_excerpt( $page->ID ), 15 );
													if ( $excerpt ) {
														echo '<p>' . esc_html( $excerpt ) . '</p>';
													}
												?>
											</div>						
											<div class="feabtn">
												<a href="<?php echo get_permalink($page->ID); ?>">
													<i class="fa fa-arrow-circle-right"></i>
												</a>										
											</div>	
										</div>
									</div>
								</div>
							<?php }
						}
					} else {
						// Display message if no pages are selected
					}
					?>
				</div>
			</div>
		</section>

	<?php do_action('luzuk_united_soccer_club_below_soccerclubactivities_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>