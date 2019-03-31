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
                                        <h4>  <?php echo $this->customlib->getAdminSessionUserName(); ?> </h4>
                                        <!--<p class="text-muted">varun@gmail.com</p>-->
                                        <a href="" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>user/user/changeusername"><i class="ti-wallet"></i> Change Username</a></li>
                            <li><a href="<?php echo base_url(); ?>user/user/changepass"><i class="ti-email"></i> Change Password</a></li>
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
<!--                        <ul class="nav nav-second-level">
                            <li><a href="">

                                    <i class="ti-user"></i> <span class="hide-menu">My Profile</span>
                                </a>
                            </li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/user/dashboard" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> My Profile </span>
                        </a>
                    </li>
                       <li>
                        <a href="<?php echo base_url(); ?>user/timetable" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> Time Table </span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url(); ?>user/attendence" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> Attendance </span>
                        </a>
                    </li> 
                   
                    <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="ti-user fa-fw fa-fw"></i>
                                    <span class="hide-menu"> Examinations </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/mark/marklist">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu"> || report Card</span>
                                       </a>
                                   </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/examschedule">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu"> || Exam schedule</span>
                                       </a>
                                   </li>
                                   

                                </ul>
                                </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/notification" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> Notice Board </span>
                        </a>
                    </li>
                        <li>
                        <a href="<?php echo base_url(); ?>user/subject" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> Subjects </span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>user/teacher" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> Teachers </span>
                        </a>
                    </li>
                        <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="ti-user fa-fw fa-fw"></i>
                                    <span class="hide-menu"> Library </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/book">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu">  Books</span>
                                       </a>
                                   </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/book/issue">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu">  Book Issued</span>
                                       </a>
                                   </li>
                                </ul>
                                </li>         
                                 
                             <li>
                        <a href="<?php echo base_url(); ?>user/route" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu"> Transport Routes</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url(); ?>user/hostelroom" class="waves-effect">
                           <i class="mdi mdi-apps fa-fw"></i> 
                            <span class="hide-menu">Hostel Rooms</span>
                        </a>
                    </li> 
                        <li> <a href="javascript:void(0)" class="waves-effect">
                                    <i data-icon="&#xe008;" class="ti-user fa-fw fa-fw"></i>
                                    <span class="hide-menu">Study Material </span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/content/assignment">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu">Assignments</span>
                                       </a>
                                   </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/content/studymaterial">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu">Study_material</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url(); ?>user/content/syllabus">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu">Syllabus</span>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="<?php echo base_url(); ?>user/content/other">
                                            <i class="fa fa-tags fa-fw "></i>
                                            <span class="hide-menu">Other_downloads</span>
                                       </a>
                                   </li>
                                </ul>
                                </li>      
                    
                </ul>
            </div>
        </div>
