<?php
include 'content/includes/db.php';

$results = DB::query("SELECT * FROM users");

foreach ($results as $res => $value) {
    echo $res[$value];
}