<?php
$api = "https://shineelectronics.org/WarningSystem/from_to_date_filter_api.php"; // Replace with your API URL

$api_data = file_get_contents($api);
$land_data = json_decode($api_data, true);

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "warsystem";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute your insert queries
$s1 = count($land_data["section1"]);
$s2 = count($land_data["section2"]);
$s3 = count($land_data["section3"]);
echo $s1;
echo "<br>";
echo $s2;
echo "<br>";
echo $s3;

mysqli_close($conn);
?>
