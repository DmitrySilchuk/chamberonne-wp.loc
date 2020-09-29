<?php


/*
Template Name: Alarmes page
Template Post Type: page
*/

get_header();
?>

        <main>
            <div class="banner mb" style="background-image: url('<?= get_field('alarmes_background')['url'] ?>')"></div>
            <section class="container">
                <div class="wrap">
                    <div class="columns">
                        <div class="content">
                            <div class="title">
                                <h1><?= the_title() ?></h1>
                            </div>
                            <?php
                            $year = 'Y';
                            if (!empty($alarm_year) && is_numeric($alarm_year)){
                                $year = $alarm_year;
                            }
                            $alarms = get_posts(array(
                                'post_type' => 'alarm',
                                'posts_per_page' => -1,
                                'meta_key' => 'alarm_date',
                                'meta_query' => array(
                                    array(
                                        'key' => 'alarm_date',
                                        'value' => date($year . '-01-00 00:00:00'),
                                        'compare' => '>'
                                    ),
                                    array(
                                        'key' => 'alarm_date',
                                        'value' => date($year . '-12-31 23:59:59'),
                                        'compare' => '<='
                                    )
                                ),
                                'orderby' => 'meta_value',
                                'order' => 'ASC'
                            ));

                            if (!empty($alarms)) { ?>

                                <div class="table-list">
                                    <?php
                                    $previous_month = '';
                                    foreach ($alarms as $key => $alarm) {
                                        $alarm_date = get_field('alarm_date', $alarm->ID );
                                        $alarm_date = date_create($alarm_date);

                                        $number = get_field('alarm_number', $alarm->ID );

                                        $type_list = wp_get_post_terms($alarm->ID, 'types', array('fields' => 'all'));
                                        $types = array_column($type_list, 'name');
                                        $type = implode(', ', $types);

                                        $description = get_field('alarm_description', $alarm->ID );

                                        $commune_list = wp_get_post_terms($alarm->ID, 'commune', array('fields' => 'all'));
                                        $communes = array_column($commune_list, 'name');
                                        $commune = implode(', ', $communes);

                                        $has_picture_icon = '';
                                        if (has_post_thumbnail( $alarm )) {
                                            $has_picture_icon = '<i class="icon icon-picture"></i>';
                                        }

                                        $current_month = date_format($alarm_date, 'F');
                                        if ($current_month != $previous_month) {
                                            $previous_month = $current_month;
                                            if ($key != 0) {
                                                echo '</div>'; // .block-list
                                            }
                                            ?>
                                            <div class="title"><h2><?= $previous_month ?></h2></div>
                                            <div class="block-list">
                                            <?php
                                        }
                                        ?>
                                        <a href="<?php the_permalink($alarm->ID); ?>" class="row">
                                            <span class="number"><?= $number ?></span>
                                            <span class="month"><?= $type ?></span>
                                            <span class="desc"><?= $description ?></span>
                                            <span class="country"><?= $commune ?></span>
                                            <span class="city"><?= date_format($alarm_date, 'l') ?></span>
                                            <span class="date"><?= date_format($alarm_date, 'd.m') ?></span>
                                            <span class="time"><?= date_format($alarm_date, 'H:i') ?></span>
                                            <?= $has_picture_icon ?>
                                        </a>
                                        <?php
                                    } ?>
                                    </div>
                                </div>
                                <?php
                            } ?>
                        </div>
                        <?php
                        get_sidebar('alarme')?>
                    </div>
                </div>
            </section>
        </main>

<?php
get_footer();




