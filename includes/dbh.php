<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "LgCz.962";
$dbName = "protein_shop";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$conn->set_charset('utf8');

if (mysqli_connect_errno()) {
	echo 'Database connection failed with following errors: ' . mysqli_connect_error();
	die();
}