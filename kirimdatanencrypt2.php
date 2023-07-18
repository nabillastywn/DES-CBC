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
    function encrypt_decrypt($action, $string) {
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

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function insertData($dataHumidity, $dataSuhu, $dataIntensitas) {
        $sql = "INSERT INTO dataall (tglData, suhu, kelembapan, intensitas) 
                VALUES (NOW(), '$dataSuhu', '$dataHumidity', '$dataIntensitas')";

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

$servername="localhost";
$username="root";
$password="";
$dbname="cyber";

$sensorData = new SensorData($servername, $username, $password, $dbname);
$sensorData->connect();
$dataHumidity  = $sensorData->encrypt_decrypt('encrypt', $_GET['humidity']);
$dataSuhu   = $sensorData->encrypt_decrypt('encrypt', $_GET['suhu']);
$dataIntensitas  = $sensorData->encrypt_decrypt('encrypt', $_GET['intensitas']);
echo $dataHumidity;
$sensorData->insertData($dataHumidity, $dataSuhu, $dataIntensitas);
$sensorData->close();

?>
