<?php
use Understrap_Child as U;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 


// Include the autoloader so we can dynamically include the rest of the classes.
require_once(  get_stylesheet_directory(). '/inc/autoloader.php');


// Theme Initiation
add_action( 'init', function() {
    $theme_class = new U\theme_init();
} );


?>