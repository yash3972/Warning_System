<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-image: url("login_img.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* border: 2px solid black; */
            padding: 0;
            margin: 0;
            /* opacity: 0.5; */
            
        }
        
       


        .login-container {
            width: 40%;
            max-width: 400px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 2.5 rem;
            height: 40%;
            max-height: 400px;
            margin: 0 auto;
            margin-top: 170px;
            background: url();
            background-color: rgba(255, 255, 255, 0.384);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.3);
   
        }

        .login-container h2 {
            text-align: center;
            color: rgb(31, 31, 31);
            text-shadow: #000000;
            font-weight: bolder;
            margin: 5px;
            margin-bottom: 5PX;
            font-family: 'Times New Roman', Times, serif;
            font-size: 2.5rem;
            
        }

        form {

                font-size: 1.6rem;
                padding: 0px;
                width: 100%;
                margin-top: -15px;
                margin-bottom: 10px;
                text-align: center;
                }

                form input {
                padding: 3px 5px;
                font-size: 75%;
                color: #000000;
                margin: 5px;
                width: 50%;
                border: 1px solid gray;
                border-radius: 6px;
                background-color: #ffffff74;
                box-shadow: 1px 1px 3px;
                transition: 269ms;
                }

                form input:focus {
                outline: none;
                background-color: #ffffff17;
                box-shadow: 2px 2px 5px;
                }

        

        form button {
            color: white;
            border: none;
            font-size: 1.25rem;
            font-weight: bolder;
            height: 30px;
            margin-top: 10px;
            border-radius: 6px;
            background-color: rgb(21, 20, 20);
            color: #ffffff90;
            width: 35%;
            box-shadow: 1px 1px 2px black;
            display: block;
            margin: auto;
            transition: ease-in 0.25s;
            cursor: pointer;

        }
        button:hover {
            background-color:black;
            box-shadow: 0px 0px 50px grey;
            color: #fff;
        }

        #logo {
                display: block;
                border-radius: 5px;
                width: 42%;
                margin: auto;
                margin-bottom: 20px;
        }
        

    </style>
</head>
<body>
    <!-- api-------------------------- -->
    <div class="api">
    <?php
$api = "https://shineelectronics.org/WarningSystem/from_to_date_filter_api.php";

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

