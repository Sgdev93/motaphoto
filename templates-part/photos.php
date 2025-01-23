<div class="photo_item">
<?php $categories = get_the_terms(get_the_ID(), 'categorie'); ?>
    <?php the_post_thumbnail('large') ?>
    <div class="overlay">
        <div class="full">
            <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>"
                data-fancybox="gallery"
                data-caption="<div class='lightboxcaption'><p><?php the_field('reference') ?></p><p><?php foreach ($categories as $category) {  echo $category->name; } ?></p></div>"
                >
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/fullscreen.png" alt="Agrandir">
            </a>
        </div>
        <div class="eye">
            <a href="<?php the_permalink() ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/eye.png" alt="Voir">
            </a>
        </div>
        <div class="infos">
            <div><?php the_title() ?></div>
            <?php
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    echo "<div>" . esc_html($category->name) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
