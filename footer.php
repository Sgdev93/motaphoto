<?php get_template_part('templates-part/modale'); ?>

<footer>
     <div class="footer-menu">
     <?php 
            wp_nav_menu( 
                 array( 
                    'theme_location' => 'footer',
                   'container'      => '',
                 ) 
             ); 
        ?>
     </div>
     <div class="footer-credits">
          <p>Tous droits réservés</p>
          </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>