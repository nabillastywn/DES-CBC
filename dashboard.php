<!DOCTYPE html>
<html>

<head>
    <title>Kelompok 5</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Masukkan Key</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];

            if ($password === 'kelompok5') {
                // Password cocok, arahkan ke halaman tampilan2.php
                header('Location: tampilan2.php');
                exit;
            } else {
                // Password salah, tampilkan pesan kesalahan
                echo '<p class="error-message">Password salah</p>';
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="password">Private Key:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan key Anda">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>