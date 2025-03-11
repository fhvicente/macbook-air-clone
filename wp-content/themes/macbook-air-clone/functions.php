<?php

// Add support to page title and register nav menus
function macbook_air_clone_theme_setup() {
    add_theme_support('title-tag');

    // Register Navgation menus
    register_nav_menus(array(
        'main_menu' => esc_html__('Main Menu', 'macbook_air_clone'),
    ));

}
add_action('after_setup_theme', 'macbook_air_clone_theme_setup');

// Compatibility to old Wordpress verions
if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        do_action('wp_body_open');
    }
}

// Enqueue scripts and css
function macbook_air_clone_scripts() {
    // Enqueue styles
    wp_enqueue_style('macbook-air-style', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0', 'all');
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.0', 'all');
    
    // AOS Animation Library
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4', 'all');
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), '2.3.4', true);
    
    // Enqueue custom JavaScript
    wp_enqueue_script('macbook-air-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('macbook-air-animations', get_template_directory_uri() . '/assets/js/animations.js', array('aos-js'), '1.0.0', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'macbook_air_clone_scripts');

?>