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

//support themes images
add_theme_support('post-thumbnails');

add_filter('template_include', function($template) {
    if (is_front_page() || is_home()) {
        $front_page_template = get_template_directory() . '/front-page.php';
        if (file_exists($front_page_template)) {
            return $front_page_template;
        }
    }
    return $template;
});
function register_ajax_scripts() {
    wp_enqueue_script('filter-script', get_template_directory_uri() . '/js/filter.js', array(), '1.0', true);
    wp_localize_script('filter-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('filter_photos_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'register_ajax_scripts');




// Fonction de traitement AJAX
function filter_photos_handler() {
    check_ajax_referer('filter_photos_nonce', 'nonce');

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => 'title'
    );

    // Filtrer par catégorie
    if (!empty($_POST['categorie'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => sanitize_text_field($_POST['categorie'])
        );
    }

    // Filtrer par format
    if (!empty($_POST['format'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => sanitize_text_field($_POST['format'])
        );
    }

    // Trier
    if (!empty($_POST['trier'])) {
        $args['order'] = sanitize_text_field($_POST['trier']);
    }

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>

            <?php get_template_part('templates-part/photos'); ?>
            
        <?php }
    }
    wp_reset_postdata();
    
    $html = ob_get_clean();
    echo $html;
    die();
}

add_action('wp_ajax_filter_photos', 'filter_photos_handler');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos_handler');