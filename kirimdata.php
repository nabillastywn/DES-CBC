<?php


$dataHumidity  = $_GET['humidity'];
$dataSuhu   = $_GET['suhu'];


echo "Data dari url : <br> suhu : "
     . $dataSuhu . " <br> humidity : "
     . $dataHumidity;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eslolin";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}


$sql = "INSERT INTO datasensor (tglData, suhu, kelembapan) 
       VALUES (NOW(), $dataSuhu, $dataHumidity);";


mysqli_query($conn, $sql);


mysqli_close($conn);
