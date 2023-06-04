<?php

class GoldarModel {
	
	private $table = 'goldar';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllGoldar()
	{
		$this->db->query("SELECT goldar.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = goldar.kategori_id");
		return $this->db->resultSet();
	}

	public function getGoldarById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahGoldar($data)
	{
		$query = "INSERT INTO goldar (kategori_id, jumlah_total, persen_total, jumlah_laki, persen_laki, jumlah_perempuan, persen_perempuan) VALUES(:kategori_id, :jumlah_total, :persen_total, :jumlah_laki, :persen_laki, :jumlah_perempuan, :persen_perempuan)";
		$this->db->query($query);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->bind('jumlah_total', $data['jumlah_total']);
		$this->db->bind('persen_total', $data['persen_total']);
		$this->db->bind('jumlah_laki', $data['jumlah_laki']);
		$this->db->bind('persen_laki', $data['persen_laki']);
		$this->db->bind('jumlah_perempuan', $data['jumlah_perempuan']);
		$this->db->bind('persen_perempuan', $data['persen_perempuan']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataGoldar($data)
	{
		$query = "UPDATE goldar SET kategori_id=:kategori_id, jumlah_total=:jumlah_total, persen_total=:persen_total, jumlah_laki=:jumlah_laki, persen_laki=:persen_laki, jumlah_perempuan=:jumlah_perempuan, persen_perempuan=:persen_perempuan WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->bind('jumlah_total', $data['jumlah_total']);
		$this->db->bind('persen_total', $data['persen_total']);
		$this->db->bind('jumlah_laki', $data['jumlah_laki']);
		$this->db->bind('persen_laki', $data['persen_laki']);
		$this->db->bind('jumlah_perempuan', $data['jumlah_perempuan']);
		$this->db->bind('persen_perempuan', $data['persen_perempuan']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteGoldar($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariGoldar()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE kategori_id LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}