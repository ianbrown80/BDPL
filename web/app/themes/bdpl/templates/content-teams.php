
<?php $args = array( 'post_type' => 'teams' ); ?>
<?php $loop = new WP_Query( $args ); ?>
<?php if( $loop->have_posts() ) : ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="row" >
            <div class="teams-container">
                <img class="teams-image col-md-6" src="<?= get_template_directory_uri(); ?>/dist/images/teams/<?php echo get_post_meta( get_the_ID(), 'team-image', true ); ?>">
        
                <div class="team-details-container col-md-6">
                    <h3><?php echo the_title();?></h3>
                    <p><?php echo get_post_meta( get_the_ID(), 'team-address-firstline', true );?></p>
                    <?php if (get_post_meta( get_the_ID(), 'team-address-secondline', true )) {?>
                        <p><?php echo get_post_meta( get_the_ID(), 'team-address-secondline', true );?></p>
                    <?php } ?>
                    <p><?php echo get_post_meta( get_the_ID(), 'team-town', true );?></p>
                    <p><?php echo get_post_meta( get_the_ID(), 'team-postcode', true );?></p>
                    <p><?php echo get_post_meta( get_the_ID(), 'team-telephone', true );?></p>
                    <?php if (get_post_meta( get_the_ID(), 'team-email', true )) {?>
                        <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'team-email', true );?>"><p><?php echo get_post_meta( get_the_ID(), 'team-email', true );?></p></a>
                    <?php } ?>
                    <?php if (get_post_meta( get_the_ID(), 'team-website', true )) {?>
                        <a href="<?php echo get_post_meta( get_the_ID(), 'team-website', true );?>"><p><?php get_post_meta( get_the_ID(), 'team-website', true );?></p></a>
                    <?php } ?>
    
                    <a class="btn btn-danger details-button" href="<?php the_permalink(); ?>">Details</a>
                </div>
            </div>
        </div>
   <?php endwhile; wp_reset_query(); ?> 
<?php else : 
    echo "<h4 class='error-message alert alert-danger'>Oops something has gone wrong and I can't find the contacts. Sorry!</h4>";
endif; ?>
