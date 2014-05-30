
<?php
	header('Location: profile.php'); exit();
	include('includes/header.php');
?>

<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-9">
      <p class="pull-right visible-xs">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
      </p>
      <div class="row jumbotron">
        <div class="col-4 col-sm-4 col-lg-4">
          <img class="img-responsive" src="http://media.steampowered.com/steamcommunity/public/images/avatars/fb/fb460340876f73516c94fd9c53c3c2cb27522a83_full.jpg">
        </div>
        <div class="col-8 col-sm-8 col-lg-8">
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12"><h1>SheeEttin</h1></div>
          </div>
          <div class="row">
            <div class="col-3 col-sm-3 col-lg-3"><p>button1</p></div>
            <div class="col-3 col-sm-3 col-lg-3"><p>button2</p></div>
            <div class="col-3 col-sm-3 col-lg-3"><p>button3</p></div>
            <div class="col-3 col-sm-3 col-lg-3"><p>button4</p></div>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-6 col-sm-6 col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!--/span-->
        <div class="col-6 col-sm-6 col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!--/span-->
        <div class="col-6 col-sm-6 col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/span-->
		<?php include('includes/sidebar.php'); ?>
  </div><!--/row-->
</div><!--/.container-->

<?php include('includes/footer.php'); ?>
