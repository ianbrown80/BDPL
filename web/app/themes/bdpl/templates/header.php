<header class="header">
  <div class="container">
<<<<<<< HEAD
    <a class="header__image-link" href="http://placehold.it"><img class="header__image" src="http://placehold.it/100x150"></a>
    <h1 class="header__primary"><?php bloginfo('name'); ?></h1>
    <div class="header__social-icons">
      <a class="header__social-link" href="http://placehold.it"><img class="header__social-icon" src="http://placehold.it/80x80"></a>
      <a class="header__social-link" href="http://placehold.it"><img class="header__social-icon" src="http://placehold.it/80x80"></a>
      <a class="header__social-link" href="http://placehold.it"><img class="header__social-icon" src="http://placehold.it/80x80"></a>
=======
    <div class="row">
      <div class="col-md-3">
        <a href="<?php bloginfo('url'); ?>">
          <h1 class="banner__heading"><?php bloginfo('name'); ?></h1>
          <h3 class="banner__sub-heading"><?php bloginfo('description'); ?></h3>
        </a>
      </div>
>>>>>>> header
    </div>
    <nav class="header__nav">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
<div class="clear-fix"></div>
