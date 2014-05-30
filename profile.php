<?php

	require_once('includes/apis.php');
	require_once('includes/connection.php');
	
	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$userdata = new SteamAPI($_GET['id']);
		if (!isset($userdata->data->response->players)) { die("no players found"); }
	} else {
		//die("bad ID");
		$userdata = new SteamAPI("76561197987981459");
	}
	
	$pagetitle = $userdata->data->response->players[0]->personaname;
	include('includes/header.php') 

?>

<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-9">
      <p class="pull-right visible-xs">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
      </p>
      <div class="row jumbotron">
        <div class="col-4 col-sm-4 col-lg-4">
          <?php echo '<img class="img-responsive avatar-full ' . $userdata->onlineState . '" alt="Player avatar" src="' . $userdata->data->response->players[0]->avatarfull . '">'; ?>
        </div>
        <div class="col-8 col-sm-8 col-lg-8">
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12"><h1><?php echo $userdata->data->response->players[0]->personaname; ?></h1></div>
          </div>
          <div class="row">
						<?php
							$id = $userdata->data->response->players[0]->steamid;
							echo '<div class="col-3 col-sm-3 col-lg-3"><a href="http://www.tf2outpost.com/user/'.$id.'">TF2Outpost</a></div>
								<div class="col-3 col-sm-3 col-lg-3"><a href="http://backpack.tf/profiles/'.$id.'">backpack.tf</a></div>
								<div class="col-3 col-sm-3 col-lg-3"><a href="http://steamrep.com/profiles/'.$id.'">SteamRep</a></div>
								<div class="col-3 col-sm-3 col-lg-3"><a>button4</a></div>';
						?>
          </div>
        </div>
      </div>
      <div class="row"> 
				<div class="col-1 col-sm-1 col-lg-1"></div>
				<div class="col-9 col-sm-9 col-lg-9">
					<?php // select * from comments where target = $_GET['id'] limit 10; ?>
					<div class="row well comment">
						<div><img class="avatar-small ingame" alt="" src="http://media.steampowered.com/steamcommunity/public/images/avatars/3e/3e2b0ef3dcdb4adfc9bdb6c2d1d719d58de36085_full.jpg"></div>
						<div>
							<div><span>Cap'n Ross Dullblade!</span><span>Jul 23 @ 3:09am</span></div>
							<div>+1 Nice guy to deal with. I went first, he followed.</div>
						</div>
					</div>
					<div class="row well comment">
						<div><img class="avatar-small online" alt="" src="http://media.steampowered.com/steamcommunity/public/images/avatars/e7/e771ed201c034029c0dd090982d3d09415856a7f_full.jpg"></div>
						<div><span>flynnwhite1337</span><span>Jul 12 @ 3:17pm</span></div>
						<div>nice and fast trader ++++rep</div>
					</div>
					<div class="row well comment">
						<div><img class="avatar-small offline" alt="" src="http://media.steampowered.com/steamcommunity/public/images/avatars/99/9924fa3a4c8b1bef6cf8ecd5694447e02746709d_full.jpg"></div>
						<div><span>Orko</span><span>Jul 12 @ 3:02am</span></div>
						<div>+REP really nice and patient</div>
					</div>
				</div>
      </div><!--/row-->
    </div><!--/span-->
		<?php include('includes/sidebar.php'); ?>
  </div><!--/row-->
</div><!--/.container-->

<?php include('includes/footer.php'); ?>
