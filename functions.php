<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'twentytwenty-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'broen-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
}


function my_theme_enqueue_scripts() {
    // disabled menu scroll script for now
    // wp_enqueue_script( 'menu-scroll', get_stylesheet_directory_uri() . '/js/menu-scroll.js', false, '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );