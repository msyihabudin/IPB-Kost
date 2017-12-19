<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session'));
	}

	public function index()
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
		foreach($this->searchQuery() as $key => $value) :
			$marker = array();
			$marker['position'] = "{$value->latitude}, {$value->longitude}";

			$marker['animation'] = 'DROP';
			$marker['infowindow_content'] = '<div class="media" style="width:400px;">';
			$marker['infowindow_content'] .= '<div class="media-left">';
			$marker['infowindow_content'] .= '<img src="'.base_url("public/image/{$value->photo}").'" class="media-object" style="width:150px">';
			$marker['infowindow_content'] .= '</div>';
			$marker['infowindow_content'] .= '<div class="media-body">';
			$marker['infowindow_content'] .= '<h5 class="media-heading"><a href="'.base_url("welcome/detail/{$value->ID}").'">'.$value->name.'</a></h5>';
			$marker['infowindow_content'] .= '<p>Harga : <strong>Rp. '.number_format($value->price).'</strong></p>';
			$marker['infowindow_content'] .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore tempora nihil doloremque saepe eos natus incidunt minus voluptatum consequatur maiores!</p>';
			$marker['infowindow_content'] .= '</div>';
			$marker['infowindow_content'] .= '</div>';
			$marker['icon'] = base_url("public/icon/lodging-2.png");
			$this->googlemaps->add_marker($marker);
		endforeach;

		$this->googlemaps->initialize($config);

		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('main-index', $this->data);
	}

	public function searchQuery()
	{
		$this->db->select('kost.*, kategori.name as kategori');

		$this->db->join('kategorikost', 'kost.ID = kategorikost.kategori_id', 'left');

		$this->db->join('kategori', 'kategorikost.kategori_id = kategori.kategori_id', 'left');

		switch ($this->input->get('price')) 
		{
			case '<100K':
				$this->db->where('kost.price <', 100000);
				break;
			case '100K-300K':
				$this->db->where('kost.price >=', 100000);
				$this->db->where('kost.price <=', 300000);
				break;
			case '300K-500K':
				$this->db->where('kost.price >=', 300000);
				$this->db->where('kost.price <=', 500000);
				break;
			case '500K':
				$this->db->where('kost.price >=', 500000);
				break;
		}

		if( is_array(@$this->input->post('kategori')) )
			$this->db->where_in('kategorikost.kategori_id', $this->input->post('kategori'));

		$this->db->group_by('kost.ID');

		if($this->input->get('q') != '')
			$this->db->like('kost.name', $this->input->get('q'));

		$this->db->where('kost.latitude !=', NULL)
				 ->where('kost.longitude !=', NULL);

		return $this->db->get("kost")->result();
	}

	public function search()
	{
		$this->db->select('kost.*, kategori.name as kategori');

		$this->db->join('kategorikost', 'kost.ID = kategorikost.kategori_id', 'left');

		$this->db->join('kategori', 'kategorikost.kategori_id = kategori.kategori_id', 'left');

		switch ($this->input->get('price')) 
		{
			case '<100K':
				$this->db->where('kost.price <', 100000);
				break;
			case '100K-300K':
				$this->db->where('kost.price >=', 100000);
				$this->db->where('kost.price <=', 300000);
				break;
			case '300K-500K':
				$this->db->where('kost.price >=', 300000);
				$this->db->where('kost.price <=', 500000);
				break;
			case '500K':
				$this->db->where('kost.price >=', 500000);
				break;
		}

		if( is_array(@$this->input->post('kategori')) )
			$this->db->where_in('kategorikost.kategori_id', $this->input->post('kategori'));

		$this->db->group_by('kost.ID');

		if($this->input->get('q') != '')
			$this->db->like('kost.name', $this->input->get('q'));

		$this->db->where('kost.latitude !=', NULL)
				 ->where('kost.longitude !=', NULL);

		return $this->db->get("kost")->result();
	}

	public function detail($id)
	{
		$this->db->select('kost.*, kategori.name as kategori');

		$this->db->join('kategorikost', 'kost.ID = kategorikost.kategori_id', 'left');

		$this->db->join('kategori', 'kategorikost.kategori_id = kategori.kategori_id', 'left');

		$this->db->where('kost.ID =='.$id);

		return $this->db->get("kost")->result();
	}
}
