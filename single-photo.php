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
                    <a href="#" class="nav-link previous-photo" title="Photo précédente">
                        <!-- Flèche précédente -->
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left.png" alt="Retour">
                    </a>
                    <a href="#" class="nav-link next-photo" title="Photo suivante">
                        <!-- Flèche suivante -->
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow_right.png" alt="Suivante">
                    </a>
            
                    <div class="thumbnail-preview">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-14.jpeg" alt="Autres photos">
                    </div>
                </div>
            </div>
    </section>

    <section class="photos">
        <h2>Vous aimerez aussi</h2>
        <div class="photos_list">
                <div class="photo_item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-0.jpeg" alt="">
                    <div class="overlay">
                        <div class="full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/fullscreen.png" alt="Agrandir">
                        </div>
                        <div class="eye">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/eye.png" alt="Voir">
                        </div>
                        <div class="infos">
                            <div>sdhfkjhf</div>
                            <div>sdklffsl</div>
                        </div>
                    </div>
                </div>

                <div class="photo_item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-1.jpeg" alt="">
                    <div class="overlay">
                        <div class="full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/fullscreen.png" alt="Agrandir">
                        </div>
                        <div class="eye">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/eye.png" alt="Voir">
                        </div>
                        <div class="infos">
                            <div>sdhfkjhf</div>
                            <div>sdklffsl</div>
                        </div>
                    </div>
                </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>