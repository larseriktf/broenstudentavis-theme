<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parent_style = 'twentytwenty-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'broen-style', get_stylesheet_directory_uri() .'/style/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
}

// enqueue custom scripts
function my_theme_enqueue_scripts() {
    // jquery
    wp_enqueue_script( 'jquery' );
    // anime.js
    wp_register_script( 'anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js', null, false, true );
    wp_enqueue_script( 'anime' );
    // logo-animation
    wp_enqueue_script( 'logo-animation', get_stylesheet_directory_uri() . '/js/logo-animation.js', null, false, true );
    // mail-animation
    wp_enqueue_script( 'mail-animation', get_stylesheet_directory_uri() . '/js/mail-animation.js', null, false, true );
    // menu-nav-button
    wp_enqueue_script( 'menu-nav-button', get_stylesheet_directory_uri() . '/js/menu-nav-button.js', null, false, true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );