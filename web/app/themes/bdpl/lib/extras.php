<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



/**
 * Custom Post Type Registration - To be moved to the Plugin when it is created.
 */

add_action( 'init', __NAMESPACE__ . '\\register_custom_post_types', 0 );



function register_custom_post_types() {

  register_post_type( 'contacts', 
    array(
      'labels' => array( 
        'name' => 'Contacts',
        'singular_name' => 'Contact',
        'add_new_item' => 'Add new contact',
        'edit_item' => 'Edit contact',
        'new_item' => 'New contact',
        'view_item' => 'View contact',
        'all_items' => 'All contacts',
      ),
      'public' => true,
    )
  );

  register_post_type( 'teams', 
    array(
      'labels' => array( 
        'name' => 'Teams',
        'singular_name' => 'Team',
        'add_new_item' => 'Add new team',
        'edit_item' => 'Edit team',
        'new_item' => 'New team',
        'view_item' => 'View team',
        'all_items' => 'All team',
      ),
      'public' => true,
    )
  );

}

/**
 * Remove uneeded post fields
 */

add_action( 'init', __NAMESPACE__ . '\\remove_fields', 0 );

function remove_fields() {

  remove_post_type_support( 'contacts', 'title' );
  remove_post_type_support( 'contacts', 'editor' );
  remove_post_type_support( 'contacts', 'author' );
  remove_post_type_support( 'contacts', 'excerpt' );
  remove_post_type_support( 'contacts', 'comments' );
  remove_post_type_support( 'contacts', 'trackbacks' );
  remove_post_type_support( 'contacts', 'revisions' );
  remove_post_type_support( 'contacts', 'page-attributes' );
  remove_post_type_support( 'contacts', 'post-formats' );

  remove_post_type_support( 'teams', 'editor' );
  remove_post_type_support( 'teams', 'author' );
  remove_post_type_support( 'teams', 'excerpt' );
  remove_post_type_support( 'teams', 'comments' );
  remove_post_type_support( 'teams', 'trackbacks' );
  remove_post_type_support( 'teams', 'revisions' );
  remove_post_type_support( 'teams', 'page-attributes' );
  remove_post_type_support( 'teams', 'post-formats' );

}

/**
 * Set up Meta Boxes for the Custom Posts - To be moved to the Plugin when it is created.
 */

add_action( 'load-post.php', __NAMESPACE__ . '\\meta_boxes_setup' );
add_action( 'load-post-new.php', __NAMESPACE__ . '\\meta_boxes_setup' );

function meta_boxes_setup() {

  add_action( 'add_meta_boxes', __NAMESPACE__ . '\\add_meta_boxes' );
  add_action( 'save_post', __NAMESPACE__ . '\\save_meta', 10, 2 );

}

function add_meta_boxes() {

  add_meta_box(
    'contact-name',      
    'Contact Name',  
     __NAMESPACE__ . '\\contact_name_meta_box',  
    'contacts',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'contact-number',      
    'Contact Number',  
     __NAMESPACE__ . '\\contact_number_meta_box',  
    'contacts',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'contact-role',      
    'Contact Role',  
     __NAMESPACE__ . '\\contact_role_meta_box',  
    'contacts',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-image',      
    'Picture',  
     __NAMESPACE__ . '\\team_image_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-address-firstline',      
    'Address Line 1' ,  
     __NAMESPACE__ . '\\team_address_firstline_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-address-secondline',      
    'Address Line 2' ,  
     __NAMESPACE__ . '\\team_address_secondline_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-town',      
    'Town',  
     __NAMESPACE__ . '\\team_town_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-postcode',      
    'Post Code',  
     __NAMESPACE__ . '\\team_postcode_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-number',      
    'Telephone',  
     __NAMESPACE__ . '\\team_telephone_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-website',      
    'Website',  
     __NAMESPACE__ . '\\team_website_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-email',      
    'Email',  
     __NAMESPACE__ . '\\team_email_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-landlord',      
    'Landlord',  
     __NAMESPACE__ . '\\team_landlord_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-captain-a',      
    'A Team Captain',  
     __NAMESPACE__ . '\\team_captain_a_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );

  add_meta_box(
    'team-captain-b',      
    'B Team Captain',  
     __NAMESPACE__ . '\\team_captain_b_meta_box',  
    'teams',         
    'normal',        
    'default'        
  );
}

function contact_name_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'contact_nonce' ); ?>

  <p>
    <label for="contact-name"><?php _e( "Enter the Contact Name" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="contact-name" id="contact-name" value="<?php echo esc_attr( get_post_meta( $post->ID, 'contact-name', true ) ); ?>" size="30" />
  </p>
<?php }

