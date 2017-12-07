<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin-header', $this->data);
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Tambah Kategori <small>Aplikasi Pencarian Kost</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-edit"></i> Tambah Kategori
                    </li>
                </ol>
            </div>
            
        </div>
        <!-- /.row -->
        <br>
        <div class="row">
            <div class="col-lg-12">
            <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <?php if($this->session->flashdata('message')) : ?>
                        <div class="col-sm-8 col-md-offset-2">
                            <div class="form-group">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama :</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" value="<?php echo set_value('name') ?>" placeholder="">
                        <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('admin-footer', $this->data); 
