<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Teams 2016/2017 | Enactus EUR</title>
		<meta name="Teams 2016/2017 | Erasmus University Rotterdam" content="Europe's fastest start-up incubator">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Crane Logo -->
		<link rel="shortcut icon" href="/assets/images/Logo_crane.png">
		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<!-- Bootstrap core CSS -->
		<link href="/assets/css/bootstrap.css" rel="stylesheet">
		<!-- Font Awesome CSS -->
		<link href="/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!-- Fontello CSS -->
		<link href="/assets/fonts/fontello/css/fontello.css" rel="stylesheet">
		<!-- Plugins -->
		<link href="/assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="/assets/plugins/rs-plugin/css/settings.css" rel="stylesheet">
		<link href="/assets/plugins/rs-plugin-5/css/layers.css" rel="stylesheet">
		<link href="/assets/plugins/rs-plugin-5/css/navigation.css" rel="stylesheet">
		<link href="/assets/css/animate.css" rel="stylesheet">
		<link href="/assets/css/animations.css" rel="stylesheet">
		<link href="/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="/assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
		<link href="/assets/plugins/hover/hover-min.css" rel="stylesheet">
		<link href="/assets/plugins/morphext/morphext.css" rel="stylesheet">
		<link href="/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet">
		
		<!-- The Project core CSS file -->
		<link href="/assets/css/style.css" rel="stylesheet" >
		<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
		<link href="/assets/css/skins/enactus_colors.css" rel="stylesheet">
		<!-- Custom css -->
		<link href="/assets/css/custom.css" rel="stylesheet">
	</head>
	<!-- body classes:  -->
	<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
	<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
	<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
	<!-- "gradient-background-header": applies gradient background to header -->
	<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
	<body class="no-trans">
		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		<div class="page-wrapper">
			<div id="page-start"></div>
			
			<!-- section start - offcanvas side -->
			<!-- ================ -->
			<section class="offcanvas-container">
				<nav id="offcanvas" class="animated navmenu navmenu-default navmenu-fixed-left offcanvas offcanvas-left" role="navigation">
					<!-- logo -->
					<div class="logo">
						<a href="/"><img id="logo" src="/assets/images/Logo_enactus.png" alt="Logo_Enactus" ></a>
					</div>
					<!-- name-and-slogan -->
					<div class="site-slogan">
						Erasmus University Rotterdam
					</div>
					<div class="separator"></div>
					<ul class="social-links circle small clearfix margin-clear text-center animated-effect-1">
						<li class="linkedin"><a target="_blank" href="https://www.linkedin.com/company/enactus-erasmus-university-rotterdam"><i class="fa fa-linkedin"></i></a></li>
						<li class="facebook"><a target="_blank" href=" https://www.facebook.com/EUREnactus/"><i class="fa fa-facebook"></i></a></li>
						<li class="instagram"><a target="_blank" href=" http://instagram.com/enactus_eur"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<div class="separator mt-10"></div>
					<ul class="nav navbar-nav text-center">
						<li><a href="/">Home</a></li>
						<li><a href="/ventures">Ventures</a></li>
						<li class="dropdown active">
							<a href="/teams" class="dropdown-toggle" data-toggle="dropdown">Teams</a>
							<ul class="dropdown-menu">
								<li class="active"><a href="/teams">2016/2017</a></li>
								<!-- <li><a href="#">Previous Years</a></li> -->
							</ul>
						</li>
						<li><a href="/#contact-us">Contact Us</a></li>
					</ul>
				</nav>
				<button type="button" class="offcanvas-toggle-left navbar-toggle animation_loop" data-toggle="offcanvas" data-target="#offcanvas" style="background-color: transparent; !important"></button>
			</section>
			<!-- section end - offcanvas side -->

			<!-- header start (Add "dark" class to #footer in order to enable dark footer) -->
			<!-- ================ -->
			<header id="header" class="clearfix fixed dark">
				<!-- .header start - background color-->
				<!-- ================ -->
				<div class="header">
					<div class="container">
						<div class="header-inner">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<div class="footer-content text-center padding-ver-clear">
										<div class="logo-header"><img id="logo-header" class="center-block" src="/assets/images/Logo_origami_white.png" alt="Logo_Enactus_Origami_White"></div>
										<h1 class="title_teams_page page-title">Meet the Enactus people</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .header end -->
			</header>
			<!-- header end -->

				<!-- section start - Enactus members -->
				<!-- ================ -->
				<!-- Team start -->
				<?php $i=0; foreach($teams as $team) { ?>
					<section class="container-teams main-container pv-40 clearfix <?php if($i % 2 === 0) { echo 'highlight-background'; } ?>">
									<div class="row">
										<div class="main col-xs-12">
											<div class="separator"></div>
											<h2 class="text-center"><strong><?php echo $team['title']; ?></strong></h2>
											<div class="separator"></div>
										</div>
									</div>
									<div class="row">
										<?php foreach($members as $member) { 
											if($team['id'] === $member['teams_admin_team_id']) { ?>
										<div class="col-sm-4">
											<div class="image-box style-2 mb-20 dark-bg text-center object-non-visible" data-animation-effect="fadeIn" data-animation-duration='1s'>
												<div class="overlay-container">
													<img src="<?php echo $member['relative_path']; ?>" alt="/assets/images/members/avatar.jpg">
													<div class="overlay-top">
														<h4><?php echo "{$member['first_name']} {$member['last_name']}"; ?></h4>
														<h5><?php echo $member['function']; ?></h5>
													</div>
													<div class="overlay-bottom">
														<ul class="social-links circle dark margin-clear">
															<li class="linkedin"><a target="_blank" href="<?php echo $member['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
															<li class="email"><a target="_blank" href="mailto: <?php echo $member['mail']; ?>"><i class="fa fa-envelope-o"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="body">
													<p><?php echo $member['quote'] ?></p>
												</div>
											</div>
										</div>
										<?php 
											};
										}; ?>
									</div>
					</section>
					<?php $i++; }; ?>
					<!-- Team end -->


			<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
			<!-- ================ -->
			<footer id="footer" class="clearfix dark">
				<!-- .footer start -->
				<!-- ================ -->
				<div class="footer">
					<div class="container">
						<div class="footer-inner">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<div class="footer-content text-center padding-ver-clear">
										<div class="logo-footer"><img id="logo-footer" class="center-block" src="/assets/images/Logo_origami.png" alt="Logo_Enactus_Origami"></div>
										<ul class="social-links circle animated-effect-1">
											<li class="linkedin"><a target="_blank" href="https://www.linkedin.com/company/enactus-erasmus-university-rotterdam"><i class="fa fa-linkedin"></i></a></li>
											<li class="facebook"><a target="_blank" href=" https://www.facebook.com/EUREnactus/"><i class="fa fa-facebook"></i></a></li>
											<li class="instagram"><a target="_blank" href=" http://instagram.com/enactus_eur"><i class="fa fa-instagram"></i></a></li>
										</ul>
										<ul class="list-inline mb-20">
											<li><a href="https://www.google.nl/maps/place/Erasmus+Universiteit+Rotterdam/@51.9179782,4.5239854,17z/data=!3m1!4b1!4m5!3m4!1s0x47c4332163e239dd:0x589a97af738b9969!8m2!3d51.9179749!4d4.5261741?hl=en" class="link-dark"><i class="text-default fa fa-map-marker pr-5"></i>Burgemeester Oudlaan 50, 3062PA</li>
											<li><a href="tel:+31 6 24 76 39 69" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-5"></i>+31 6 24 76 39 69</a></li>
											<li><a href="mailto:info@enactus-eur.nl" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-5"></i>info@enactus-eur.nl</a></li>
										</ul>
										<div class="separator"></div>
										<p class="text-center margin-clear">Copyright © 2016 Enactus EUR by <a target="_blank" href="http://www.tsociety.io">Turing Society</a>. All Rights Reserved</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .footer end -->
			</footer>
			<!-- footer end -->
		</div>
		<!-- page-wrapper end -->
		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="/assets/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<!-- Modernizr javascript -->
		<script type="text/javascript" src="/assets/plugins/modernizr.js"></script>
		<!-- jQuery Revolution Slider  -->
		<script type="text/javascript" src="/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="/assets/plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
		<script type="text/javascript" src="/assets/plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
		<!-- Jasny Bootstrap  -->
		<script type="text/javascript" src="/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.js"></script>
		<!-- Isotope javascript -->
		<script type="text/javascript" src="/assets/plugins/isotope/isotope.pkgd.min.js"></script>
		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<!-- Appear javascript -->
		<script type="text/javascript" src="/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
		<!-- Count To javascript -->
		<script type="text/javascript" src="/assets/plugins/jquery.countTo.js"></script>
		<!-- Parallax javascript -->
		<script src="/assets/plugins/jquery.parallax-1.1.3.js"></script>
		<!-- Contact form -->
		<script src="/assets/plugins/jquery.validate.js"></script>
		<!-- Morphext -->
		<script type="text/javascript" src="/assets/plugins/morphext/morphext.min.js"></script>
		<!-- Pace javascript -->
		<script type="text/javascript" src="/assets/plugins/pace/pace.min.js"></script>
		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="/assets/plugins/owl-carousel/owl.carousel.js"></script>
		<!-- SmoothScroll javascript -->
		<script type="text/javascript" src="/assets/plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="/assets/plugins/SmoothScroll.js"></script>
		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="/assets/js/template.js"></script>
		<!-- Background Video -->
		<script src="/assets/plugins/vide/jquery.vide.js"></script>
		<!-- Custom Scripts -->
		<script type="text/javascript" src="/assets/js/custom.js"></script>
	</body>
</html>