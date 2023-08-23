<?php
// include_once 'db_connect.php';

$con = mysqli_connect("localhost", "root", "", "warsystem");

$start_date = isset($_GET['formattedStartDateTime']) ? $_GET['formattedStartDateTime'] : date('Y-m-d H:i:s');
$end_date = isset($_GET['formattedEndDateTime']) ? $_GET['formattedEndDateTime'] : date('Y-m-d H:i:s');

$queryThreshold = mysqli_query($con, "SELECT threshold FROM strain1 WHERE id = 10"); // Adjust the query based on your table structure

$inputThresholdRow = mysqli_fetch_assoc($queryThreshold);
$inputThreshold = isset($inputThresholdRow['threshold']) ? $inputThresholdRow['threshold'] : 250;

$query1 = mysqli_query($con, "SELECT * FROM strain1 WHERE datetime BETWEEN '$start_date' AND '$end_date' AND strain1 > $inputThreshold"); // Add condition for threshold
$query2 = mysqli_query($con, "SELECT * FROM strain2 WHERE datetime BETWEEN '$start_date' AND '$end_date' AND strain2 > $inputThreshold"); // Add condition for threshold
$query3 = mysqli_query($con, "SELECT * FROM strain3 WHERE datetime BETWEEN '$start_date' AND '$end_date' AND strain3 > $inputThreshold"); // Add condition for threshold
$query4 = mysqli_query($con, "SELECT * FROM strain4 WHERE datetime BETWEEN '$start_date' AND '$end_date' AND strain4 > $inputThreshold"); // Add condition for threshold
$query5 = mysqli_query($con, "SELECT * FROM strain5 WHERE datetime BETWEEN '$start_date' AND '$end_date' AND strain5 > $inputThreshold"); // Add condition for threshold

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
$data2 = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>strain2</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial = 1;

while ($row = mysqli_fetch_assoc($query2)) {
    $data2 .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row['id']}</td>
        <td>{$row['strain2']}</td>
        <td>{$row['datetime']}</td>
    </tr>
    ";
    $Serial++;
}

$data2 .= "
    </tbody>
</table>
";
$data3 = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>strain3</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial = 1;

while ($row = mysqli_fetch_assoc($query3)) {
    $data3 .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row['id']}</td>
        <td>{$row['strain3']}</td>
        <td>{$row['datetime']}</td>
    </tr>
    ";
    $Serial++;
}

$data3 .= "
    </tbody>
</table>
";
$data4 = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>strain4</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial = 1;

while ($row = mysqli_fetch_assoc($query4)) {
    $data4 .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row['id']}</td>
        <td>{$row['strain4']}</td>
        <td>{$row['datetime']}</td>
    </tr>
    ";
    $Serial++;
}

$data4 .= "
    </tbody>
</table>
";
$data5 = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>strain5</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial = 1;

while ($row = mysqli_fetch_assoc($query5)) {
    $data5 .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row['id']}</td>
        <td>{$row['strain5']}</td>
        <td>{$row['datetime']}</td>
    </tr>
    ";
    $Serial++;
}

$data5 .= "
    </tbody>
</table>
";  

$name = "TJ - " . date("d-m-y");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$name.xls");
// echo $inputThreshold;
echo $data1;
echo $data2;
echo $data3;
echo $data4;
echo $data5;
?>
