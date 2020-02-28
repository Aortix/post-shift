  <?php ?>
  <footer class="footer-container">
    <div class="footer-content">
      <h6 class="footer-website-title"><?php echo esc_attr(get_bloginfo('name')); ?></h6>
      <a class="footer-privacy-policy-link" href="<?php echo esc_url(get_permalink(get_page_by_path('privacy-policy'))); ?>">Privacy Policy</a>
    </div>
  </footer>
  <?php wp_footer(); ?>
  </body>

  </html>