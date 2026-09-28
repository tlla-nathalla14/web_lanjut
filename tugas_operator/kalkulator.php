<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>

<body>

    <h1>Kalkulator Sederhana</h1>

    <form method="post">

        <label>Angka Pertama:</label>
        <input type="number" name="angka1" required>

        <br><br>

        <label>Operator:</label>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>

        <br><br>

        <label>Angka Kedua:</label>
        <input type="number" name="angka2" required>

        <br><br>

        <button type="submit" name="hitung">Hitung</button>

    </form>

    <br>

    <?php

    if (isset($_POST['hitung'])) {

        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];

        switch ($operator) {

            case "+":
                $hasil = $angka1 + $angka2;
                break;

            case "-":
                $hasil = $angka1 - $angka2;
                break;

            case "*":
                $hasil = $angka1 * $angka2;
                break;

            case "/":
                if ($angka2 == 0) {
                    $hasil = "Tidak dapat dibagi dengan 0";
                } else {
                    $hasil = $angka1 / $angka2;
                }
                break;

            case "%":
                if ($angka2 == 0) {
                    $hasil = "Tidak dapat melakukan modulus dengan 0";
                } else {
                    $hasil = $angka1 % $angka2;
                }
                break;

            default:
                $hasil = "Operator tidak valid";
        }

        echo "<h2>Hasil: $hasil</h2>";
    }

    ?>

</body>
</html>