<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
    <link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/normalize.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/template.css?v='.md5(date('YmdHis'))) ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/hover-min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css') ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url('public/front/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('public/front/assets/css/app.css')?>">
    <style type="text/css">
    
    .sidebar-wrapper {
        /*max-height: calc(100vh - 9rem);
        overflow-y: auto;*/
        padding-top: 50px;
        position: fixed;
        width: 260px;
        overflow-y: scroll;
        bottom: 0;
        top: 0;
    }    
    </style>

    <script type="text/javascript" src="<?php echo base_url();?>public/js/thickbox.js" language="javascript"></script>
    <?php echo $map['js'] ?>
    <script type="text/javascript">
		$(document).ready(function() {
			<?php if($this->session->flashdata('message')) : ?>
			$('div#modal-alert').modal('show');
			<?php endif; ?>
      
		});
		function show_hide_search_filter(search_filter_section, switchImgTag)
		{
		    var ele = document.getElementById(search_filter_section);
		    var imageEle = document.getElementById(switchImgTag);
		    var elesearchstate = document.getElementById('search_section_state');

		    if(ele.style.display == "block")
		    {
		        ele.style.display = "none";
		        imageEle.innerHTML = '<img src=" <?php echo base_url()?>public/image/plus.png" style="border:0;outline:none;padding:0px;margin:0px;position:relative;top:-5px;" >';
		        elesearchstate.value="none";
		    }
		    else
		    {
		        ele.style.display = "block";
		        imageEle.innerHTML = '<img src=" <?php echo base_url()?>public/image/minus.png" style="border:0;outline:none;padding:0px;margin:0px;position:relative;top:-5px;" >';
		        elesearchstate.value="block";
		    }
		}
    
	</script>
</head>

<body>
	<!--nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url() ?>">IPB-Kost</a>
			</div>
			<div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    	<?php if($this->session->has_userdata('admin_login') == FALSE) : ?>
                        <a data-toggle="modal" href='#modalLogin' class="hvr-underline-reveal" title="Login">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    	<?php else : ?>
                        <a href="<?php echo base_url('admin') ?>" class="hvr-underline-reveal" title="Login">
                            <i class="fa fa-sign-in"></i> Kembali ke Administrator
                        </a>
                    	<?php endif; ?>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url() ?>" class="hvr-underline-reveal">Home</a></li>
					<li><a data-toggle="modal" href='#modal-about' class="hvr-underline-reveal">About</a></li>
				</ul>
			</div>
		</div>
	</nav-->

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <div class="navbar-icon-container">
            <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
            <a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a>
          </div>
          <a class="navbar-brand" href="<?php echo base_url() ?>">IPB-Kost</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <?php if($this->session->has_userdata('admin_login') == FALSE) : ?>
              <a href='<?php echo base_url('user/login');?>' class="hvr-underline-reveal" title="Login">
                <i class="fa fa-sign-in"></i> Login
              </a>
              <?php else : ?>
              <a href="<?php echo base_url('admin') ?>" class="hvr-underline-reveal" title="Login">
                <i class="fa fa-sign-in"></i> Kembali ke Administrator
              </a>
              <?php endif; ?>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li>
            	<a data-toggle="modal" href='#' class="hvr-underline-reveal" onclick="about()"><i class="fa fa-question-circle white"></i>&nbsp;&nbsp;About</a>
            </li>

            <!--li class="dropdown">
            	<a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe white"></i>&nbsp;&nbsp;Tools <b class="caret"></b></a>
              	<ul class="dropdown-menu">
                	<li>
                		<a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="full-extent-btn"><i class="fa fa-arrows-alt"></i>&nbsp;&nbsp;Zoom To Full Extent</a>
                	</li>
                	<li>
                		<a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="legend-btn"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Show Legend</a>
                	</li>
                	<li class="divider hidden-xs"></li>
                	<li>
                		<a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="login-btn"><i class="fa fa-user"></i>&nbsp;&nbsp;Login</a>
                	</li>
              	</ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" id="downloadDrop" href="#" role="button" data-toggle="dropdown"><i class="fa fa-cloud-download white"></i>&nbsp;&nbsp;Download <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  	<li>
                  		<a href="data/boroughs.geojson" download="boroughs.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Boroughs</a>
                  	</li>
                  	<li>
                  		<a href="data/subways.geojson" download="subways.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Subway Lines</a>
                  	</li>
                  	<li>
                  		<a href="data/DOITT_THEATER_01_13SEPT2010.geojson" download="theaters.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Theaters</a>
                  	</li>
                  	<li>
                  		<a href="data/DOITT_MUSEUM_01_13SEPT2010.geojson" download="museums.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Museums</a>
                  	</li>
                </ul>
            </li>
            <li class="hidden-xs">
            	<a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-list white"></i>&nbsp;&nbsp;POI List</a>
            </li-->
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>