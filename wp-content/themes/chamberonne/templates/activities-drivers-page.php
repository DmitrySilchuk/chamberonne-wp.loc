<?php


/*
Template Name: Activites-divers page
Template Post Type: page
*/

get_header();
?>

    <div class="wrapper">
    <main>
        <div class="banner mb" style="background-image: url('<?= get_field('activites_divers_background')['url'] ?>')"></div>
        <section class="container">
            <div class="wrap">
                <div class="columns">
                    <div class="content">
                        <div class="title">
                            <h1><?= the_title() ?></h1>
                        </div>
                        <div class="block-tabs">
                            <div class="links-tab cart-tabs">
                                <a href="#cart-tabs_01" class="link btn active"><?= get_field('first_tab_btn') ?></a>
                                <a href="#cart-tabs_02" class="link btn"><?= get_field('second_tab_btn') ?></a>
                            </div>
                            <?php
                            $activities = get_posts(array(
                                'post_type' => 'activity',
                                'posts_per_page' => -1,
                                'meta_key' => 'activity_diver_date',
                                'meta_query' => array(
                                    array(
                                        'key' => 'activity_diver_date',
                                        'value' => date('Y-01-00 00:00:00'),
                                        'compare' => '>'
                                    )
                                ),
                                'orderby' => 'meta_value',
                                'order' => 'ASC'
                            )); ?>
                            <div class="table-list wrap-tabs">
                                <?php
                                if (!empty($activities)) { ?>
                                    <div class="block-list cart-tabs__item cart-tabs__item--active" id="cart-tabs_01">
                                        <?php
                                        $previous_month = '';
                                        foreach ($activities as $key => $activity) {
                                            $number = get_field('activity_diver_number_alarm', $activity->ID);

                                            $activity_date = get_field('activity_diver_date', $activity->ID);
                                            $activity_date = date_create($activity_date);
                                            $description = get_field('activity_diver_description', $activity->ID);

                                            $commune_list = wp_get_post_terms($activity->ID, 'commune', array('fields' => 'all'));
                                            $communes = array_column($commune_list, 'name');
                                            $commune = implode(', ', $communes);

                                            $type_list = wp_get_post_terms($activity->ID, 'types', array('fields' => 'all'));
                                            $types = array_column($type_list, 'name');
                                            $type = implode(', ', $types);

                                            $has_picture_icon = '';
                                            if (has_post_thumbnail($activity)) {
                                                $has_picture_icon = '<i class="icon icon-picture"></i>';
                                            }
                                            $current_month = date_format($activity_date, 'F');
                                            if ($current_month != $previous_month) {
                                                $previous_month = $current_month;
                                                if ($key != 0) {
                                                    echo '</div>'; // .block-list
                                                } ?>
                                                <div class="title"><h2><?= $previous_month ?></h2></div>
                                                <div class="block-list">
                                                <?php
                                            } ?>
                                            <a href="<?php the_permalink($activity->ID); ?>" class="row">
                                                <span class="number"><?= $number ?></span>
                                                <span class="month"><?= $type ?></span>
                                                <span class="desc"><?= $description ?></span>
                                                <span class="country"><?= $commune ?></span>
                                                <span class="city"><?= date_format($activity_date, 'l') ?></span>
                                                <span class="date"><?= date_format($activity_date, 'd.m') ?></span>
                                                <span class="time"><?= date_format($activity_date, 'H:i') ?></span>
                                                <?= $has_picture_icon ?>
                                            </a>
                                            <?php
                                        } ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $divers = get_posts(array(
                                    'post_type' => 'divers',
                                    'posts_per_page' => -1,
                                    'meta_key' => 'activity_diver_date',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'activity_diver_date',
                                            'value' => date('Y-01-00 00:00:00'),
                                            'compare' => '>'
                                        )
                                    ),
                                    'orderby' => 'meta_value',
                                    'order' => 'ASC'
                                ));

                                if (!empty($divers)) { ?>
                                    <div class="block-list cart-tabs__item" id="cart-tabs_02" style="display: none;">
                                        <?php
                                        foreach ($divers as $key => $diver) {
                                            $number = get_field('activity_diver_number_alarm', $diver->ID);

                                            $diver_date = get_field('activity_diver_date', $diver->ID);
                                            $diver_date = date_create($diver_date);
                                            $description = get_field('activity_diver_description', $diver->ID);

                                            $commune_list = wp_get_post_terms($diver->ID, 'commune', array('fields' => 'all'));
                                            $communes = array_column($commune_list, 'name');
                                            $commune = implode(', ', $communes);

                                            $type_list = wp_get_post_terms($diver->ID, 'types', array('fields' => 'all'));
                                            $types = array_column($type_list, 'name');
                                            $type = implode(', ', $types);

                                            $has_picture_icon = '';
                                            if (has_post_thumbnail($diver)) {
                                                $has_picture_icon = '<i class="icon icon-picture"></i>';
                                            }
                                            $current_month = date_format($diver_date, 'F');
                                            if ($current_month != $previous_month) {
                                                $previous_month = $current_month;
                                                if ($key != 0) {
                                                    echo '</div>'; // .block-list
                                                } ?>
                                                <div class="title"><h2><?= $previous_month ?></h2></div>
                                                <div class="block-list">
                                                <?php
                                            } ?>
                                            <a href="<?php the_permalink($diver->ID); ?>" class="row">
                                                <span class="number"><?= $number ?></span>
                                                <span class="month"><?= $type ?></span>
                                                <span class="desc"><?= $description ?></span>
                                                <span class="country"><?= $commune ?></span>
                                                <span class="city"><?= date_format($diver_date, 'l') ?></span>
                                                <span class="date"><?= date_format($diver_date, 'd.m') ?></span>
                                                <span class="time"><?= date_format($diver_date, 'H:i') ?></span>
                                                <?= $has_picture_icon ?>
                                            </a>
                                            <?php
                                        } ?>
                                        </div>
                                    </div>
                                    <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    get_sidebar('activities-divers') ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();



