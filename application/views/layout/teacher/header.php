<!DOCTYPE html>
<html lang="en" <?php echo $this->customlib->getRTL(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->customlib->getAppName(); ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="../../assets/backend/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../assets/backend/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../assets/backend/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/backend/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../assets/backend/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/backend/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../assets/backend/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/backend/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/backend/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../../assets/backend/backend/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/backend/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../assets/backend/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/backend/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="<?php echo base_url(); ?>assets/backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet">
    
     <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/backend/css/colors/default.css" id="theme" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/backend/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="fix-header">

<!--    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>-->
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <a class="logo" href="<?php echo base_url(); ?>">
                     <b><img src="<?php echo base_url(); ?>assets/backend/plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                        <img src="<?php echo base_url(); ?>assets/backend/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                     <span class="hidden-xs">
                       <img src="<?php echo base_url(); ?>assets/backend/plugins/images/admin-text.png" alt="home" class="dark-logo" />
                       <img src="<?php echo base_url(); ?>assets/backend/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
<!--                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light">
                            <i class="ti-menu"></i></a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> 
                            <i class="mdi mdi-gmail"></i>
                            <div class="notify"> <span class="heartbit"></span> 
                                <span class="point"></span> 
                            </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> 
                                            <img src="<?php echo base_url(); ?>assets/backend/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
                            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Mega</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Forms Elements</li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Advance Forms</li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Table Example</li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Charts</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                     /.Megamenu 
                </ul>-->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> 
                            <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                            <img src="<?php echo base_url(); ?>assets/backend/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle">
                            <b class="hidden-xs">  <?php echo $this->customlib->getStudentSessionUserName(); ?> </b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="<?php echo base_url(); ?>assets/backend/plugins/images/users/varun.jpg" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>  <?php echo $this->customlib->getStudentSessionUserName(); ?> </h4>
                                        <!--<p class="text-muted">varun@gmail.com</p>-->
                                        <a href="" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="<?php echo base_url(); ?>site/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3>
                        <span class="fa-fw open-close">
                            <i class="ti-close ti-menu"></i>
                        </span> <span class="hide-menu">Navigation</span></h3> 
                </div>
                <div class="user-profile" style="margin-top:-27px;"></div>
                <ul class="nav" id="side-menu">
                     <li class="user-pro">
                        <a href="#" class="waves-effect">
                            <img src="<?php echo base_url(); ?>assets/backend/plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                            <span class="hide-menu">
                                <?php echo $this->customlib->getStudentSessionUserName(); ?>
                                <?php // echo $this->session->userdata('email','email');?>
                                <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>index.php/admin/profile ">

                                    <i class="ti-user"></i> <span class="hide-menu">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>teacher/teacher/dashboard" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> My Profile </span>
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="ti-user fa-fw fa-fw"></i>
                                    <span class="hide-menu"> Student Inforamation </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>teacher/student/search">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu"> || Student Details</span>
                                       </a>
                                   </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>teacher/student/create">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu"> || Admission</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url(); ?>teacher/category">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu"> || Stu Categories</span>
                                       </a>
                                   </li>
                                  
                                </ul>
                                </li>
                             <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i>
                                    <span class="hide-menu"> Academics </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>webadmin/sections">
                                    <i class="fa fa-tags fa-fw "></i>
                                    <span class="hide-menu"> || Division</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url()?>webadmin/classes">
                                    <i class="fa fa-tags fa-fw "></i>
                                    <span class="hide-menu"> || Classes</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url()?>webadmin/teacher">
                                    <i class="fa fa-tags fa-fw "></i>
                                    <span class="hide-menu"> || Teachers</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url()?>webadmin/subject">
                                    <i class="fa fa-tags fa-fw "></i>
                                    <span class="hide-menu"> || Subjects</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url()?>webadmin/teacher/assignteacher">
                                    <i class="fa fa-tags fa-fw "></i>
                                    <span class="hide-menu"> ||  Assign Subjects</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url()?>webadmin/timetable">
                                    <i class="fa fa-tags fa-fw "></i>
                                    <span class="hide-menu"> ||  Class Timetable</span>
                                       </a>
                                   </li>
                                   
                                </ul>
                                </li>
                                 <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i>
                                    <span class="hide-menu"> Study Material </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>webadmin/content">
                                    <i class="ti  ti-share fa-fw "></i>
                                    <span class="hide-menu"> || Upload Content</span>
                                       </a>
                                   </li>
                                   <li >
                                        <a href="<?php echo base_url(); ?>student/assignment">
                                    <i class="ti ti-write fa-fw "></i>
                                    <span class="hide-menu"> || Assignments</span>
                                       </a>
                                   </li>
                                   <li >
                                        <a href="<?php echo base_url(); ?>student/studymaterial">
                                    <i class="fa fa-book fa-fw "></i>
                                    <span class="hide-menu"> || Study material</span>
                                       </a>
                                   </li>
                                    <li >
                                        <a href="<?php echo base_url(); ?>student/syllabus">
                                    <i class="ti  ti-agenda fa-fw "></i>
                                    <span class="hide-menu"> || Syllabus</span>
                                       </a>
                                   </li>
                                   <li >
                                        <a href="<?php echo base_url(); ?>student/other">
                                    <i class="ti  ti-download fa-fw "></i>
                                    <span class="hide-menu"> || other Download</span>
                                       </a>
                                   </li>
                                </ul>
                                 </li>
                                 
                                 <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i>
                                    <span class="hide-menu"> Library </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>webadmin/book">
                                    <i class="ti  ti-share fa-fw "></i>
                                    <span class="hide-menu"> || Add Book</span>
                                       </a>
                                   </li>
                                   <li >
                                        <a href="<?php echo base_url(); ?>webadmin/librarian/index">
                                    <i class="ti ti-write fa-fw "></i>
                                    <span class="hide-menu"> || librarians</span>
                                       </a>
                                   </li>
                                   
                                </ul>
                                 </li>
                                
                    
                    
                    
                    
                </ul>
            </div>
        </div>