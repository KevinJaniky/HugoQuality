<?php
/*
   Plugin Name: Data store
   Version: 1.0
   Description: Get data when submit payement with CF7
   Author: Kevin JANIKY
   Author URI: http://kevinjaniky.com
   */


add_action("wpcf7_before_send_mail", "wpcf7_disablemail");


function wpcf7_disablemail(&$wpcf7_data) {
    $submission = WPCF7_Submission::get_instance();
    $_SESSION['cf7_data'] = $submission->get_posted_data();
    $data = $submission->get_posted_data();
    $tmp = [];
    $exclude = ['_wpcf7','_wpcf7_version','_wpcf7_locale','_wpcf7_unit_tag','_wpcf7_container_post'];
    foreach ($data as $d=> $value){
        if(!in_array($d,$exclude)){
            $tmp[$d] = $value;
        }
    }
    $tmp['title'] = $wpcf7_data->title();
    $tmp = json_encode($tmp);
    $_SESSION['cf7_data']['content'] = $tmp;
}



function dataStore_activate(){
    global $wpdb;

    $table_name = $wpdb->prefix . 'data_store';
    if($wpdb->get_var('SHOW TABLES LIKE '.$table_name) != $table_name){

        $sql = 'CREATE TABLE '.$table_name.' (
            id INTEGER(10) UNSIGNED AUTO_INCREMENT,
            content TEXT NOT NULL,
            stripe_token VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id) )';

        require_once (ABSPATH .  'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

}

register_activation_hook(__FILE__,'dataStore_activate');


add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu()
{
    add_menu_page('Data Store', 'Data store', 'manage_options', 'data-store', 'data_store_display');
}

function data_store_display()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'data_store';
    $sql = 'SELECT * FROM '.$table_name;
    $data = $wpdb->get_results($sql);
    include ABSPATH.'wp-content/plugins/dataStore/display.php';
}