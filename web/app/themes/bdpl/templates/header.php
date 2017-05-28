<header class="banner">
  <div class="container">
    <a class="banner__image-link" href="http://placehold.it"><img class="banner__image" src="http://placehold.it/100x150"></a>
    <h1 class="banner__heading"><?php bloginfo('name'); ?></h1>
    <div class="banner__social-icons">
      <a class="banner__social-link" href="http://placehold.it"><img class="banner__social-icon" src="http://placehold.it/80x80"></a>
      <a class="banner__social-link" href="http://placehold.it"><img class="banner__social-icon" src="http://placehold.it/80x80"></a>
      <a class="banner__social-link" href="http://placehold.it"><img class="banner__social-icon" src="http://placehold.it/80x80"></a>
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
