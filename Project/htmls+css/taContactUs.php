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

        

    </head>
    <body style="background-image: url(../Images/Background.jpg); background-repeat: no-repeat; background-color:black;background-size: cover;">
        <div class="header">
            <h1 style="font-size: 32px; font-family: Orbitron;"><a  href="TagAlongHome.php" style="text-decoration: none;"><img src="../Images/LOGO.png" style="width:50px; "/> <span style="color:rgb(255, 208, 0);">Tag</span> <span style="color:grey">Along</span></a><ul>
            <li><a href="../AdminIt/admin.php">Admin Mode</a></li> 
            <li><a href="taJoinJourney.php">Join a Journey</a></li>
             <li><a href="taPlanJourney.php">Plan a Journey</a></li>
             <li <?php if(isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="TagAlongSignIn.php">Sign In</a></li>
            <li <?php if(!isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="../phps/signOut.php?signOut=1">Sign Out</a></li>

           </ul>          </h1>
            
         </div>
        
         <div class="clear"></div>

         <div class="overview col-m-9 col-n-11 " style="padding-top: 5px;">
         <div class="oSlides animate-top" style="background: linear-gradient(black, rgba(63, 63, 63, 0.822)); padding-left: 25px; padding-top: 4px; font-family: Orbitron; text-align: center;"><h1 style="font-size:42px;font-family:Orbitron;background:linear-gradient(black, rgba(41, 41, 41, 0.301));border-radius: 150px; width:32%;"><span style="color:rgb(255, 208, 0);">Under</span> <span style="color:grey">Construction</span></h1><h2 style="color:rgb(140, 0, 255);">We apologize for any convenience. Our team is working in the backend to provide as much facilites as possible and reduce problems. Thank you for your cooperation.</h2></div>
         </div>
         <script>
            var slideIndex = 1;
            showDivs(slideIndex);
            
            function plusDivs(n) {
              showDivs(slideIndex += n);
            }
            
            function showDivs(n) {
              var i;
              var x = document.getElementsByClassName("oSlides");
              if (n > x.length) {slideIndex = 1}
              if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              x[slideIndex-1].style.display = "block";  
            }
            </script>

         <div class="clear"></div>

         <div class= "footer">
            <h4 style=" color:rgb(255, 0, 0); margin-left: 5px;font-family: Orbitron;"><a href="taAboutUs.php" style="color:rgb(223, 152, 1); text-decoration: none;">About Us</a> | <a style="color:#ff0051;" href="taContactUs.php" style=" text-decoration: none; color:rgb(202, 133, 5)">Contact Us</a><div style="color:rgb(255, 38, 0);background: linear-gradient(black, rgba(255, 145, 0, 0.116));border-radius: 20px;  position:absolute; left:45%; bottom:3px; top:4px; text-align: center; padding:10px;"><span style="font-size: 22px;"  id="time"></span><br><span style="font-size: 15px;" font id="date"></span></div></h4> 
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