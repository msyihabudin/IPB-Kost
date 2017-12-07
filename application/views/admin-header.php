<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('public/admin2/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('public/admin2/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/admin2/dist/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('public/admin2/vendor/morrisjs/morris.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('public/admin2/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if(isset($map['js'])) echo $map['js']; ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('user/signout') ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="<?php echo active_link_method('index','admin') ?>">
                            <a href="<?php echo base_url('admin') ?>">
                            <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Data Master <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="nav nav-second-level">
                                <li class="<?php echo active_link_method('kost', 'admin') ?>">
                                    <a href="<?php echo base_url('admin/kost') ?>" ></i> Data Kost</a>
                                </li>
                                <li class="<?php echo active_link_method('kategori', 'admin') ?>">
                                    <a href="<?php echo base_url('admin/kategori') ?>"></i> Data Kategori</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo active_link_method('admin','index') ?>">
                            <a href="#"><i class="fa fa-fw fa-wrench"></i> Pengaturan</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>    
