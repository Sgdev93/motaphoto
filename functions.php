<?php

// Enregistrer des menus
function register_my_menus() {
    register_nav_menus(
        array(
            'header' => __('Header'),
            'footer' => __('Footer')
        )
    );
}
add_action('init', 'register_my_menus');

// Charger JS et CSS
function register_assets() {
    // Déclarer le JS
    wp_enqueue_script(
        'custom-script', // Ajoutez un identifiant unique pour le script
        get_template_directory_uri() . '/js/script.js', // Chemin correct
        array(),
        '1.0',
        true
    );

    // Déclarer le fichier style.css à la racine du thème
    wp_enqueue_style(
        'theme-style', // Ajoutez un identifiant unique pour le style
        get_stylesheet_uri(), // Chemin correct pour le fichier style.css
        array(),
        '1.0'
    );

    // Déclarer le fichier CSS à un autre emplacement (si nécessaire)
    wp_enqueue_style(
        'custom-style', // Identifiant unique pour le deuxième fichier CSS
        get_template_directory_uri() . '/css/style.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'register_assets');
