<?php $this->load->view("partial/header"); ?>

    <div id="container">
      <div id="sidebar">
        <div class="sidebar-wrapper">
          <div class="panel panel-default" id="features">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-home"></i> Home </h3>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12 col-md-12">
                  <form action="" method="get">
					<div class="form-group">
						<label for="">Kata Kunci :</label>
						<input type="text" name="q" value="<?php echo $this->input->get('q') ?>" class="form-control" id="place-input">
					</div>
					<hr style="margin-bottom: 5px;">
					<label>Filter </label>
					<div class="pull-right">
						<a id="imageDivLink" href="javascript:show_hide_search_filter('search_filter_section', 'imageDivLink');" style="outline:none;">
					   <img src="
					    <?php echo isset($search_section_state)? ( ($search_section_state)? base_url().'public/image/minus.png' : base_url().'public/image/plus.png') : base_url().'public/image/plus.png';?>" style="border:0;outline:none;padding:0px;margin:0px;position:relative;top:-5px;"></a>
					</div>
					<div id="search_filter_section" class="ibox-content" style="display: <?php echo isset($search_section_state)?  ( ($search_section_state)? 'block' : 'none') : 'none';?>; margin-top: 5px;">
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
								<option value="">-- Semua --</option>
								<option value="<100K" <?php if($this->input->get('price') == '<100K') echo 'selected'; ?>>< 100K</option>
								<option value="100K-300K" <?php if($this->input->get('price') == '100K-300K') echo 'selected'; ?>>100K s/d 300K</option>
								<option value="300K-500K" <?php if($this->input->get('price') == '300K-500K') echo 'selected'; ?>>300K s/d 500K</option>
								<option value="500K" <?php if($this->input->get('price') == '500K') echo 'selected'; ?>> >500K</option>
							</select>
						</div>
					</div>
					<hr style="margin-top: 5px;">
					<div class="form-group">
						<button class="btn btn-primary btn-block"><i class="fa fa-search"></i> Cari Lokasi Kost</button>
					</div>
					<div id="directionsDiv"></div>
				  </form>
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