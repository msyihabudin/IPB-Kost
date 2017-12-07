    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('public/admin2/vendor/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('public/admin2/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('public/admin2/vendor/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('public/admin2/vendor/raphael/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('public/admin2/vendor/morrisjs/morris.min.js')?>"></script>
    <script src="<?php echo base_url('public/admin2/data/morris-data.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('public/admin2/dist/js/sb-admin-2.js')?>"></script>

    <script>
        function detail_kost(param) 
        {
            $('div#modal-id').modal('show');
        }
        function setMapToForm(latitude, longitude) 
        {
            $('input[name="latitude"]').val(latitude);
            $('input[name="longitude"]').val(longitude);
        }
        $(document).ready(function() {
            var base_url = '<?php echo base_url() ?>';
            $("#sidebar-sticker").sticky({topSpacing:70});
            <?php if($this->session->flashdata('message')) : ?>
            $('div#modal-alert').modal('show');
            <?php endif; ?>

            $('a.delete-kost').on('click', function() 
            {
                var ID = $(this).data('id');

                $('#modal-delete').modal('show');
                $('a#btn-yes').attr('href', base_url + 'admin/deletekost/' + ID);
            });
        });
    </script>

</body>