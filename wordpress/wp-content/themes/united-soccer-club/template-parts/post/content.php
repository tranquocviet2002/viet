<?php
/**
 * Template part for displaying posts
 *
 * @subpackage United Soccer Club
 * @since 1.0
 * @version 1.4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <?php if(has_post_thumbnail()) { ?>
    <?php the_post_thumbnail(); ?>
  <?php }?>
  <div class="article_content">
    <h3><?php the_title(); ?></h3>
    <p class="mb-0">
      <?php $luzuk_united_soccer_club_excerpt = get_the_excerpt(); echo esc_html( luzuk_united_soccer_club_string_limit_words( $luzuk_united_soccer_club_excerpt,30 ) ); ?> <?php esc_html_e('...', 'united-soccer-club'); ?>
      <a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('Read More', 'united-soccer-club'); ?><span class="screen-reader-text"><?php esc_html_e('Read More', 'united-soccer-club'); ?></span></a>
    </p>
    <div class="clearfix"></div>
  </div>
  <div class="metabox"> 
    <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','united-soccer-club'), __('0 Comments','united-soccer-club'), __('% Comments','united-soccer-club') ); ?></span>
    <span class="entry-date"><span><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?></span></span>
  </div>
</article>