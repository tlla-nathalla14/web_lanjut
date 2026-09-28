<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>

<body>

    <h1>Form Login</h1>

    <form method="post">

        <label>Username:</label>
        <br>
        <input type="text" name="username" required>

        <br><br>

        <label>Password:</label>
        <br>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit" name="login">Login</button>

    </form>

    <br>

    <?php

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_benar = "athalla";
        $password_benar = "2407411072";

        if ($username == $username_benar && $password == $password_benar) {

            echo "<h2>Selamat datang Admin</h2>";

        } else {

            echo "<h2>Login gagal</h2>";

        }
    }

    ?>

</body>
</html>