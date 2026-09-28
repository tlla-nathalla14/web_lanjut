<?php
require_once __DIR__ . '/../models/Berita.php';

$beritaModel = new Berita();

function validasiGambar($file) {
    $allowed = ['jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        return false;
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aksi']) && $_POST['aksi'] === 'tambah') {
        $gambar = '';
        if (!empty($_FILES['gambar']['name'])) {
            if (validasiGambar($_FILES['gambar'])) {
                $gambar = time() . '_' . basename($_FILES['gambar']['name']);
                move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../uploads/' . $gambar);
            }
        }
        $data = [
            'judul' => $_POST['judul'],
            'gambar' => $gambar,
            'isi' => $_POST['isi'],
            'penulis' => $_POST['penulis'],
            'tanggal' => $_POST['tanggal']
        ];
        $beritaModel->insert($data);
        header('Location: ../views/index.php');
        exit;
    }
    if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
        $id = $_POST['id'];
        $berita = $beritaModel->getById($id);
        $gambar = $berita['gambar'];
        if (!empty($_FILES['gambar']['name'])) {
            if (validasiGambar($_FILES['gambar'])) {
                $gambar = time() . '_' . basename($_FILES['gambar']['name']);
                move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../uploads/' . $gambar);
            }
        }
        $data = [
            'judul' => $_POST['judul'],
            'gambar' => $gambar,
            'isi' => $_POST['isi'],
            'penulis' => $_POST['penulis'],
            'tanggal' => $_POST['tanggal']
        ];
        $beritaModel->update($id, $data);
        header('Location: ../views/index.php');
        exit;
    }
}
if (isset($_GET['aksi']) && $_GET['aksi'] === 'hapus' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $berita = $beritaModel->getById($id);
    if ($berita && $berita['gambar']) {
        $gambarPath = __DIR__ . '/../uploads/' . $berita['gambar'];
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
    }
    $beritaModel->delete($id);
    header('Location: ../views/index.php');
    exit;
}
