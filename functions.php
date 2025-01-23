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

// function enqueue_select2_assets() {
//     wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css');
//     wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '', true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_select2_assets');

function enqueue_choices_assets() {
    // Enqueue Choices.js CSS
    wp_enqueue_style(
        'choices-css',
        'https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css',
        array(),
        '10.1.0' // Version actuelle de Choices.js (à modifier si mise à jour)
    );

    // Enqueue Choices.js JavaScript
    wp_enqueue_script(
        'choices-js',
        'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js',
        array('jquery'), // Dépendance à jQuery
        '10.1.0',        // Version actuelle de Choices.js
        true             // Charge le script dans le footer
    );

    // Ajouter un script personnalisé pour initialiser Choices.js
    wp_add_inline_script(
        'choices-js',
        "
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.myform');
            elements.forEach(function(element) {
                new Choices(element, {
                    silent: false, // Supprime les messages d'accessibilité
                    searchEnabled: false,
                    itemSelectText: '', 
                });
            });
        });
        "
    );
}
add_action('wp_enqueue_scripts', 'enqueue_choices_assets');

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

    if (!empty($_POST['page'])) {
        $pagePhoto = $_POST['page'];
    } else {
        $pagePhoto = 1;
    }

    $photosPerPage = 8;
    $photosNumber = $pagePhoto * $photosPerPage; 


    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => $photosNumber,
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
    $response = array(
        'html' => $html,
        'found_posts' => $photosNumber, // posts affiches
        'max_posts' => $query->found_posts, // Nombre total de posts (si nécessaire)
    );
    
    // Envoyer la réponse au format JSON
    wp_send_json($response);
    die();
}

add_action('wp_ajax_filter_photos', 'filter_photos_handler');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos_handler');

function enqueue_fancybox() {
    // CSS Fancybox
    wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css');
    
    // JavaScript Fancybox
    wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), null, true);
    
    // Votre script personnalisé
    wp_enqueue_script('fancybox-init', get_template_directory_uri() . '/js/fancybox-init.js', array('fancybox-js'), '1.0', true);
    
    // CSS personnalisé
    wp_add_inline_style('fancybox-css', '
        .fancybox__container {
            --fancybox-bg: rgba(0, 0, 0, 0.85);
        }
        
        .fancybox__toolbar {
            --fancybox-color: #fff;
        }
        
        .photo-reference {
            color: #fff;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }
        
        .photo-category {
            color: #fff;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
        
        .carousel__button.is-prev,
        .carousel__button.is-next {
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }
        
        .carousel__button.is-prev::after {
            content: "précédente";
            margin-left: 10px;
        }
        
        .carousel__button.is-next::before {
            content: "suivante";
            margin-right: 10px;
        }
    ');
}
add_action('wp_enqueue_scripts', 'enqueue_fancybox');



function custom_select2_css() {
    ?>
    <style type="text/css">
        /* Mettre en majuscule le texte de l'option sélectionnée */
        .select2-selection__rendered {
            text-transform: uppercase;
        }

        /* Couleur de fond au survol */
        .select2-results__option:hover {
            background-color: red !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'custom_select2_css');
