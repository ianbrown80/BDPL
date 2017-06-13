<div class="post">
    <div class="post-header"><?php the_title(); ?></div>
    <div class="post-info"><?php the_time('l jS F Y'); ?></div>      
    <div class="post-content"><?php the_excerpt("Read More..."); ?></div>
</div>


<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
