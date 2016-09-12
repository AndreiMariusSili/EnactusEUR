<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin | Projects</title>
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
    <body>
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
                                                            <a href="/Admin/project_admin">Project Admin</a>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">View:</div>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="/Admin/projects_view">Projects</a></li>
                                <li class="list-group-item"><a href="/Admin/founders_view">Founders</a></li>
                                <li class="list-group-item"><a href="/Admin/teamleader_applications_view">Teamleader Applications</a></li>
                                <li class="list-group-item"><a href="/Admin/teamleaders_view">Teamleaders</a></li>
                                <li class="list-group-item"><a href="/Admin/teammember_applications_view">Teammember Applications</a></li>
                                <li class="list-group-item"><a href="/Admin/teammembers_view">Teammembers</a></li>
                                <li class="list-group-item"><a href="/Admin/ambassadors_view">Ambassadors</a></li>
                                <li class="list-group-item"><a href="/Admin/partners_view">Partners</a></li>
                            </ul>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New:</div>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="/Admin/founders_create">Founder</a></li>
                                <li class="list-group-item"><a href="/Admin/teamleaders_create">Teamleader</a></li>
                                <li class="list-group-item"><a href="/Admin/teammembers_create">Teammember</a></li>
                                <li class="list-group-item"><a href="/Admin/ambassadors_create">Ambassador</a></li>
                                <li class="list-group-item"><a href="/Admin/partners_create">Partner</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">Use this form to create a new team leader</div>
                            <div class="panel-body">
                                        <?php if($this->session->flashdata('success') === TRUE) { ?>
                                            <div class="alert alert-success">
                                                <strong>Success!</strong> the team leader has been added to the database.
                                            </div>
                                        <?php }; ?>
                                        <?php if($this->session->flashdata('errors') !== NULL) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $this->session->flashdata('errors'); ?>
                                            </div>
                                        <?php }; ?>
                                        <form action="/Admin_edit/newTeamleader" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label><span class="text-danger">*</span>My name is...</label>
                                                <input type="text" class="form-control" name="first_name" placeholder="John" style="margin-bottom: 1rem;"></input>
                                                <input type= "text" class="form-control" name="last_name" placeholder="Doe"></input>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-danger">*</span>I can be reached at...</label>
                                                <input type="email" class="form-control" name="email" placeholder="john.doe@example.com" style="margin-bottom: 1rem;">
                                                <input type="text" class="form-control" name="phone_number" placeholder="+31 6 123 456 78">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-danger">*</span>I was born on...</label>
                                                <input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy"></input>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-danger">*</span>I study...</label>
                                                <input type="text" class="form-control" name="study" placeholder="Some Erasmus Degree...">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-danger">*</span>I want to join the venture...</label>
                                                <select name="project_preference" class="selectpicker show-tick" data-width="100%">
                                                    <?php foreach($options as $option) { ?>
                                                    <option value="<?php echo $option['project_title'] ?>"><?php echo $option['project_title']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-danger">*</span>Because...</label>
                                                <textarea class="form-control" name="motivation" rows="5" placeholder="I want to help others help themselves."></textarea>
                                            </div>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Upload CV</span><span class="fileinput-exists">Change</span><input type="file" name="teamleaderCV"></span>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                            <label><span class="text-danger">*</span>Please upload the CV as .pdf</label>
                                            <input type="hidden" name="type" value="team leader"/>
                                            <input type="hidden" name="statusMember" value="pending"/>
                                            <input type="hidden" name="statusApplication" value = "pending" />
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScript files placed at the end of the document so the pages load faster -->
        <!-- ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        <script type="text/javascript" src="/assets/plugins/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <!-- Jasny Bootstrap  -->
        <script type="text/javascript" src="/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.js"></script>
        <!-- Bootstrap Select -->
        <script type="text/javascript" src="/assets/js/bootstrap-select.min.js"></script>
        <!-- Custom Scripts -->
        <script type="text/javascript" src="/assets/js/custom.js"></script>
    </body>