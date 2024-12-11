<?php get_header(); ?>

 <!-- Contenu principal -->
<main>
 <section class="photo-content">

<!-- Bloc principal divisé en deux parties -->
<div class="content-wrapper">

    <!-- Bloc de gauche : Infos sur la photo -->
    <div class="photo-infos">
        <h2 class="photo-title">Titre</h2>
        <ul class="photo-details">
            <li>Référence</li>
            <li>Catégorie</li>
            <li>Format</li>
            <li>Type</li>
            <li>Année</li>
        </ul>
    </div>

    <!-- Bloc de droite : Photo en format natif -->
    <div class="photo-display">
        <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-15.jpeg" alt="Photo en haute résolution">
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