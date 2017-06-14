<?php $args = array( 'post_type' => 'contacts' ); ?>
<?php $loop = new WP_Query( $args ); ?>
<?php if( $loop->have_posts() ) : ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="contact-block">
                    <p class='contact-data'> <?php echo get_post_meta( get_the_ID(), 'contact-role', true ); ?> </p>
                    <p class='contact-data'> <?php echo get_post_meta( get_the_ID(), 'contact-name', true ); ?> </p>
                    <p class='contact-data'> <?php echo get_post_meta( get_the_ID(), 'contact-number', true ); ?> </p>
                </div>
            </div>
        </div>
    <?php endwhile; wp_reset_query(); ?> 
<?php else : ?>
    <p><?php _e( 'Sorry, there are no contacts.' ); ?></p>
<?php endif; ?>

