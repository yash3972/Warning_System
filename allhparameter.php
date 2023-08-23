<?php
        if (isset($_POST['startuserDateTime']) && !empty($_POST['startuserDateTime'])) {
            $userStartDateTime = $_POST['startuserDateTime'];
            $formattedStartDateTime = date('Y-m-d H:i:s', strtotime($userStartDateTime));
            
            // echo $formattedStartDateTime;
            
        }
        else {
            // Set a default start date if it's not provided in the form
            $formattedStartDateTime = '2022-01-01 00:00:00';
        }
        ?>
<?php
        if (isset($_POST['enduserDateTime']) && !empty($_POST['enduserDateTime'])) {
            $userEndDateTime = $_POST['enduserDateTime'];
            $formattedEndDateTime = date('Y-m-d H:i:s', strtotime($userEndDateTime));
            
            // echo $formattedEndDateTime;
        }
        else {
            // Set the current date and time if the end date is not provided in the form
            date_default_timezone_set('Asia/Kolkata');
            $currentDate = date('Y-m-d H:i');
            $formattedEndDateTime = $currentDate;
        }
        ?>



 
<?php
 $con = mysqli_connect("localhost","root","","warsystem");
 if(!$con){
     echo "problem in database connection..";
 
 }else{
    // echo "connection successful";
    $sql="SELECT * FROM section2 WHERE datetime  BETWEEN '$formattedStartDateTime' AND '$formattedEndDateTime' ORDER BY id ";
    $result =mysqli_query($con,$sql);
    $chart_data="";
    while($row=mysqli_fetch_array($result)){
        $datetime[]=$row['datetime'];
        $h1x[]=$row['h1x'];
        $h2x[]=$row['h2x'];
        $h3x[]=$row['h3x'];
        $h4x[]=$row['h4x'];
        $h5x[]=$row['h5x'];

        $h1y[]=$row['h1y'];
        $h2y[]=$row['h2y'];
        $h3y[]=$row['h3y'];
        $h4y[]=$row['h4y'];
        $h5y[]=$row['h5y'];

        $h1z[]=$row['h1z'];
        $h2z[]=$row['h2z'];
        $h3z[]=$row['h3z'];
        $h4z[]=$row['h4z'];
        $h5z[]=$row['h5z'];

    
        $threshold3[]=$row['threshold3'];
        $threshold4[]=$row['threshold4'];
        $threshold5[]=$row['threshold5'];
    }
    
    
    
}
?>
<?php
// Include your database connection code here
$con = mysqli_connect("localhost", "root", "", "warsystem");
if (!$con) {
    echo "Problem in database connection..";
} else {
    if (isset($_POST['updateThreshold1'])) {
        $newThreshold1 = $_POST['newThreshold1'];
        
        // Update the threshold value in the database
        $updateQuery = "UPDATE section2 SET threshold3 = '$newThreshold1' "; // Update the query accordingly
        $updateResult = mysqli_query($con, $updateQuery);
        
        if ($updateResult) {
           
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error updating threshold value: " . mysqli_error($con);
        }
    }
}
{
    if (isset($_POST['updateThreshold2'])) {
        $newThreshold2 = $_POST['newThreshold2'];
        
        // Update the threshold value in the database
        $updateQuery = "UPDATE section2 SET threshold4 = '$newThreshold2' "; // Update the query accordingly
        $updateResult = mysqli_query($con, $updateQuery);
        
        if ($updateResult) {
           
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error updating threshold value: " . mysqli_error($con);
        }
    }
}
{
    if (isset($_POST['updateThreshold3'])) {
        $newThreshold3 = $_POST['newThreshold3'];
        
        // Update the threshold value in the database
        $updateQuery = "UPDATE section2 SET threshold5 = '$newThreshold3' "; // Update the query accordingly
        $updateResult = mysqli_query($con, $updateQuery);
        
        if ($updateResult) {
           
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error updating threshold value: " . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>  
     <title>Analysis</title>


     <style>
        body {
            
            font-family: Arial, sans-serif;
            background-color: #FFFDC4;
            margin: 0;
            padding: 0;
        }
        canvas {
            max-width: 100%;
            height: auto; /* Adjust the height automatically to maintain aspect ratio */
        }

        /* Adjustments for the card-body1 container */
        .card-body1{
            
            width: 80%;
            /* max-width: 800px; */
            height: 630px;
            margin: auto;
            margin-top: 16px;
            background-color: #FFFDC4;
            /* border: 2px solid black; */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.6);
        }
        .card-body2{
            
            width: 80%;
            /* max-width: 800px; */
            height: 630px;
            margin: auto;
            margin-top: 16px;
            background-color: #FFFDC4;
            /* border: 2px solid black; */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.6);
        }
        .card-body3{
            
            width: 80%;
            /* max-width: 800px; */
            height: 630px;
            margin: auto;
            margin-top: 16px;
            background-color: #FFFDC4;
            /* border: 2px solid black; */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.6);
        }
        h3 {
            color: #96455d;
        }
        /* canvas {
            max-width: 100%;
           
        } */
        form {
            margin-top: 10px;
        }
        input[type="datetime-local"] {
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #96455d;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            padding: 10px 20px;
            margin: 0;
        }
        a{
            background-color: #96455d;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            padding: 10px 20px;
            margin: 0;
            float: right;
        }
        .button {
            margin-top: 20px;
            text-align: center;
            position: relative;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #96455d;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button a:hover {
            background-color: #7a3447;
        }
        .btn_primary{
            color: white;
            background: #96455d;
            border: none;
        }

        #bargraph1{
            display: block;
            height: 65%;
            width: 95%;
            margin: auto;
            max-height: 425px;
        }
        #bargraph2{
            display: block;
            height: 65%;
            width: 95%;
            margin: auto;
            max-height: 425px;
        }
        #bargraph3{
            display: block;
            height: 65%;
            width: 95%;
            margin: auto;
            max-height: 425px;
        }
        h2{
            text-align: center;
            margin: auto;
            margin-bottom: 5px;

        }
        
    </style>
     </head>
 <body>

 <script type="text/javascript">
     // Time interval in milliseconds (e.g., 5 minutes = 300000 milliseconds)
     var refreshInterval = 300000;
 
     function refreshPage() {
         location.reload();
     }
 
     setTimeout(refreshPage, refreshInterval);
     
 </script>


 <?php
