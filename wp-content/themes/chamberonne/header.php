<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="theme-color" content="#fff"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

    <!--[if IE]>
    <script>
        document.createElement('header');
        document.createElement('nav');
        document.createElement('main');
        document.createElement('section');
        document.createElement('article');
        document.createElement('aside');
        document.createElement('footer');
    </script>
    <![endif]-->

</head>
<body <?php body_class(); ?>>

<?php
wp_body_open();
?>
<header class="header">
    <div class="info">
        <div class="wrap">
            <a href="mailto:contact@sdis-chamberonne.ch">contact@sdis-chamberonne.ch</a>
        </div>
    </div>
    <div class="wrap">
        <div class="flex">
            <a href="<?= home_url() ?>" class="logo">
                <img src="<?= get_field('logo')['url'] ?>" alt="">
            </a>
            <div class="action">
                <nav class="nav">
                    <?php
                    if( has_nav_menu( 'main_menu' ) ) {

                        wp_nav_menu( [
                            'menu_class'      => 'menu',
                            'theme_location'  => 'main_menu',
                            'container'       => false,
                        ] );
                    }
                    ?>
                    <!--                    <ul class="menu">-->
<!--                        <li class="item">-->
<!--                            <a href="" class="link">Présentation</a>-->
<!--                            <ul>-->
<!--                                <li><a href="formation.php">Sites</a></li>-->
<!--                                <li><a href="#">Organisation</a></li>-->
<!--                                <li><a href="formation.php">Missions</a></li>-->
<!--                                <li><a href="formation.php">Formation</a></li>-->
<!--                                <li><a href="vehicles.php">Véhicules</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="alarmes.php" class="link">Alarmes</a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="activities-drivers.php" class="link">Activités & divers</a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="#" class="link">Contact</a>-->
<!--                        </li>-->
<!--                    </ul>-->
                </nav>
<!--                <a href="connexion.php" class="connect">-->
<!--                    <i class="icon icon-profile"></i>-->
<!--                    <span>Connexion</span>-->
<!--                </a>-->
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="shadow"></div>
<div class="m-panel">
    <div class="content">
        <span class="close icon-signs"></span>
        <nav class="nav">
            <ul class="menu">
                <li class="item">
                    <a href="" class="link">Présentation</a>
                    <ul>
                        <li><a href="formation.php">Sites</a></li>
                        <li><a href="#">Organisation</a></li>
                        <li><a href="formation.php">Missions</a></li>
                        <li><a href="formation.php">Formation</a></li>
                        <li><a href="vehicles.php">Véhicules</a></li>
                    </ul>
                </li>
                <li class="item">
                    <a href="alarmes.php" class="link">Alarmes</a>
                </li>
                <li class="item">
                    <a href="activities-drivers.php" class="link">Activités & divers</a>
                </li>
                <li class="item">
                    <a href="#" class="link">Contact</a>
                </li>
            </ul>
        </nav>
        <a href="connexion.php" class="connect">
            <i class="icon icon-profile"></i>
            <span>Connexion</span>
        </a>
    </div>

</div>
