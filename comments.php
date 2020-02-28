<?php
function format_comment($comment, $args, $depth)
{

    $GLOBALS['comment'] = $comment; ?>
    <div class="comment-container">
        <div class="comment-intro-container">
            <a href="<?php echo esc_url(get_author_posts_url(get_user_by('email', $comment->comment_author_email)->ID)); ?>"><img src="<?php echo esc_url(get_avatar_url($comment->comment_author_email, ['size' => '32'])); ?>" alt="commenters_avatar"></img></a>
            <p class="comment-intro-text"><?php echo ucfirst(esc_attr(get_comment_author())); ?> commented on <?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></p>
        </div>

        <?php if ($comment->comment_approved == '0') : ?>
            <em>
                <php _e('Your comment is awaiting moderation.') ?>
            </em><br />
        <?php endif; ?>

        <div class="comment-content"><?php esc_url(comment_text()); ?></div>

        <div class="reply">
            <?php esc_url(comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))); ?>
        </div>
    </div>

<?php } ?>
<div>
    <h4 class="comments-main-title">Comments</h4>
    <div class="comments-container">
        <?php wp_list_comments('type=comment&callback=format_comment'); ?>
        <?php comment_form(); ?>
    </div>
</div>
<?php ?>