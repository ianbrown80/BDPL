<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <h1 class="team-title"><?php the_title(); ?></h1>
    <div class="team-content">
      <div class="team-container">
        <img class="team-image col-md-6" src="<?= get_template_directory_uri(); ?>/dist/images/teams/<?php echo get_post_meta( get_the_ID(), 'team-image', true ); ?>">
        <div class="team-map col-md-6"></div>
          <div class="row">            
            <div class="team-details-container col-md-6">
              <?php if (get_post_meta( get_the_ID(), 'team-landlord', true )) {?>
                  <p>Landlord: <?php echo get_post_meta( get_the_ID(), 'team-landlord', true );?></p>
              <?php } ?>
              <?php if (get_post_meta( get_the_ID(), 'team-captain-a', true )) {?>
                  <p>A Team Captain: <?php echo get_post_meta( get_the_ID(), 'team-captain-a', true );?></p>
              <?php } ?>
              <?php if (get_post_meta( get_the_ID(), 'team-captain-b', true )) {?>
                  <p>B Team Captain: <?php echo get_post_meta( get_the_ID(), 'team-captain-b', true );?></p>
              <?php } ?>
              <?php if (get_post_meta( get_the_ID(), 'team-email', true )) {?>
                  <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'team-email', true );?>"><p><?php echo get_post_meta( get_the_ID(), 'team-email', true );?></p></a>
              <?php } ?>
              <?php if (get_post_meta( get_the_ID(), 'team-website', true )) {?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'team-website', true );?>"><p><?php echo get_post_meta( get_the_ID(), 'team-website', true );?></p></a>
              <?php } ?>
            </div>
            <div class="team-details-container col-md-6">
              <p><?php echo get_post_meta( get_the_ID(), 'team-address-firstline', true );?></p>
              <?php if (get_post_meta( get_the_ID(), 'team-address-secondline', true )) {?>
                  <p><?php echo get_post_meta( get_the_ID(), 'team-address-secondline', true );?></p>
              <?php } ?>
              <p><?php echo get_post_meta( get_the_ID(), 'team-town', true );?></p>
              <p><?php echo get_post_meta( get_the_ID(), 'team-postcode', true );?></p>
              <p><?php echo get_post_meta( get_the_ID(), 'team-telephone', true );?></p>
            </div>
          </div>
      </div>

    </div>
  </article>
<?php endwhile; ?>
