<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

include 'kirimanenkripsi2.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cyber";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT tglData, suhu, kelembaban, intensitas FROM dataall";
$result = mysqli_query($conn, $sql);

$encrypt_decrypt = new Enkripsi();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-grayscale/5.0.10/css/styles.min.css">
    <style>
        .masthead {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Dashboard Monitoring</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="tubes_siber.php">Suhu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cahaya.php">Cahaya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/suhu1.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="assets/img/kel2.png" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container py-4">
        <br>
        <div class="card">
            <div class="card-body" style="max-height: calc(100vh - 150px); overflow-y:auto">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="secretKey" class="form-label">Secret Key:</label>
                        <input type="password" class="form-control" id="secretKey" name="secretKey" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <table class="table">
                    <br><br><br>
                    <h2 class="mx-auto text-center">Data Hasil Monitoring Suhu & Kelembaban</h2>
                    <br><br>
                    <thead>
                        <tr>
                            <th>Tanggal Waktu</th>
                            <th>Suhu</th>
                            <th>Kelembaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['secretKey'])) {
                            $password = $_POST['secretKey'];

                            // Check if the password is correct
                            if ($password === "kelompok234") {
                                // Password benar, tampilkan data
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $decrypted_suhu = $encrypt_decrypt->decrypt($row["suhu"]);
                                        $decrypted_kelembaban = $encrypt_decrypt->decrypt($row["kelembaban"]);

                                        $decrypted_suhu = floatval($decrypted_suhu);
                                        if (is_float($decrypted_suhu)) {
                                            $decrypted_suhu = number_format($decrypted_suhu, 1);
                                        }
                                        $decrypted_kelembaban = floatval($decrypted_kelembaban);
                                        if (is_float($decrypted_kelembaban)) {
                                            $decrypted_kelembaban = number_format($decrypted_kelembaban, 1);
                                        }

                                        echo "<tr>";
                                        echo "<td>" . $row["tglData"] . "</td>";
                                        echo "<td>" . $decrypted_suhu . "</td>";
                                        echo "<td>" . $decrypted_kelembaban . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "</tr><td colspan='4'>0 results</td></tr>";
                                }
                            } else {
                                // Password salah, tampilkan pesan error
                                echo "Password salah. Data tidak dapat ditampilkan.";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-center py-3">
        <p style="color:#FFFFFF;">Copyright &copy; 2023 | Kelompok 5 IK-2D
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-grayscale/5.0.10/js/scripts.min.js">
    </script>
</body>

</html>
