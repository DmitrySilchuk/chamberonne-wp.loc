<?php


/*
Template Name: Activites divers post
Template Post Type: activity, divers
*/

get_header();
?>

    <main>
        <div class="banner mb" style="background-image: url('<?= get_field('activities_divers_post_background')['url'] ?>')"></div>
        <section class="container">
            <div class="wrap">
                <div class="columns">
                    <div class="content">
                        <div class="title">
                            <h1><?= the_title() ?></h1>
                        </div>
                        <?php
                        $activity_diver_date = get_field('activity_diver_date');
                        $activity_diver_date = date_create($activity_diver_date);
                        $activity_diver_date = date_format($activity_diver_date, 'D d M Y');

                        $activity_diver_time = get_field('activity_diver_time');
                        $activity_diver_time = $activity_diver_time['from'] . ' to ' . $activity_diver_time['to'];
                        $activity_diver_time = $activity_diver_date . ', ' . $activity_diver_time;

                        $activity_diver_designation = get_field('activity_diver_designation');

                        $activity_diver_entry_into_service = get_field('activity_diver_entry_into_service');

                        $activity_diver_participants = get_field('activity_diver_participants');

                        $activity_diver_exercise_director = get_field('activity_diver_exercise_director');

                        $activity_diver_comments = get_field('activity_diver_comments');

                        ?>
                        <div class="point-desc">
                            <div class="info-list info-active">
                                <div class="row">
                                    <strong><?php _e('Date:', 'chamberonne'); ?></strong>
                                    <span><?= $activity_diver_time ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Désignation:', 'chamberonne'); ?>Désignation:</strong>
                                    <span><?= $activity_diver_designation ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Entrée en service:', 'chamberonne'); ?>Entrée en service:</strong>
                                    <span><?= $activity_diver_entry_into_service ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Participants:', 'chamberonne'); ?>Participants:</strong>
                                    <span><?= $activity_diver_participants ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Directeur d’exercice:', 'chamberonne'); ?>Directeur d’exercice:</strong>
                                    <span><?= $activity_diver_exercise_director ?></span>
                                </div>
                                <div class="row">
                                    <strong><?php _e('Commentaires:', 'chamberonne'); ?>Commentaires:</strong>
                                    <span><?= $activity_diver_comments ?></span>
                                </div>
                            </div>
                            <?php
                            $activity_diver_button = get_field('activity_diver_button', 'option');
                            if (!empty($activity_diver_button)) { ?>
                                <a href="<?= $activity_diver_button ?>" class="btn"><?php _e('Toutes les activités', 'chamberonne'); ?></a>
                                <?php
                            }?>
                        </div>
                    </div>
                    <?php
                    get_sidebar('activities-divers-post') ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
