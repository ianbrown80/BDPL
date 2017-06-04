<div class="row">
    <div class="banner-container">
    <?php the_post_thumbnail('banner'); ?> 
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
  <h1 class="page-heading"><?php get_template_part('templates/page', 'header'); ?></h1>
  <?php get_template_part('templates/content', 'contacts'); ?>
<?php endwhile; ?>
