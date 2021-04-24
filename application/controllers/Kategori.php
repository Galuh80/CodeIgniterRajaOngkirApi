<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['title'] = "Kategori";
		$data['aktif'] = "kategori";
		$data['row'] = $this->KategoriModel->getAllKategori();
		$this->load->view('kategori/index', $data);
	}

	public function validate()
	{
		$this->form_validation->set_rules('kategori_code', 'Kategori Code', 'required');
		$this->form_validation->set_rules('kategori_name', 'Kategori Name', 'required');
	}

	public function insert()
	{
		$this->validate();
		$kategori_code = $this->input->post('kategori_code');
		$kategori_name = $this->input->post('kategori_name');

		if ($this->form_validation->run() == False) {
			$data['title'] = "Kategori";
			$data['aktif'] = 'kategori';
			$this->load->view('kategori/insert', $data);
		} else {
			$data = [
				'kategori_code' => $kategori_code,
				'kategori_name' => $kategori_name,
			];
			$this->KategoriModel->insertKategori($data);
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil dimasukan</div>');
			redirect('kategori');
		}
	}

	public function update($kategori_id)
	{
		$data['kategori'] = $this->KategoriModel->getKategoriById($kategori_id);
		$data['title'] = "Kategori";
		$data['aktif'] = 'kategori';

		$this->validate();
		$kategori_code = $this->input->post('kategori_code');
		$kategori_name = $this->input->post('kategori_name');

		if ($this->form_validation->run() == False) {
			$this->load->view('kategori/update', $data);
		} else {
			$data = [
				'kategori_code' => $kategori_code,
				'kategori_name' => $kategori_name,
			];
			$this->KategoriModel->updateKategori($data, $kategori_id);
			$this->session->set_flashdata('success', '<div class="alert alert-warning" role="alert">Data berhasil diubah</div>');
			redirect('kategori');
		}
	}

	public function delete($kategori_id)
	{
		$this->KategoriModel->deleteKategori($kategori_id);
		$this->session->set_flashdata('success', '<div class="alert alert-danger" role="alert">Data berhasil dihapus</div>');
		redirect('kategori');
	}
}
