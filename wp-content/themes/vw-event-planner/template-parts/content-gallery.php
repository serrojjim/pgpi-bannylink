<?php
/**
 * The template part for displaying gallery
 *
 * @package VW Event Planner 
 * @subpackage vw_event_planner
 * @since VW Event Planner 1.0
 */
?>
<?php 
  $vw_event_planner_archive_year  = get_the_time('Y'); 
  $vw_event_planner_archive_month = get_the_time('m'); 
  $vw_event_planner_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'vw_event_planner_toggle_postdate',true) != '' || get_theme_mod( 'vw_event_planner_toggle_author',true) != '' || get_theme_mod( 'vw_event_planner_toggle_comments',true) != '' || get_theme_mod( 'vw_event_planner_toggle_time',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('vw_event_planner_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_event_planner_archive_year, $vw_event_planner_archive_month, $vw_event_planner_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('vw_event_planner_toggle_author',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('vw_event_planner_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('vw_event_planner_toggle_comments',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('vw_event_planner_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-event-planner'), __('0 Comments', 'vw-event-planner'), __('% Comments', 'vw-event-planner') ); ?> </span>
          <?php } ?>

          <?php if(get_theme_mod('vw_event_planner_toggle_time',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('vw_event_planner_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
          <?php } ?>
          <hr>
        </div>      
      <?php } ?>      
      <div class="entry-content">
        <p>
          <?php $vw_event_planner_theme_lay = get_theme_mod( 'vw_event_planner_excerpt_settings','Excerpt');
          if($vw_event_planner_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($vw_event_planner_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_event_planner_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_event_planner_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_event_planner_excerpt_suffix',''));?></p>
            <?php }?>
          <?php }?>          
        </p>
      </div>
      <?php if( get_theme_mod('vw_event_planner_button_text','READ MORE') != ''){ ?>
        <div class="content-bttn">
          <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_event_planner_button_text',__('READ MORE','vw-event-planner')));?><i class="<?php echo esc_attr(get_theme_mod('vw_event_planner_blog_page_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_event_planner_button_text',__('READ MORE','vw-event-planner')));?></span></a>
        </div>
      <?php } ?>
    </div>
  </div>
</article>