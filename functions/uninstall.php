<?php

//remove table training
$table_name = $wpdb->prefix . "tt_training";
$sqldrop = "DROP TABLE IF EXISTS $table_name";
$results = $wpdb->query( $sqldrop );


//remove table settings
$table_name = $wpdb->prefix . "tt_settings";
$sqldrop = "DROP TABLE IF EXISTS $table_name";
$results = $wpdb->query( $sqldrop );
