<?php
$con = mysqli_connect("localhost", "root", "", "warsystem");

$query = mysqli_query($con, "SELECT * FROM users");

$data = "
<table border=1px>
    <thead>
        <tr>
            <th>id</th>
            <th>user_name</th>
            <th>password</th>
        </tr>
    </thead>
    <tbody>
";

while ($row = mysqli_fetch_assoc($query)) {
    $data .= "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['user_name']}</td>
        <td>{$row['password']}</td>
    </tr>
    ";
}

$data .= "
    </tbody>
</table>
";

echo $data;
?>