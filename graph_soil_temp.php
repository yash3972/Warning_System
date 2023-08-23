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
    $sql="SELECT * FROM section3 WHERE datetime  BETWEEN '$formattedStartDateTime' AND '$formattedEndDateTime' ORDER BY id ";
    $result =mysqli_query($con,$sql);
    $chart_data="";
    while($row=mysqli_fetch_array($result)){
        $datetime[]=$row['datetime'];
        $soiltemp[]=$row['soiltemp'];
    }
    
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>  
     <title>Home</title>


     <style>
       body {
            background: rgb(0,0,0,0);
            font-family: Arial, sans-serif;
            /* background-color: #FFFDC4; */
            margin: 0;
            padding: 0;
        }
        canvas {
            max-width: 100%;
            height: auto; /* Adjust the height automatically to maintain aspect ratio */
        }

        /* Adjustments for the card-body1 container */
        .card-body1 {
            width: 90%; /* Make the container full-width */
            max-width: 900px; /* Set a maximum width to prevent excessive stretching */
            margin: 8px auto; /* Center the container horizontally */
            margin-top: 15px;
            background-color: #FFFDC4;
            /* border: 2px solid black; */
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
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
            padding: 5px;
            border: 1px solid black;
            border-radius: 5px;
            width: 20%;
        }
        input[type="submit"] {
            background-color: #96455d;
            border: none;
            font-size: 3vw;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            padding: 0.5% 0.5%;
            margin: 0;
        }
        a{
            background-color: #96455d;
            border: none;
            font-size: 3vw;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            padding: 0.5% 0.5%;
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
            background-color: #96455d;
            border: none;
            font-size: 3vw;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            /* padding: 10px 20px; */
            margin: 0;
        }
        

        #bargraph1{
            height: 70%;
            width: 95%;
}
        .part1{
            font-size: 3vw;
        }
        @media screen and (min-width:900px) {
          .part1{  font-size:  25px;
          }
          input[type="submit"] {
            font-size: 25px;
          }
          a{
            font-size: 25px;
          }
          .btn_primary{
            font-size: 25px;
          }
        }
        @media screen and (min-width:1000px) {
            .card-body1 {
            width: 95%;
            }
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
    <canvas id="bargraph1" style=" max-height: 350px;"></canvas>

    

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
            <input type="submit" value="Submit">
            

            <a href="export/export_soiltemp.php?formattedStartDateTime=<?php echo urlencode($formattedStartDateTime); ?>&formattedEndDateTime=<?php echo urlencode($formattedEndDateTime); ?>"><button type="button" class="btn_primary">Download Data</button></a>
        </div>
        
       
    </form>
</div>







        
     
     <script type="text/javascript">
     var ctx = document.getElementById("bargraph1").getContext('2d');
 var myChart = new Chart(ctx, {
     type: 'line',
     data: {
         labels: <?php echo json_encode($datetime); ?>,
         datasets: [{
             label: 'Soil Temperature',
             backgroundColor: '#FF8080',
             borderColor: '#FF8080',
             borderWidth: 2,
             fill: false,
             data: <?php echo json_encode($soiltemp); ?>
         }]
     },
     options: {
        scales: {
             x: {
                 display: true,
                 ticks: {
                     color: '#96455d', // Change x-axis label color
                     font: {
                         weight: 'bold' // Make x-axis labels bold
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
                     color: '#96455d', // Change y-axis label color
                     font: {
                         weight: 'bold' // Make y-axis labels bold
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
 
 