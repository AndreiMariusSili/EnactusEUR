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
                            <div class="panel-heading">Below are all the teamembers registered in your database so far.</div>
                            <table class="table table-hover table-condensed">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Project Preference</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Change Status</th>
                                    <th>Download CV</th>
                                    <th>Delete</th>
                                </tr>
                                <?php $i=1; foreach($teammembers as $teammember) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo "{$teammember['first_name']} {$teammember['last_name']}"?></td>
                                    <td><?php echo $teammember['project_preference'] ?></td>
                                    <td><?php echo $teammember['email'] ?></td>
                                    <td><?php echo $teammember['status'] ?></td>
                                    <td>
                                        <form class="form-inline mg-0" action="/Admin_edit/teammembers_update/<?php echo $teammember['id']; ?>" method="POST">
                                            <select name="status" class="form-control">
                                                <option value="">Choose...</option>
                                                <option value="pending">Pending</option>
                                                <option value="accepted">Accepted</option>
                                                <option value="rejected">Rejected</option>
                                            </select>
                                            <button type="submit" class="btn btn-default mg-0"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-inline mg-0" action="/Admin/teammembers_cv/<?php echo $teammember['id']; ?>" method="POST">
                                        <button type="submit" class="btn btn-default mg-0"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-inline mg-0" action="/Admin_edit/teammembers_delete/<?php echo $teammember['id']; ?>" method="POST">
                                            <button type="submit" class="btn btn-danger mg-0"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; }; ?>
                            </table>
                        </div>
                        <form class="form" action="/Admin/teammembers_export" method="POST">
                            <button type="submit" class="btn btn-lg btn-default pull-right">Export</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScript files placed at the end of the document so the pages load faster -->
        <!-- ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        <script type="text/javascript" src="/assets/plugins/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <!-- Custom Scripts -->
        <script type="text/javascript" src="/assets/js/custom.js"></script>
    </body>