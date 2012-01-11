<?php

/*
Plugin Name: Training Tab
Plugin URI: http://techstudio.co/wordpress/plugins/training-tab
Description: Training Tab is a WordPress plug-in designed to assist admin­is­tra­tors who have train­ing doc­u­men­ta­tion for their end-users in the form of writ­ten documentation, images, links and video instruc­tions. Post train­ing on your cus­tom WordPress site in train­ing tab to make learn­ing and using WordPress easy for your end-users. The plu­gin also allows for end-users to request new train­ing, either from TechStudio or any other developer. 
Version: 1.2.0
Author: TechStudio
Author URI: http://techstudio.co
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*  
Copyright 2011 TECH STUDIO, INC (FLORIDA, USA)  | ( email: ryan@techstudio.co )
This program is free software; you can redistribute it and/or modify it under the terms
of the GNU General Public License, version 2, as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details. You should have received a copy of
the GNU General Public License along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// installer and uninstaller
function tt_installer() {
	global $wpdb;
require_once('functions/installer.php');
}

//function tt_uninstaller() {
//	global $wpdb;
//require_once('functions/uninstall.php');
//}
//register_deactivation_hook( __FILE__, 'tt_uninstaller' );


register_activation_hook( __FILE__, 'tt_installer' );


// include modules
include('modules/tt_header.php');
function tt_main(){
include_once('modules/tt_main.php');
}

function tt_manage(){
include_once('modules/tt_manage.php');
}

function tt_request(){
include_once('modules/tt_request.php');
}

// add a tab to the back-end menu
function plugin_menu() {
	add_menu_page( 'Training', 'Training', 'edit_posts', __FILE__, 'tt_main' );
	add_submenu_page(__FILE__, 'Request', 'Request', 'edit_posts', 'tt-request', 'tt_request');
	add_submenu_page(__FILE__, 'Manage', 'Manage', 'edit_plugins', 'tt-manage', 'tt_manage');
}

add_action('admin_menu', 'plugin_menu');

function tt_stylesheet() {
    $prepath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
    wp_enqueue_script('jquery');
    echo '<link rel="stylesheet" type="text/css" href="' . $prepath . 'training-tab.css" />' . "\n";
    echo '<script type="text/javascript" src="' . $prepath . 'js/jquery.validate.min.js"></script>' . "\n";
    echo '<script type="text/javascript" src="' . $prepath . 'js/training-tab.jquery.js"></script>' . "\n";
}

add_action('admin_head', 'tt_stylesheet');
