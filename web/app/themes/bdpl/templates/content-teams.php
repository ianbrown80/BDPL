
<?php global $wpdb; ?>
<?php $results = $wpdb->get_results( 'SELECT * FROM wp_teams' ); ?>

<?php if ( $results ) {
    foreach ( $results as $team ) { ?>
        
        <div class="row" >
            <div class="teams-container">
                <img class="teams-image col-md-6" src="<?= get_template_directory_uri(); ?>/dist/images/teams/<?php echo $team->image; ?>">
        
                <div class="teams-address-container col-md-6">
                    <h3><?php echo $team->name;?></h3>
                    <p><?php echo $team->firstline;?></p>
                    <?php if ($team->secondline) {?>
                        <p><?php echo $team->secondline;?></p>
                    <?php } ?>
                    <p><?php echo $team->town;?></p>
                    <p><?php echo $team->postcode;?></p>
                    <p><?php echo $team->number; ?></p>
                    <?php if ($team->email) {?>
                        <a href="mailto:<?php echo $team->email;?>"><p><?php echo $team->email;?></p></a>
                    <?php } ?>
                    <?php if ($team->url) {?>
                        <a href="<?php echo $team->url;?>"><p><?php echo $team->url;?></p></a>
                    <?php } ?>
    
                    <a class="btn btn-danger details-button" href="<?php the_permalink(); ?>">Details</a>
                </div>
            </div>
        </div>
<?php }
} else {
    echo "<h4 class='error-message alert alert-danger'>Oops something has gone wrong and I can't find the contacts. Sorry!</h4>";
} ?>
