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
            <th>H1 x</th>
            <th>H2 x</th>
            <th>H3 x</th>
            <th>H4 x</th>
            <th>H5 x</th>
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
        <td>{$row['h1x']}</td>
        <td>{$row['h2x']}</td>
        <td>{$row['h3x']}</td>
        <td>{$row['h4x']}</td>
        <td>{$row['h5x']}</td>
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

