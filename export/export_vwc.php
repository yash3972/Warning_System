<?php
// include_once 'db_connect.php';

$con = mysqli_connect("localhost", "root", "", "warsystem");

$start_date = isset($_GET['formattedStartDateTime']) ? $_GET['formattedStartDateTime'] : date('Y-m-d H:i:s');
$end_date = isset($_GET['formattedEndDateTime']) ? $_GET['formattedEndDateTime'] : date('Y-m-d H:i:s');



$query = mysqli_query($con, "SELECT * FROM section2 WHERE datetime BETWEEN '$start_date' AND '$end_date'");

$data = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>VWC1</th>
            <th>VWC2</th>
            <th>VWC3</th>
            <th>VWC4</th>
            <th>VWC5</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial =1;

while ($row = mysqli_fetch_assoc($query)) {
    $data .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row['id']}</td>
        <td>{$row['vwc1']}</td>
        <td>{$row['vwc2']}</td>
        <td>{$row['vwc3']}</td>
        <td>{$row['vwc4']}</td>
        <td>{$row['vwc5']}</td>
        <td>{$row['datetime']}</td>
    </tr>
    ";
    $Serial++;
}

$data .= "
    </tbody>
</table>
";

$name = "TJ - " . date("d-m-y");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$name.xls");

echo $data;
?>

