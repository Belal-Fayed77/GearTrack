<?php
$conn = new mysqli("localhost", "root", "", "geartrack_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $plate = $_POST['plate'];
    $vin = $_POST['vin'];
    $sql = "INSERT INTO cars (brand, model, year, plate, vin) VALUES ('$brand', '$model', '$year', '$plate', '$vin')";
    if ($conn->query($sql) === TRUE) {
        
        echo "<script>window.location.href='dashboard.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>