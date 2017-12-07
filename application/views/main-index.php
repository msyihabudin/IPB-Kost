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
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.2.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.sticky.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
    <?php echo $map['js'] ?>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                        <a href='<?php base_url('user/login');?>' class="hvr-underline-reveal" title="Login">
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
					<li><a href="#" class="hvr-underline-reveal">Home</a></li>
					<li><a href='#' class="hvr-underline-reveal">About</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid top20px">
		<div class="row">
			<div class="col-md-2" style="margin-top: 70px;">
				<form action="" method="get">
				<div class="form-group">
					<label for="">Kata Kunci :</label>
					<input type="text" name="q" value="<?php echo $this->input->get('q') ?>" class="form-control" id="place-input">
				</div>
				<?php if($this->db->get('kategori')->num_rows()) : ?>
				<div class="form-group">
					<label>Kategori :</label>
					<?php foreach($this->db->get('kategori')->result() as $key => $row) : ?>
		            <div class="checkbox checkbox-info">
		                <input type="checkbox" value="<?php echo $row->kategori_id; ?>" name="kategori[<?php echo $key ?>]" <?php if((int)@in_array($row->kategori_id, $this->input->get('kategori')) AND @is_array($this->input->get('kategori'))) echo 'checked'; ?>>
		                <label> <?php echo $row->name; ?></label>
		            </div>
		        	<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<div class="form-group">
					<label for="">Rentan Tarif :</label>
					<select name="price" id="input" class="form-control">
						<option value="">~ SEMUA ~</option>
						<option value="<100K" <?php if($this->input->get('price') == '<100K') echo 'selected'; ?>>< 100K</option>
						<option value="100K-300K" <?php if($this->input->get('price') == '100K-300K') echo 'selected'; ?>>100K s/d 300K</option>
						<option value="300K-500K" <?php if($this->input->get('price') == '300K-500K') echo 'selected'; ?>>300K s/d 500K</option>
						<option value="500K" <?php if($this->input->get('price') == '500K') echo 'selected'; ?>> >500K</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block"><i class="fa fa-search"></i> Cari Lokasi Kost</button>
				</div>
				<div id="directionsDiv"></div>
				</form>
			</div>
			<div class="col-md-10">
				<div class="map-view"><?php echo $map['html'] ?></div>
			</div>
		</div>
	</div>
	<footer class="page-break-top">
		<div class="footer-divider"></div>
		<div class="container">
			<div class="row">
				<div class="clearfix page-break-top"></div>
				<div class="hr5"></div>
				<div class="col-md-12">
					<p class="text-center">&copy; 2017. All Right Reserved</small></p>
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="modalLogin">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Login</h4>
				</div>
				<form action="<?php echo base_url('user/auth') ?>" method="POST" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Username / E-Mail :</label>
						<input type="text" class="form-control" name="identity" required>
					</div>
					<div class="form-group">
						<label for="">Password :</label>
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalRegister">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Register</h4>
				</div>
				<?php 
			    $fattr = array('class' => 'form-signin');
			    echo form_open('/main/register', $fattr); ?>
			    <div class="form-group">
			      <?php echo form_input(array('name'=>'fullname', 'id'=> 'fullname', 'placeholder'=>'Full Name', 'class'=>'form-control', 'value' => set_value('fullname'))); ?>
			      <?php echo form_error('fullname');?>
			    </div>
			    <div class="form-group">
			      <?php echo form_input(array('name'=>'username', 'id'=> 'username', 'placeholder'=>'User Name', 'class'=>'form-control', 'value'=> set_value('username'))); ?>
			      <?php echo form_error('username');?>
			    </div>
			    <div class="form-group">
			      <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
			      <?php echo form_error('email');?>
			    </div>
			    <?php echo form_submit(array('value'=>'Sign up', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
			    <?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-warning"></i> Perhatian!</h4>
					<p><?php echo $this->session->flashdata('message') ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-about" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tentang Aplikasi</h4>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum</p>
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		function detail_hotel(param) 
		{
			$('div#modal-id').modal('show');
		}
		$(document).ready(function() {
			<?php if($this->session->flashdata('message')) : ?>
			$('div#modal-alert').modal('show');
			<?php endif; ?>
		});
	</script>
</body>
</html>