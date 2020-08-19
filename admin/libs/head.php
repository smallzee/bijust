<?php admin_require_login(); ?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <!-- Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?= page_title(@$page_title)." - ".WEB_TITLE ?></title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= ADMIN_CSS_FOLDER_TEMPLATE ?>app/css/bootstrap.css">
    <!-- plugins CSS-->
    <link rel="stylesheet" href="<?= ADMIN_CSS_FOLDER_TEMPLATE ?>plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= ADMIN_CSS_FOLDER_TEMPLATE ?>plugins/animo/animate+animo.css">
    <link rel="stylesheet" href="<?= ADMIN_CSS_FOLDER_TEMPLATE ?>plugins/csspinner/csspinner.min.css">
    <!-- App CSS-->
    <link rel="stylesheet" href="<?= ADMIN_CSS_FOLDER_TEMPLATE ?>app/css/app.css">
    <!-- Modernizr JS Script-->
    <script src="<?= ADMIN_JS_FOLDER_TEMPLATE ?>plugins/modernizr/modernizr.js" type="application/javascript"></script>
    <!-- FastClick for mobiles-->
    <script src="<?= ADMIN_JS_FOLDER_TEMPLATE ?>plugins/fastclick/fastclick.js" type="application/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;1,200&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<!-- START Main wrapper-->
<section class="wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
        <!-- START navbar header-->
        <div class="navbar-header">
            <a href="#" class="navbar-brand">
                <div class="brand-logo"><?= WEB_TITLE ?></div>
                <div class="brand-logo-collapsed">BJ</div>
            </a>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="aside">
                        <em class="fa fa-align-left"></em>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="navbar-search">
                        <em class="fa fa-search"></em>
                    </a>
                </li>
            </ul>
            <!-- END Left navbar-->

        </div>
        <!-- END Nav wrapper-->
        <!-- START Search form-->
        <form role="search" class="navbar-form">
            <div class="form-group has-feedback">
                <input type="text" placeholder="Type and hit Enter.." class="form-control">
                <div data-toggle="navbar-search-dismiss" class="fa fa-times form-control-feedback"></div>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
        </form>
        <!-- END Search form-->
    </nav>
    <!-- END Top Navbar-->
    <!-- START aside-->
    <aside class="aside">
        <!-- START Sidebar (left)-->
        <nav class="sidebar">
            <ul class="nav">
                <!-- START user info-->
                <li>
                    <div data-toggle="collapse-next" class="item user-block has-submenu">
                        <!-- User picture-->
                        <div class="user-block-picture">
                            <img src="<?= image_url('author.jpg') ?>" style="border-radius: 50%" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                            <!-- Status when collapsed-->
                            <div class="user-block-status">
                                <div class="point point-success point-lg"></div>
                            </div>
                        </div>
                        <!-- Name and Role-->
                        <div class="user-block-info">
                            <span class="user-block-name item-text">Welcome, <?= explode(" ",admin_details('fname'))[0] ?></span>
                            <span class="user-block-role"><?= role(admin_details('role_id')) ?></span>
                            <!-- START Dropdown to change status-->
                            <div class="btn-group user-block-status">
                                <button type="button" data-toggle="dropdown" data-play="fadeIn" data-duration="0.2" class="btn btn-xs dropdown-toggle">
                                    <div class="point point-success"></div>Online</button>
                                <ul class="dropdown-menu text-left pull-right">
                                    <li>
                                        <a href="#">
                                            <div class="point point-success"></div>Online</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="point point-warning"></div>Away</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="point point-danger"></div>Busy</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Dropdown to change status-->
                        </div>
                    </div>
                    <!-- START User links collapse-->
                    <ul class="nav collapse">
                        <li><a href="#">Settings</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                    <!-- END User links collapse-->
                </li>
                <!-- END user info-->
                <!-- START Menu-->
                <li >
                    <a href="<?= base_url('admin/dashboard') ?>" title="Dashboard">
                        <em class="fa fa-home"></em>
                        <div class="label label-primary pull-right"></div>
                        <span class="item-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/users') ?>" title="Registered User">
                        <em class="fa fa-users"></em>
                        <div class="label label-primary pull-right"></div>
                        <span class="item-text">Registered Users</span>
                    </a>
                </li>
                <!-- END Menu-->
                <!-- Sidebar footer    -->
                <li class="nav-footer">
                    <div class="nav-footer-divider"></div>
                    <!-- START button group-->
                    <div class="btn-group text-center">
                        <button type="button" data-toggle="tooltip" data-title="Settings" class="btn btn-link">
                            <em class="fa fa-cog text-muted"></em>
                        </button>
                        <a href="<?= base_url('admin/logout') ?>" data-toggle="tooltip" data-title="Logout" class="btn btn-link">
                            <em class="fa fa-sign-out text-muted"></em>
                        </a>
                    </div>
                    <!-- END button group-->
                </li>
            </ul>
        </nav>
        <!-- END Sidebar (left)-->
    </aside>
<section>