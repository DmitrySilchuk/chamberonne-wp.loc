<?php


/*
Template Name: Vehicles page
Template Post Type: page
*/

get_header();
?>

    <main>
        <div class="banner" style="background-image: url('<?= get_field('vehicles_background')['url'] ?>')"></div>
        <section class="container vehicles-section">
            <div class="wrap">
                <section class="section-text single-text">
                    <div class="title">
                        <h1><?= get_field('vehicles_body_header') ?></h1>
                    </div>
                    <div class="editor">
                        <p><?= get_field('vehicles_body_description') ?></p>
                    </div>
                    <div class="action-btn flex">
                        <?php
                        $vehicles = get_posts(array(
                            'post_type' => 'vehicle',
                            'posts_per_page' => -1,
                        ));
                        $previous_vehicle = '';
                        $output_vehicle_categories_btn = '';
                        foreach ($vehicles as $vehicle) {
                            $vehicle_categories_list = wp_get_post_terms($vehicle->ID, 'vehicle_categories', array('fields' => 'all'));
                            if (!empty($vehicle_categories_list)) {
                                foreach ($vehicle_categories_list as $vehicle_category) {
                                    if ($vehicle_category != $previous_vehicle) {
                                        $previous_vehicle = $vehicle_category;
                                        $output_vehicle_categories_btn .= "<a href='#' data-type='{$vehicle_category->slug}' class='js-action-btn btn'>{$vehicle_category->name}</a>";
                                    }
                                }
                            }
                        }
                        if (!empty($output_vehicle_categories_btn)){
                            $all_posts = __('All', 'chamberonne');
                            echo "<a href='#' data-type='all' class='js-action-btn btn active'>$all_posts</a>";
                            echo $output_vehicle_categories_btn;
                        } ?>
                    </div>
                </section>
            </div>
        </section>
        <section class="vehicles-posts">
            <div class="wrap">
                <div class="block-posts flex">
                    <?php
                    foreach ($vehicles as $vehicle) {
                        $category_slug = '';
                        $vehicle_categories_list = wp_get_post_terms($vehicle->ID, 'vehicle_categories', array('fields' => 'all'));
                        if (!empty($vehicle_categories_list)) {
                            $category_slug = $vehicle_categories_list[0]->slug;
                        } ?>
                        <a href="<?= get_permalink($vehicle->ID) ?>" data-type="<?= $category_slug ?>"
                           class="js-item-post item-posts">
                            <div class="img" style="background-image: url('<?= get_the_post_thumbnail_url($vehicle->ID) ?>')"></div>
                            <span class="title-post"><?= get_the_title($vehicle->ID) ?></span>
                            <span class="desc"><?= get_field('vehicle_chambro')?></span>
                        </a>
                        <?php
                    } ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();