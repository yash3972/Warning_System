<?php
// include_once 'db_connect.php';

$con = mysqli_connect("localhost", "root", "", "warsystem");

$start_date = isset($_GET['formattedStartDateTime']) ? $_GET['formattedStartDateTime'] : date('Y-m-d H:i:s');
$end_date = isset($_GET['formattedEndDateTime']) ? $_GET['formattedEndDateTime'] : date('Y-m-d H:i:s');



$query1 = mysqli_query($con, "SELECT * FROM strain1 WHERE datetime BETWEEN '$start_date' AND '$end_date'");
$query2 = mysqli_query($con, "SELECT * FROM strain2 WHERE datetime BETWEEN '$start_date' AND '$end_date'");
$query3 = mysqli_query($con, "SELECT * FROM strain3 WHERE datetime BETWEEN '$start_date' AND '$end_date'");
$query4 = mysqli_query($con, "SELECT * FROM strain4 WHERE datetime BETWEEN '$start_date' AND '$end_date'");
$query5 = mysqli_query($con, "SELECT * FROM strain5 WHERE datetime BETWEEN '$start_date' AND '$end_date'");
$row2 = mysqli_fetch_assoc($query2);
$row3 = mysqli_fetch_assoc($query3);
$row4 = mysqli_fetch_assoc($query4);
$row5 = mysqli_fetch_assoc($query5);
$data = "
<table border=1px>
    <thead>
        <tr>
            <th>Serial</th>
            <th>id</th>
            <th>strain1</th>
            <th>strain2</th>
            <th>strain3</th>
            <th>strain4</th>
            <th>strain5</th>
            <th>datetime</th>
        </tr>
    </thead>
    <tbody>
";
$Serial =1;

while ($row1 = mysqli_fetch_assoc($query1)  ) {
    $data .= "
    <tr>
        <td>{$Serial}</td>
        <td>{$row1['id']}</td>
        <td>{$row1['strain1']}</td>
        <td>{$row2['strain2']}</td>
        <td>{$row3['strain3']}</td>
        <td>{$row4['strain4']}</td>
        <td>{$row5['strain5']}</td>
        <td>{$row1['datetime']}</td>
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

