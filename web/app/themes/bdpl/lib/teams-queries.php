<?php

global $team_db_version;
$teams_db_version = '1.0';


function teams_db_install() {
    global $wpdp;

    $table_name = $wpdp->prefix . "teams";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name tinytext NOT NULL,
    firstline tinytext NOT NULL,
    secondline tinytext,
    town tinytext NOT NULL,
    postcode tinytext NOT NULL,
    number tinytext NOT NULL,
    image tinytext NOT NULL,
    latitude float NOT NULL,
    longitude float NOT NULL,
    url tinytext,
    email tinytext,
    ATeamCaptain tinytext,
    BTeamCaptain tinyext
    PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}