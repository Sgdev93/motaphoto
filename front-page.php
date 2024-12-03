<?php get_header(); ?>


<!-- Bannière -->
<section class="banner">
    <img src="<?php echo get_template_directory_uri(); ?>/img/dechets_verts-1200x630.jpg" alt="">
    <h1>Photographe Event</h1>
</section>

<section class="photos">
    <div class="filtres">
        <form action="#">
            <div class="filtres1">
                <select name="categorie" id="categorie" class="myform">
                    <option value="">Catégories</option>
                    <option value="">Mariage</option>
                    <option value="">Détente</option>
                </select>

                <select name="format" id="format" class="myform">
                    <option value="">Format</option>
                    <option value="">Mariage</option>
                    <option value="">Détente</option>
                </select>
            </div>

            <div class="filtres2">
                <select name="trier" id="trier" class="myform">
                    <option value="">Trier par</option>
                    <option value="">Mariage</option>
                    <option value="">Détente</option>
                </select>
            </div>
        </form>
    </div>
    <div class="photos_list">
            <div class="photo_item">
                <img src="<?php echo get_template_directory_uri(); ?>/img/dechets_verts-1200x630.jpg" alt="">
                <div class="overlay">
                    <div class="full">O</div>
                    <div class="eye">+</div>
                    <div class="infos">
                        <div>sdhfkjhf</div>
                        <div>sdklffsl</div>
                    </div>
                </div>
            </div>

            <div class="photo_item">
                <img src="<?php echo get_template_directory_uri(); ?>/img/dechets_verts-1200x630.jpg" alt="">
                <div class="overlay">
                    <div class="full">O</div>
                    <div class="eye">+</div>
                    <div class="infos">
                        <div>sdhfkjhf</div>
                        <div>sdklffsl</div>
                    </div>
                </div>
            </div>


    </div>
</section>

<?php get_footer(); ?>