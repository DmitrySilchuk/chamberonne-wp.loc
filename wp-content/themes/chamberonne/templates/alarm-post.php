<?php


/*
Template Name: Alarme post
Template Post Type: alarm
*/

get_header();
?>

    <main>
        <div class="banner mb"
             style="background-image: url('<?= get_field('alarmes_post_background')['url'] ?>')"></div>
        <section class="container">
            <div class="wrap">
                <div class="columns">
                    <div class="content">
                        <div class="title">
                            <h1><?= the_title() ?></h1>
                        </div>
                        <?php
                        $alarm_date = get_field('alarm_date');
                        $alarm_date = date_create($alarm_date);

                        $number = get_field('alarm_number');

                        $type_list = wp_get_post_terms(get_the_ID(), 'types', array('fields' => 'all'));
                        $types = array_column($type_list, 'name');
                        $type = implode(', ', $types);

                        $description = get_field('alarm_description');

                        $commune_list = wp_get_post_terms(get_the_ID(), 'commune', array('fields' => 'all'));
                        $communes = array_column($commune_list, 'name');
                        $commune = implode(', ', $communes);
                        ?>
                        <div class="point-desc">
                            <div class="info-list">
                                <div class="row">
                                    <strong>Numéro d’alarme:</strong>
                                    <span><?= $number ?></span>
                                </div>
                                <div class="row">
                                    <strong>Description:</strong>
                                    <span><?= $description ?></span>
                                </div>
                                <div class="row">
                                    <strong>Commune:</strong>
                                    <span><?= $commune ?></span>
                                </div>
                                <div class="row">
                                    <strong>Date:</strong>
                                    <span><?= date_format($alarm_date, 'l d F Y, H:i') ?></span>
                                </div>
                                <div class="row">
                                    <strong>Type:</strong>
                                    <span><?= $type ?></span>
                                </div>
                            </div>
                            <?php
                            $alarme_button = get_field('alarmes_button', 'option');
                            if (!empty($alarme_button)) { ?>
                                <a href="<?= $alarme_button ?>" class="btn">Toutes les alarmes</a>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <?php
                    get_sidebar('alarme') ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
