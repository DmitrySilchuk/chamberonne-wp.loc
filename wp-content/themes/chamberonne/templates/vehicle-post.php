<?php


/*
Template Name: Vehicle post
Template Post Type: vehicle
*/

get_header();
?>

    <main>
        <div class="banner" style="background-image: url('<?= get_field('vehicles_post_pagebackground')['url'] ?>')"></div>
        <section class="single-vehicle">
            <div class="wrap">
                <div class="block-info flex">
                    <div class="text">
                        <div class="title">
                            <h1><?= the_title() ?></h1>
                        </div>
                        <?php
                        $vehicle_date = get_field('activity_diver_date');
                        $vehicle_date = date_create($vehicle_date);
                        $vehicle_date = date_format($vehicle_date, 'D d M Y');

                        $vehicle_time = get_field('activity_diver_time');
                        $vehicle_time = $vehicle_time['from'] . ' to ' . $vehicle_time['to'];
                        $date_time = $vehicle_date . ', ' . $vehicle_time;

                        $vehicle_description = get_field('activity_diver_description');

                        $vehicle_entry_into_service = get_field('activity_diver_entry_into_service');

                        $vehicle_participants = get_field('activity_diver_participants');

                        $vehicle_exercise_director = get_field('activity_diver_exercise_director');

                        $vehicle_comments = get_field('activity_diver_comments');
                        ?>
                        <div class="point-desc">
                            <div class="info-list info-active">
                                <div class="row">
                                    <strong><?php _e('Date:', 'chamberonne'); ?></strong>
                                    <span><?= $date_time ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Description:', 'chamberonne'); ?></strong>
                                    <span><?= $vehicle_description ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Entrée en service:', 'chamberonne'); ?></strong>
                                    <span><?= $vehicle_entry_into_service ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Participants:', 'chamberonne'); ?></strong>
                                    <span><?= $vehicle_participants ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Directeur d’exercice:', 'chamberonne'); ?></strong>
                                    <span><?= $vehicle_exercise_director ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Commentaires:', 'chamberonne'); ?></strong>
                                    <span><?= $vehicle_comments ?></span>
                                </div>
                            </div>
                            <?php
                            $vehicle_button = get_field('vehicles_button', 'option');
                            if (!empty($vehicle_button)) { ?>
                                <a href="<?= $vehicle_button ?>" class="btn"><?php _e('Tous les véhicules', 'chamberonne'); ?></a>
                                <?php
                            }?>
                        </div>
                    </div>
                    <div class="img" style="background-image: url('<?= get_field('car_image')['url'] ?>')"></div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();



