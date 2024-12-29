<?php get_header(); ?>

<!-- 
    Descriptif des balises
  <?php the_title(); // le titre de la page ?>
  <?php the_content(); // le contenu de la page ?>
  <?php the_field('type'); // le champ personnalisé (custom field) type ?>
  <?php the_post_thumbnail('large'); // balise image du post avec la taille Large ?>
 -->

 <!-- Contenu principal -->
<main class="detail-photo">
    <section class="photo-content">
    <!-- Bloc principal divisé en deux parties -->
        <div class="content-wrapper">
            <!-- Bloc de gauche : Infos sur la photo -->
            <div class="photo-infos">
                <h2 class="photo-title"><?php the_title(); ?></h2>
                <ul class="photo-details">
                    <li>Référence : <?php the_field('reference'); ?></li>
                    <?php $categories = get_the_terms(get_the_ID(), 'categorie');  ?>
                    <li>Catégorie : 
                    <?php
                    if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                    echo esc_html($category->name);
                    }
                    } 
                    ?> 
                    </li>
                    <?php $formats = get_the_terms(get_the_ID(), 'format');  ?>
                    <li>Format : 
                    <?php
                    if (!empty($formats) && !is_wp_error($formats)) {
                        foreach ($formats as $format) {
                            echo esc_html($format->name);
                        }
                    } 
                    ?> 
                    </li>
                    <li>Type : <?php the_field('type'); ?></li>
                    <li>Année : <?php the_field('annee'); ?></li>
                 </ul>
            </div>

            <!-- Bloc de droite : Photo en format natif -->
            <div class="photo-display">
                <img src="<?php the_post_thumbnail('large'); ?>">
            </div>
        </div>
            <!-- Bloc d'interactions de 118px de hauteur -->
            <div class="interactions">

                <!-- Lien de contact à gauche -->
                <div class="contact-link">
                <p>Cette photo vous intéresse ?</p>
                    <div class="bouton-contact">
                     <a href="#">Contact</a>
                    </div>
                </div>

                <!-- Liens de navigation à droite -->
                <div class="navigation-container">

                <!-- Liens de navigation sous la miniature -->
                <div class="navigation-links">
                    <div class="thumbnail-preview">
                    <?php
                        // Récupérer l'ID du post précédent
                        $prev_post = get_previous_post();
                        if ($prev_post) {
                            $prev_thumbnail = get_the_post_thumbnail($prev_post->ID, 'thumbnail');
                            $prev_link = get_permalink($prev_post->ID);
                            echo '<a href="' . esc_url($prev_link) . '" class="nav-link previous-thumbnail">' . $prev_thumbnail . '</a>';
                        } 

                        // Récupérer l'ID du post suivant
                        $next_post = get_next_post();
                        if ($next_post) {
                            $next_thumbnail = get_the_post_thumbnail($next_post->ID, 'thumbnail');
                            $next_link = get_permalink($next_post->ID);
                            echo '<a href="' . esc_url($next_link) . '" class="nav-link next-thumbnail">' . $next_thumbnail . '</a>';
                        } 
                        ?>
                    </div>
                    <div class="arrows">
                        <a href="#" class="nav-link previous-photo" title="Photo précédente">
                        <!-- Flèche précédente -->
                             <img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left.png" alt="Retour">
                        </a>
                        <a href="#" class="nav-link next-photo" title="Photo suivante">
                        <!-- Flèche suivante -->
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow_right.png" alt="Suivante">
                        </a>
                    </div>
                </div>
            </div>
    </section>

    <section class="photos">
    <?php

$current_photo_id = get_the_ID();
$terms = wp_get_post_terms($current_photo_id, 'categorie');
if (!is_wp_error($terms) && !empty($terms)) {
    $categorie_slug = $terms[0]->slug;
}

$args = array(
    'post_type'      => 'photo',        // Récupérer les photos
    'posts_per_page' => 2,             // toutes
    'orderby'        => 'title',       // Trier aléatoirement
    'post__not_in' => array($current_photo_id),  // exlure mon id
    'tax_query'      => array(
        array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $categorie_slug,
            'operator' => 'IN',
        ),
    ),
);
$query = new WP_Query($args);


if ($query->have_posts()) { ?>
    <h2>Vous aimerez aussi</h2>
    <div class="photos_list">

        <?php
        while ($query->have_posts()) {
            $query->the_post();  ?>
            <a class="photo_item" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large') ?>
                <div class="overlay">
                    <div class="full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/fullscreen.png" alt="Agrandir">
                    </div>
                    <div class="eye">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/eye.png" alt="Voir">
                    </div>
                    <div class="infos">
                        <div><?php the_title() ?></div>
                        <?php $categories = get_the_terms(get_the_ID(), 'categorie');  ?>
                        <?php
                        if (!empty($categories) && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                echo "<div>" . esc_html($category->name) . "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </a>
    <?php
        }
        wp_reset_postdata(); // Réinitialiser la requête globale
    }
    ?>
    </div>

    </section>
</main>

<?php get_footer(); ?>