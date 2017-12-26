<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session'));
		$this->load->library('session');
	}

	public function kost($id)
	{
		$this->data['title'] = "SISTEM INFORMASI PENCARIAN KOST IPB";
		$config['center'] = '-6.597128,106.8054918';
		$config['zoom'] = 'auto';
		$config['styles'] = array(
		  	array(
		  		"name"=>"No Businesses", 
		  		"definition"=> array(
		   			array(
		   				"featureType"=>"poi", 
		   				"elementType" => 
		   				"business", 
		   				"stylers"=> array(
		   					array(
		   						"visibility"=>"off"
		   					)
		   				)
		   			)
		  		)
		  	)
		);
		$this->googlemaps->initialize($config);
		foreach($this->getDetail($id) as $key => $value) :
			$marker = array();
			$marker['position'] = "{$value->latitude}, {$value->longitude}";

			$marker['animation'] = 'DROP';
			$marker['infowindow_content'] = '<div class="media" style="width:400px;">';
			$marker['infowindow_content'] .= '<div class="media-left">';
			$marker['infowindow_content'] .= '<img src="'.base_url("public/image/{$value->photo}").'" class="media-object" style="width:150px">';
			$marker['infowindow_content'] .= '</div>';
			$marker['infowindow_content'] .= '<div class="media-body">';
			$marker['infowindow_content'] .= '<h5 class="media-heading"><a href="'.base_url("welcome/detail/{$value->ID}").'">'.$value->name.'</a></h5>';
			$marker['infowindow_content'] .= '<p>Harga: <strong>Rp '.number_format($value->price).'</strong></p>';
			$marker['infowindow_content'] .= '<p>Fasilitas: '.$value->amenities.'</p>';
			$marker['infowindow_content'] .= '<p><a href="'.base_url("detail/kost/{$value->ID}").'" class="btn btn-xs btn-default">More Detail</a></p>';
			$marker['infowindow_content'] .= '</div>';
			$marker['infowindow_content'] .= '</div>';
			$marker['icon'] = base_url("public/icon/lodging-2.png");
			$this->googlemaps->add_marker($marker);
		endforeach;

		$this->googlemaps->initialize($config);

		$this->data['map'] = $this->googlemaps->create_map();
		$this->data['detail'] = $this->getDetail($id);
		//print_r($this->data['detail']);

		$this->load->view('detail', $this->data);
	}

	public function getDetail($id)
	{
		$this->db->select('kost.*, kategori.name as kategori');

		$this->db->join('kategorikost', 'kost.ID = kategorikost.kategori_id', 'left');

		$this->db->join('kategori', 'kategorikost.kategori_id = kategori.kategori_id', 'left');

		$this->db->where('kost.ID ='.$id);

		return $this->db->get("kost")->result();
	}

	public function direction($id)
	{
		//print_r($this->input->post('ipb'));
		if ($this->input->post('ipb') == "ipb-bs") {
			$longlat_start = '-6.600177, 106.805873';
		}elseif ($this->input->post('ipb') == "ipb-cb") {
			$longlat_start = '-6.588445, 106.809705';
		}

		$direct = $this->getDetail($id);
		//print_r($direct);

		$longlat_end = $direct[0]->latitude .', '. $direct[0]->longitude;

		$this->data['title'] = "SISTEM INFORMASI PENCARIAN KOST IPB";
		$config['center'] = '-6.597128,106.8054918';
	    $config['zoom'] = 'auto';
	    $config['directions'] = TRUE;
	    $config['directionsStart'] = $longlat_start;
	    $config['directionsEnd'] = $longlat_end;
	    $config['directionsDivID'] = 'directionsDiv';
	    //$this->googlemaps->initialize($config);

	    //$marker['icon'] = base_url("public/icon/lodging-2.png");
		//$this->googlemaps->add_marker($marker);
	    
	    $this->googlemaps->initialize($config);
	    $this->data['map'] = $this->googlemaps->create_map();
	    $this->data['detail'] = $this->getDetail($id);

	    $this->load->view('direction', $this->data);
	}
}
