<?php
  function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

  //Disable emojis in WordPress
  add_action( 'init', 'smartwp_disable_emojis' );

  function smartwp_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  }

  function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }

  function wp_post_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 ); // assuming an average reading speed of 200 words per minute

    return $reading_time . ' min';
  }

  function register_custom_widget_area_content_top() {
    register_sidebar(
    array(
      'id' => 'content-widget-area-top',
      'name' => esc_html__( 'Content widget area top', 'theme-domain' ),
      'description' => esc_html__( 'A widget area inside the content area (at the very top)', 'theme-domain' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
      )
    );
  }

  function register_custom_widget_area_content_bottom() {
    register_sidebar(
    array(
      'id' => 'content-widget-area-bottom',
      'name' => esc_html__( 'Content widget area bottom', 'theme-domain' ),
      'description' => esc_html__( 'A widget area inside the content area (at the very bottom)', 'theme-domain' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
      )
    );
  }

  add_action( 'widgets_init', 'register_custom_widget_area_content_top' );
  add_action( 'widgets_init', 'register_custom_widget_area_content_bottom' );

?>
