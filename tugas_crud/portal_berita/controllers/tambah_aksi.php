<?php
include 'koneksi.php';

// Ambil data dari form
$judul   = $_POST['judul'];
$isi     = $_POST['isi'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];

// Upload file gambar
$gambar = '';
if(isset($_FILES['gambar']) && isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];
    $gambar = time() . '_' . basename($nama_file);
    $path = "uploads/".$gambar;
    if(!move_uploaded_file($tmp_file, $path)) {
        echo "Gagal upload gambar.";
        exit;
    }
}
$query = "INSERT INTO berita (judul, gambar, isi, penulis, tanggal) 
          VALUES ('$judul','$gambar','$isi','$penulis','$tanggal')";
mysqli_query($koneksi, $query);
header("Location: index.php");
?>
