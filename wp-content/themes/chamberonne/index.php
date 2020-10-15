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
        <section class="section-main">
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2><?php the_title() ?></h2>
                <p><?php the_content(); ?></p>
            <?php endwhile; else : ?>
                <p><?php _e('No records.', 'chamberonne'); ?></p>
            <?php endif;
            ?>
        </section>
    </main>
<?php

get_footer();

