<?php
// include_once 'db_connect.php';

$con = mysqli_connect("localhost", "root", "", "warsystem");

$start_date = isset($_GET['formattedStartDateTime']) ? $_GET['formattedStartDateTime'] : date('Y-m-d H:i:s');
$end_date = isset($_GET['formattedEndDateTime']) ? $_GET['formattedEndDateTime'] : date('Y-m-d H:i:s');

$queryThreshold = mysqli_query($con, "SELECT threshold FROM strain1 WHERE id = 10"); // Adjust the query based on your table structure

$inputThresholdRow = mysqli_fetch_assoc($queryThreshold);
$inputThreshold = isset($inputThresholdRow['threshold']) ? $inputThresholdRow['threshold'] : 250;

$query1 = mysqli_query($con, "SELECT * FROM allcrack WHERE datetime BETWEEN '$start_date' AND '$end_date' AND strain1 > $inputThreshold"); // Add condition for threshold


$data1 = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>strain1</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial = 1;

while ($row = mysqli_fetch_assoc($query1)) {
    $data1 .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row['id']}</td>
        <td>{$row['strain1']}</td>
        <td>{$row['datetime']}</td>
    </tr>
    ";
    $Serial++;
}

$data1 .= "
    </tbody>
</table>
";


$name = "TJ - " . date("d-m-y");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$name.xls");
// echo $inputThreshold;
echo $data1;

?>
