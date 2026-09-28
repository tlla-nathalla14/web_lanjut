<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM berita WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita</title>
</head>
<body>
    <h2>Edit Berita</h2>
    <form method="POST" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
        Judul:<br>
        <input type="text" name="judul" value="<?php echo $d['judul']; ?>"><br><br>
        
        Gambar (Kosongkan jika tidak diganti):<br>
        <input type="file" name="gambar"><br><br>
        
        Isi Berita:<br>
        <textarea name="isi"><?php echo $d['isi']; ?></textarea><br><br>
        
        Penulis:<br>
        <input type="text" name="penulis" value="<?php echo $d['penulis']; ?>"><br><br>
        
        Tanggal:<br>
        <input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
