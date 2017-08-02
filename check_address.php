<?php
require_once 'includes/dbh.php';
$name = $_POST['full_name'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$country = $_POST['country'];

$errors = array();
$required = array(
	'full_name' => 'Full Name',
	'email' 	=> 'Email',
	'street' 	=> 'Street Address',
	'city' 		=> 'City',
	'zip_code' 	=> 'Zip Code',
	'country' 	=> 'Country',
);

//check if all fields are filled out
foreach ($required as $f => $d) {
	if (empty($_POST[$f]) || $_POST[$f] == '') {
		$errors[] = $d.' is required.';
	}
}

//check if valid email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors[] = 'Please enter a valid email.';
}

if (!empty($errors)) {
	echo display_errors($errors);
} else {
	echo 'passed';
}

