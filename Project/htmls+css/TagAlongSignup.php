<?php
include("../phps/session.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <title>Tag Along | Sign Up to Mark your Own Path</title>
        <link rel="icon" href="../Images/LOGO.png"/>
        <link rel="stylesheet" href="Style.css"/>
        <meta name="viewport" content="initial-scale:1.0; width: device-width;"/>

    </head>
    <body style="background-image: url(../Images/373358.jpg); background-repeat: no-repeat; background-size: cover; ">
        <div class="header" style="background-image: radial-gradient(rgba(0, 0, 59, 0.377),  rgba(23, 0, 151, 0.144) );">
            <h1 style="font-size: 32px; font-family: Orbitron;"><a  href="TagAlongHome.php" style="text-decoration: none;"><img src="../Images/LOGO.png" style="width:50px; "/> <span style="color:rgb(255, 208, 0);">Tag</span> <span style="color:grey">Along</span></a>
             
             <ul>
             <li><a href="../AdminIt/admin.php">Admin Mode</a></li>
             <li><a href="taJoinJourney.php">Join a Journey</a></li>
             <li><a href="taPlanJourney.php">Plan a Journey</a></li>
             <li <?php if(isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="TagAlongSignIn.php">Sign In</a></li>
            <li <?php if(!isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="../phps/signOut.php?signOut=1">Sign Out</a></li>
           </ul>          </h1>
            
         </div>
        
        <div class="clear"></div>

        <div class="sForum col-6 col-m-7 col-n-9 animate-opacity" id="signUpBox">
            <div class="col-10" style="border-radius: 70px; background-image: radial-gradient(rgb(255, 251, 0),rgb(255, 115, 0)); position:relative; left:10%;">
                <h1 style="font-size: 40px; text-align:center;"><img src="../Images/FeatherPen.png" style="width:43px; padding-left: 5px; padding-right: 3px; margin:auto;"/> Sign Up</h1>
            </div>
            <div class="col-10 sForumData" style="border-radius: 70px; background-image: radial-gradient(rgb(255, 251, 0),rgb(255, 115, 0)); position:relative; left:10%;">
                <form id= "signUp" action="../phps/SignUpAction.php" method="POST" style="text-align: center; position:relative; top:4px;">
                    <br/><br/>
                    <b><label for="cms">CMS ID </label></b>
                    <input type="number" max="999999" required id="cms" name="cms" style="border-radius: 10px; text-align: center;margin-left:43px;"><br/><br/>
                    <b><label for="password">Password </label></b>
                    <input type="password" id="password" pattern=".{5,15}" required title="8 to 20 characters" name="password" style="border-radius: 10px; text-align: center; margin-left:20px;"><br><br>
                    <b><label for="password">Confirm Password </label></b><br/>
                    <input type="password" required id="cpassword" name="cpassword" style="border-radius: 10px; text-align: center; margin-left:20px;"><br><br>

                    <input type="hidden" id="signUpI" name="signUpI" value="1"/>

                    <input type="submit" id="signUp" name="signUp" value="Sign Up" style="border-radius: 10px; background: black; font-size: 20px; color:rgb(255, 187, 0)"/> <p>Already a Registered Traveller? <a href="TagAlongSignIn.php">Sign In</a> Now!</p>
                  </form>
                  <br>

            </div>
            <br>
        </div>

        <div class= "footer"  style="background-image: radial-gradient(rgba(53, 53, 163, 0.178),  rgba(0, 35, 151, 0) );">
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

        <script>
            // MAke JQUERY AJAX for ON submit, send info + Disappear Section, And If OK then Move onto Home page ELSE Re appear Section after an Alert!
        $('form#signUp').on('submit', function(e){
                e.preventDefault();
                if($("input#cms").val()<=100000 || $("input#password").val()!=$("input#cpassword").val() ){
                if($("input#cms").val()<=100000){
                    alert("CMS must of 6 digits!");
                    $("input#cms").focus();
                }
                else if ($("input#password").val()!=$("input#cpassword").val() ){
                    alert("Password Mismatch!");
                    $("input#cpassword").focus();
                }
            }
            else{
                var form = $(this);
                var url = form.attr('action');
                $("#signUpBox").hide(1000);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        if(data==0){
                        setTimeout(function() { alert("NUST ID either invalid or already registered!"); 
                        $("#signUpBox").show(1600);
                        }, 1000);

                        $("input#password").val("");
                        $("input#cpassword").val("");

                        }
                        else{
                            var delay = 1600; 
                            setTimeout(function(){ window.location =  'TagAlongHome.php'; }, delay);
                            
                        }

                    },
                    fail: function(data){
                        alert("Unexpected Error Occured");
                    }
                    
                });
            }

        })
        </script>
    </body>
</html>