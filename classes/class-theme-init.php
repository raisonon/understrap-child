<?php
namespace Understrap_Child;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



 class theme_init {

    public function __construct() {

         // load scripts
         $this->scripts();

    }

    

    /**
     * Loads the underscores default scripts
     *
     * @return void
     */
    public function scripts() {
            
        add_action( 'wp_enqueue_scripts', array( $this, 'understrap_remove_scripts' ), 20 );
        add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_styles' ));
        add_action( 'after_setup_theme', array( $this, 'add_child_theme_textdomain') );

    }

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
    function understrap_remove_scripts() {
        wp_dequeue_style( 'understrap-styles' );
        wp_deregister_style( 'understrap-styles' );

        wp_dequeue_script( 'understrap-scripts' );
        wp_deregister_script( 'understrap-scripts' );

    }

    function add_child_theme_textdomain() {
        load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
    }

    function theme_enqueue_styles() {

        if (true == WP_DEBUG) {
            $theme_ver = filemtime(get_stylesheet_directory() . '/css/child-theme.min.css');
        } else{ 
            $the_theme = wp_get_theme();
            $theme_ver = $the_theme->get( 'Version' );
        }

        // Get the theme data
        wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $theme_ver );
        wp_enqueue_script( 'jquery');
        wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
        wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $theme_ver, true );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        
    }



}

?>