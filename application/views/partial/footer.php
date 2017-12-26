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

	<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">IPB-Kost</h4>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs nav-justified" id="aboutTabs">
              <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-question-circle"></i>&nbsp;About the project</a></li>
              
              <li><a href="#disclaimer" data-toggle="tab"><i class="fa fa-exclamation-circle"></i>&nbsp;Disclaimer</a></li>
            </ul>
            <div class="tab-content" id="aboutTabsContent">
              <div class="tab-pane fade active in" id="about">
                <p>Aplikasi ini memberikan informasi mengenai lokasi kosan terdekat dari Kampus IPB Cilibende dan Baranangsiang. Informasi berupa titik (point) keberadaan kosan dan fasilitas apa saja yang terdapat pada kostan tersebut. Informasi line sebagai jalur terdekat dari kosan menuju kampus. Aplikasi ini dibuat menggunakan responsive template <a href="http://getbootstrap.com/">Bootstrap 3</a>, framework <a href="">CodeIgniter 3.1.5</a>, dan <a href="http://biostall.com/demos/google-maps-v3-api-codeigniter-library/">Google Maps v3 API.</a> Dan tersedia di <a href="https://github.com/muhamadshb/IPB-Kost" target="_blank">GitHub</a>.</p>
                <!--div class="panel panel-primary">
                  <div class="panel-heading">Features</div>
                  <ul class="list-group">
                    <li class="list-group-item">Fullscreen mobile-friendly map template with responsive navbar and modal placeholders</li>
                    <li class="list-group-item">jQuery loading of external GeoJSON files</li>
                    <li class="list-group-item">Logical multiple layer marker clustering via the <a href="https://github.com/Leaflet/Leaflet.markercluster" target="_blank">leaflet marker cluster plugin</a></li>
                    <li class="list-group-item">Elegant client-side multi-layer feature search with autocomplete using <a href="http://twitter.github.io/typeahead.js/" target="_blank">typeahead.js</a></li>
                    <li class="list-group-item">Responsive sidebar feature list synced with map bounds, which includes sorting and filtering via <a href="http://listjs.com/" target="_blank">list.js</a></li>
                    <li class="list-group-item">Marker icons included in grouped layer control via the <a href="https://github.com/ismyrnow/Leaflet.groupedlayercontrol" target="_blank">grouped layer control plugin</a></li>
                  </ul>
                </div-->
              </div>
              <div id="disclaimer" class="tab-pane fade text-danger">
                <p>Data yang disediakan di situs ini hanya untuk tujuan informasi dan perencanaan.</p>
                <p>
                  Tidak ada jaminan ketepatan atau kelengkapan yang tersirat atau untuk penggunaan yang dimaksudkan. Semua informasi di peta ini tunduk pada variasi dan koreksi seperti yang mungkin dihasilkan dari pencarian dan / atau survei lapangan yang akurat.
                </p>
                <hr>
                <p>The data provided on this site is for informational and planning purposes only.</p>
                <p>Absolutely no accuracy or completeness guarantee is implied or intended. All information on this map is subject to such variations and corrections as might result from a complete title search and/or accurate field survey.</p>
              </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.2.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.sticky.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('public/front/assets/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js')?>"></script>
    <script src="<?php echo base_url('public/front/assets/js/app.js')?>"></script>
    <script type="text/javascript">
      function about()
    {
        $('#aboutModal').modal('show'); // show bootstrap modal
    }
    </script>
</body>
</html>