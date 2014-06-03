<?php session_start(); ?>

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
							<?php include('includes/steamuser.php'); ?>
						</ul>

					</div><!--/.navbar-collapse -->
				</div>
			</div>
