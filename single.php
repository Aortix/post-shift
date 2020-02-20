<div>
    <h2>This is a post, not a page</h2>
    <?php
    while (have_posts()) {
        the_post(); ?>
        <h2><?php the_title() ?></h2>
        <p><?php the_content() ?></p>
    <?php } ?>
</div>