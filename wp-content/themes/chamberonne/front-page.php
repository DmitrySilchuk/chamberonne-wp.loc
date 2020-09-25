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
                                                    <a href="<?= $slide['button']['url'] ?>"
                                                       target="<?= $slide['button']['target'] ?>"
                                                       class="btn">
                                                       <?= $slide['button']['title'] ?>
                                                    </a>
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
                                    <a href="<?= $body_content_field['button_body']['url']; ?>"
                                       target="<?= $body_content_field['button_body']['target']; ?>"
                                       class="btn">
                                       <?= $body_content_field['button_body']['title']; ?>
                                    </a>
                                </div>
                            </div>
                            <?php
                        } ?>
                        <?php
                        get_sidebar('home')?>

                    </div>
                </div>
            </section>
        </main>

<?php
get_footer();


