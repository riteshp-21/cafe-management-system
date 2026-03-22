<?php 

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'cafe_billing_db';
$db_port = 3307;

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
if ($conn->connect_error) {
	die("Could not connect to mysql: " . $conn->connect_error);
}
