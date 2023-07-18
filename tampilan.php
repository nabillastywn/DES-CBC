<!doctype html>
<html lang="en">
    
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
<center>    <h1>Monitoring Suhu dan kelembapan</h1></center>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cyber";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT idSensor, tglData, suhu, kelembapan FROM datasensor";

$sql = "SELECT * FROM sensor";
$result2 = $conn->query($sql);

// Initialize an array to store the fetched data
$sensorData = array();

$result = mysqli_query($conn, $query);
if ($result) {
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Tanggal Waktu</th>
                    <th>Suhu</th>
                    <th>Kelembapan</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['tglData']}</td>
                <td>{$row['suhu']}</td>
                <td>{$row['kelembapan']}</td>
            </tr>";
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

<span id="status-message"></span>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>