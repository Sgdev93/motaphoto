<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
<header>
    <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
    </div>
    <nav>
        <ul>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Menu</a></li>
        </ul>
    <?php 
            // wp_nav_menu( 
            //     array( 
            //         'theme_location' => 'header',
            //         'container'      => '',
            //     ) 
            // ); 
        ?>
    </nav>
</header>