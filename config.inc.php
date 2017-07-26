<?php
$db_username = 'root';
$db_password = 'coppermine';
$db_name = 'goodyear';
$db_host = '10.18.69.1';
$item_per_page = 3;

$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
?>