function contact_number_meta_box( $post ) { ?>

  <p>
    <label for="contact-number"><?php _e( "Enter the Contact Number" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="contact-number" id="contact-number" value="<?php echo esc_attr( get_post_meta( $post->ID, 'contact-number', true ) ); ?>" size="30" />
  </p>
<?php }

function contact_role_meta_box( $post ) { ?>

  <p>
    <label for="contact-role"><?php _e( "Enter the Contact's Role" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="contact-role" id="contact-role" value="<?php echo esc_attr( get_post_meta( $post->ID, 'contact-role', true ) ); ?>" size="30" />
  </p>
<?php }

function team_image_meta_box( $post ) { ?>

  <p>
    <label for="team-image"><?php _e( "Upload a Picture" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="team-image" id="team-image" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-image', true ) ); ?>" size="30" />
  </p>
<?php }

function team_address_firstline_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'team_nonce' ); ?>

  <p>
    <label for="team-address-firstline"><?php _e( "Enter the first line of the address" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="team-address-firstline" id="team-address-firstline" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-address-firstline', true ) ); ?>" size="30" />
  </p>
<?php }

function team_address_secondline_meta_box( $post ) { ?>

  <p>
    <label for="team-address-secondline"><?php _e( "Enter the second line of the address" ); ?></label>
    <br />
    <input class="widefat" type="text" name="team-address-secondline" id="team-address-secondline" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-address-secondline', true ) ); ?>" size="30" />
  </p>
<?php }

function team_town_meta_box( $post ) { ?>

  <p>
    <label for="team-town"><?php _e( "Enter the town" ); ?></label>
    <br />
    <input class="widefat" type="text" name="team-town" id="team-town" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-town', true ) ); ?>" size="30" />
  </p>
<?php }

function team_postcode_meta_box( $post ) { ?>

  <p>
    <label for="team-postcode"><?php _e( "Enter the postcode" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="team-postcode" id="team-postcode" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-postcode', true ) ); ?>" size="30" />
  </p>
<?php }

function team_telephone_meta_box( $post ) { ?>

  <p>
    <label for="team-telephone"><?php _e( "Enter the telephone number" ); ?></label>
    <br />
    <input required class="widefat" type="text" name="team-telephone" id="team-telephone" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-telephone', true ) ); ?>" size="30" />
  </p>
<?php }

function team_website_meta_box( $post ) { ?>

  <p>
    <label for="team-website"><?php _e( "Enter the website" ); ?></label>
    <br />
    <input class="widefat" type="url" name="team-website" id="team-website" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-website', true ) ); ?>" size="30" />
  </p>
<?php }

function team_email_meta_box( $post ) { ?>

  <p>
    <label for="team-email"><?php _e( "Enter the email address" ); ?></label>
    <br />
    <input class="widefat" type="email" name="team-email" id="team-email" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-email', true ) ); ?>" size="30" />
  </p>
<?php }

function team_landlord_meta_box( $post ) { ?>

  <p>
    <label for="team-landlord"><?php _e( "Enter the landlord name" ); ?></label>
    <br />
    <input class="widefat" type="text" name="team-landlord" id="team-landlord" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-landlord', true ) ); ?>" size="30" />
  </p>
<?php }


function team_captain_a_meta_box( $post ) { ?>

  <p>
    <label for="team-captain-a"><?php _e( "Enter the A team captain" ); ?></label>
    <br />
    <input class="widefat" type="text" name="team-captain-a" id="team-captain-a" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-captain-a', true ) ); ?>" size="30" />
  </p>
<?php }


function team_captain_b_meta_box( $post ) { ?>

  <p>
    <label for="team-captain-b"><?php _e( "Enter the B team captain" ); ?></label>
    <br />
    <input class="widefat" type="text" name="team-captain-b" id="team-captain-b" value="<?php echo esc_attr( get_post_meta( $post->ID, 'team-captain-b', true ) ); ?>" size="30" />
  </p>
<?php }

function save_meta( $post_id, $post ) {

  if ( !isset( $_POST['contact_nonce'] ) || !wp_verify_nonce( $_POST['contact_nonce'], basename( __FILE__ ) ) )
    if (!isset( $_POST['team_nonce'] ) || !wp_verify_nonce( $_POST['team_nonce'], basename( __FILE__ ) ) )
      return $post_id;

  $post_type = get_post_type_object( $post->post_type );

  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  $new_contact_name_value = ( isset( $_POST['contact-name'] ) ? sanitize_text_field( $_POST['contact-name'] ) : '' );
  $new_contact_number_value = ( isset( $_POST['contact-number'] ) ? sanitize_text_field( $_POST['contact-number'] ) : '' );
  $new_contact_role_value = ( isset( $_POST['contact-role'] ) ? sanitize_text_field( $_POST['contact-role'] ) : '' );
  $new_team_image_value = ( isset( $_POST['team-image'] ) ? sanitize_text_field( $_POST['team-image'] ) : '' );
  $new_team_address_firstline_value = ( isset( $_POST['team-address-firstline'] ) ? sanitize_text_field( $_POST['team-address-firstline'] ) : '' );
  $new_team_address_secondline_value = ( isset( $_POST['team-address-secondline'] ) ? sanitize_text_field( $_POST['team-address-secondline'] ) : '' );
  $new_team_town_value = ( isset( $_POST['team-town'] ) ? sanitize_text_field( $_POST['team-town'] ) : '' );
  $new_team_postcode_value = ( isset( $_POST['team-postcode'] ) ? sanitize_text_field( $_POST['team-postcode'] ) : '' );
  $new_team_telephone_value = ( isset( $_POST['team-telephone'] ) ? sanitize_text_field( $_POST['team-telephone'] ) : '' );
  $new_team_website_value = ( isset( $_POST['team-website'] ) ? sanitize_text_field( $_POST['team-website'] ) : '' );
  $new_team_email_value = ( isset( $_POST['team-email'] ) ? sanitize_text_field( $_POST['team-email'] ) : '' );
  $new_team_landlord_value = ( isset( $_POST['team-landlord'] ) ? sanitize_text_field( $_POST['team-landlord'] ) : '' );
  $new_team_captain_a_value = ( isset( $_POST['team-captain-a'] ) ? sanitize_text_field( $_POST['team-captain-a'] ) : '' );
  $new_team_captain_b_value = ( isset( $_POST['team-captain-b'] ) ? sanitize_text_field( $_POST['team-captain-b'] ) : '' );
  
  $meta_contact_name_key = 'contact-name';
  $meta_contact_number_key = 'contact-number';
  $meta_contact_role_key = 'contact-role';
  $meta_team_image_key = 'team-image';
  $meta_team_address_firstline_key = 'team-address-firstline';
  $meta_team_address_secondline_key = 'team-address-secondline';
  $meta_team_town_key = 'team-town';
  $meta_team_postcode_key = 'team-postcode';
  $meta_team_telephone_key = 'team-telephone';
  $meta_team_website_key = 'team-website';
  $meta_team_email_key = 'team-email';
  $meta_team_landlord_key = 'team-landlord';
  $meta_team_captain_a_key = 'team-captain-a';
  $meta_team_captain_b_key = 'team-captain-b';

  $meta_contact_name_value = get_post_meta( $post_id, $meta_contact_name_key, true );
  $meta_contact_number_value = get_post_meta( $post_id, $meta_contact_number_key, true );
  $meta_contact_role_value = get_post_meta( $post_id, $meta_contact_role_key, true );
  $meta_team_image_value = get_post_meta( $post_id, $meta_team_image_key, true );
  $meta_team_address_firstline_value = get_post_meta( $post_id, $meta_team_address_firstline_key, true );
  $meta_team_address_secondline_value = get_post_meta( $post_id, $meta_team_address_secondline_key, true );
  $meta_team_town_value = get_post_meta( $post_id, $meta_team_town_key, true );
  $meta_team_postcode_value = get_post_meta( $post_id, $meta_team_postcode_key, true );
  $meta_team_telephone_value = get_post_meta( $post_id, $meta_team_telephone_key, true );
  $meta_team_website_value = get_post_meta( $post_id, $meta_team_website_key, true );
  $meta_team_email_value = get_post_meta( $post_id, $meta_team_email_key, true );
  $meta_team_landlord_value = get_post_meta( $post_id, $meta_team_landlord_key, true );
  $meta_team_captain_a_value = get_post_meta( $post_id, $meta_team_captain_a_key, true );
  $meta_team_captain_b_value = get_post_meta( $post_id, $meta_team_captain_b_key, true );

  if ( $new_contact_name_value && '' == $meta_contact_name_value )
    add_post_meta( $post_id, $meta_contact_name_key, $new_contact_name_value, true );
  elseif ( $new_contact_name_value && $new_contact_name_value != $meta_contact_name_value )
    update_post_meta( $post_id, $meta_contact_name_key, $new_contact_name_value );
  elseif ( '' == $new_contact_name_value && $meta_contact_name_value )
    delete_post_meta( $post_id, $meta_contact_name_key, $meta_contact_name_value );

  if ( $new_contact_number_value && '' == $meta_contact_number_value )
    add_post_meta( $post_id, $meta_contact_number_key, $new_contact_number_value, true );
  elseif ( $new_contact_number_value && $new_contact_number_value != $meta_contact_number_value )
    update_post_meta( $post_id, $meta_contact_number_key, $new_contact_number_value );
  elseif ( '' == $new_contact_number_value && $meta_contact_number_value )
    delete_post_meta( $post_id, $meta_contact_number_key, $meta_contact_number_value );

  if ( $new_contact_role_value && '' == $meta_contact_role_value )
    add_post_meta( $post_id, $meta_contact_role_key, $new_contact_role_value, true );
  elseif ( $new_contact_role_value && $new_contact_role_value != $meta_contact_role_value )
    update_post_meta( $post_id, $meta_contact_role_key, $new_contact_role_value );
  elseif ( '' == $new_contact_role_value && $meta_contact_role_value )
    delete_post_meta( $post_id, $meta_contact_role_key, $meta_contact_role_value );

  if ( $new_team_image_value && '' == $meta_team_image_value )
    add_post_meta( $post_id, $meta_team_image_key, $new_team_image_value, true );
  elseif ( $new_team_image_value && $new_team_image_value != $meta_team_image_value )
    update_post_meta( $post_id, $meta_team_image_key, $new_team_image_value );
  elseif ( '' == $new_team_image_value && $meta_team_image_value )
    delete_post_meta( $post_id, $meta_team_image_key, $meta_team_image_value );

  if ( $new_team_address_firstline_value && '' == $meta_team_address_firstline_value )
    add_post_meta( $post_id, $meta_team_address_firstline_key, $new_team_address_firstline_value, true );
  elseif ( $new_team_address_firstline_value && $new_team_address_firstline_value != $meta_team_address_firstline_value )
    update_post_meta( $post_id, $meta_team_address_firstline_key, $new_team_address_firstline_value );
  elseif ( '' == $new_team_address_firstline_value && $meta_team_address_firstline_value )
    delete_post_meta( $post_id, $meta_team_address_firstline_key, $meta_team_address_firstline_value );

  if ( $new_team_address_secondline_value && '' == $meta_team_address_secondline_value )
    add_post_meta( $post_id, $meta_team_address_secondline_key, $new_team_address_secondline_value, true );
  elseif ( $new_team_address_secondline_value && $new_team_address_secondline_value != $meta_team_address_secondline_value )
    update_post_meta( $post_id, $meta_team_address_secondline_key, $new_team_address_secondline_value );
  elseif ( '' == $new_team_address_secondline_value && $meta_team_address_secondline_value )
    delete_post_meta( $post_id, $meta_team_address_secondline_key, $meta_team_address_secondline_value );

  if ( $new_team_town_value && '' == $meta_team_town_value )
    add_post_meta( $post_id, $meta_team_town_key, $new_team_town_value, true );
  elseif ( $new_team_town_value && $new_team_town_value != $meta_team_town_value )
    update_post_meta( $post_id, $meta_team_town_key, $new_team_town_value );
  elseif ( '' == $new_team_town_value && $meta_team_town_value )
    delete_post_meta( $post_id, $meta_team_town_key, $meta_team_town_value );

  if ( $new_team_postcode_value && '' == $meta_team_postcode_value )
    add_post_meta( $post_id, $meta_team_postcode_key, $new_team_postcode_value, true );
  elseif ( $new_team_postcode_value && $new_team_postcode_value != $meta_team_postcode_value )
    update_post_meta( $post_id, $meta_team_postcode_key, $new_team_postcode_value );
  elseif ( '' == $new_team_postcode_value && $meta_team_postcode_value )
    delete_post_meta( $post_id, $meta_team_postcode_key, $meta_team_postcode_value );

  if ( $new_team_telephone_value && '' == $meta_team_telephone_value )
    add_post_meta( $post_id, $meta_team_telephone_key, $new_team_telephone_value, true );
  elseif ( $new_team_telephone_value && $new_team_telephone_value != $meta_team_telephone_value )
    update_post_meta( $post_id, $meta_team_telephone_key, $new_team_telephone_value );
  elseif ( '' == $new_team_telephone_value && $meta_team_telephone_value )
    delete_post_meta( $post_id, $meta_team_telephone_key, $meta_team_telephone_value );

  if ( $new_team_website_value && '' == $meta_team_website_value )
    add_post_meta( $post_id, $meta_team_website_key, $new_team_website_value, true );
  elseif ( $new_team_website_value && $new_team_website_value != $meta_team_website_value )
    update_post_meta( $post_id, $meta_team_website_key, $new_team_website_value );
  elseif ( '' == $new_team_website_value && $meta_team_website_value )
    delete_post_meta( $post_id, $meta_team_website_key, $meta_team_website_value );

  if ( $new_team_email_value && '' == $meta_team_email_value )
    add_post_meta( $post_id, $meta_team_email_key, $new_team_email_value, true );
  elseif ( $new_team_email_value && $new_team_email_value != $meta_team_email_value )
    update_post_meta( $post_id, $meta_team_email_key, $new_team_email_value );
  elseif ( '' == $new_team_email_value && $meta_team_email_value )
    delete_post_meta( $post_id, $meta_team_email_key, $meta_team_email_value );

  if ( $new_team_landlord_value && '' == $meta_team_landlord_value )
    add_post_meta( $post_id, $meta_team_landlord_key, $new_team_landlord_value, true );
  elseif ( $new_team_landlord_value && $new_team_landlord_value != $meta_team_landlord_value )
    update_post_meta( $post_id, $meta_team_landlord_key, $new_team_landlord_value );
  elseif ( '' == $new_team_landlord_value && $meta_team_landlord_value )
    delete_post_meta( $post_id, $meta_team_landlord_key, $meta_team_landlord_value );

  if ( $new_team_captain_a_value && '' == $meta_team_captain_a_value )
    add_post_meta( $post_id, $meta_team_captain_a_key, $new_team_captain_a_value, true );
  elseif ( $new_team_captain_a_value && $new_team_captain_a_value != $meta_team_captain_a_value )
    update_post_meta( $post_id, $meta_team_captain_a_key, $new_team_captain_a_value );
  elseif ( '' == $new_team_captain_a_value && $meta_team_captain_a_value )
    delete_post_meta( $post_id, $meta_team_captain_a_key, $meta_team_captain_a_value );

  if ( $new_team_captain_b_value && '' == $meta_team_captain_b_value )
    add_post_meta( $post_id, $meta_team_captain_b_key, $new_team_captain_b_value, true );
  elseif ( $new_team_captain_b_value && $new_team_captain_b_value != $meta_team_captain_b_value )
    update_post_meta( $post_id, $meta_team_captain_b_key, $new_team_captain_b_value );
  elseif ( '' == $new_team_captain_b_value && $meta_team_captain_b_value )
    delete_post_meta( $post_id, $meta_team_captain_b_key, $meta_team_captain_b_value );

}

