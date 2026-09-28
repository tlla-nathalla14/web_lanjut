<?php
include 'koneksi.php';

$id      = $_POST['id'];
$judul   = $_POST['judul'];
$isi     = $_POST['isi'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];

if($_FILES['gambar']['name'] != ""){
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];
    $path      = "uploads/".$nama_file;
    move_uploaded_file($tmp_file, $path);

    mysqli_query($koneksi,"UPDATE berita SET judul='$judul', gambar='$nama_file', isi='$isi', penulis='$penulis', tanggal='$tanggal' WHERE id='$id'");
}else{
    mysqli_query($koneksi,"UPDATE berita SET judul='$judul', isi='$isi', penulis='$penulis', tanggal='$tanggal' WHERE id='$id'");
}

header("Location: index.php");
?>
