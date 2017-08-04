<?php

if(isset($_POST['task']) && $_POST['task'] == 'comment_insert') {
	$userId = (int)$_POST['userId'];
	$comment = addslashes($_POST['comment']);
	$stars = (int)$_POST['stars'];

	$std = new stdClass();
	$std->commentId = 24;
	$std->userId = $userId;
	$std->comment = $comment;
	$std->stars = $stars;

	require_once 'comments.php';
	if (class_exists('Comments')) {
		Comments::insert($comment_txt, $userId);
	}

	echo json_encode($std);

} else {
	header("Location: /");
}

?>