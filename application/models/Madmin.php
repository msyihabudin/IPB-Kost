<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('upload','session'));
	}
	
	public function createKost()
	{
		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'amenities' => @implode(", ", @$this->input->post('amenities')),
			'description' => $this->input->post('description')
		);

		$this->db->insert('kost', $object);

		$IDKost = $this->db->insert_id();

		if( is_array($this->input->post('kategori')) )
		{
			$this->db->where('kost_id', $IDKost)
					 ->where_not_in('kategori_id', $this->input->post('kategori'))
					 ->delete('kategorikost');
			foreach ($this->input->post('kategori') as $key => $value) 
			{
				$this->db->insert('kategorikost', array(
					'kost_id' => $IDKost,
					'kategori_id' => $value
				));
			}
		}

		$this->session->set_flashdata('message', "Data Kost berhasil ditambahkan");
	}

	public function getKost($param = 0)
	{
		return $this->db->get_where('kost', array('ID' => $param) )->row();
	}

	public function kategorikost($kost = 0, $kategori = 0)
	{
		return $this->db->get_where('kategorikost', array('kost_id' => $kost, 'kategori_id' => $kategori) )->row();
	}

	public function updateKost($param = 0)
	{
		$kost = $this->getKost($param);

		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = $kost->photo; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'amenities' => @implode(", ", @$this->input->post('amenities')),
			'description' => $this->input->post('description')
		);

		$this->db->update('kost', $object, array('ID' => $param));

		if( is_array($this->input->post('kategori')) )
		{
			$this->db->where('kost_id', $param)
					 ->where_not_in('kategori_id', $this->input->post('kategori'))
					 ->delete('kategorikost');
			foreach ($this->input->post('kategori') as $key => $value) 
			{
				$this->db->insert('kategorikost', array(
					'kost_id' => $param,
					'kategori_id' => $value
				));
			}
		} else {
			$this->db->where('kost_id', $param)
					 ->where_not_in('kategori_id', $this->input->post('kategori'))
					 ->delete('kategorikost');
		}

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function getAllKost($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'desc');

		if($type == 'num')
		{
			return $this->db->get('kost')->num_rows();
		} else {
			return $this->db->get('kost', $limit, $offset)->result();
		}
	}

	public function deleteKost($param = 0)
	{
		$kost = $this->getKost($param);

		if( $kost->photo != '')
			@unlink(".pulbic/image/{$kost->photo}");

		$this->db->delete('kost', array('ID' => $param));
		$this->db->delete('kategorikost', array('kost_id' => $param));

		$this->session->set_flashdata('message', "Data Kost berhasil dihapus");
	}

	public function createKategori()
	{
		$object = array(
			'name' => $this->input->post('name')
		);

		$this->db->insert('kategori', $object);

		$this->session->set_flashdata('message', "Data Kategori berhasil ditambahkan");
	}

	public function getAllKategori($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('kategori_id', 'desc');

		if($type == 'num')
		{
			return $this->db->get('kategori')->num_rows();
		} else {
			return $this->db->get('kategori', $limit, $offset)->result();
		}
	}

	public function getKategori($param = 0)
	{
		return $this->db->get_where('kategori', array('kategori_id' => $param) )->row();
	}

	public function updateKategori($param = 0)
	{
		$kost = $this->getKategori($param);

		$object = array(
			'name' => $this->input->post('name')
		);

		$this->db->update('kategori', $object, array('kategori_id' => $param));

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function deleteKategori($param = 0)
	{
		$kost = $this->getKategori($param);

		$this->db->delete('kategori', array('kategori_id' => $param));

		$this->session->set_flashdata('message', "Data Kategori berhasil dihapus");
	}

	public function setAccount()
	{
		$user = $this->getAccount();

		$object = array(
			'fullname' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email')
		);

		if( $this->input->post('new_pass') != '')
			$object['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);
		
		$this->db->update('users', $object, array('ID' => $user->ID));

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan.");
	}

	public function getAccount()
	{
		return $this->db->get_where('users', array('ID' => $this->session->userdata('user')->ID) )->row();
	}
}
