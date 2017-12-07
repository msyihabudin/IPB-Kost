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
                            Home <small>Aplikasi Pencarian Kost</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> Home
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="jumbotron">
                    <h1>Hello, world!</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p><a href="<?php echo base_url() ?>" class="btn btn-primary btn-lg" role="button">Cari Kost &raquo;</a>
                    </p>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php
$this->load->view('admin-footer', $this->data);

/* End of file main-admin.php */
/* Location: ./application/views/main-admin.php */