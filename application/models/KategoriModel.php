<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{
	public function getAllKategori()
	{
		return $this->db->get('kategori')->result();
	}

	public function getKategoriById($kategori_id)
	{
		return $this->db->get_where('kategori', ['kategori_id' => $kategori_id])->row_array();
	}

	public function insertKategori($data)
	{
		return $this->db->insert('kategori', $data);
	}

	public function updateKategori($data, $kategori_id)
	{
		$query = $this->db->where('kategori_id', $kategori_id);
		$query = $this->db->update('kategori', $data);
		return $query;
	}

	public function deleteKategori($kategori_id)
	{
		$query = $this->db->where('kategori_id', $kategori_id);
		$query = $this->db->delete('kategori');
		return $query;
	}
}
