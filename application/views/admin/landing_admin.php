<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin | Landing</title>
		<meta name="Enactus | Erasmus University Rotterdam" content="Europe's fastest start-up incubator">
		
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
		
		<!-- Bootstrap Select -->
		<link href="/assets/css/bootstrap-select.min.css" rel="stylesheet">
		<!-- The Project core CSS file -->
		<link href="/assets/css/style.css" rel="stylesheet" >
		<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
		<link href="/assets/css/skins/enactus_colors.css" rel="stylesheet">
		<!-- Custom css -->
		<link href="/assets/css/custom.css" rel="stylesheet">

		<?php $this->load->helper('form'); ?>

	</head>
	<body class="no-trans  transparent-header  ">
		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">
			
			<!-- header-container start -->
			<div class="header-container">
				
				<!-- header start -->
				<!-- classes:  -->
				<!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
				<!-- "dark": dark version of header e.g. class="header dark clearfix" -->
				<!-- "full-width": mandatory class for the full-width menu layout -->
				<!-- "centered": mandatory class for the centered logo layout -->
				<!-- ================ -->
				<header class="header  fixed    clearfix">	
					<div class="container">
						<div class="row">
							<div class="col-md-9">						
								<!-- header-left start -->
								<!-- ================ -->
								<div class="header-left clearfix">
									
									<!-- main-navigation start -->
									<!-- classes: -->
									<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
									<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
									<!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
									<!-- ================ -->
									<div class="main-navigation onclick animated with-dropdown-buttons">
										<!-- navbar start -->
										<!-- ================ -->
										<nav class="navbar navbar-default" role="navigation">
											<div class="container-fluid">
												<!-- Toggle get grouped for better mobile display -->
												<div class="navbar-header">
													<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													</button>
													
												</div>
												<!-- Collect the nav links, forms, and other content for toggling -->
												<div class="collapse navbar-collapse" id="navbar-collapse-1">
													<!-- main-menu -->
													<ul class="nav navbar-nav ">
														<li>
															<a href="/Admin/landing_admin">Landing</a>
														</li>
														<li>
															<a href="/Admin/ventures_admin">Ventures</a>
														</li>
														<li>
															<a href="/Admin/teams_admin_teams">Teams</a>
														</li>
														<li>
															<a href="/Admin/dashboard">Project Admin</a>
														</li>
													</ul>
													<!-- main-menu end -->
													
												</div>
											</div>
										</nav>
										<!-- navbar end -->
									</div>
									<!-- main-navigation end -->
								</div>
								<!-- header-left end -->
							</div>
						</div>
					</div>
				</header>
			</div>
			<!-- header-container end -->
			<!-- content-container start -->
			<div class="container">
				<!-- header end -->
				<!-- background video file upload start -->
				<div class="row">
					<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
								<h3 class="panel-title">Use this form to uplaod a new background video and poster</h3>
						</div>
						<div class="panel-body">
							<?php echo form_open_multipart('/Admin_edit/videoPosterUpload');?>
								<div class="form-group">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Upload Video</span><span class="fileinput-exists">Change</span><input type="file" name="video"></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
								</div>
								<div class="form-group">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Upload Poster</span><span class="fileinput-exists">Change</span><input type="file" name="poster"></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
								</div>
								<button type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
							</form>
						</div>
					</div>
					</div>
				</div>
				<!-- background video file upload end -->
				<!-- background video section modifier start -->
				<div class="row">
					<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
								<h3 class="panel-title">Use this form to modify the background video section</h3>
						</div>
						<div class="panel-body">
							<form action="/Admin_edit/videoEdit" method="POST">
									<textarea class="form-control" rows="2" name="video_title" placeholder="Input here the title to be shown on top of the video..."><?php echo set_value('video_title', $video_title); ?></textarea>
									<div class="separator clearfix"></div>
									<textarea class="form-control" rows="2" name="video_subtitle" placeholder="Input here the subtitle to be shown on top of the video..."><?php echo set_value('video_subtitle', $video_subtitle) ?></textarea>
									<button type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
							</form>
						</div>
					</div>
					</div>
				</div>
				<!-- background video section modifier end -->
				<!-- about us section modifier start -->
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Use this form to modify the 'About <strong>Us</strong>' section</h3>
							</div>
							<div class="panel-body">
								<form action="/Admin_edit/aboutusEdit" method="POST">
									<div class="col-xs-4 ">
										<div class="ph-20 feature-box text-center">
											<span class="icon default-bg circle large"><i class="<?php echo $aboutus_left_icon ?>"></i></span>
											<input type="text" name="block_left_icon" class="form-control" placeholder="Input here the icon of the left block..." value="<?php echo set_value('block_left_icon', $aboutus_left_icon) ?>" />
											<div class="separator"></div>
											<input type="text" name="block_left_title" class="form-control" placeholder="Input here the title of the left block..." value="<?php echo set_value('block_left_title', $aboutus_left_title); ?>" />
											<div class="separator clearfix"></div>
											<textarea class="form-control" rows="3" name="block_left_content" placeholder="Input here content of the left block..."><?php echo set_value('block_left_content', $aboutus_left_content); ?></textarea>
										</div>
									</div>
									<div class="col-xs-4 ">
										<div class="ph-20 feature-box text-center">
											<span class="icon default-bg circle large"><i class="<?php echo $aboutus_center_icon ?>"></i></span>
											<input type="text" name="block_center_icon" class="form-control" placeholder="Input here the icon of the center block..." value="<?php echo set_value('block_center_icon', $aboutus_center_icon) ?>" />
											<div class="separator"></div>
											<input type="text" name="block_center_title" class="form-control" placeholder="Input here the title of the center block..." value = "<?php echo set_value('block_center_title', $aboutus_center_title); ?>" />
											<div class="separator clearfix"></div>
											<textarea class="form-control" rows="3" name="block_center_content" placeholder="Input here content of the center block..."><?php echo set_value('block_center_content', $aboutus_center_content); ?></textarea>
										</div>
									</div>
									<div class="col-xs-4 ">
										<div class="ph-20 feature-box text-center">
											<span class="icon default-bg circle large"><i class="<?php echo $aboutus_right_icon ?>"></i></span>
											<input type="text" name="block_right_icon" class="form-control" placeholder="Input here the icon of the right block..." value="<?php echo set_value('block_right_icon', $aboutus_right_icon) ?>" />
											<div class="separator"></div>
											<input type="text" name="block_right_title" class="form-control" placeholder="Input here the title of the right block..." value = "<?php echo set_value('block_right_title', $aboutus_right_title); ?>" />
											<div class="separator clearfix"></div>
											<textarea class="form-control" rows="3" name="block_right_content" placeholder="Input here content of the right block..."><?php echo set_value('block_right_content', $aboutus_right_content); ?></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- about us section modifier end -->
				<!-- accomplishments section modifier start -->
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Use this form to modify the '<strong>Our</strong> Accomplishments' section</h3>
							</div>
							<div class="panel-body">
								<form action="/Admin_edit/accompEdit" method="POST">
									<div class="col-xs-4 ">
										<div class="feature-box ph-20 text-center">
											<span class="icon default-bg circle large"><i class="<?php echo $accomp_left_icon ?>"></i></span>
											<input type="text" name="block_left_icon" class="form-control" placeholder="Input here the icon of the left block..." value="<?php echo set_value('block_left_icon', $accomp_left_icon) ?>" />
											<div class="separator"></div>
											<input type="text" name="block_left_title" class="form-control" placeholder="Input here the title for the left block..." value="<?php echo set_value('block_left_title', $accomp_left_title); ?>" />
											<div class="separator"></div>
											<textarea class="form-control" rows="3" name="block_left_content" placeholder="Input here the content for the left block..." ><?php echo set_value('block_left_content', $accomp_left_content); ?></textarea>
										</div>
									</div>
									<div class="col-xs-4 ">
										<div class="feature-box ph-20 text-center">
											<span class="icon default-bg circle large"><i class="<?php echo $accomp_center_icon ?>"></i></span>
											<input type="text" name="block_center_icon" class="form-control" placeholder="Input here the icon of the center block..." value="<?php echo set_value('block_center_icon', $accomp_center_icon) ?>" />
											<div class="separator"></div>
											<input type="text" name="block_center_title" class="form-control" placeholder="Input here the title for the center block..." value="<?php echo set_value('block_center_title', $accomp_center_title); ?>" />
											<div class="separator"></div>
											<textarea class="form-control" rows="3" name="block_center_content" placeholder="Input here the content for the center block..." ><?php echo set_value('block_center_content', $accomp_center_content); ?></textarea>
										</div>
									</div>
									<div class="col-xs-4 ">
										<div class="feature-box ph-20 text-center">
											<span class="icon default-bg circle large"><i class="<?php echo $accomp_right_icon ?>"></i></span>
											<input type="text" name="block_right_icon" class="form-control" placeholder="Input here the icon of the right block..." value="<?php echo set_value('block_right_icon', $accomp_right_icon) ?>" />
											<div class="separator"></div>
											<input type="text" name="block_right_title" class="form-control" placeholder="Input here the title for the right block..." value="<?php echo set_value('block_right_title', $accomp_right_title); ?>" />
											<div class="separator"></div>
											<textarea class="form-control" rows="3" name="block_right_content" placeholder="Input here the content for the right block..." ><?php echo set_value('block_right_content', $accomp_right_content); ?></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- accomplishments section modifier end -->
			</div>
			<!-- content-container end -->
		</div>
		<!-- page wrapper end -->
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
			<!-- Bootstrap Select -->
			<script type="text/javascript" src="/assets/js/bootstrap-select.min.js"></script>
			<!-- Background Video -->
			<script src="/assets/plugins/vide/jquery.vide.js"></script>
			<!-- Custom Scripts -->
			<script type="text/javascript" src="/assets/js/custom.js"></script>
	</body>
</html>