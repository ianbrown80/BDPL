
<div class="row">
    <div class="col-md-6">
        <h1 class="front-page-heading">Latest News</h1>
        <ul class="scroller-controls-container">
            <li id="front-page-control-1" class="scroller-control"></li>
            <li id="front-page-control-2" class="scroller-control"></li>
            <li id="front-page-control-3" class="scroller-control"></li>
            <li id="front-page-control-4" class="scroller-control"></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 post-scroller">        
        <div class="post-container">
        <?php query_posts('posts_per_page=4'); ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/front', 'page'); ?>
        <?php endwhile; ?>
      </div>
  </div>
</div>
