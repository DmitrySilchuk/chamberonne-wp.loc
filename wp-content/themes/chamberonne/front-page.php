<?php


/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

    <div class="wrapper">
        <main>
            <?php
            $slider = get_field('slider');
            if (!empty($slider)) { ?>
                <section class="section-main">
                    <div class="slider-main">
                        <div class="swiper-container big-sl">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($slider as $slide) { ?>
                                    <div class="swiper-slide">
                                        <div class="wrap">
                                            <div class="info">
                                                <div class="title">
                                                    <h1><?= $slide['text_header'] ?></h1>
                                                </div>
                                                <div class="editor">
                                                    <p><?= $slide['description'] ?></p>
                                                </div>
                                                <div class="action flex">
                                                    <a href="<?= $slide['button']['url'] ?>" target="<?= $slide['button']['target'] ?>" class="btn"><?= $slide['button']['title'] ?></a>
                                                    <div class="sl-btn">
                                                        <div class="big-sl-prev swiper-button-prev swiper-button-black"></div>
                                                        <div class="big-sl-next swiper-button-next swiper-button-black"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img" style="background-image: url(<?= $slide['image']['url'] ?>)"></div>
                                    </div>
                                    <?php
                                } ?>
                            </div>
                            <div class="big-sl-pagination swiper-pagination"></div>
                        </div>
                    </div>
                </section>
                <?php
            } ?>
            <section class="main-info">
                <div class="wrap">
                    <div class="columns">
                        <?php
                        $body_content_field = get_field('body_content_field');
                        if (!empty($body_content_field)) {?>
                            <div class="content">
                                <div class="block-main">
                                    <div class="title">
                                        <h2><?= $body_content_field['header_body']; ?></h2>
                                    </div>
                                    <div class="editor mb-15">
                                        <p><?= $body_content_field['description_body']; ?></p>
                                    </div>
                                    <a href="<?= $body_content_field['button_body']['url']; ?>" target="<?= $body_content_field['button_body']['target']; ?>" class="btn"><?= $body_content_field['button_body']['title']; ?></a>
                                </div>
                            </div>
                            <?php
                        } ?>
                        <aside class="aside">
                            <div class="cont">
                                <div class="info">
                                    <div class="title">
                                        <h4>Prochaines activités</h4>
                                    </div>
                                    <div class="list-alarms">
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">13.02.20</span>
                                            <span class="text">APR G.1</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">12.02.20</span>
                                            <span class="text">CCF 1</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">11.02.20</span>
                                            <span class="text">SAN E.1</span>
                                        </div>
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">10.02.20</span>
                                            <span class="text">DPS 1.1</span>
                                        </div>
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">10.02.20</span>
                                            <span class="text">DPS 1.1</span>
                                        </div>
                                    </div>
                                    <div class="block-btn">
                                        <a href="" class="btn">Toutes les activités</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="info">
                                    <div class="title">
                                        <h4>Dernières alarmes</h4>
                                    </div>
                                    <div class="list-alarms">
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">29.01.20</span>
                                            <span class="text">Sauvetage 008</span>
                                        </div>
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">21.01.20</span>
                                            <span class="text">Alarme automatique 007</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">06.01.20</span>
                                            <span class="text">Feu 006</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">31.12.19</span>
                                            <span class="text">Inondation 005</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">29.12.19</span>
                                            <span class="text">Prévention feu 004</span>
                                        </div>
                                    </div>
                                    <div class="block-btn">
                                        <a href="" class="btn">Toutes les activités</a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </main>
    </div>

<?php
get_footer();


