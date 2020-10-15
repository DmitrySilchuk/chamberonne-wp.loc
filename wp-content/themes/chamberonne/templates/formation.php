<?php


/*
Template Name: Formation page
Template Post Type: page
*/

get_header();
?>

    <main>
        <div class="banner" style="background-image: url('<?= get_field('formation_page_background')['url'] ?>')"></div>
        <section class="container ">
            <div class="wrap">
                <section class="section-text single-text">
                    <div class="title">
                        <h1><?= get_field('formation_page_body_title') ?></h1>
                    </div>
                    <div class="editor">
                        <?= get_field('formation_page_body_description') ?>
                    </div>
                </section>
            </div>
        </section>
        <div class="banner-parallax" style="background-image: url('<?= get_field('formation_page_parallax_background')['url'] ?>')"></div>
        <section class="container">
            <div class="wrap">
                <div class="section-text twin-text flex">
                    <?php $info_blocks = get_field('formation_page_information_block');
                    foreach ($info_blocks as $info_block) { ?>
                            <div class="item-text">
                                <div class="title">
                                    <h1><?= $info_block['information_block_title'] ?></h1>
                                </div>
                                <div class="editor">
                                    <p><?= $info_block['information_block_description'] ?></p>
                                </div>
                            </div>
                        <?php
                    }?>
                </div>
            </div>
        </section>

        <section class="regulation-documents">
            <div class="wrap">
                <div class="title">
                    <h4>Règlements et Documents</h4>
                </div>
                <div class="block-btn flex">
                    <a href="" class="btn">Connaissance de base</a>
                    <a href="" class="btn">Compléments cantonaux</a>
                    <a href="" class="btn">Conduite d’intervention</a>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();