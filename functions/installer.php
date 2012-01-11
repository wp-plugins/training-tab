<?php
global $wpdb;

//installs training records table
$table_name = $wpdb->prefix . "tt_training";
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
$sql = "CREATE TABLE " . $table_name . " ( id mediumint(9) NOT NULL AUTO_INCREMENT,
training_title varchar(64) NOT NULL,
training_content TEXT NOT NULL,
training_embed TEXT NOT NULL,
training_indent int,
training_order int,
training_email varchar(64),	
UNIQUE KEY id (id))";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
}else{
}

//installs settings table
$table_name = $wpdb->prefix . "tt_settings";
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
$sql = "CREATE TABLE " . $table_name . " ( id mediumint(9) NOT NULL AUTO_INCREMENT,
email_to varchar(64) NOT NULL,
UNIQUE KEY id (id))";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

$email =  "";
$insert = "INSERT INTO " . $table_name . " (
email_to
)VALUES (
'" . $wpdb->escape($email) . "'
)";
$results = $wpdb->query( $insert );
}else{
}	
