<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelompok 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .table-wrapper {
            max-height: 400px;
            overflow-y: auto;
        }

        .table-wrapper::-webkit-scrollbar {
            width: 8px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background-color: #888;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        table.table-bordered {
            border-width: 3px;
        }

        .table-bordered thead th {
            background-color: #f8f9fa;
            border-color: #000;
            border-width: 2px;
        }

        .sticky-thead {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }

        .table-row-even {
            background-color: #f2f2f2;
        }

        .table-row-odd {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h1 class="mt-5">Monitoring Suhu, Kelembapan dan Intensitas Cahaya</h1>
        </center>

        <div class="table-wrapper">
            <?php
            function encrypt_decrypt($action, $string)
            {
                $output = false;

                $encrypt_method = "DES-CBC";
                $secret_key = 'kelompok5';
                $secret_iv = 'kelompok5';

                // Prepare key
                $key = substr(hash('md5', $secret_key), 0, 8);

                // Prepare iv
                $iv = substr(hash('md5', $secret_iv), 0, 8);

                if ($action == 'encrypt') {
                    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                    $output = base64_encode($output);
                } elseif ($action == 'decrypt') {
                    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }

                return $output;
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cyber";

            $conn = mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT idSensor, tglData, suhu, kelembapan, intensitas FROM dataall";

            $result = mysqli_query($conn, $query);

            $counter = 0;

            if ($result) {
                echo "<table class='table mt-5'>
                        <thead class='sticky-thead text-center'>
                            <tr>
                                <th>Tanggal Waktu</th>
                                <th>Suhu</th>
                                <th>Kelembapan</th>
                                <th>Intenstitas</th>
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $suhu = encrypt_decrypt('decrypt', $row['suhu']);
                    $kelembapan = encrypt_decrypt('decrypt', $row['kelembapan']);
                    $intensitas = encrypt_decrypt('decrypt', $row['intensitas']);

                    // Convert the temperature and humidity values to float
                    $suhu = floatval($suhu);
                    $kelembapan = floatval($kelembapan);
                    $intensitas = floatval($intensitas);

                    // Format the temperature and humidity values to remove unnecessary decimal places
                    $suhu = number_format($suhu, 1);
                    $kelembapan = number_format($kelembapan, 1);
                    $intensitas = number_format($intensitas, 1);

                    $rowClass = ($counter % 2 === 0) ? 'table-row-even' : 'table-row-odd';

                    echo "<tr class='table-row $rowClass'>
                            <td class='text-center'>{$row['tglData']}</td>
                            <td class='text-center'>{$suhu}</td>
                            <td class='text-center'>{$kelembapan}</td>
                            <td class='text-center'>{$intensitas}</td>
                        </tr>";

                    $counter++;
                }

                echo "</tbody></table>";

                // Free the result set
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>

        <span id="status-message"></span>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>