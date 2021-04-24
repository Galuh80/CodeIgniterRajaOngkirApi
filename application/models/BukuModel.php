<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuModel extends CI_Model
{
	public function getAllBuku()
	{
		$query = $this->db->query("SELECT * FROM buku JOIN kategori ON kategori.kategori_id=buku.kategori_id");
		return $query->result();
	}

	public function getBukuById($buku_id)
	{
		$query = $this->db->query("SELECT * FROM buku JOIN kategori ON kategori.kategori_id=buku.kategori_id WHERE buku_id='$buku_id'");
		return $query->row_array();
	}

	public function insertBuku($kategori_id, $judul, $author, $image, $deskripsi, $harga)
	{
		$query = $this->db->query("INSERT INTO buku (kategori_id,judul,author,image,deskripsi,harga) VALUES ('$kategori_id','$judul','$author','$image','$deskripsi','$harga')");
		return $query;
	}

	public function updateBuku($buku_id, $kategori_id, $judul, $author, $image, $deskripsi, $harga)
	{
		$query = $this->db->query("UPDATE buku SET kategori_id='$kategori_id',judul='$judul',author='$author',image='$image',deskripsi='$deskripsi',harga='$harga' WHERE buku_id='$buku_id'");
		return $query;
	}

	public function deleteBuku($buku_id)
	{
		$query = $this->db->query("DELETE FROM buku WHERE buku_id='$buku_id'");
		return $query;
	}
}
