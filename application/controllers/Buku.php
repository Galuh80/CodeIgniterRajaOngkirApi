<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');
		$this->load->model('BukuModel');
		$this->load->library('session');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['title'] = "Buku";
		$data['aktif'] = "buku";
		$data['row'] = $this->BukuModel->getAllBuku();
		$this->load->view('buku/index', $data);
	}

	public function insert()
	{
		$data = [
			'title' => "Buku",
			'aktif' => 'buku',
			'row' => $this->KategoriModel->getAllKategori(),
		];
		$this->load->view('buku/insert', $data);
	}

	public function actionInsert()
	{
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|png|jpeg';

		$this->upload->initialize($config);
		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$img = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $img['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 500;
				$config['height'] = 320;
				$config['new_image'] = './assets/images/' . $img['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$image = $img['file_name'];
				
				$kategori_id = $this->input->post('kategori_id');
				$judul = $this->input->post('judul');
				$author = $this->input->post('author');
				$deskripsi = $this->input->post('deskripsi');
				$harga = $this->input->post('harga');

				$this->BukuModel->insertBuku($kategori_id, $judul, $author, $image, $deskripsi, $harga);
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil dimasukan</div>');
				redirect('buku');
			}
		}
	}

	public function update($buku_id)
	{
		$data = [
			'title' => "Buku",
			'aktif' => 'buku',
			'row' => $this->KategoriModel->getAllKategori(),
			'buku' => $this->BukuModel->getBukuById($buku_id),
		];
		$this->load->view('buku/update', $data);
	}

	public function actionUpdate()
	{
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|png|jpeg';

		$this->upload->initialize($config);
		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$img = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $img['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 500;
				$config['height'] = 320;
				$config['new_image'] = './assets/images/' . $img['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$image = $img['file_name'];

				$buku_id = $this->input->post('buku_id');
				$kategori_id = $this->input->post('kategori_id');
				$judul = $this->input->post('judul');
				$author = $this->input->post('author');
				$deskripsi = $this->input->post('deskripsi');
				$harga = $this->input->post('harga');

				$this->BukuModel->updateBuku($buku_id, $kategori_id, $judul, $author, $image, $deskripsi, $harga);
				$this->session->set_flashdata('success', '<div class="alert alert-warning" role="alert">Data berhasil diubah</div>');
				redirect('buku');
			}
		}
	}

	public function delete($buku_id)
	{
		$this->BukuModel->deleteBuku($buku_id);
		$this->session->set_flashdata('success', '<div class="alert alert-danger" role="alert">Data berhasil dihapus</div>');
		redirect('buku');
	}

	
}
