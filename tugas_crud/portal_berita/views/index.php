<?php
require_once __DIR__ . '/../models/Berita.php';
$beritaModel = new Berita();
$edit = false;
$beritaEdit = null;
if (isset($_GET['aksi']) && $_GET['aksi'] === 'edit' && isset($_GET['id'])) {
    $edit = true;
    $beritaEdit = $beritaModel->getById($_GET['id']);
}
$daftarBerita = $beritaModel->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portal Berita</title>
</head>
<body>
<div class="container">
<h2><?= $edit ? 'Edit Berita' : 'Tambah Berita' ?></h2>
<form method="post" action="../controllers/BeritaController.php" enctype="multipart/form-data">
    <?php if ($edit): ?>
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="id" value="<?= $beritaEdit['id'] ?>">
    <?php else: ?>
        <input type="hidden" name="aksi" value="tambah">
    <?php endif; ?>
    <label>Judul:</label>
    <input type="text" name="judul" required value="<?= $edit ? htmlspecialchars($beritaEdit['judul']) : '' ?>">
    <label>Gambar:</label>
    <input type="file" name="gambar" accept=".jpg,.jpeg,.png">
    <?php if ($edit && $beritaEdit['gambar']): ?>
        <img src="../uploads/<?= htmlspecialchars($beritaEdit['gambar']) ?>" width="100" style="margin-bottom:12px;">
    <?php endif; ?>
    <label>Isi:</label>
    <textarea name="isi" required rows="4" cols="50"><?= $edit ? htmlspecialchars($beritaEdit['isi']) : '' ?></textarea>
    <label>Penulis:</label>
    <input type="text" name="penulis" required value="<?= $edit ? htmlspecialchars($beritaEdit['penulis']) : '' ?>">
    <label>Tanggal:</label>
    <input type="date" name="tanggal" required value="<?= $edit ? $beritaEdit['tanggal'] : '' ?>">
    <button type="submit">Simpan</button>
    <?php if ($edit): ?>
        <a class="btn" href="index.php" style="background:#6c757d;">Batal</a>
    <?php endif; ?>
</form>

<h2>Daftar Berita</h2>
<div class="berita-list">
    <?php $no=1; foreach ($daftarBerita as $b): ?>
    <div class="berita-card">
        <div class="berita-header">
            <span class="berita-no">#<?= $no++ ?></span>
            <span class="berita-judul"><b><?= htmlspecialchars($b['judul']) ?></b></span>
        </div>
        <?php if ($b['gambar']): ?>
            <div class="berita-gambar"><img src="../uploads/<?= htmlspecialchars($b['gambar']) ?>" width="180"></div>
        <?php endif; ?>
        <div class="berita-isi"><?= nl2br(htmlspecialchars($b['isi'])) ?></div>
        <div class="berita-meta">
            <span class="berita-penulis">Penulis: <?= htmlspecialchars($b['penulis']) ?></span> |
            <span class="berita-tanggal">Tanggal: <?= htmlspecialchars($b['tanggal']) ?></span>
        </div>
        <div class="aksi-link" style="margin-top:8px;">
            <a href="?aksi=edit&id=<?= $b['id'] ?>">Edit</a>|
            <a href="../controllers/BeritaController.php?aksi=hapus&id=<?= $b['id'] ?>" onclick="return confirm('Hapus berita ini?')">Hapus</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</div>
</style>
<style>
/* Layout utama */
.container {
    max-width: 600px;
    margin: 40px auto;
    padding: 30px 20px 20px 20px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
form {
    margin-bottom: 40px;
    background: #f9f9f9;
    padding: 18px 24px 12px 24px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    display: flex;
    flex-direction: column;
    gap: 10px;
}
form label {
    margin-bottom: 2px;
}
form input[type="text"],
form input[type="date"],
form textarea,
form input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
form textarea {
    resize: vertical;
}
form button, form .btn {
    width: fit-content;
    align-self: flex-start;
}
.berita-list {
    display: flex;
    flex-direction: column;
    gap: 28px;
    margin-top: 24px;
}
.berita-card {
    background: #fafbfc;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 18px 20px 14px 20px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.berita-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 4px;
}
.berita-no {
    color: #888;
    font-size: 14px;
}
.berita-judul {
    font-size: 20px;
    color: #222;
}
.berita-gambar {
    margin: 8px 0 10px 0;
}
.berita-gambar img {
    border-radius: 6px;
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}
.berita-isi {
    margin-bottom: 6px;
    color: #444;
}
.berita-meta {
    font-size: 14px;
    color: #666;
    margin-bottom: 2px;
}
.aksi-link {
    margin-top: 6px;
}
.aksi-link a {
    color: #007bff;
    text-decoration: none;
    margin-right: 8px;
}
.aksi-link a:hover {
    text-decoration: underline;
}
@media (max-width: 700px) {
    .container {
        max-width: 98vw;
        padding: 10px 2vw;
    }
    .berita-card {
        padding: 10px 6px 10px 6px;
    }
    form {
        padding: 10px 6px 10px 6px;
    }
}
</style>
</body>
</html>
