<?php

phpinfo(); die();
	session_start();

	require('includes/apis.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		$id = "76561197987981459";
	}

	echo '<html><body><pre>';
	$s = new SteamAPI("$id");
//	echo sys_get_temp_dir();
//	$s = new Tf2opAPI($id);
	var_dump($s->data);
	echo '</pre></body></html>';

?>