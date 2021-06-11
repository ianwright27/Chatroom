<?php

//  conf1gs
$DB_HOST = "127.0.0.1";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "simple_chatroom";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
	die(mysqli_error($conn));
}

// other conf1gs
$TABLE_PREFIX = '';

?>