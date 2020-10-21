<?php
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	
	$_POST['comment_title'] = stripslashes($_POST['comment_title']);
	
	if (isset($_POST['comment_title']) && isSet($_POST['comment_content']) ) {

		$sender = $_POST['sender_id'];
		$receiver = $_POST['receiver_id'];
		$title = $_POST['comment_title'];
		$content = $_POST['comment_content'];

		$query_comment = mysqli_query($con, "INSERT INTO profile_comments (sender_id, receiver_id, title, content) VALUES ('$sender', '$receiver', '$title', '$content')");
		
		if ($query_comment) 	header('Location:../../profile.php?username=' . $receiver . '&submit=View+Profile');
		else								echo 'Failed to post a comment.';
	}
?>