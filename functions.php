<?php

/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'slug-theme_setup' ) ) {

	function tlt_setup() {

        // Enable title in header
		add_theme_support( "title-tag" );

		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// Enable featured image
		add_theme_support( 'post-thumbnails' );

		// Thumbnail sizes
		add_image_size( 'tlt_single', 800, 999, false );
		add_image_size( 'tlt_big', 1400, 928, true ); 	//(cropped)

		// Custom menu areas
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'slug-theme' )
		) );

		// Load theme languages
		load_theme_textdomain( 'tlt', get_template_directory().'/languages' );

	}

}
add_action( 'after_setup_theme', 'tlt_setup' );

/*  Enqueue css
/* ------------------------------------ */
if ( ! function_exists( 'tlt_styles' ) ) {
	function tlt_styles() {

        wp_enqueue_style( 'tlt-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
        // wp_enqueue_style( 'tlt-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800&display=swap');
        //wp_enqueue_style( 'tlt-font', get_template_directory_uri().'/fonts/Montserrat', array(), '5.8.1');
        // wp_enqueue_style( 'tlt-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'tlt-fontawesome', get_template_directory_uri().'/fontawesome/css/all.min.css');
        wp_enqueue_style( 'tlt-style', get_template_directory_uri().'/style.css');
		wp_enqueue_style( 'tlt-tetris-style', get_template_directory_uri().'/style-tetris.css');
		wp_enqueue_style( 'tlt-hamburger-manu', get_template_directory_uri().'/hamburger.css');

	}
}
add_action( 'wp_enqueue_scripts', 'tlt_styles' );

/*  Enqueue javascript
/* ------------------------------------ */
if ( ! function_exists( 'tlt_scripts' ) ) {
	function tlt_scripts() {

		wp_enqueue_script( 'tlt-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }

	}
}
add_action( 'wp_enqueue_scripts', 'tlt_scripts' );

/*  Register sidebars
/* ------------------------------------ */
if ( ! function_exists( 'tlt_sidebars' ) ) {

	function tlt_sidebars()	{
		register_sidebar(array( 'name' => esc_html__( 'Primary', 'tlt' ),'id' => 'primary','description' => esc_html__( 'Normal full width sidebar.', 'tlt' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}

}
add_action( 'widgets_init', 'tlt_sidebars' );

function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



