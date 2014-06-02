<?php
	require_once('openid.php');
	require_once('apis.php');

	// session_start();

	$openid = new LightOpenID('tf2reputation.com');

	// $user = new SteamAPI;

	// echo '<div class="navbar-right" style="color:white;">';
	if($openid->validate() || isset($_SESSION['id'])) {

		$userid = explode("/", $_SESSION['id'])[5];
		$loggedinuserdata = new SteamAPI($userid);
//		$userdata = $user->getUserData();

		// These are in reverse order because they are floated right
		echo '<li class="navbar-right"><a style="padding:6px 15px 0 0;" href="profile.php?id=' .
			$loggedinuserdata->data->response->players[0]->steamid . '"><img class="avatar-small ' .
			$loggedinuserdata->onlineState . '" alt="Player avatar" src="' .
			$loggedinuserdata->data->response->players[0]->avatarfull . '"></a>';
		echo '<li class="navbar-right"><a href="profile.php?id=' .
			$loggedinuserdata->data->response->players[0]->steamid . '">' .
			$loggedinuserdata->data->response->players[0]->personaname . '</a></li>';

	} else {
		echo '<li class="navbar-right"><a href="login.php?login&amp;loc=' . urlencode($_SERVER['REQUEST_URI']) . 
			'" style="padding:3px 15px 3px 0;"><img class="img-responsive" alt="Sign in through Steam" ' .
			'src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_noborder.png"></a></li>';
	}
	// echo '</div>';
?>
