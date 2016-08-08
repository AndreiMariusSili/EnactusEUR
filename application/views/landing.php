<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home | Enactus EUR</title>
		<meta name="Enactus | Erasmus University Rotterdam" content="Europe's fastest start-up incubator">
		<meta name="author" content="htmlcoder.me">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Crane Logo -->
		<link rel="shortcut icon" href="/assets/images/Logo_crane.png">
		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
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
						<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
						<li class="facebook"><a target="_blank" href=" https://www.facebook.com/EUREnactus/"><i class="fa fa-facebook"></i></a></li>
						<li class="instagram"><a target="_blank" href=" http://instagram.com/enactus_eur"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<div class="separator mt-10"></div>
					<ul class="nav navbar-nav text-center">
						<li class="active"><a href="/">Home</a></li>
						<li><a href="/ventures">Ventures</a></li>
						<li class="dropdown">
							<a href="/Main/teams" class="dropdown-toggle" data-toggle="dropdown">Teams</a>
							<ul class="dropdown-menu">
								<li><a href="/Main/teams">2016/2017</a></li>
								<!-- <li><a href="#">Previous Years</a></li> -->
							</ul>
						</li>
						<li><a href="/#contact-us">Contact Us</a></li>
					</ul>
				</nav>
				<button type="button" class="offcanvas-toggle-left navbar-toggle animation_loop" data-toggle="offcanvas" data-target="#offcanvas" style="background-color: transparent; !important"></button>
			</section>
			<!-- section end - offcanvas side -->
			<!-- section start - background video -->
			<!-- ================ -->
			<section class="video-background pv-40 dark-translucent-bg hovered">
				<div class="container video_text_c">
					<div class="row video_text_r">
						<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
							<h2 class="text-center object-non-visible video-title" data-animation-effect="zoomIn" data-effect-delay="100"><?php echo $content['video_title'] ?></h2>
							<div class="separator object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100"></div>
							<p class="large text-center object-non-visible video-subtitle" data-animation-effect="zoomIn" data-effect-delay="300"><?php echo $content['video_subtitle'] ?></p>
							<p><button type="button" class="video-button btn btn-lg btn-gray-transparent object-non-visible scrollDownAboutUs" data-animation-effect="zoomIn" data-effect-delay="500">Learn More</button></p>
						</div>
					</div>
				</div>
			</section>
			<!-- section end - background video -->
			<!-- section start - about us -->
			<!-- ================ -->
			<section id="about-us" class="main-container pv-40 clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="text-center">About <strong>Us</strong></h2>
							<div class="separator"></div>
							<div class="row">
								<div class="col-md-4 ">
									<div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
										<span class="icon default-bg circle large"><i class="<?php echo $content['aboutus_left_icon'] ?>"></i></span>
										<h3><?php echo $content['aboutus_left_title'] ?></h3>
										<div class="separator clearfix"></div>
										<p><?php echo $content['aboutus_left_content'] ?></p>
										<a href="/ventures">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
										<span class="icon default-bg circle large"><i class="<?php echo $content['aboutus_center_icon'] ?>"></i></span>
										<h3><?php echo $content['aboutus_center_title'] ?></h3>
										<div class="separator clearfix"></div>
										<p><?php echo $content['aboutus_center_content'] ?></p>
										<a href="/Main/teams">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
										<span class="icon default-bg circle large"><i class="<?php echo $content['aboutus_right_icon'] ?>"></i></span>
										<h3><?php echo $content['aboutus_right_title'] ?></h3>
										<div class="separator clearfix"></div>
										<p><?php echo $content['aboutus_right_content'] ?></p>
										<a href="page-services.html">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end - about us -->
			<!-- section start - accomplishments -->
			<!-- ================ -->
			<section id="accomplishments" class="main-container dark-bg pv-40 clearfix">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">
							<h2 class="text-center"><strong>Our</strong> Accomplishments</h2>
							<div class="separator"></div>
							<div class="stats">
								<div class="row">
									<div class="col-md-4 col-xs-12 text-center">
										<div class="feature-box ph-20 object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
											<span class="icon default-bg circle large"><i class="<?php echo $content['accomp_left_icon'] ?>"></i></span>
											<h3><?php echo $content['accomp_left_title'] ?></h3>
											<div class="separator"></div>
											<span class="counter" data-to="<?php echo $content['accomp_left_content'] ?>" data-speed="5000"></span>
										</div>
									</div>
									<div class="col-md-4 col-xs-12 text-center">
										<div class="feature-box ph-20 object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
											<span class="icon default-bg circle large"><i class="<?php echo $content['accomp_center_icon'] ?>"></i></span>
											<h3><?php echo $content['accomp_center_title'] ?></h3>
											<div class="separator"></div>
											<span class="counter" data-to="<?php echo $content['accomp_center_content'] ?>" data-speed="5000"></span>
										</div>
									</div>
									<div class="col-md-4 col-xs-12 text-center">
										<div class="feature-box ph-20 object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
											<span class="icon default-bg circle large"><i class="<?php echo $content['accomp_right_icon'] ?>"></i></span>
											<h3><?php echo $content['accomp_right_title'] ?></h3>
											<div class="separator"></div>											
											<span class="counter" data-to="<?php echo $content['accomp_right_content'] ?>" data-speed="5000"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</section>
			<!-- section end - accomplishments -->
			<!-- section start - accordion start -->
			<!-- ================ -->
			<section id="contact-us" class="main-container pv-40 clearfix">
				<div class="container">
					<div class="row">
						<h2 class="text-center">Contact <strong>Us</strong></h2>
						<div class="separator"></div>
						<?php if($this->session->flashdata('errors')) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php echo $this->session->flashdata('errors'); ?>
							</div>
						<?php }; ?>
						<div class="panel-group collapse-style-2" id="accordion-2">
							<div class="panel panel-default object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
								<div class="panel-heading">
									<h4 class="panel-title ">
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-2" class="collapsed">
										<i class="fa fa-lightbulb-o pr-10"></i>I have a social venture idea
									</a>
									</h4>
								</div>
								<div id="collapseOne-2" class="panel-collapse collapse">
									<div class="panel-body">
										<form action="/Form/founder" method="POST">
											<div class="form-group">
												<label>My name is...</label>
												<input type="text" class="form-control" name="first_name" placeholder="John" style="margin-bottom: 1rem;"></input>
												<input type= "text" class="form-control" name="last_name" placeholder="Doe"></input>
											</div>
											<div class="form-group">
												<label>I can be reached at...</label>
												<input type="email" class="form-control" name="email" placeholder="john.doe@example.com" style="margin-bottom: 1rem;">
												<input type="text" class="form-control" name="phone_number" placeholder="06 12 34 56 78">
											</div>
											<div class="form-group">
												<label>I was born on...</label>
												<input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy"></input>
											</div>
											<div class="form-group">
												<label>I study...</label>
												<select name="study" class="form-control">
													<option></option>
													<option value="IBA">International Business Administration</option>
													<option value="IBEB">International Bachelor in Business Administration</option>
													<option value="IBCOM">International Bachelor in Communication</option>
												</select>
											</div>
											<div class="form-group">
												<label>I have this amazing idea...</label>
												<input type="text" class="form-control" name="title" placeholder="Give your idea a catchy name" style="margin-bottom: 1rem;">
												<textarea class="form-control" rows="5" name="idea" placeholder="Tell us about your idea in a few sentences"></textarea>
											</div>
											<div class="form-group">
												<label>My motivation is...</label>
												<textarea class="form-control" rows="5" name="motivation" placeholder="Tell us about why you want to pursue this idea in a few sentences"></textarea>
											</div>
											<input type="hidden" name="type" value="founder"/>
											<input type="hidden" name="statusProject" value="pending"/>
											<input type="hidden" name="statusMember" value="pending"/>
											<div class="form-group">
												<button type="submit" class="btn btn-default">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-default object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-2" class="collapsed">
										<i class="fa fa-users pr-10"></i>I want to be part of a social venture
									</a>
									</h4>
								</div>
								<div id="collapseTwo-2" class="panel-collapse collapse">
									<div class="panel-body">
										<form action="/Form/cofounder" method="POST">
											<div class="form-group">
												<label>My name is...</label>
												<input type="text" class="form-control" name="first_name" placeholder="John" style="margin-bottom: 1rem;"></input>
												<input type= "text" class="form-control" name="last_name" placeholder="Doe"></input>
											</div>
											<div class="form-group">
												<label>I can be reached at...</label>
												<input type="email" class="form-control" name="email" placeholder="john.doe@example.com" style="margin-bottom: 1rem;">
												<input type="text" class="form-control" name="phone_number" placeholder="+31 6 123 456 78">
											</div>
											<div class="form-group">
												<label>I was born on...</label>
												<input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy"></input>
											</div>
											<div class="form-group">
												<label>I study...</label>
												<select name="study" class="form-control">
													<option></option>
													<option value="IBA">IBA</option>
													<option value="IBEB">IBEB</option>
													<option value="IBCOM">IBCOM</option>
												</select>
											</div>
											<div class="form-group">
												<label>I want to join the venture...</label>
												<select name="project_preference" class="form-control">
													<option></option>
													<?php foreach($options as $option) { ?>
													<option value="<?php echo $option['project_title'] ?>"><?php echo $option['project_title']; ?></option>
													<?php }; ?>
												</select>
											</div>
											<div class="form-group">
												<label>Because...</label>
												<textarea class="form-control" name="motivation" rows="5" placeholder="I want to help others help themselves."></textarea>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-default">Submit</button>
											</div>
											<input type="hidden" name="type" value="cofounder"/>
											<input type="hidden" name="statusMember" value="pending"/>
											<input type="hidden" name="statusApplication" value = "pending" />
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-default object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseThree-2" class="collapsed">
										<i class="fa fa-paper-plane pr-10"></i>I want to stay up to date on what Enactus is up to
									</a>
									</h4>
								</div>
								<div id="collapseThree-2" class="panel-collapse collapse">
									<div class="panel-body">
										<form action="/Form/passive" method="POST">
											<div class="form-group">
												<label>My name is...</label>
												<input type="text" class="form-control" name="first_name" placeholder="John" style="margin-bottom: 1rem;"></input>
												<input type= "text" class="form-control" name="last_name" placeholder="Doe"></input>
											</div>
											<div class="form-group">
												<label>I can be reached at...</label>
												<input type="email" class="form-control" name="email" placeholder="john.doe@example.com" style="margin-bottom: 1rem;">
												<input type="text" class="form-control" name="phone_number" placeholder="+31 6 123 456 78">
											</div>
											<div class="form-group">
												<label>I was born on...</label>
												<input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy"></input>
											</div>
											<div class="form-group">
												<label>I study...</label>
												<select name="study" class="form-control">
													<option></option>
													<option value="IBA">IBA</option>
													<option value="IBEB">IBEB</option>
													<option value="IBCOM">IBCOM</option>
												</select>
											</div>
											<div class="form-group">
												<label>I want to stay up to date because...</label>
												<textarea class="form-control" rows="5" name="motivation" placeholder="I am interested in social entrepreneurship"></textarea>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-default">Submit</button>
											</div>
											<input type="hidden" name="type" value="passive"/>
											<input type="hidden" name="status" value="accepted"/>
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-default object-non-visible" data-animation-effect="zoomIn" data-effect-delay="100">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseFour-2" class="collapsed">
										<i class="fa fa-building pr-10"></i>I want to become a business partner
									</a>
									</h4>
								</div>
								<div id="collapseFour-2" class="panel-collapse collapse">
									<div class="panel-body">
										<form action="/Form/partner" method="POST">
											<div class="form-group">
												<label>My name is...</label>
												<input type="text" class="form-control" name="first_name" placeholder="John" style="margin-bottom: 1rem;"></input>
												<input type= "text" class="form-control" name="last_name" placeholder="Doe"></input>
											</div>
											<div class="form-group">
												<label>I can be reached at...</label>
												<input type="email" class="form-control" name="email" placeholder="john.doe@example.com" style="margin-bottom: 1rem;">
												<input type="text" class="form-control" name="phone_number" placeholder="+31 6 123 456 78">
											</div>
											<div class="form-group">
												<label>I represent...</label>
												<input type="text" class="form-control" name="organization" placeholder="HappyWorld plc."></input>
											</div>
											<div class="form-group">
												<label>I want to become a business partner because...</label>
												<textarea class="form-control" rows="5" name="motivation" placeholder="I am interested in social entrepreneurship"></textarea>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-default">Submit</button>
											</div>
											<input type="hidden" name="status" value="pending">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end - accordion -->
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
											<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
											<li class="facebook"><a target="_blank" href=" https://www.facebook.com/EUREnactus/"><i class="fa fa-facebook"></i></a></li>
											<li class="instagram"><a target="_blank" href=" http://instagram.com/enactus_eur"><i class="fa fa-instagram"></i></a></li>
										</ul>
										<ul class="list-inline mb-20">
											<li><a href="https://www.google.nl/maps/place/Erasmus+Universiteit+Rotterdam/@51.9179782,4.5239854,17z/data=!3m1!4b1!4m5!3m4!1s0x47c4332163e239dd:0x589a97af738b9969!8m2!3d51.9179749!4d4.5261741?hl=en" class="link-dark"><i class="text-default fa fa-map-marker pr-5"></i>Burgemeester Oudlaan 50, 3062PA</li>
											<li><a href="tel:+00 1234567890" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-5"></i>+00 1234567890</a></li>
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
	<!-- page wrapper end -->
</html>