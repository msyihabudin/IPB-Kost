<?php $this->load->view("partial/header"); ?>

    <div id="container">
      <div id="sidebar">
        <div class="sidebar-wrapper">
          <div class="panel panel-default" id="features">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-fw fa-compass"></i> Direction </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12 col-md-12" style="margin-left: -5px;">
                      <div class="caption">
                          <h3><?php echo to_currency($detail[0]->price); ?> <span class="pull-right label label-success">Pria</span><br>
                              <small><?php echo $detail[0]->name; ?></small>
                          </h3>
                          <p>Fasilitas: <?php echo $detail[0]->amenities; ?></p>
                          <p style="padding: 5px;background-color: #eeeeee;"><?php echo $detail[0]->description; ?></p>
                          <p>Alamat: <?php echo $detail[0]->address; ?></p>
                      </div>
                    <div id="directionsDiv"></div>
                </div>
                <!--div class="col-xs-4 col-md-4">
                  <button type="button" class="btn btn-primary pull-right sort" data-sort="feature-name" id="sort-btn"><i class="fa fa-sort"></i>&nbsp;&nbsp;Sort</button>
                </div-->
              </div>
            </div>
            <!--div class="sidebar-table">
              <table class="table table-hover" id="feature-list">
                <thead class="hidden">
                  <tr>
                    <th>Icon</th>
                  <tr>
                  <tr>
                    <th>Name</th>
                  <tr>
                  <tr>
                    <th>Chevron</th>
                  <tr>
                </thead>
                <tbody class="list"></tbody>
              </table>
            </div-->
          </div>
        </div>
      </div>
      <div id="map"></div>
    </div>

	<div class="container-fluid top20px">
		<div class="row">
			<div class="col-md-2" style="margin-top: 70px;">
				
			</div>
			<div class="col-md-10">
				<div class="map-view"><?php echo $map['html'] ?></div>
			</div>
		</div>
	</div>
<?php $this->load->view("partial/footer"); ?>