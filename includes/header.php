<?php
	session_start();

	require_once('openid.php');
	require_once('apis.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">

    <?php echo "<title>$pagetitle - TF2Reputation</title>"; ?>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">
    <link href="css/tf2reputation.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
		<div id="wrap">

			<!-- <div class="navbar navbar-inverse navbar-fixed-top"> -->
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">TF2Reputation</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<!-- <li class="active"><a href="/">Home</a></li> -->
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="rules.php">Rules</a></li>
							<li><a href="search.php">Search</a></li>
<!--							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="dropdown-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>-->
							<?php
								$openid = new LightOpenID('tf2reputation.com');

								if($openid->validate() || isset($_SESSION['id'])) {
									$userid = explode("/", $_SESSION['id'])[5];
									$loggedinuserdata = new SteamAPI($userid);

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
							?>
						</ul>

					</div><!--/.navbar-collapse -->
				</div>
			</div>
