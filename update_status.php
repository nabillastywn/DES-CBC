<?php
if (isset($_POST['sensorId']) && isset($_POST['command'])) {
    $sensorId = $_POST['sensorId'];
    $encryptedCommand = $_POST['command'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cyber";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the update query
    $sql = "UPDATE sensor SET command = ? WHERE idSensor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $encryptedCommand, $sensorId);

    if ($stmt->execute()) {
        echo "Command successfully updated.";
    } else {
        echo "Error updating command: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
