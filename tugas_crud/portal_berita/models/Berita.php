<?php
require_once 'Database.php';
class Berita {
    private $db;
    public function __construct() {
        $this->db = (new Database())->conn;
    }
    public function getAll() {
        $sql = "SELECT * FROM berita ORDER BY id DESC";
        $result = $this->db->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM berita WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO berita (judul, gambar, isi, penulis, tanggal) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $data['judul'], $data['gambar'], $data['isi'], $data['penulis'], $data['tanggal']);
        return $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE berita SET judul=?, gambar=?, isi=?, penulis=?, tanggal=? WHERE id=?");
        $stmt->bind_param('sssssi', $data['judul'], $data['gambar'], $data['isi'], $data['penulis'], $data['tanggal'], $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM berita WHERE id=?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
