<?php get_header() ?>
<div>
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <p><?php echo the_content(); ?></p>
    <?php endwhile;
    endif; ?>
</div>
<?php get_footer(); ?>