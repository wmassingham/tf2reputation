<?php

	if ($_POST) {
		
//		require_once('includes/header.php');
		require_once('includes/connection.php');
		
		echo '<pre>';
		var_dump($_POST);
		echo '</pre>';
		
		echo 'insert into comments (author, target, text, vote, timestamp)
			values ('.$_POST['userid'].', '.$_POST['id'].', '.$_POST['comment'].', '.$_POST['vote'].', now())';
		
		$stmt = mysqli_prepare($link, 'insert into comments (author, target, text, vote, timestamp)
			values (?, ?, ?, ?, now())');
		mysqli_stmt_bind_param($stmt, 'iisi', $_POST[''], $_POST['id'], $_POST['comment'], $_POST['vote']);
//		mysqli_stmt_execute($stmt) or die('Failed to insert comment: ' . mysqli_error($link));
		
//		header('Location: profile.php?id='.$_POST['id']);
		
	} else {
		
		//@TODO Handle bad/no referrer?
//		header('Location: profile.php?id='.$_SERVER['HTTP_REFERER']);
		
	}	

?>