date_default_timezone_set('Asia/Kolkata');

$defaultStartDate = "2022-01-01 00:00:00";
$currentDate = date('Y-m-d H:i');
// echo $currentDate;
?>



 <div class="card-body1">
    <!-- <h3>strain1 graph</h3> -->
    <h2>H x</h2>
    <canvas id="bargraph1" ></canvas>

    

    <!-- Add form to input date-time -->
    <form method="POST" action="">
        <div class="part1">
            Start datetime :
            <input type="datetime-local" name="startuserDateTime" value="<?php echo isset($_POST['startuserDateTime']) ? $_POST['startuserDateTime'] : '2022-01-01 00:01'; ?>" required >
            End datetime :
            <input type="datetime-local" name="enduserDateTime" value="<?php echo isset($_POST['enduserDateTime']) ? $_POST['enduserDateTime'] : $currentDate; ?>" required >
        </div>
        <br>
        <div class="part2">
            <input type="submit"  value="Submit">
            

            <a href="export/export_accelerometer_x.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>
        </div>
    
        
        
       
    </form>
    <div class="container">
            <form method="POST" action="">
                <label for="newThreshold1">New Threshold Value:</label>
                <input type="number" id="newThreshold1" name="newThreshold1" required>
                
                <input type="submit" name="updateThreshold1" value="updateThreshold1">
            
             
             <a href="export2.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>

             </form>
            
    </div>
    
</div>
 <div class="card-body2">
    <!-- <h3>strain1 graph</h3> -->
    <h2>H y</h2>
    <canvas id="bargraph2" ></canvas>

    

    <!-- Add form to input date-time -->
    <form method="POST" action="">
        <div class="part1">
            Start datetime :
            <input type="datetime-local" name="startuserDateTime" value="<?php echo isset($_POST['startuserDateTime']) ? $_POST['startuserDateTime'] : '2022-01-01 00:01'; ?>" required >
            End datetime :
            <input type="datetime-local" name="enduserDateTime" value="<?php echo isset($_POST['enduserDateTime']) ? $_POST['enduserDateTime'] : $currentDate; ?>" required >
        </div>
        <br>
        <div class="part2">
            <input type="submit"  value="Submit">
            

            <a href="export/export_accelerometer_y.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>
        </div>
    
        
        
       
    </form>
    <div class="container">
            <form method="POST" action="">
                <label for="newThreshold2">New Threshold Value:</label>
                <input type="number" id="newThreshold2" name="newThreshold2" required>
                
                <input type="submit" name="updateThreshold2" value="updateThreshold2">
            
             
             <a href="export2.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>

             </form>
            
    </div>
    
