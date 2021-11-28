<?php
/**
 * The template for displaying 'training' single posts
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
<div class="main-container">
    <div class="main-grid">
        <main class="main-content training-single">
            <?php while (have_posts()) :
                the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="training-content"><?php the_field('content'); ?></div>
                <hr />

                <div class="training-testimonial"><?php the_field('testimonial'); ?></div>
                <p class="training-author"><?php the_field('testimonial_author'); ?></p>

                <?php
                    $images = get_field('image_gallery');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                ?>

                <?php if ($images) : ?>
                    <div class="grid-x grid-margin-x">
                        <?php foreach ($images as $image) : ?>
                            <div class="cell small-4 text-center">
                                <?php
                                    echo wp_get_attachment_image(
                                        $image['ID'],
                                        $size,
                                        null,
                                        array('class' => 'thumbnail')
                                    );
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer();
