<?php
class DatabaseConnection {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;
    
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    
    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
    
    public function executeQuery($sql) {
        $result = $this->conn->query($sql);
        
        if (!$result) {
            die("Query error: " . $this->conn->error);
        }
        
        return $result;
    }
    
    public function close() {
        $this->conn->close();
    }
}

// Contoh penggunaan:
$host = "localhost";
$username = "root";
$password = "password";
$database = "nama_database";

$connection = new DatabaseConnection($host, $username, $password, $database);
$connection->connect();

// Contoh eksekusi query
$sql = "SELECT * FROM nama_tabel";
$result = $connection->executeQuery($sql);

// Contoh pengolahan hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Nama: " . $row["nama"] . "<br>";
    }
} else {
    echo "Tidak ada data.";
}
$connection->close();
?>

//Enkripsi
<?php
class Encryption {
    private $key;
    private $cipher = "AES-256-CBC";
    
    public function __construct($key) {
        $this->key = $key;
    }
    
    public function encrypt($data) {
        $ivLength = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encryptedData = openssl_encrypt($data, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        
        $hmac = hash_hmac('sha256', $encryptedData, $this->key, true);
        
        return base64_encode($iv . $hmac . $encryptedData);
    }
    
    public function decrypt($encryptedData) {
        $data = base64_decode($encryptedData);
        $ivLength = openssl_cipher_iv_length($this->cipher);
        $iv = substr($data, 0, $ivLength);
        $hmac = substr($data, $ivLength, 32);
        $encryptedData = substr($data, $ivLength + 32);
        
        $decryptedData = openssl_decrypt($encryptedData, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        
        $calculatedHmac = hash_hmac('sha256', $encryptedData, $this->key, true);
        
        if (hash_equals($hmac, $calculatedHmac)) {
            return $decryptedData;
        } else {
            return false;
        }
    }
}

// Contoh penggunaan:
$key = "secret_key";
$data = "Hello, World!";

$encryption = new Encryption($key);
$encryptedData = $encryption->encrypt($data);
echo "Data terenkripsi: " . $encryptedData . "<br>";

$decryptedData = $encryption->decrypt($encryptedData);

if ($decryptedData) {
    echo "Data terdekripsi: " . $decryptedData;
} else {
    echo "Gagal mendekripsi data.";
}
?>


