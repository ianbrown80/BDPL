<div class="row">
    <div class="col-md-10 offset-md-1">   

    <?php global $wpdb; ?>
    <?php $results = $wpdb->get_results( 'SELECT * FROM wp_contacts' ); ?>

    <?php if ( $results ) {
        foreach ( $results as $contact ) { ?>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="contact-block">
                        <p class='contact-data'> <?php echo $contact->position; ?> </p>
                        <p class='contact-data'> <?php echo $contact->name; ?> </p>
                        <p class='contact-data'> <?php echo $contact->number; ?> </p>
                    </div>
                </div>
            </div>
    <?php }
    } else {
        echo "<h4 class='error-message alert alert-danger'>Oops something has gone wrong and I can't find the contacts. Sorry!</h4>";
    } ?>
    </div>
</div>

