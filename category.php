<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <div style="display: flex; flex-wrap: wrap; align-items: center;">
            <?php
            $countToBreakWhileLoopInCaseOfBug = 0; ?>
            <a class="main-directories-links" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Home', 'post-shift') ?></a>
            <i class="las la-arrow-right"></i>
            <?php $parent_category_id = $wp_query->get_queried_object()->parent;
            if ($parent_category_id !== 0) {
                $parent_category = get_category($parent_category_id); ?>
                <div style="display: flex; flex-direction: row-reverse; align-items: center;">
                    <?php while ($countToBreakWhileLoopInCaseOfBug < 100) {
                        $countToBreakWhileLoopInCaseOfBug++; ?>
                        <i class="las la-arrow-right"></i>
                        <a class="main-directories-links" href="<?php echo esc_url(get_category_link($parent_category->term_id)); ?>"><?php echo esc_html($parent_category->name); ?></a>
                    <?php if ($parent_category->parent === 0) {
                            break;
                        }
                        $parent_category = get_category($parent_category->parent);
                    } ?>
                </div>
                <?php $child_category = $wp_query->get_queried_object(); ?>
                <a class="main-current-directory-link" href="<?php echo esc_url(get_category_link($child_category->term_id)) ?>"><?php echo esc_html($child_category->name); ?></a>
                <?php $child_categories = get_categories(array(
                    "parent" => $child_category->term_id
                ));
                if (count($child_categories) > 0) {
                    foreach ($child_categories as $key => $child_category2) { ?>
                        <i class="las la-arrow-right"></i>
                        <a class="main-directories-links" href="<?php echo esc_url(get_category_link($child_category2->term_id)) ?>"><?php echo esc_html($child_category2->name) ?></a>
                <?php }
                } ?>
            <?php } else {
                $parent_category = $wp_query->get_queried_object(); ?>
                <a class="main-current-directory-link" href="<?php echo esc_url(get_category_link($parent_category->term_id)) ?>"><?php echo esc_html($parent_category->name) ?></a>
                <?php $child_categories = get_categories(array(
                    "parent" => $parent_category->term_id
                ));
                if (count($child_categories) > 0) { ?>
                    <i class="las la-arrow-right"></i>
                    <?php foreach ($child_categories as $key => $child_category) { ?>
                        <a class="main-directories-links" href="<?php echo esc_url(get_category_link($child_category->term_id)) ?>"><?php echo esc_html($child_category->name) ?></a>
                        <?php if ($key !== count($child_categories) - 1) { ?>
                            <i class="las la-grip-lines-vertical"></i>
            <?php }
                    }
                }
            }
            ?>
        </div>
        <div class="main-header-container">
            <h2 class="main-header-title"><?php esc_html(single_cat_title()); ?></h2>
            <div class="main-header-description"><?php echo wp_kses(category_description(), array('p' => array())); ?></div>
        </div>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('components/content');
            } ?>
            <div class="nav-previous alignleft"><?php next_posts_link('Older Posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer Posts'); ?></div>
        <?php } else { ?>
            <p class="main-no-posts-title"><?php esc_html_e("No posts to display.", "post-shift"); ?></p>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>