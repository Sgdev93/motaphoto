<div class="photo_item">
    <?php the_post_thumbnail('large') ?>
    <div class="overlay">
        <div class="full">
            <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>"
                data-fancybox="gallery"
                data-reference="<?php echo get_field('reference'); ?>"
                data-category="<?php
                                $categories = get_the_terms(get_the_ID(), 'categorie');
                                if ($categories && !is_wp_error($categories)) {
                                    echo esc_attr($categories[0]->name);
                                }
                                ?>">
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
            $categories = get_the_terms(get_the_ID(), 'categorie');
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    echo "<div>" . esc_html($category->name) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>