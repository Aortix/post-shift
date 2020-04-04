<?php get_header(); ?>
<div class="page-main-container">
    <div class="main-posts-container">
        <div class="main-header-container">
            <?php
            while (have_posts()) {
                the_post(); ?>
                <div class="page-post-container">
                    <div class="page-page-post-container">
                        <h2 class="page-post-title"><?php esc_attr(the_title()); ?></h2>
                    </div>
                </div>
                <div class="page-post-content"><?php esc_attr(the_content()); ?>
                    <div style="clear: both;"></div>
                </div>

            <?php } ?>
            <?php comments_template(); ?>
        </div>
    </div>
    <?php get_footer(); ?>