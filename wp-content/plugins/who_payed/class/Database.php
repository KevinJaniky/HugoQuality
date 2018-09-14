<?php

function create_plugin_database_table()
{
    global $table_prefix, $wpdb;

    $tblname = 'who_payed';
    $wp_track_table = $table_prefix . "$tblname ";

    #Check to see if the table exists already, if not, then create it

    if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table)
    {

        $sql = "CREATE TABLE $wp_track_table(";
        $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
        $sql .= "  `content`  text   NOT NULL, ";
        $sql .= "  `payed`  int(1)   NOT NULL, ";
        $sql .= "  PRIMARY KEY `order_id` (`id`) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
}

register_activation_hook( __FILE__, 'create_plugin_database_table' );