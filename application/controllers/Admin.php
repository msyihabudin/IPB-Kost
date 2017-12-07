<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public $amenities;

	public $page;

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session','form_validation','pagination'));

		$this->load->helper(array('menus','text','url'));

		if($this->session->has_userdata('admin_login')==FALSE) 
			redirect(site_url());

		$this->amenities = array('Wifi','AC','TV kabel','Telepon','Shower Panas & Dingin','Smooking Area');

		$this->load->model('madmin');

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->data = array(
			'title' => "Home Administrator"
		);	

		$this->load->view('main-admin', $this->data);
	}

	public function addkost()
	{	
		$this->data['title'] = "Tambah Kost";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('price', 'Harga', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createKost();

			redirect(current_url());
		}

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = '-2.1232247,106.1058501';
		$config['zoom'] = '12';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-2.125386,106.1125363';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('add-kost', $this->data);
	}

	public function kost()
	{
		$config['base_url'] = site_url("admin/kost?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllKost(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Data Kost",
			'kost' => $this->madmin->getAllKost($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-kost', $this->data);
	}

	public function updateKost($param = 0)
	{
		$this->data['title'] = "Update Kost";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('price', 'Harga', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateKost($param);

			redirect(current_url());
		}

		$this->data['kost'] = $this->madmin->getKost($param);

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = $this->data['kost']->latitude.','.$this->data['kost']->longitude;
		$config['zoom'] = '14';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $this->data['kost']->latitude.','.$this->data['kost']->longitude;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('update-kost', $this->data);
	}

	public function deleteKost($param = 0)
	{
		$this->madmin->deleteKost($param);

		redirect('admin/kost');
	}

	public function addkategori()
	{	
		$this->data['title'] = "Tambah Kategori";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createKategori();

			redirect(current_url());
		}

		$this->load->view('add-kategori', $this->data);
	}

	public function kategori()
	{
		$config['base_url'] = site_url("admin/kategori?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllKategori(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Data Kategori",
			'kategori' => $this->madmin->getAllKategori($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-kategori', $this->data);
	}

	public function updateKategori($param = 0)
	{
		$this->data['title'] = "Update Kategori";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateKategori($param);

			redirect(current_url());
		}

		$this->data['kategori'] = $this->madmin->getKategori($param);
		$this->load->view('update-kategori', $this->data);
	}

	public function deleteKategori($param = 0)
	{
		$this->madmin->deleteKategori($param);

		redirect('admin/kategori');
	}

	public function account()
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->madmin->getAccount()
		);	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		if ($this->form_validation->run() == TRUE) 
		{
			$this->madmin->setAccount();
			
			redirect(current_url());
		}
		$this->load->view('account', $this->data);
	}

	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		$user = $this->madmin->getAccount();

		if(password_verify($this->input->post('old_pass'), $user->password))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */