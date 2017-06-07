<?php

global $contacts_db_version;
$contacts_db_version = '1.0';


function contacts_db_install() {
    global $wpdp;

    $table_name = $wpdp->prefix . "contacts";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    position tinytext NOT NULL,
    name tinytext NOT NULL,
    text text NOT NULL,
    number tinytext NOT NULL,
    image tinytext NOT NULL,
    PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}