<?php get_header(); ?>


<!-- Bannière -->
<section class="banner">
    <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-11.jpeg" alt="">
    <h1>Photographe Event</h1>
</section>

<section class="photos">
    <div class="filtres">
        <form action="#">
            <div class="filtres1">
                <select name="categorie" id="categorie" class="myform">
                    <option value="">Catégories</option>
                    <option value="">Réception</option>
                    <option value="">Télévision</option>
                    <option value="">Concert</option>
                    <option value="">Mariage</option>
                </select>

                <select name="format" id="format" class="myform">
                    <option value="">Format</option>
                    <option value="">Paysage</option>
                    <option value="">Portrait</option>
                </select>
            </div>

            <div class="filtres2">
                <select name="trier" id="trier" class="myform">
                    <option value="">Trier par</option>
                    <option value="">Du + récent au + ancien</option>
                    <option value="">Du + ancien au + récent</option>
                </select>
            </div>
        </form>
    </div>
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

    <div class="load-more">
    <button class="load-more-button">Charger plus</button>
    </div>
</section>

<?php get_footer(); ?>