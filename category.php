<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <div style="display: flex; flex-wrap: wrap; align-items: center;">
            <?php
            $countToBreakWhileLoopInCaseOfBug = 0; ?>
            <a class="main-directories-links" href="<?php echo esc_url(home_url()); ?>"><?php _e('Home', 'post-shift') ?></a>
            <i class="las la-arrow-right"></i>
            <?php $parent_category_id = $wp_query->get_queried_object()->parent;
            if ($parent_category_id !== 0) {
                $parent_category = get_category($parent_category_id); ?>
                <div style="display: flex; flex-direction: row-reverse; align-items: center;">
                    <?php while ($countToBreakWhileLoopInCaseOfBug < 100) {
                        $countToBreakWhileLoopInCaseOfBug++; ?>
                        <i class="las la-arrow-right"></i>
                        <a class="main-directories-links" href="<?php echo esc_url(get_category_link($parent_category->term_id)); ?>"><?php printf(esc_html__('%s', 'post-shift'), $parent_category->name); ?></a>
                    <?php if ($parent_category->parent === 0) {
                            break;
                        }
                        $parent_category = get_category($parent_category->parent);
                    } ?>
                </div>
                <?php $child_category = $wp_query->get_queried_object(); ?>
                <a class="main-current-directory-link" href="<?php echo esc_url(get_category_link($child_category->term_id)) ?>"><?php printf(esc_html__('%s', 'post-shift'), $child_category->name); ?></a>
                <?php $child_categories = get_categories(array(
                    "parent" => $child_category->term_id
                ));
                if (count($child_categories) > 0) {
                    foreach ($child_categories as $key => $child_category2) { ?>
                        <i class="las la-arrow-right"></i>
                        <a class="main-directories-links" href="<?php echo esc_url(get_category_link($child_category2->term_id)) ?>"><?php printf(esc_html__('%s', 'post-shift'), $child_category2->name) ?></a>
                <?php }
                } ?>
            <?php } else {
                $parent_category = $wp_query->get_queried_object(); ?>
                <a class="main-current-directory-link" href="<?php echo esc_url(get_category_link($parent_category->term_id)) ?>"><?php printf(esc_html__('%s', 'post-shift'), $parent_category->name) ?></a>
                <?php $child_categories = get_categories(array(
                    "parent" => $parent_category->term_id
                ));
                if (count($child_categories) > 0) { ?>
                    <i class="las la-arrow-right"></i>
                    <?php foreach ($child_categories as $key => $child_category) { ?>
                        <a class="main-directories-links" href="<?php echo esc_url(get_category_link($child_category->term_id)) ?>"><?php printf(esc_html__('%s', 'post-shift'), $child_category->name) ?></a>
                        <?php if ($key !== count($child_categories) - 1) { ?>
                            <i class="las la-grip-lines-vertical"></i>
            <?php }
                    }
                }
            }
            ?>
        </div>
        <div class="main-header-container">
            <h2 class="main-header-title"><?php sprintf(esc_html__('%s', 'post-shift'), single_cat_title()); ?></h2>
            <!---Check escaping for category description-->
            <div class="main-header-description"><?php printf(esc_html__('%s', 'post-shift'), category_description()); ?></div>
        </div>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="main-post-container">
                    <a class="main-avatar-per-post" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email'))); ?>" alt="user_post_avatar"></img></a>
                    <div class="sub-post-container">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="sub-post-title"><?php printf(esc_html__('%s', 'post-shift'), the_title()); ?></a>
                        <p class="sub-post-author">By <?php sprintf(esc_html__('%s', 'post-shift'), the_author()); ?></p>
                        <div class="sub-post-categories-and-tags">
                            <?php $categories = get_the_category(get_the_ID()); ?>
                            <?php foreach ($categories as $category) { ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php printf(esc_html__('%s', 'post-shift'), $category->name); ?></a>
                            <?php } ?>
                            <?php $tags = get_the_tags(get_the_ID()); ?>
                            <?php if (is_array($tags) || is_object($tags)) { ?>
                                <?php foreach ($tags as $tag) { ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php printf(esc_html__('%s', 'post-shift'), $tag->name); ?></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>"><button class="main-view-post-button"><?php _e("View Post", "post-shift"); ?></button></a>
                <div class="main-post-content">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                    <div style="clear: both;"></div>
                </div>
            <?php } ?>
            <div class="nav-previous alignleft"><?php next_posts_link('Older Posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer Posts'); ?></div>
        <?php } else { ?>
            <p class="main-no-posts-title"><?php _e("No posts to display.", "post-shift"); ?></p>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>