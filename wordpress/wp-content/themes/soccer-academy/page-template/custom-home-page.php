<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('soccer_academy_slider_arrows', false) !== 'off'){ ?>
    <section id="slider">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <?php
        for ($slides = 1; $slides <= 4; $slides++) {
            $mod = get_theme_mod('soccer_academy_post_setting' . $slides);
            if ('page-none-selected' != $mod) {
                $soccer_academy_slide_post[] = $mod;
            }
        }
        if (!empty($soccer_academy_slide_post)) :
          $args = array(
              'post_type'            => array('post'),
              'post__in'             => $soccer_academy_slide_post,
              'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($soccer_academy_slide_post) && is_sticky()) {
              $args['post__in'] = get_option('sticky_posts');
          }

          $query = new WP_Query($args);
          if ($query->have_posts()) :
            $slides = 1; ?>
            <div class="carousel-inner" role="listbox">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div <?php if ($slides == 1) {
                        echo 'class="carousel-item active"';
                      } else {
                        echo 'class="carousel-item"';
                      } ?>>
                      <?php if (has_post_thumbnail()) { ?>
                          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                      <?php } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
                      <?php } ?>
                      <div class="carousel-caption">
                        <?php if (get_theme_mod('soccer_academy_slide_heading') != '') { ?>
                          <h3><?php echo esc_html(get_theme_mod('soccer_academy_slide_heading', '')); ?></h3>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>"><h2 class="slider-title"><?php the_title(); ?></h2></a>
                        <?php if( get_option('soccer_academy_slider_excerpt_show_hide',true) != 'off'){ ?>
                          <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('soccer_academy_slider_excerpt_count',30) );?></p>
                        <?php } ?>
                        <div class="home-btn my-lg-4 my-md-4 mb-3">
                          <a class="p-lg-3 p-2" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('soccer_academy_slider_read_more',__('Read More','soccer-academy'))); ?></a>
                        </div>
                      </div>
                    </div>
                    <?php $slides++; endwhile;
                wp_reset_postdata(); ?>
            </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif; ?>
        <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
        </a>
        <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
        </a>
        <?php if (get_option('header_social_icon_enable', false) != 'off') { ?>
            <?php
            $soccer_academy_header_twt_target       = esc_attr(get_option('soccer_academy_header_twt_target', 'true'));
            $soccer_academy_header_linkedin_target  = esc_attr(get_option('soccer_academy_header_linkedin_target', 'true'));
            $soccer_academy_header_youtube_target   = esc_attr(get_option('soccer_academy_header_youtube_target', 'true'));
            $soccer_academy_header_instagram_target = esc_attr(get_option('soccer_academy_header_instagram_target', 'true'));
            ?>
            <div class="social-icon">
                <?php if (get_theme_mod('soccer_academy_twitter') != '') { ?>
                    <a target="<?php echo $soccer_academy_header_twt_target != 'off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('soccer_academy_twitter', '')); ?>">
                        <i class="<?php echo esc_attr(get_theme_mod('soccer_academy_twitter_icon', 'fab fa-x-twitter')); ?>"></i>
                    </a>
                <?php } ?>
                <?php if (get_theme_mod('soccer_academy_linkedin') != '') { ?>
                    <a target="<?php echo $soccer_academy_header_linkedin_target != 'off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('soccer_academy_linkedin', '')); ?>">
                        <i class="<?php echo esc_attr(get_theme_mod('soccer_academy_linkedin_icon', 'fab fa-linkedin-in')); ?>"></i>
                    </a>
                <?php } ?>
                <?php if (get_theme_mod('soccer_academy_youtube') != '') { ?>
                    <a target="<?php echo $soccer_academy_header_youtube_target != 'off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('soccer_academy_youtube', '')); ?>">
                        <i class="<?php echo esc_attr(get_theme_mod('soccer_academy_youtube_icon', 'fab fa-youtube')); ?>"></i>
                    </a>
                <?php } ?>
                <?php if (get_theme_mod('soccer_academy_instagram') != '') { ?>
                    <a target="<?php echo $soccer_academy_header_instagram_target != 'off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('soccer_academy_instagram', '')); ?>">
                        <i class="<?php echo esc_attr(get_theme_mod('soccer_academy_instagram_icon', 'fab fa-instagram')); ?>"></i>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php if( get_option('soccer_academy_player_show_hide', false) !== 'off'){ ?>
    <section id="player">
      <div class="container py-5">
        <?php if( get_theme_mod('soccer_academy_player_sub_heading') != ''){ ?>
          <h4 class="text-lg-start text-center"><?php echo esc_html(get_theme_mod('soccer_academy_player_sub_heading','')); ?></h4>
        <?php }?>
        <?php if( get_theme_mod('soccer_academy_player_heading') != ''){ ?>
          <h3 class="text-lg-start text-center"><?php echo esc_html(get_theme_mod('soccer_academy_player_heading','')); ?></h3>
        <?php }?>
        <div class="owl-carousel mt-5">
          <?php
            $soccer_academy_top_player_image = get_theme_mod('soccer_academy_top_player_counter','');
            for ( $i = 1; $i <= $soccer_academy_top_player_image; $i++ ){ ?>
            <div class="row">
              <div class=" col-lg-5">
                <div class="slider-image-box" data-dot-img="<?php echo esc_url(get_theme_mod('soccer_academy_top_player_images'.$i)); ?>">
                  <img src="<?php echo esc_url(get_theme_mod('soccer_academy_top_player_images'.$i)); ?>" class="slide-image"/>
                </div>
              </div>
              <div class="player-content col-lg-7 ps-lg-5">
                <?php if( get_theme_mod('soccer_academy_player_1'.$i) != ''){ ?>
                  <h3 class="text-lg-start text-center mt-1"><?php echo esc_html(get_theme_mod('soccer_academy_player_1'.$i)); ?></h3>
                <?php }?>
                <div class="row">
                  <div  class="col-lg-10 col-6 text-lg-start text-center align-self-center">
                    <?php if( get_theme_mod('soccer_academy_team_name'.$i) != ''){ ?>
                      <p class="mb-0 py-lg-1 ps-2 team-name"><?php echo esc_html(get_theme_mod('soccer_academy_team_name'.$i)); ?></p>
                    <?php }?>
                  </div>
                  <div class="col-lg-2 col-6 text-lg-end text-center align-self-center">
                    <?php if( get_theme_mod('soccer_academy_player_no'.$i) != ''){ ?>
                      <h3 class=" player-no mb-0 py-lg-1"><span id="sub">#</span><?php echo esc_html(get_theme_mod('soccer_academy_player_no'.$i)); ?></h3>
                    <?php }?>
                  </div>
                </div>
                <div class="player-details mt-4 py-2">
                  <div class="row">
                    <div class="player-age ps-lg-5 pe-lg-3 px-5 text-center col-lg-4 col-md-4  align-self-center">
                      <?php if( get_theme_mod('soccer_academy_player_b'.$i) != ''){ ?>
                        <p class="mb-0 mt-3 p-2 text-lg-start text-md-start text-center"><?php esc_html_e('Born:','soccer-academy'); ?><?php echo esc_html(get_theme_mod('soccer_academy_player_b'.$i)); ?></p>
                      <?php }?>
                      <?php if( get_theme_mod('soccer_academy_player_a'.$i) != ''){ ?>
                        <p class="mb-0 mt-2 p-2 text-lg-start text-md-start text-center"><?php esc_html_e('Age: ','soccer-academy'); ?><?php echo esc_html(get_theme_mod('soccer_academy_player_a'.$i)); ?></p>
                      <?php }?>
                      <?php if( get_theme_mod('soccer_academy_player_c'.$i) != ''){ ?>
                        <p class="mb-3 mt-2 p-2 text-lg-start text-md-start text-center"><?php esc_html_e('Country: ','soccer-academy'); ?><?php echo esc_html(get_theme_mod('soccer_academy_player_c'.$i)); ?></p>
                      <?php }?>
                    </div >
                    <div class="col-lg-8 col-md-8 align-self-center">
                      <div class="row mx-0">
                        <div class=" height col-lg-5 col-md-5 col-5 mx-lg-2 mx-md-2 ms-4 py-4 text-center">
                          <p class="text"><?php esc_html_e('Height','soccer-academy'); ?></p>
                          <?php if( get_theme_mod('soccer_academy_height'.$i) != ''){ ?>
                            <p class="mb-0 number"><?php echo esc_html(get_theme_mod('soccer_academy_height'.$i)); ?><span id="super"><?php esc_html_e('ft','soccer-academy'); ?></span></p>
                          <?php }?>
                        </div>
                        <div class=" height col-lg-5 col-md-5 col-5 mx-lg-2  mx-2 py-4 text-center">
                          <p class="text"><?php esc_html_e('Weight','soccer-academy'); ?></p>
                          <?php if( get_theme_mod('soccer_academy_weight'.$i) != ''){ ?>
                            <p class="mb-0 number"><?php echo esc_html(get_theme_mod('soccer_academy_weight'.$i)); ?><span id="super"><?php esc_html_e('kg','soccer-academy'); ?></span></p>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    </section> 
  <?php }?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>