// $i=$land_data["section1"][0]["id"];
$s1 = count($land_data["section1"]);
$s2 = count($land_data["section2"]);
$s3 = count($land_data["section3"]);
echo $s1;
echo "<br>";
echo $s2;
echo "<br>";
echo $s3;
// echo $i;
for ($j=1050; $j >=0; $j--) {

    // for strain1 -----------------------
   { 
        $strain1_value = $land_data["section1"][$j]["strain1"];
        $datetime_value = $land_data["section1"][$j]["TimeStamp"];
        $id_value = $land_data["section1"][$j]["id"];

        // Check if the ID already exists in the table
        $checkQuery = "SELECT id FROM strain1 WHERE id = '$id_value'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // ID doesn't exist, perform the insertion
            $insertQuery = "INSERT INTO strain1 (id, strain1, datetime) VALUES ('$id_value', '$strain1_value', '$datetime_value')";

            if (mysqli_query($conn, $insertQuery)) {
                // echo "<br>Data inserted successfully into the database.";
            } else {
                echo "<br>Error inserting data: " . mysqli_error($conn);
            }
        } else {
            // echo "<br>ID $id_value already exists in the table.";
        }
    }
    // for strain2 -----------------------
   { 
        $strain2_value = $land_data["section1"][$j]["strain2"];
        $datetime_value = $land_data["section1"][$j]["TimeStamp"];
        $id_value = $land_data["section1"][$j]["id"];

        // Check if the ID already exists in the table
        $checkQuery = "SELECT id FROM strain2 WHERE id = '$id_value'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // ID doesn't exist, perform the insertion
            $insertQuery = "INSERT INTO strain2 (id, strain2, datetime) VALUES ('$id_value', '$strain2_value', '$datetime_value')";

            if (mysqli_query($conn, $insertQuery)) {
                // echo "<br>Data inserted successfully into the database.";
            } else {
                echo "<br>Error inserting data: " . mysqli_error($conn);
            }
        } else {
            // echo "<br>ID $id_value already exists in the table.";
        }
    }
    // for strain3 -----------------------
   { 
        $strain3_value = $land_data["section1"][$j]["strain2"];
        $datetime_value = $land_data["section1"][$j]["TimeStamp"];
        $id_value = $land_data["section1"][$j]["id"];

        // Check if the ID already exists in the table
        $checkQuery = "SELECT id FROM strain3 WHERE id = '$id_value'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // ID doesn't exist, perform the insertion
            $insertQuery = "INSERT INTO strain3 (id, strain3, datetime) VALUES ('$id_value', '$strain3_value', '$datetime_value')";

            if (mysqli_query($conn, $insertQuery)) {
                // echo "<br>Data inserted successfully into the database.";
            } else {
                echo "<br>Error inserting data: " . mysqli_error($conn);
            }
        } else {
            // echo "<br>ID $id_value already exists in the table.";
        }
    }
    // for strain4 -----------------------
   { 
        $strain4_value = $land_data["section1"][$j]["strain4"];
        $datetime_value = $land_data["section1"][$j]["TimeStamp"];
        $id_value = $land_data["section1"][$j]["id"];

        // Check if the ID already exists in the table
        $checkQuery = "SELECT id FROM strain4 WHERE id = '$id_value'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // ID doesn't exist, perform the insertion
            $insertQuery = "INSERT INTO strain4 (id, strain4, datetime) VALUES ('$id_value', '$strain4_value', '$datetime_value')";

            if (mysqli_query($conn, $insertQuery)) {
                // echo "<br>Data inserted successfully into the database.";
            } else {
                echo "<br>Error inserting data: " . mysqli_error($conn);
            }
        } else {
            // echo "<br>ID $id_value already exists in the table.";
        }
    }
    // for strain5 -----------------------
   { 
        $strain5_value = $land_data["section1"][$j]["strain5"];
        $datetime_value = $land_data["section1"][$j]["TimeStamp"];
        $id_value = $land_data["section1"][$j]["id"];

        // Check if the ID already exists in the table
        $checkQuery = "SELECT id FROM strain5 WHERE id = '$id_value'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // ID doesn't exist, perform the insertion
            $insertQuery = "INSERT INTO strain5 (id, strain5, datetime) VALUES ('$id_value', '$strain5_value', '$datetime_value')";

            if (mysqli_query($conn, $insertQuery)) {
                // echo "<br>Data inserted successfully into the database.";
            } else {
                echo "<br>Error inserting data: " . mysqli_error($conn);
            }
        } else {
            // echo "<br>ID $id_value already exists in the table.";
        }
    }

    // for allcrack--------------------------
        {

        $crack1_value = $land_data["section1"][$j]["crack1"];
        $crack2_value = $land_data["section1"][$j]["crack2"];
        $crack3_value = $land_data["section1"][$j]["crack3"];
        $crack4_value = $land_data["section1"][$j]["crack4"];
        $crack5_value = $land_data["section1"][$j]["crack5"];
        $datetime_value = $land_data["section1"][$j]["TimeStamp"];
        $id_value = $land_data["section1"][$j]["id"];

        // Check if the ID already exists in the table
        $checkQuery = "SELECT id FROM allcrack WHERE id = '$id_value'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // ID doesn't exist, perform the insertion
            $insertQuery = "INSERT INTO allcrack (id, crack1, crack2, crack3, crack4, crack5, datetime) VALUES ('$id_value', '$crack1_value', '$crack2_value', '$crack3_value', '$crack4_value', '$crack5_value', '$datetime_value')";

            if (mysqli_query($conn, $insertQuery)) {
                // echo "<br>Data inserted successfully into the database.";
            } else {
                echo "<br>Error inserting data: " . mysqli_error($conn);
            }
        } else {
            // echo "<br>ID $id_value already exists in the table.";
        }
        }
}

