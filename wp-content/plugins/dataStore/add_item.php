<?php

function add($data)
{
    global $wpdb;
    $table = $wpdb->prefix . 'data_store';
    $c = $data['content'];
    $p = $data['stripe_id'];
    $sql = "INSERT INTO $table (content,stripe_token) VALUES ('$c','$p')";
    $wpdb->query($sql);

}

