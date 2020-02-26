<?php get_header(); ?>
<div class="page-main-container">
    <div class="main-posts-container">
        <div class="main-header-container">
            <?php
            while (have_posts()) {
                the_post(); ?>
                <div class="page-post-container">
                    <div class="page-page-post-container">
                        <h2 class="page-post-title"><?php the_title() ?></h2>
                    </div>
                </div>
                <div class="page-post-content"><?php the_content() ?></div>
            <?php } ?>
        </div>
    </div>
    <?php get_footer(); ?>