<?php while (have_posts()) : the_post(); ?>
  <h1 class="page-heading"><?php get_template_part('templates/page', 'header'); ?></h1>
  <?php get_template_part('templates/content', 'teams'); ?>
<?php endwhile; ?>
