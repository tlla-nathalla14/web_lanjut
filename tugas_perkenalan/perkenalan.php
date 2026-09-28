<!DOCTYPE html>
<html>
<head>
    <title>Perkenalan Diri</title>
</head>
<body>

<form method="post">

    Nama:
    <input type="text" name="nama"><br><br>

    NIM:
    <input type="text" name="nim"><br><br>

    Semester:
    <input type="number" name="semester"><br><br>

    Program Studi:
    <input type="text" name="prodi"><br><br>

    Umur:
    <input type="number" name="umur"><br><br>

    Hobi:
    <input type="text" name="hobi"><br><br>

    Cita-cita:
    <input type="text" name="cita_cita"><br><br>

    <input type="submit" name="submit" value="Tampilkan">

</form>

<?php
if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $semester = $_POST['semester'];
    $prodi = $_POST['prodi'];
    $umur = $_POST['umur'];
    $hobi = $_POST['hobi'];
    $cita_cita = $_POST['cita_cita'];

    echo "<h2>Hasil Perkenalan Diri</h2>";
    echo "Nama : " . $nama . "<br>";
    echo "NIM : " . $nim . "<br>";
    echo "Semester : " . $semester . "<br>";
    echo "Program Studi : " . $prodi . "<br>";
    echo "Umur : " . $umur . " tahun<br>";
    echo "Hobi : " . $hobi . "<br>";
    echo "Cita-cita : " . $cita_cita . "<br>";
}
?>

</body>
</html>