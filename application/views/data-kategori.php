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
                    Data Kategori <small>Aplikasi Pencarian Kost</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-edit"></i> Data Kategori
                    </li>
                </ol>
            </div>
            
                <div class="col-lg-6">
                    <a href="<?php echo base_url('admin/addkategori') ?>" class="btn btn-md btn-primary">
                              <i class="fa fa-plus"></i> Tambah
                            </a>
                </div>
                
                <div class="col-lg-6">
                    <form action="" method="get">
                     <div class="input-group">
                         <input id="input-calendar" type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>" placeholder="Pencarian..">
                         <span class="input-group-addon"><i class="fa fa-search"></i></span>
                     </div>
                    </form>
                </div>
            
        </div>
        <!-- /.row -->
        <br>
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($kategori as $row) : ?>
                  <tr>
                    <td><?php echo ++$this->page ?>.</td>
                    <td>
                      <?php echo $row->name ?> 
                    </td>
                    <td>
                      <div>
                        <a href="<?php echo base_url('admin/updatekategori/'.$row->kategori_id); ?>"><i class="fa fa-edit"></i></a> |
                        <a href="<?php echo base_url('admin/deletekategori/'.$row->kategori_id);?>"><i class="fa fa-trash"></i></a>
                      </div> 
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(!$kategori) : ?>
            <div class="col-md-5 col-md-offset-3">
              <div class="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Maaf!</strong> Data yang anda cari tidak ditemukan.
              </div>
            </div>
            <?php endif; ?>
            <div class="text-center" style="margin-bottom: 50px;">
              <?php echo $this->pagination->create_links(); ?>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('admin-footer', $this->data);
