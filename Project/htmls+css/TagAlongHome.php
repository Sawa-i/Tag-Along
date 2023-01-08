<?php
include("../phps/session.php");

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Tag Along | Let's journey together</title>
        <link rel="icon" href="../Images/LOGO.png"/>
        <link rel="stylesheet" href="Style.css"/>
        <meta name="viewport" content="initial-scale:1.0; width: device-width;"/>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <!--Importing Font Family-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">


    </head>
    <body style="background-image: url(../Images/Background.jpg); background-repeat: no-repeat; background-color:black;background-size: cover;">
      <div class = "header " style="height:10px;text-align: center; width:30%; margin-left:auto; margin-right:auto; background: rgba(0, 0, 0, 0.151);">
        <h2><span style="color:rgba(255, 30, 0, 0.822);">~ Connect to travel together ~</span></h2>
      </div>
        <div class="header">
           <h1 style="font-size: 32px; font-family: Orbitron;"><a  href="TagAlongHome.php" style="text-decoration: none;"><img src="../Images/LOGO.png" style="width:50px; "/> <span style="color:rgb(255, 208, 0);">Tag</span> <span style="color:grey">Along</span></a>
            
            <ul>
            <li><a href="../AdminIt/admin.php">Admin Mode</a></li>
            <li><a href="taJoinJourney.php">Join a Journey</a></li>
            <li><a href="taPlanJourney.php">Plan a Journey</a></li>
            <li <?php if(isset($_SESSION['cms'])){ echo("style = \"display:none\"");}?>><a href="TagAlongSignIn.php">Sign In</a></li>
            <li <?php if(!isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="../phps/signOut.php?signOut=1">Sign Out</a></li>

          </ul>          </h1>
           
        </div>
        
        <div class="clear"></div>

        <div class="overview col-m-9 col-n-11 ">
            <div class="oSlides animate-top" style="background: url(../Images/HomeSlides/1.jpg); background-repeat: no-repeat;  background-size: cover; padding-left: 25px; padding-top: 4px;"><h1 style="font-family:Indie Flower;text-align:center; background:linear-gradient(white, rgba(128, 128, 128, 0.418));color:rgb(0, 174, 255);border-radius: 150px 150px 20px 20px; width:50%;">Don't want to Travel Alone?</h1></div>
            <div class="oSlides animate-right" style="background: url(../Images/HomeSlides/2.jpg); background-repeat: no-repeat; background-size: cover; padding-left: 25px; padding-top: 4px;"><h1 style="font-family:Playfair Display;text-align:center;background:linear-gradient(black, rgba(73, 73, 73, 0.5));color:brown;border-radius: 150px 150px 20px 20px; width:50%;">Plan a Journey!</h1></div>
            <div class="oSlides animate-right" style="background: url(../Images/HomeSlides/3.jpg); background-repeat: no-repeat; background-size: cover; padding-left: 25px; padding-top: 4px;"><h1 style="font-family:Oxanium;text-align:center;font-size:xx-large;background:linear-gradient(rgb(180, 0, 0), rgba(0, 0, 0, 0.5));color:rgb(231, 231, 231);border-radius: 150px 150px 20px 20px; width:50%;">Join the Others.</h1></div>
            <div class="oSlides animate-right" style="background: url(../Images/HomeSlides/4.jpg); background-repeat: no-repeat; background-size: cover; padding-left: 25px; padding-top: 4px;"><h1 style="font-family:Lora;text-align:center;background:linear-gradient(rgb(6, 0, 34), rgba(0, 0, 0, 0.5));color:rgb(199, 0, 0);border-radius: 150px 150px 20px 20px; width:50%;">Travel as a Pack.</h1></div>

          </div>

          <script>
          var myIndex = 0;
          overview();
          
          function overview() {
            var i;
            var x = document.getElementsByClassName("oSlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(overview, 5000); // Change image every 6 seconds
          }
          </script>

          <div class="clear"></div>



       <div class= "footer">
           <h4 style=" color:rgb(255, 0, 0); margin-left: 5px;font-family: Orbitron;"><a href="taAboutUs.php" style="color:rgb(223, 152, 1); text-decoration: none;">About Us</a> | <a href="taContactUs.php" style=" text-decoration: none; color:rgb(202, 133, 5)">Contact Us</a><div style="color:rgb(255, 38, 0);background: linear-gradient(black, rgba(255, 145, 0, 0.116));border-radius: 20px;  position:absolute; left:45%; bottom:3px; top:4px; text-align: center; padding:10px;"><span style="font-size: 22px;"  id="time"></span><br><span style="font-size: 15px;" font id="date"></span></div>  <div style="float:right;"><i style="color:blue;"class="fa fa-facebook-official" aria-hidden="true"></i></div></h4> 
       </div>

       <script>
         updatedTD();
        function updatedTD(){
        var dt = new Date();
        document.getElementById("time").innerHTML = dt.toLocaleTimeString();
        document.getElementById("date").innerHTML = dt.toLocaleDateString();
        setTimeout(updatedTD, 1000);
        }
        
        </script>
    </body>
</html>