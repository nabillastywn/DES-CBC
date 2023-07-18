<?php

class SensorData {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function insertData($dataHumidity, $dataSuhu) {
        $sql = "INSERT INTO datasensor (tglData, suhu, kelembapan) 
                VALUES (NOW(), $dataSuhu, $dataHumidity)";

        if ($this->conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function close() {
        $this->conn->close();
    }
}

$dataHumidity  = $_GET['humidity'];
$dataSuhu   = $_GET['suhu'];

echo "Data dari URL: <br> suhu: " . $dataSuhu . " <br> kelembapan: " . $dataHumidity;

$servername="localhost";
$username="root";
$password="";
$dbname="eslolin";
$sensorData = new SensorData($servername, $username, $password, $dbname);
$sensorData->connect();
$hmm = 2;
$humid = number_format($dataHumidity, $hmm);
$suhu = number_format($dataSuhu, $hmm);
$sensorData->insertData($humid, $suhu);
$sensorData->close();

?>


public function insertData($dataHumidity, $dataSuhu) {
        $encryptedHumidity = encrypt_decrypt('encrypt', $dataHumidity);
        $encryptedSuhu = encrypt_decrypt('encrypt', $dataSuhu);

        $sql = "INSERT INTO datasensor (tglData, suhu, kelembapan) 
                VALUES (NOW(), '$encryptedSuhu', '$encryptedHumidity')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
