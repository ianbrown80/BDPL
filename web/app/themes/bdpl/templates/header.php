<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="<?php bloginfo('url'); ?>">
          <h1 class="header__heading"><?php bloginfo('name'); ?></h1>
          <h3 class="header__sub-heading"><?php bloginfo('description'); ?></h3>
        </a>
      </div>
    </div>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
