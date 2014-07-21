    </div><!--/#wrap-->

	<footer class="container">
		<p class="text-muted pull-right">
			&copy; 2013. <a href="http://steampowered.com">Powered by Steam.</a>
			<?php echo 'Host: '.$_SERVER['SERVER_NAME'].' ('.$_SERVER['SERVER_ADDR'].')'; ?>
		</p>
	</footer>

		<!-- Bootstrap core JavaScript -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- <script src="../../assets/js/jquery.js"></script> -->
		<!-- <script src="../../dist/js/bootstrap.min.js"></script> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="scripts/bootstrap-maxlength.js"></script>
		<script src="scripts/offcanvas.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/FitText.js/1.1/jquery.fittext.min.js"></script>
		<script src="/scripts/script.js"></script>
		<script><?php echo $jsOutput; ?></script>
	</body>
</html>