// SECTION 2---------------------------
for ($j=1050; $j >=0; $j--) {
    { 
                $porepress1_value = $land_data["section2"][$j]["porepress1"];
                $porepress2_value = $land_data["section2"][$j]["porepress2"];
                $porepress3_value = $land_data["section2"][$j]["porepress3"];
                $porepress4_value = $land_data["section2"][$j]["porepress4"];
                $porepress5_value = $land_data["section2"][$j]["porepress5"];
                
                $soiltention1_value = $land_data["section2"][$j]["soiltenstion1"];
                $soiltention2_value = $land_data["section2"][$j]["soiltenstion2"];
                $soiltention3_value = $land_data["section2"][$j]["soiltenstion3"];
                $soiltention4_value = $land_data["section2"][$j]["soiltenstion4"];
                $soiltention5_value = $land_data["section2"][$j]["soiltenstion5"];

                $h1x_value = $land_data["section2"][$j]["h1x"];
                $h2x_value = $land_data["section2"][$j]["h2x"];
                $h3x_value = $land_data["section2"][$j]["h3x"];
                $h4x_value = $land_data["section2"][$j]["h4x"];
                $h5x_value = $land_data["section2"][$j]["h5x"];

                $h1y = $land_data["section2"][$j]["h1y"];
                $h2y = $land_data["section2"][$j]["h2y"];
                $h3y = $land_data["section2"][$j]["h3y"];
                $h4y = $land_data["section2"][$j]["h4y"];
                $h5y = $land_data["section2"][$j]["h5y"];

                $h1z = $land_data["section2"][$j]["h1z"];
                $h2z = $land_data["section2"][$j]["h2z"];
                $h3z = $land_data["section2"][$j]["h3z"];
                $h4z = $land_data["section2"][$j]["h4z"];
                $h5z = $land_data["section2"][$j]["h5z"];

                $inclination1x = $land_data["section2"][$j]["inclination1x"];
                $inclination2x = $land_data["section2"][$j]["inclination2x"];
                $inclination3x = $land_data["section2"][$j]["inclination3x"];
                $inclination4x = $land_data["section2"][$j]["inclination4x"];
                $inclination5x = $land_data["section2"][$j]["inclination5x"];

                $inclination1y = $land_data["section2"][$j]["inclination1y"];
                $inclination2y = $land_data["section2"][$j]["inclination2y"];
                $inclination3y = $land_data["section2"][$j]["inclination3y"];
                $inclination4y = $land_data["section2"][$j]["inclination4y"];
                $inclination5y = $land_data["section2"][$j]["inclination5y"];

                $vwc1 = $land_data["section2"][$j]["vwc1"];
                $vwc2 = $land_data["section2"][$j]["vwc2"];
                $vwc3 = $land_data["section2"][$j]["vwc3"];
                $vwc4 = $land_data["section2"][$j]["vwc4"];
                $vwc5 = $land_data["section2"][$j]["vwc5"];
               
                
                $id_value = $land_data["section2"][$j]["id"];
                $datetime_value = $land_data["section2"][$j]["TimeStamp"];
        
                // Check if the ID already exists in the table
                $checkQuery = "SELECT id FROM section2 WHERE id = '$id_value'";
                $result = mysqli_query($conn, $checkQuery);
        
                if (mysqli_num_rows($result) == 0) {
                    // ID doesn't exist, perform the insertion
                    $insertQuery = "INSERT INTO section2 (id, porepress1, porepress2, porepress3, porepress4, porepress5, soiltention1, soiltention2, soiltention3, soiltention4, soiltention5, h1x, h2x, h3x, h4x, h5x, h1y, h2y, h3y, h4y, h5y, h1z, h2z, h3z, h4z, h5z, inclination1x, inclination2x, inclination3x, inclination4x, inclination5x, inclination1y, inclination2y, inclination3y, inclination4y, inclination5y, vwc1, vwc2, vwc3, vwc4, vwc5, datetime) VALUES ('$id_value', '$porepress1_value', '$porepress2_value', '$porepress3_value', '$porepress4_value', '$porepress5_value', '$soiltention1_value', '$soiltention2_value', '$soiltention3_value', '$soiltention4_value', '$soiltention5_value', '$h1x_value', '$h2x_value', '$h3x_value', '$h4x_value', '$h5x_value', '$h1y', '$h2y', '$h3y', '$h4y', '$h5y', '$h1z', '$h2z', '$h3z', '$h4z', '$h5z', '$inclination1x', '$inclination2x', '$inclination3x', '$inclination4x', '$inclination5x', '$inclination1y', '$inclination2y', '$inclination3y', '$inclination4y', '$inclination5y', '$vwc1', '$vwc2', '$vwc3', '$vwc4', '$vwc5', '$datetime_value')";
        
                    if (mysqli_query($conn, $insertQuery)) {
                        // echo "<br>Data inserted successfully into the database.";
                    } else {
                        echo "<br>Error inserting data: " . mysqli_error($conn);
                    }
                } else {
                    // echo "<br>ID $id_value already exists in the table.";
                }
            }
}

// SECTION 3--------------------------
for ($j=1050; $j >=0 ; $j--) { 
    
    $airtemp_value = $land_data["section3"][$j]["airtemp"];
    $airpress_value = $land_data["section3"][$j]["airpress"];
    $windvelocity_value = $land_data["section3"][$j]["windvelocity"];
    $winddirection_value = $land_data["section3"][$j]["winddirection"];
    $solarradiation_value = $land_data["section3"][$j]["solarradiation"];
    $soiltemp_value = $land_data["section3"][$j]["soiltemp"];
    $inclination1z_value = $land_data["section3"][$j]["inclination1z"];
    $rainfall_value = $land_data["section3"][$j]["rainfall"];
   
    
    $id_value = $land_data["section3"][$j]["id"];
    $datetime_value = $land_data["section3"][$j]["TimeStamp"];

    // Check if the ID already exists in the table
    $checkQuery = "SELECT id FROM section3 WHERE id = '$id_value'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) == 0) {
        // ID doesn't exist, perform the insertion
        $insertQuery = "INSERT INTO section3 (id, airtemp, airpress, windvelocity,winddirection, solarradiation, soiltemp, inclination1z, rainfall, datetime) VALUES ('$id_value', '$airtemp_value', '$airpress_value', '$windvelocity_value', '$winddirection_value', '$solarradiation_value', '$soiltemp_value', '$inclination1z_value', '$rainfall_value',   '$datetime_value')";

        if (mysqli_query($conn, $insertQuery)) {
            // echo "<br>Data inserted successfully into the database.";
        } else {
            echo "<br>Error inserting data: " . mysqli_error($conn);
        }
    } else {
        // echo "<br>ID $id_value already exists in the table.";
    }
}


// Close the database connection
mysqli_close($conn);
?>


    </div>

    <!-- login form--------------------------------- -->

    <div class="login-container">
        <h2>Login</h2>
        <img id="logo" src="iiti_logo.png" alt=" LOGO">
        
        <div>

        </div>
        <form action="login.php" method="POST">
            <div class="form-group">
                
                <input type="text" id="userName" name="uname" placeholder="Username" required>
            </div>
            <div class="form-group">
                
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
