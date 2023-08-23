


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warning System</title>

    <style>

        body {
            background: rgba(255, 255, 255, 0.9) url("HOMEbg3.jpg") fixed;
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            
            
        }
        .heading{
            position: fixed; 
            top: 0; 
            width: 100%; 
            z-index: 9999;
            border: 5px solid black;
            
            text-align: center;
            font-size: 40px;
            height: 50px;
            background-color:  rgb(0,0,0,1);
            padding: 0px;
            margin: 0px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
        }
        .head{
            font-weight: bold;
            color: #96455d;
            font-size: 2.9vw;
            width: 60%;
            padding-left: 6%;
            margin: auto;
        }
        .timestamp{
            color: #96455d;
            font-size: 2.6vw;
            width: 14%;
            margin: auto;
        }
        .info-bar {
            position: relative;
            display: inline-block;
        }
        
        .sub_menu {
            display: none;
            position: absolute;
        
            background-color: black;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            border-radius: 3px;
            z-index: 1;
            padding: 5px;
            margin: auto;
            margin-top: 5px;
            list-style:disc;
            font-size: 22px;
        }
        
        .info-bar:hover .sub_menu {
            display: block;
        }
        
        .sub_menu li {
            padding: 0px;
            text-align: center;
            color: #96455d;
        }
        
        .sub_menu li:hover li{
            background-color: black;
        }
        /* .info-bar:focus {
            outline: none;
        } */
        
        .logo{
            width: 6%;
        }
        .logo img {
            width: 4vw;
            max-width: 45px;
            min-width: 35px;
            height: 4vw;
            max-height: 45px;
            min-height: 35px;
            margin-top: 4px;
        }
        
        h2{
            color: rgb(150,69,93);
            
        }
        .allparas{
            background-color: rgb(0,0,0,1);
            border: 0px solid black;
            border-bottom: 2.5px solid black;
            border-radius: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }
        .strains{
            background-color: rgb(0,0,0,0.5);
            border: 5px solid black;
            border-bottom: 2.5px solid black;
            border-radius: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }

        .cracks{
            background-color: rgb(0,0,0,0.5);
            border: 5px solid black;
            border-top:2.5px solid black;
            border-radius: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }
        .pore_pressures{
            background-color: rgb(0,0,0,0.5);
            border: 5px solid black;
            border-top:2.5px solid black;
            border-radius: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }
        .weathers{
            background-color: rgb(0,0,0,0.5);
            border: 5px solid black;
            border-top:2.5px solid black;
            border-radius: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }

        .parameters {
            /* border: 2px solid brown; */
            align-items: center;
            background: rgb(0,0,0,0.3);
            margin-left: 10px;
            width: 30%;
            height: 440px;
            overflow: auto;
            /* display: flex; */
            /* flex-direction: column; */
            text-align: center;
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .graph-button1 {
            font-size: 1.3vw;
            width: 12vw;
            max-width: 170px;
            height: 8vw;
            max-height: 75px;
            /* padding: 5px 10px; */
            margin-top: 30px;
            margin-left: 3%;
            margin-right: 1.5%;
            background-color: #96455d;
            color: #ffffff;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
        }
        .graph-button2 {
            font-size: 1.5vw;
            width: 15%;
            /* height: 5.5vw; */
            /* padding: 5px 10px; */
            margin: 8px;
            margin-bottom: 12px;
            background-color: #96455d;
            color: #ffffff;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
        }

        .strain{
            height: 800px;
            /* border: 2px solid brown; */
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: row;
        
        }
        .allpara{
            height: 800px;
            /* border: 2px solid brown; */
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: row;
        
        }
        .crack{
            height: 800px;
            /* border: 2px solid brown; */
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: row;
        
        }
        .pore_pressure{
            height: 800px;
            /* border: 2px solid brown; */
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: row;
        
        }
        .weather{
            height: 800px;
            /* border: 2px solid brown; */
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: row;
        
        }
        .graph-iframe {
            /* border: 2px solid brown; */
            width: 100%;
            display: none;
            width: 80%;
            height: 90%;
            max-width: 80%;
            margin: 20px auto;
            border: none;
        }
        .frame{
            width: 110%;
        }
        iframe{
            display: block;
        height: 85%;
        width: 80%;
        }
       
        @media screen and (min-width:800px) {
            .head{
            font-weight: bold;
            color: #96455d;
            font-size: 2.4vw;
            width: 60%;
            padding-left: 6%;
            margin: auto;
        }
        .timestamp{
            color: #96455d;
            font-size: 2.5vw;
            width: 14%;
            margin: auto;
        }
        .info-bar {
            background-color: #96455d;
            color: white;
            font-size: 1.5vw;
            padding: 0.5%;
            border-radius: 5px;
            margin: auto;
            margin-right: 30px;
        }
        
        }
        @media screen and (min-width:1200px) {
            .parameters{
                width: 25%;
            }
        }
        
        
        
    </style>
</head>
<body>
<script>
        function toggleSubMenu() {
            var infoBar = document.querySelector('.info-bar');
            infoBar.classList.toggle('active');
        }
    </script>
<div class="navbar">
            <div class="heading">
            <div class="logo">
                 <img src="logo.jpg" alt="Logo">
            </div> 
            <div class="head">Landslide Monitoring at Lambagad (Joshimath)</div> 
            <div class="timestamp">
            

            <?php
            date_default_timezone_set('Asia/Kolkata'); // Set your desired timezone
            $currentTimestamp = date('Y-m-d'); // Get the current timestamp in the format: yyyy-mm-dd HH:mm:ss
            echo $currentTimestamp;
            ?>
            </div>
            <!-- <div class="info-bar">More</div> -->
            <div class="info-bar">
                <a style="color: black;" href="#">
                    More 
                </a>

                <div >
                    <ul class="sub_menu">
                    <li><a style="color: #96455d;" href="#">one</a></li>
                    <li><a style="color: #96455d;" href="#">two</a></li>
                    <li><a style="color: #96455d;"  href="index.php">logout</a></li>
                    
                </ul>
                </div>
            </div>
            
        </div>
    </div>
<br><br><br>
<div class="weathers">
 <h2 style="text-align: center;
    font-size: 2vw;">WEATHER</h2>
        <div class="weather">
            <div class="parameters">

            
                <button id="graph-button1" class="graph-button1" onclick="toggleGraph1('graph-AIR TEMPERATURE', 'graph-button1')">AIR TEMPERATURE</button>
                <button id="graph-button2" class="graph-button1" onclick="toggleGraph1('graph-AIR PRESSURE', 'graph-button2')">AIR PRESSURE</button>
                <button id="graph-button3" class="graph-button1" onclick="toggleGraph1('graph-WIND VELOCITY', 'graph-button3')">WIND VELOCITY</button>
                <button id="graph-button4" class="graph-button1" onclick="toggleGraph1('graph-WIND DIRECTION', 'graph-button4')">WIND DIRECTION</button>
                <button id="graph-button5" class="graph-button1" onclick="toggleGraph1('graph-SOLAR RADIATION', 'graph-button5')">SOLAR RADIATION</button>
                <button id="graph-button6" class="graph-button1" onclick="toggleGraph1('graph-SOIL TEMPERATURE', 'graph-button6')">SOIL TEMPERATURE</button>
                <button id="graph-button7" class="graph-button1" onclick="toggleGraph1('graph-INCLINATION Z', 'graph-button7')">INCLINATION Z</button>
                <button id="graph-button8" class="graph-button1" onclick="toggleGraph1('graph-RAIN FALL', 'graph-button8')">RAIN FALL</button>
                <!-- <button id="analysis" class="graph-button" >Strain Anylysis</button> -->
                
            </div>
            <div class="frame">
                <br>
                
                
                <!-- Add iframes to display the graph pages -->
                <iframe id="graph-AIR TEMPERATURE" class="graph-iframe"></iframe>
                <iframe id="graph-AIR PRESSURE" class="graph-iframe"></iframe>
                <iframe id="graph-WIND VELOCITY" class="graph-iframe"></iframe>
                <iframe id="graph-WIND DIRECTION" class="graph-iframe"></iframe>
                <iframe id="graph-SOLAR RADIATION" class="graph-iframe"></iframe>
                <iframe id="graph-SOIL TEMPERATURE" class="graph-iframe"></iframe>
                <iframe id="graph-INCLINATION Z" class="graph-iframe"></iframe>
                <iframe id="graph-RAIN FALL" class="graph-iframe"></iframe>
            </div>
            <div class="info">
                
            </div>
            </div>
</div>
<div class="allparas">
 <h2 style="text-align: center;margin: auto;font-size: 2vw">Other Parameters</h2>
            <div class="allpara">
                <button id="graph-button9" class="graph-button2" >STRAINS</button>
                <button id="graph-button10" class="graph-button2" >CRACKS</button>
                <button id="graph-button11" class="graph-button2" >PORE PRESSURE</button>
                <button id="graph-button12" class="graph-button2" >SOIL TENTION</button>
                <button id="graph-button13" class="graph-button2" >ACCELEROMETER</button>
                <button id="graph-button14" class="graph-button2" >INCLINATION</button>
                <button id="graph-button15" class="graph-button2" >VWC </button>
                <br>
            </div>
</div>




<script>
        // Handle click event for the Strain Analysis button
        document.getElementById('analysis').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('analysis.php', '_blank');
        });
    </script>
