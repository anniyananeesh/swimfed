
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo SITE_NAME?> </title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">
--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Aqautic Green Gate Admin" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo ADMIN_CSS_PATH?>/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo ADMIN_CSS_PATH?>/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="<?php echo ADMIN_CSS_PATH?>/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
 <!-- js-->
<script src="<?php echo ADMIN_JS_PATH?>/jquery-1.11.1.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH?>/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<!--animate-->
<link href="<?php echo ADMIN_CSS_PATH?>/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo ADMIN_JS_PATH?>/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="<?php echo ADMIN_JS_PATH?>/metisMenu.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH?>/custom.js"></script>
<link href="<?php echo ADMIN_CSS_PATH?>/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head>
<body class="cbp-spmenu-push_login">
	<div class="main-content">

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Forgot Password ?</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Put your username and we'll send you the new reset password !  </h4>
					</div>
					<div class="login-body">

						<?php $this->load->view('shared/alerts');?>

						<form action="" method="post" enctype="application/x-www-form-urlencoded">
							<input type="text" class="user" name="username" placeholder="Enter your username" required>
							<input type="submit" name="Sign In" value="Reset my password">
							<div class="forgot-grid">
 								<div class="forgot">
									<a href="<?php echo HOST_URL . '/' . CLUB_LOGIN ?>">Already have account signin?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Aqautic Greengate Admin Panel. All Rights Reserved | Design by <a href="http://www.digitalgateweb.com/" target="_blank">Digital Gate</a></p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?php echo ADMIN_JS_PATH?>/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="<?php echo ADMIN_JS_PATH?>/jquery.nicescroll.js"></script>
	<script src="<?php echo ADMIN_JS_PATH?>/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo ADMIN_JS_PATH?>/bootstrap.js"> </script>
</body>
</html>
