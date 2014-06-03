<?php

	require_once('includes/apis.php');
	require_once('includes/connection.php');

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		die('bad id');
	}

	$userdata = new SteamAPI($id);
	if (!isset($userdata->data->response->players)) { die('no players found'); }

	$pagetitle = $userdata->data->response->players[0]->personaname;
	include('includes/header.php') 

?>

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
<!--			<p class="pull-right visible-xs">
				<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
			</p>-->
			<div class="row jumbotron">
				<div class="col-xs-4">
					<?php echo '<img class="img-responsive avatar-full ' . $userdata->onlineState . '" alt="Player avatar" src="' . $userdata->data->response->players[0]->avatarfull . '">'; ?>
				</div>
				<div class="col-xs-8">
					<div class="row">
						<div class="col-md-12"><h1><?php echo $userdata->data->response->players[0]->personaname; ?></h1></div>
					</div>
					<div class="row community-links">
						<?php
							$id = $userdata->data->response->players[0]->steamid;
							echo '<div class="col-xs-3 col-md-2"><a href="http://steamcommunity.com/profiles/' . $id . '"><img class="img-responsive" src="/img/steam.svg"></a></div>
								  <div class="col-xs-3 col-md-2"><a href="http://www.tf2outpost.com/user/' . $id . '"><img class="img-responsive" src="/img/tf2outpost.svg"></a></div>
								  <div class="col-xs-3 col-md-2"><a href="http://backpack.tf/profiles/' . $id . '"><img class="img-responsive" src="/img/backpacktf.svg"></a></div>
								  <div class="col-xs-3 col-md-2"><a href="http://steamrep.com/profiles/' . $id . '"><img class="img-responsive" src="/img/steamrep.svg"></a></div>';
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9 col-xs-offset-1 col-xs-10">
					<?php
						$row = array();
						$stmt = mysqli_prepare($link, 'select * from comments where target=? order by timestamp desc limit 5');
						mysqli_stmt_bind_param($stmt, 'i', $id);
						mysqli_stmt_execute($stmt) or die('Failed to execute query: ' . mysqli_error($link));
						mysqli_stmt_store_result($stmt);
						mysqli_stmt_bind_result($stmt, $row['commentid'], $row['author'], $row['target'],
							$row['timestamp'], $row['text'], $row['link'], $row['vote'], $row['moderated']);
						if (mysqli_stmt_num_rows($stmt) > 0) {
							while (mysqli_stmt_fetch($stmt)) {
								$commentuser = new SteamAPI($row['author']);
								echo '<div class="row well comment">
										<img class="avatar-small '.$commentuser->onlineState.'" src="'.$commentuser->data->response->players[0]->avatarfull.'">
										<div style="overflow:hidden;">'.$commentuser->data->response->players[0]->personaname.'<br class="visible-xs">'.$row['timestamp'].'</div>
										<span>'.$row['text'].'</span>
									</div>';
							}
						} else {
							echo '<div class="row well comment text-muted">No comments for this user yet.</div>';
						}
						mysqli_stmt_free_result($stmt);
					?>
				</div>
			</div><!--/row-->
		</div><!--/span-->
		<?php // include('includes/sidebar.php'); ?>
	</div><!--/row-->
</div><!--/.container-->

<?php include('includes/footer.php'); ?>
