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

session_start();
require_once 'config.php';
require 'vendor/autoload.php';

$cart_id = '';
if (isset($_COOKIE[CART_COOKIE])) {
	$cart_id = $_COOKIE[CART_COOKIE];
}

if (isset($_SESSION['success_flash'])) {
	echo '<div class="bg-success" style="margin-top:70px;"><p class="text-success text-center">' . $_SESSION['success_flash'].'</p></div>';
	unset($_SESSION['success_flash']);
}
if (isset($_SESSION['error_flash'])) {
	echo '<div class="bg-danger" style="margin-top:70px;"><p class="text-danger text-center">' . $_SESSION['error_flash'].'</p></div>';
	unset($_SESSION['error_flash']);
}