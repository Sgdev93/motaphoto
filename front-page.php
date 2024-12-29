<?php get_header(); ?>

<main>
<!-- Bannière -->
<section class="banner">
<?php
// Créer une nouvelle requête personnalisée
$args = array(
    'post_type'      => 'photo',       // Récupérer les articles (post)
    'posts_per_page' => 1,           // Limiter à un seul résultat
    'orderby'        => 'rand',      // Trier aléatoirement
); 

$query = new WP_Query($args);


if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();  ?>

<?php the_post_thumbnail('full'); ?>
<?php
    }
    wp_reset_postdata(); // Réinitialiser la requête globale
}
?>
    <h1>Photographe Event</h1>
</section>

<section class="photos">
    <div class="filtres">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="select-filtres" >
            <div class="filtres1">
                <select name="categorie" id="categorie" class="myform">
                    <option value="">Catégories</option>
                    <?php $categories = get_terms('categorie');  ?>
                <?php
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        echo "<option value='".esc_html($category->slug)."'>".esc_html($category->name)."</option>";
                    }
                } 
                ?> 
                </select>

                <select name="format" id="format" class="myform">
                    <option value="">Format</option>
                    <?php $formats = get_terms('format');  ?>
                <?php
                if (!empty($formats) && !is_wp_error($format)) {
                    foreach ($formats as $format) {
                        echo "<option value='".esc_html($format->slug)."'>".esc_html($format->name)."</option>";
                    }
                } 
                ?> 
                </select>
            </div>

            <div class="filtres2">
                <select name="trier" id="trier" class="myform">
                    <option value="">Trier par</option>
                    <option value="DESC">Du + récent au + ancien</option>
                    <option value="ASC">Du + ancien au + récent</option>
                </select>
            </div>
        </form>
    </div>

    <div class="photos_list">
         <!-- résultats AJAX -->
    
    </div>

    <div class="load-more">
    <button class="load-more-button">Charger plus</button>
    </div>
</section>
</main>
<?php get_footer(); ?>