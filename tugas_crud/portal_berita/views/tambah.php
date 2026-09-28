<!DOCTYPE html>
<html>
<head>
    <title>Input Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 500px;
            margin: 40px auto;
            padding: 30px 20px 20px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #f9f9f9;
            padding: 18px 24px 12px 24px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }
        label {
            margin-bottom: 2px;
            color: #444;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], textarea, input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: fit-content;
            align-self: flex-start;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        @media (max-width: 700px) {
            .container {
                max-width: 98vw;
                padding: 10px 2vw;
            }
            form {
                padding: 10px 6px 10px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Input Berita</h2>
        <form method="POST" action="tambah_aksi.php" enctype="multipart/form-data">
            <label>Judul Berita:</label>
            <input type="text" name="judul" required>

            <label>Gambar:</label>
            <input type="file" name="gambar" accept=".jpg,.jpeg,.png">

            <label>Isi Berita:</label>
            <textarea name="isi" rows="5" required></textarea>

            <label>Penulis:</label>
            <input type="text" name="penulis" required>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
