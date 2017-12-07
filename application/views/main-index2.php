<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Pencarian Kost IPB</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('public/front/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/front/css/modern-business.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <?php echo $map['js'] ?>
    <style type="text/css">
        /* nav bar search box - drop down menu button */
        .navbar .navbar-search .dropdown-menu { min-width: 25px; }
        .dropdown-menu .label-icon { margin-left: 5px; }
        .btn-outline {
            background-color: transparent;
            color: inherit;
            transition: all .5s;
        }

        #flipkart-navbar {
            background-color: #2874f0;
            color: #FFFFFF;
        }

        .row1{
            padding-top: 10px;
        }

        .row2 {
            padding-bottom: 20px;
        }

        .flipkart-navbar-input {
            padding: 11px 16px;
            border-radius: 2px 0 0 2px;
            border: 0 none;
            outline: 0 none;
            font-size: 15px;
        }

        .flipkart-navbar-button {
            background-color: #ffe11b;
            border: 1px solid #ffe11b;
            border-radius: 0 2px 2px 0;
            color: #565656;
            padding: 10px 0;
            height: 43px;
            cursor: pointer;
        }

        .cart-button {
            background-color: #2469d9;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
            padding: 10px 0;
            text-align: center;
            height: 41px;
            border-radius: 2px;
            font-weight: 500;
            width: 120px;
            display: inline-block;
            color: #FFFFFF;
            text-decoration: none;
            color: inherit;
            border: none;
            outline: none;
        }

        .cart-button:hover{
            text-decoration: none;
            color: #fff;
            cursor: pointer;
        }

        .cart-svg {
            display: inline-block;
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 8px;
        }

        .item-number {
            border-radius: 3px;
            background-color: rgba(0, 0, 0, .1);
            height: 20px;
            padding: 3px 6px;
            font-weight: 500;
            display: inline-block;
            color: #fff;
            line-height: 12px;
            margin-left: 10px;
        }

        .upper-links {
            display: inline-block;
            padding: 0 11px;
            line-height: 23px;
            font-family: 'Roboto', sans-serif;
            letter-spacing: 0;
            color: inherit;
            border: none;
            outline: none;
            font-size: 12px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-bottom: 0px;
        }

        .dropdown:hover {
            background-color: #fff;
        }

        .dropdown:hover .links {
            color: #000;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown .dropdown-menu {
            position: absolute;
            top: 100%;
            display: none;
            background-color: #fff;
            color: #333;
            left: 0px;
            border: 0;
            border-radius: 0;
            box-shadow: 0 4px 8px -3px #555454;
            margin: 0;
            padding: 0px;
        }

        .links {
            color: #fff;
            text-decoration: none;
        }

        .links:hover {
            color: #fff;
            text-decoration: none;
        }

        .profile-links {
            font-size: 12px;
            font-family: 'Roboto', sans-serif;
            border-bottom: 1px solid #e9e9e9;
            box-sizing: border-box;
            display: block;
            padding: 0 11px;
            line-height: 23px;
        }

        .profile-li{
            padding-top: 2px;
        }

        .largenav {
            display: none;
        }

        .smallnav{
            display: block;
        }

        .smallsearch{
            margin-left: 15px;
            margin-top: 15px;
        }

        .menu{
            cursor: pointer;
        }

        @media screen and (min-width: 768px) {
            .largenav {
                display: block;
            }
            .smallnav{
                display: none;
            }
            .smallsearch{
                margin: 0px;
            }
        }

        /*Sidenav*/
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #fff;
            overflow-x: hidden;
            transition: 0.5s;
            box-shadow: 0 4px 8px -3px #555454;
            padding-top: 0px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color: #fff;        
        }

        @media screen and (max-height: 450px) {
          .sidenav a {font-size: 18px;}
        }

        .sidenav-heading{
            font-size: 36px;
            color: #fff;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">IPBKost</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <!--li>
                        <a href="services.html">Services</a>
                    </li-->
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <?php if($this->session->has_userdata('admin_login') == FALSE) : ?>
                        <a href="<?php echo base_url('user/login') ?>" title="Login">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                        <?php else : ?>
                        <a href="<?php echo base_url('admin') ?>" title="Login">
                            <i class="fa fa-sign-in"></i> Kembali ke Administrator
                        </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <!--ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <!--div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <!--a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a-->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <div id="flipkart-navbar">
            <div class="container">
                <div class="row row1">
                    <ul class="largenav pull-right">
                        <li class="upper-links"><a class="links" href="http://clashhacks.in/">About</a></li>
                        <li class="upper-links"><a class="links" href="https://campusbox.org/">Contact</a></li>
                        <li class="upper-links">
                            <?php if($this->session->has_userdata('admin_login') == FALSE) : ?>
                            <a href="<?php echo base_url('user/login') ?>" class="links" title="Login">
                                <i class="fa fa-sign-in"></i> Login
                            </a>
                            <?php else : ?>
                            <a href="<?php echo base_url('admin') ?>" class="links" title="Login">
                                <i class="fa fa-sign-in"></i> Kembali ke Administrator
                            </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="row row2">
                    <div class="col-sm-2">
                        <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">Brand</span></h2>
                        <h1 style="margin:0px;"><span class="largenav">Brand</span></h1>
                    </div>
                    <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                        <div class="row">
                            <input class="flipkart-navbar-input col-xs-11" type="" placeholder="Search for Products, Brands and more" name="">
                            <button class="flipkart-navbar-button col-xs-1">
                                <i class="fa fa-lg fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="cart largenav col-sm-2">
                        <a class="cart-button">
                            <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                                <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                            </svg> Link
                            <span class="item-number ">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="container" style="background-color: #2874f0; padding-top: 10px;">
                <span class="sidenav-heading">Home</span>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            </div>
            <a href="http://clashhacks.in/">Link</a>
            <a href="http://clashhacks.in/">Link</a>
            <a href="http://clashhacks.in/">Link</a>
            <a href="http://clashhacks.in/">Link</a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Cari kos-kostan?
                </h1>
            </div>
		</div>

        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        
                 <nav class="navbar navbar-default">
                        <div class="nav nav-justified navbar-nav">
                 
                            <form class="navbar-form navbar-search" role="search">
                                <div class="input-group">
                                
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-search btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-search"></span>
                                            <span class="label-icon">Search</span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                           <li>
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                    <span class="label-icon">Search By User</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <span class="glyphicon glyphicon-book"></span>
                                                <span class="label-icon">Search By Organization</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                        
                                    <input type="text" class="form-control">
                                
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-search btn-default">
                                        GO
                                        </button>
                                         
                                         
                                    </div>
                                </div>  
                            </form>   
                         
                        </div>
                    </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <form action="<?php echo base_url('welcome/cari');?>" method="post">
				<div class="col-md-2"></div>
                <div class="col-md-6">
					<input type="text" name="q" value="<?php echo $this->input->get('q') ?>" class="form-control btn-lg gede" placeholder="Ketikan kata kunci...">
                    <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p-->
                </div>
                <div class="col-md-2">
                    <a class="btn btn-lg btn-default btn-block" href="#"><i class="fa fa-search"></i>Cari Kost</a>
                </div>
                <div class="col-md-10">
                    <?php if($this->db->get('kategori')->num_rows()) : ?>
                    <label>Kategori :</label>
                        <?php foreach($this->db->get('kategori')->result() as $key => $row) : ?>
                        <div class="checkbox checkbox-info">
                            <input type="checkbox" value="<?php echo $row->kategori_id; ?>" name="kategori[<?php echo $key ?>]" <?php if((int)@in_array($row->kategori_id, $this->input->get('kategori')) AND @is_array($this->input->get('kategori'))) echo 'checked'; ?>>
                            <label> <?php echo $row->name; ?></label>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                        <label for="">Rentan Tarif :</label>
                        <select name="price" id="input">
                            <option value="">~ SEMUA ~</option>
                            <option value="<100K" <?php if($this->input->get('price') == '<100K') echo 'selected'; ?>>< 100K</option>
                            <option value="100K-300K" <?php if($this->input->get('price') == '100K-300K') echo 'selected'; ?>>100K s/d 300K</option>
                            <option value="300K-500K" <?php if($this->input->get('price') == '300K-500K') echo 'selected'; ?>>300K s/d 500K</option>
                            <option value="500K" <?php if($this->input->get('price') == '500K') echo 'selected'; ?>> >500K</option>
                        </select>
                </div>                
                
                <div id="directionsDiv"></div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="map-view"><?php echo $map['html'] ?></div>    
            </div>
        </div>

        <hr>
		<div class="row">
			
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Harga Terbaik</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Fasilitas Lengkap</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Lokasi Strategis</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
		
		<!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Rekomendasi</h2>
            </div>
			<div class="col-md-3 col-sm-6">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kos Cemara <span class="label label-success">Pria</span></h3>
                    </div>
                    <div class="panel-body">
						<img class="img-responsive img-portfolio img-hover" src="G:/Personal/_workspace/_design/IPBKost/front/startbootstrap-modern-business-gh-pages/img/logo-1445825207.png" alt="">
                        <span class="price"><sup>$</sup>39<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>5</strong> Kamar</li>
                        <li class="list-group-item">asdfasdfasdfads fasdf asdfasd fasdf asd fasdfa sdfa dsa fasdf asdf asdfdas df</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kos Pakde Koswara <span class="label label-danger">Wanita</span></h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>Rp</sup>39<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>5</strong> Kamar</li>
                        <li class="list-group-item">asdfasdfasdfads fasdf asdfasd fasdf asd fasdfa sdfa dsa fasdf asdf asdfdas df</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kos ples <span class="label label-danger">Wanita</span></h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>$</sup>39<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>5</strong> Kamar</li>
                        <li class="list-group-item">asdfasdfasdfads fasdf asdfasd fasdf asd fasdfa sdfa dsa fasdf asdf asdfdas df</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
			<div class="col-md-3 col-sm-6">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kos Plus <span class="label label-warning">Campur</span></h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>$</sup>39<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>5</strong> Kamar</li>
                        <li class="list-group-item">asdfasdfasdfads fasdf asdfasd fasdf asd fasdfa sdfa dsa fasdf asdf asdfdas df</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
		</div>
		
		<hr>
		<div class="well">
			<h4><strong>Promosikan kost Anda disini!</strong></h4>
			<p>Bila Anda memiliki kos-kosan yang lokasi-nya dekat dengan kampus IPB, segera daftarkan kosan Anda. Disini Anda dapat mempromosikan kost Anda secara GRATIS.</p>
			<a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">Daftarkan Kosan</a>
		</div>
		<hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Aplikasi Pencarian Kostan IPB 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url('public/front/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('public/front/js/bootstrap.min.js')?>"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
    $(function(){
    
        $(".input-group-btn .dropdown-menu li a").click(function(){

            var selText = $(this).html();
        
            //working version - for single button //
           //$('.btn:first-child').html(selText+'<span class="caret"></span>');  
           
           //working version - for multiple buttons //
           $(this).parents('.input-group-btn').find('.btn-search').html(selText);

       });

    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "70%";
        // document.getElementById("flipkart-navbar").style.width = "50%";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }
    </script>

</body>

</html>