<script>
        // Handle click event for the Strain Analysis button
        document.getElementById('graph-button9').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allstrain.php', '_blank');
        });
        document.getElementById('graph-button10').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allcrack.php', '_blank');
        });
        document.getElementById('graph-button11').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allporepress.php', '_blank');
        });
        document.getElementById('graph-button12').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allsoiltension.php', '_blank');
        });
        document.getElementById('graph-button13').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allhparameter.php', '_blank');
        });
        document.getElementById('graph-button14').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allinclination.php', '_blank');
        });
        document.getElementById('graph-button15').addEventListener('click', function() {
            // Redirect the user to the multi-graph page
            window.open('allvwc.php', '_blank');
        });
    </script>
<script>
    var currentGraphId=null ;
    var pre;

    function toggleGraph1(iframeId, buttonId) {
        // Get the iframe and button elements
        var iframe = document.getElementById(iframeId);
        var button = document.getElementById(buttonId);

        if (pre==null) {
            // If the same graph is already displayed, hide it
            showGraph1(iframeId, button);
            
            
        } else {

            // Show the selected graph
            hideGraph1(pre, button);
            
            
            showGraph1(iframeId, button);
            
           
        }
    }

    function hideGraph1(iframeId, button) {
        var iframe = document.getElementById(iframeId);
        iframe.style.display = "none";
        button.innerText =   iframeId.split("-")[1];
        currentGraphId = null;
        pre=null;

       
    }
    
    function showGraph1(iframeId, button) {
        var iframe = document.getElementById(iframeId);
        
        iframe.src = getGraphSource1(iframeId);
        iframe.style.display = "block";
        button.innerText =  iframeId.split("-")[1];
        currentGraphId = iframeId;

        pre=iframeId;
    }

    

    function getGraphSource1(iframeId) {
        // Return the graph source based on the iframe ID
        switch (iframeId) {
            case "graph-AIR TEMPERATURE":
                return "graph_air_temp.php";
            case "graph-AIR PRESSURE":
                return "graph_air_press.php";
            case "graph-WIND VELOCITY":
                return "graph_wind_velo.php";
            case "graph-WIND DIRECTION":
                return "graph_wind_direc.php";
            case "graph-SOLAR RADIATION":
                return "graph_solar_rad.php";
            case "graph-SOIL TEMPERATURE":
                return "graph_soil_temp.php";
            case "graph-INCLINATION Z":
                return "graph_inclination_z.php";
            case "graph-RAIN FALL":
                return "graph_rainfall.php";
            
            
            default:
                return "";
        }
    }
</script>



</body>
</html>
