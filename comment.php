<?php

require_once 'includes/dbh.php';

$user_id = mysqli_real_escape_string($conn, $_POST['userId']);
$product_id = mysqli_real_escape_string($conn, $_POST['productId']);
$comment = mysqli_real_escape_string($conn, $_POST['comment-post-text']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$rating = mysqli_real_escape_string($conn, $_POST['rating']);

if (isset($_POST['submit']) && $rating != '' && $rating>=0 && $rating<=5) {

	$conn->query("INSERT INTO comments (user_id, product_id, comment, date, rating) VALUES ('$user_id', '$product_id', '$comment', '$date', '$rating');");
	$_SESSION['success_flash'] = 'You have left a review!';
	header("Location: index3.php?id=".$product_id."");

} else {
	$_SESSION['error_flash'] = 'Invalid review!';
	header("Location: index3.php?id=".$product_id."");
}