</div>
 <div class="card-body3">
    <!-- <h3>strain1 graph</h3> -->
    <h2>H z</h2>
    <canvas id="bargraph3" ></canvas>

    

    <!-- Add form to input date-time -->
    <form method="POST" action="">
        <div class="part1">
            Start datetime :
            <input type="datetime-local" name="startuserDateTime" value="<?php echo isset($_POST['startuserDateTime']) ? $_POST['startuserDateTime'] : '2022-01-01 00:01'; ?>" required >
            End datetime :
            <input type="datetime-local" name="enduserDateTime" value="<?php echo isset($_POST['enduserDateTime']) ? $_POST['enduserDateTime'] : $currentDate; ?>" required >
        </div>
        <br>
        <div class="part2">
            <input type="submit"  value="Submit">
            

            <a href="export/export_accelerometer_z.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>
        </div>
    
        
        
       
    </form>
    <div class="container">
            <form method="POST" action="">
                <label for="newThreshold3">New Threshold Value:</label>
                <input type="number" id="newThreshold3" name="newThreshold3" required>
                
                <input type="submit" name="updateThreshold3" value="updateThreshold3">
            
             
             <a href="export2.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>

             </form>
            
    </div>
    
</div>







        
     
     <script type="text/javascript">
        
     var ctx = document.getElementById("bargraph1").getContext('2d');
 var myChart = new Chart(ctx, {
     type: 'line',
     data: {
         labels: <?php echo json_encode($datetime); ?>,
         datasets: [
            {
             label: 'SOIL_tens1',
             backgroundColor: 'rgb(192,0,0)',
             borderColor: 'rgb(192,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h1x); ?>
         },
            {
             label: 'SOIL_tens2',
             backgroundColor: '#E8A734',
             borderColor: '#E8A734',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h2x); ?>
         },
            {
             label: 'SOIL_tens3',
             backgroundColor: '#F1CC8B',
             borderColor: '	#F1CC8B',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h3x); ?>
         },
            {
             label: 'SOIL_tens4',
             backgroundColor: 'rgb(64,0,0)',
             borderColor: 'rgb(64,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h4x); ?>
         },
            {
             label: 'SOIL_tens5',
             backgroundColor: 'rgb(128,0,0)',
             borderColor: 'rgb(128,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h5x); ?>
         },
            {
             label: 'threshold',
             backgroundColor: 'rgb(0,0,0)',
             borderColor: 'rgb(0,0,0,0.3)',
             borderWidth: 5,

             fill: false,
             data: <?php echo json_encode($threshold3); ?>
         }
           
           
        ]
     },
     options: {
        scales: {
             x: {
                 display:true,
                 ticks: {
                     
                     font: {
                         weight: 'bold', // Make x-axis labels bold
                         size:18
                     }
                     
                 },
                 grid: {
                     color: '#96455d', // Change x-axis grid line color
                     borderColor: '#96455d', // Change x-axis border color
                     borderWidth: 2 // Set x-axis border width
                 }
             },
             y: {
                 display: true,
                 ticks: {
                     
                     font: {
                         weight: 'bold', // Make y-axis labels bold
                         size:18
                     }
                 },
                 grid: {
                     color: '#96455d', // Change y-axis grid line color
                     borderColor: '#96455d', // Change y-axis border color
                     borderWidth: 2 // Set y-axis border width
                 }
             }
         },
         plugins: {
             legend: {
                 display: true,
                 position: 'bottom',
                 labels: {
                     fontColor: "#96455d",
                     fontFamily: 'Circular Std Book',
                     fontSize: 14
                 }
             }
         },
         elements: {
             point: {
                 radius: 0 // Set the radius to 0 to hide the data points
             }
         }
     }
 });
 
 </script>
     <script type="text/javascript">
        
     var ctx = document.getElementById("bargraph2").getContext('2d');
 var myChart = new Chart(ctx, {
     type: 'line',
     data: {
         labels: <?php echo json_encode($datetime); ?>,
         datasets: [
            {
             label: 'SOIL_tens1',
             backgroundColor: 'rgb(192,0,0)',
             borderColor: 'rgb(192,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h1y); ?>
         },
            {
             label: 'SOIL_tens2',
             backgroundColor: '#E8A734',
             borderColor: '#E8A734',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h2y); ?>
         },
            {
             label: 'SOIL_tens3',
             backgroundColor: '#F1CC8B',
             borderColor: '	#F1CC8B',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h3y); ?>
         },
            {
             label: 'SOIL_tens4',
             backgroundColor: 'rgb(64,0,0)',
             borderColor: 'rgb(64,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h4y); ?>
         },
            {
             label: 'SOIL_tens5',
             backgroundColor: 'rgb(128,0,0)',
             borderColor: 'rgb(128,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h5y); ?>
         },
            {
             label: 'threshold',
             backgroundColor: 'rgb(0,0,0)',
             borderColor: 'rgb(0,0,0,0.3)',
             borderWidth: 5,

             fill: false,
             data: <?php echo json_encode($threshold4); ?>
         }
           
           
        ]
     },
     options: {
        scales: {
             x: {
                 display:true,
                 ticks: {
                     
                     font: {
                         weight: 'bold', // Make x-axis labels bold
                         size:18
                     }
                     
                 },
                 grid: {
                     color: '#96455d', // Change x-axis grid line color
                     borderColor: '#96455d', // Change x-axis border color
                     borderWidth: 2 // Set x-axis border width
                 }
             },
             y: {
                 display: true,
                 ticks: {
                     
                     font: {
                         weight: 'bold', // Make y-axis labels bold
                         size:18
                     }
                 },
                 grid: {
                     color: '#96455d', // Change y-axis grid line color
                     borderColor: '#96455d', // Change y-axis border color
                     borderWidth: 2 // Set y-axis border width
                 }
             }
         },
         plugins: {
             legend: {
                 display: true,
                 position: 'bottom',
                 labels: {
                     fontColor: "#96455d",
                     fontFamily: 'Circular Std Book',
                     fontSize: 14
                 }
             }
         },
         elements: {
             point: {
                 radius: 0 // Set the radius to 0 to hide the data points
             }
         }
     }
 });
 
 </script>
     <script type="text/javascript">
        
     var ctx = document.getElementById("bargraph3").getContext('2d');
 var myChart = new Chart(ctx, {
     type: 'line',
     data: {
         labels: <?php echo json_encode($datetime); ?>,
         datasets: [
            {
             label: 'SOIL_tens1',
             backgroundColor: 'rgb(192,0,0)',
             borderColor: 'rgb(192,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h1z); ?>
         },
            {
             label: 'SOIL_tens2',
             backgroundColor: '#E8A734',
             borderColor: '#E8A734',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h2z); ?>
         },
            {
             label: 'SOIL_tens3',
             backgroundColor: '#F1CC8B',
             borderColor: '	#F1CC8B',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h3z); ?>
         },
            {
             label: 'SOIL_tens4',
             backgroundColor: 'rgb(64,0,0)',
             borderColor: 'rgb(64,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h4z); ?>
         },
            {
             label: 'SOIL_tens5',
             backgroundColor: 'rgb(128,0,0)',
             borderColor: 'rgb(128,0,0)',
             borderWidth: 1.5,
             fill: false,
             data: <?php echo json_encode($h5z); ?>
         },
            {
             label: 'threshold',
             backgroundColor: 'rgb(0,0,0)',
             borderColor: 'rgb(0,0,0,0.3)',
             borderWidth: 5,

             fill: false,
             data: <?php echo json_encode($threshold5); ?>
         }
           
           
        ]
     },
     options: {
        scales: {
             x: {
                 display:true,
                 ticks: {
                     
                     font: {
                         weight: 'bold', // Make x-axis labels bold
                         size:18
                     }
                     
                 },
                 grid: {
                     color: '#96455d', // Change x-axis grid line color
                     borderColor: '#96455d', // Change x-axis border color
                     borderWidth: 2 // Set x-axis border width
                 }
             },
             y: {
                 display: true,
                 ticks: {
                     
                     font: {
                         weight: 'bold', // Make y-axis labels bold
                         size:18
                     }
                 },
                 grid: {
                     color: '#96455d', // Change y-axis grid line color
                     borderColor: '#96455d', // Change y-axis border color
                     borderWidth: 2 // Set y-axis border width
                 }
             }
         },
         plugins: {
             legend: {
                 display: true,
                 position: 'bottom',
                 labels: {
                     fontColor: "#96455d",
                     fontFamily: 'Circular Std Book',
                     fontSize: 14
                 }
             }
         },
         elements: {
             point: {
                 radius: 0 // Set the radius to 0 to hide the data points
             }
         }
     }
 });
 
 </script>
 <br>

 </body>
 </html>
 
 