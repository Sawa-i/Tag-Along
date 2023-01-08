<?php

include("../phps/dbLink.php");

include("../phps/session.php");

if(!(isset($_SESSION['cms']))){
  header("Location: TagAlongSignIn.php"); 
}
else{
$cms=$_SESSION['cms'];  // SESSION CMS ID Or SOMETHING
$qTable = mysqli_query($mysqli, "SELECT * from plans, members WHERE cms = $cms and date >= (select curdate())");
 
?>

<?php
//getting cms from url
if(!empty($_GET['planID'])){
$planID = $_GET['planID'];

//selecting data associated with this particular cms
$result = mysqli_query($mysqli, "SELECT * FROM plans WHERE planID=$planID");

while($res = mysqli_fetch_array($result)){
    $planID = $res['planID'];
    $party = $res['partyName'];
	$vehicle = $res['vehicle'];
    $passengers = $res['passengers'];
    $pointA = $res['pointA'];
    $pointB = $res['pointB'];
    $date = $res['date'];
    $time = $res['time'];

}
}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Tag Along | Let's journey together</title>
        <link rel="icon" href="../Images/LOGO.png"/>
        <link rel="stylesheet" href="Style.css"/>
        <link rel="stylesheet" href="planStyle.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <meta name="viewport" content="initial-scale:1.0; width: device-width;"/>

        

    </head>
    <body style="background-image: url(../Images/Background.jpg); background-repeat: no-repeat; background-color:black;background-size: cover;">
        <div class="header">
            <h1 style="font-size: 32px; font-family: Orbitron;"><a  href="TagAlongHome.php" style="text-decoration: none;"><img src="../Images/LOGO.png" style="width:50px; "/> <span style="color:rgb(255, 208, 0);">Tag</span> <span style="color:grey">Along</span></a><ul>
            <li><a href="../AdminIt/admin.php">Admin Mode</a></li>
 
            <li><a href="taJoinJourney.php">Join a Journey</a></li>
             <li><a style="color:#ff0051;" href="taPlanJourney.php">Plan a Journey</a></li>
             <li <?php if(isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="TagAlongSignIn.php">Sign In</a></li>
            <li <?php if(!isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="../phps/signOut.php?signOut=1">Sign Out</a></li>
           </ul>          </h1>
            
         </div>
        
         <div class="clear"></div>

         <div class="overview col-m-9 col-n-11 " style="padding-top: 5px; width: 95%;">
          
         <div id="createPlan" class="planner oSlides animate-opacity" style="float:left;width:35%; display: block;background: linear-gradient(black, rgba(63, 63, 63, 0.822)); padding-left: 25px; padding-top: 4px; font-family: Orbitron; text-align: center;"><h2 style="font-size:32px;font-family:Orbitron;background:linear-gradient(black, rgba(41, 41, 41, 0.301));border-radius: 150px; width:50%;"><span style="color:rgb(255, 208, 0);">New Plan</span> </h2>
          <h3 style="color:red;">
         
            <form name="planForm" onsubmit=" return formValidate()" action="../phps/planner.php" method="POST" >
          
            <label for="party" style="padding-right: 20px; ">Party Name</label> <input type="text" id="party" name="party" /><br/><br/>
            <br>
            <label for="vehicle" style="padding-right: 20px">Vehicle</label> 
            <select id="vehicle" name=vehicle style="width:auto; text-align: center;"> 
              <option value="">Choose</option>
              <option value="Car">Car</option>
              <option value="Bike">Bike</option>
              <option value="Other">Other</option>
            </select><br/><br/>

            <label for="passengers" style="padding-right: 20px">Passengers</label> 
            <select id="passengers" name=passengers value="1" style="width:auto; text-align: center; display:inline-block; "> 
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="4+">5 Or More</option>
            </select><br/><br/>

            <label for="apoint" style="padding-right: 20px; ">Flag A</label> 
            <select id="pointA" name=pointA style="width:auto; text-align: center;"> 
              <option value="">FROM WHERE?</option>

              <option value="E11">Sector E-11</option>

              <option value="F6">Sector F-6</option>
              <option value="F7">Sector F-7</option>
              <option value="F8">Sector F-8</option>
              <option value="F9">Sector F-9 (Jinnah Park)</option>
              <option value="F10">Sector F-10</option>
              <option value="F11">Sector F-11</option>

              <option value="G6">Sector G-6</option>
              <option value="G7">Sector G-7</option>
              <option value="G8">Sector G-8</option>
              <option value="G9">Sector G-9</option>
              <option value="G10">Sector G-10</option>
              <option value="G11">Sector G-11</option>

              <option value="H8">Sector H-8</option>
              <option value="H9">Sector H-9</option>
              <option value="H10">Sector H-10 (IIUI)</option>
              <option value="H11">Sector H-11</option>
              <option value="H12">Sector H-12 (NUST)</option>
              
              <option value="I8">Sector I-8</option>
              <option value="I9">Sector I-9</option>
              <option value="I10">Sector I-10</option>
              <option value="I11">Sector I-11</option>
            </select><br/><br/>

            <label for="bpoint" style="padding-right: 20px; ">Flag B</label> 
            <select id="pointB" name=pointB style="width:auto; text-align: center;"> 
              <option value="">TILL WHERE?
              <option value="E11">Sector E-11</option>

              <option value="F6">Sector F-6</option>
              <option value="F7">Sector F-7</option>
              <option value="F8">Sector F-8</option>
              <option value="F9">Sector F-9 (Jinnah Park)</option>
              <option value="F10">Sector F-10</option>
              <option value="F11">Sector F-11</option>

              <option value="G6">Sector G-6</option>
              <option value="G7">Sector G-7</option>
              <option value="G8">Sector G-8</option>
              <option value="G9">Sector G-9</option>
              <option value="G10">Sector G-10</option>
              <option value="G11">Sector G-11</option>

              <option value="H8">Sector H-8</option>
              <option value="H9">Sector H-9</option>
              <option value="H10">Sector H-10 (IIUI)</option>
              <option value="H11">Sector H-11</option>
              <option value="H12">Sector H-12 (NUST)</option>
              
              <option value="I8">Sector I-8</option>
              <option value="I9">Sector I-9</option>
              <option value="I10">Sector I-10</option>
              <option value="I11">Sector I-11</option>
            </select><br/><br/>


            <label for="date"  style="padding-right: 20px;">Date</label> <input type="date" name="inputDate" id="inputDate" style="border-radius: 20px; padding: 3px"/><br/><br/>
            <label for="time" style="padding-right: 20px">Time</label> <input type="time" name="inputTime" id="inputTime" style="border-radius: 20px; padding: 3px" /><br/><br/>
            <input type="submit" value="Plan" name="Plan" id="plan" style="color:white; background: linear-gradient(rgb(255, 81, 0),rgba(255, 0, 0, 0.685));padding:6px; width:25%;font-size: large; border-radius:10px;"/><br/><br/>


          </form>
          </h3>
        </div>

        <div id="currentPlans" class="oSlides animate-left" style="float:right; display:block; width:60%; background: linear-gradient(black, rgba(63, 63, 63, 0.822)); padding: 5px; padding-top: 4px; font-family: Orbitron; text-align: center;"><h2 style="margin:auto;font-size:32px;font-family:Orbitron;background:linear-gradient(black, rgba(41, 41, 41, 0.301));border-radius: 150px; width:50%;"><span style="color:rgb(255, 208, 0);">Your Plans</span> </h2>
        <div style="height:95%">   

        <h4 style="color:rgb(255, 51, 0);">
            <table width="95%" class="PlansTable" style="margin:auto;">

              <tr bgcolor='white' style="color:Black; ">
                <th>Party Name</th>
                <th>Vehicle Type</th>
                <th>Passengers</th>
                <th>Flag A</th>
                <th>Flag B</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
              </tr>

              <?php 
              $rows=0;
                while($qArray = mysqli_fetch_array($qTable)) {
                  $rows++; 		
                  echo "<tr style=\"color:white; font-family: 'Varela Round', sans-serif;\">";
                  echo "<td>".$qArray['partyName']."</td>";
                  echo "<td>".$qArray['vehicle']."</td>";
                  echo "<td>"." '0' ready out of '".$qArray['passengers']."' </td>"; // # ready out of @ seats
                  echo "<td>Sector ".$qArray['pointA'][0]."-".substr($qArray['pointA'],1)."</td>";
                  echo "<td>Sector ".$qArray['pointB'][0]."-".substr($qArray['pointB'],1)."</td>";
                  echo "<td>".$qArray['date']."</td>";		
                  echo "<td>".$qArray['time']."</td>";		
            
                  echo "<td><a href=\"?edit=1&planID=$qArray[planID]\">Edit</a> | <a href=\"..\phps\deletePlanner.php?planID=$qArray[planID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
                }
                
              ?>
                </table>
                <?php
                
                if ($rows==0){
                  echo"<h1 style =\"color:red;\"> No Plans Found <h1>";
                }
                ?>
              
            </h4>
              </div>
         </div>
      
         <div id="editPlan" class="planner oSlides animate-right" style="float:left;width:35%; display: block;background: linear-gradient(black, rgba(63, 63, 63, 0.822)); padding-left: 25px; padding-top: 4px; font-family: Orbitron; text-align: center;"><h1 style="font-size:32px;font-family:Orbitron;background:linear-gradient(black, rgba(41, 41, 41, 0.301));border-radius: 150px; width:50%;"><span style="color:rgb(255, 208, 0);">Edit Plan</span> </h1>
          <h3 style="color: #FF0000;">
         
            <form name="editForm" onsubmit=" return formValidate()" action="../phps/editPlanner.php" method="POST" >
          
            <label for="party" style="padding-right: 20px; ">Party Name</label> <input type="text" id="party" name="party" "/><br/><br/>
            <br>
            <label for="vehicle" style="padding-right: 20px">Vehicle</label> 
            <select id="vehicle" name=vehicle style="width:auto; text-align: center;"> 
              <option value="Car">Car</option>
              <option value="Bike">Bike</option>
              <option value="Other">Other</option>
            </select><br/><br/>

            <label for="passengers" style="padding-right: 20px">Passengers</label> 
            <select id="passengers" name=passengers value="1" style="width:auto; text-align: center; display:inline-block; ">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="4+">5 Or More</option>
            </select><br/><br/>

            <label for="apoint" style="padding-right: 20px; ">Flag A</label> 
            <select id="pointA" name=pointA style="width:auto; text-align: center;"> 
              <option value="">FROM WHERE?</option>

              <option value="E11">Sector E-11</option>

              <option value="F6">Sector F-6</option>
              <option value="F7">Sector F-7</option>
              <option value="F8">Sector F-8</option>
              <option value="F9">Sector F-9 (Jinnah Park)</option>
              <option value="F10">Sector F-10</option>
              <option value="F11">Sector F-11</option>

              <option value="G6">Sector G-6</option>
              <option value="G7">Sector G-7</option>
              <option value="G8">Sector G-8</option>
              <option value="G9">Sector G-9</option>
              <option value="G10">Sector G-10</option>
              <option value="G11">Sector G-11</option>

              <option value="H8">Sector H-8</option>
              <option value="H9">Sector H-9</option>
              <option value="H10">Sector H-10 (IIUI)</option>
              <option value="H11">Sector H-11</option>
              <option value="H12">Sector H-12 (NUST)</option>
              
              <option value="I8">Sector I-8</option>
              <option value="I9">Sector I-9</option>
              <option value="I10">Sector I-10</option>
              <option value="I11">Sector I-11</option>
            </select><br/><br/>

            <label for="bpoint" style="padding-right: 20px; ">Flag B</label> 
            <select id="pointB" name=pointB style="width:auto; text-align: center;"> 
              <option value="">TILL WHERE?
              <option value="E11">Sector E-11</option>

              <option value="F6">Sector F-6</option>
              <option value="F7">Sector F-7</option>
              <option value="F8">Sector F-8</option>
              <option value="F9">Sector F-9 (Jinnah Park)</option>
              <option value="F10">Sector F-10</option>
              <option value="F11">Sector F-11</option>

              <option value="G6">Sector G-6</option>
              <option value="G7">Sector G-7</option>
              <option value="G8">Sector G-8</option>
              <option value="G9">Sector G-9</option>
              <option value="G10">Sector G-10</option>
              <option value="G11">Sector G-11</option>

              <option value="H8">Sector H-8</option>
              <option value="H9">Sector H-9</option>
              <option value="H10">Sector H-10 (IIUI)</option>
              <option value="H11">Sector H-11</option>
              <option value="H12">Sector H-12 (NUST)</option>
              
              <option value="I8">Sector I-8</option>
              <option value="I9">Sector I-9</option>
              <option value="I10">Sector I-10</option>
              <option value="I11">Sector I-11</option>
            </select><br/><br/>


            <label for="date"  style="padding-right: 20px;">Date</label> <input type="date" name="inputDate" id="inputDate" style="border-radius: 20px; padding: 3px"/><br/><br/>
            <label for="time" style="padding-right: 20px">Time</label> <input type="time" name="inputTime" id="inputTime" style="border-radius: 20px; padding: 3px" /><br/><br/>
            <input type="hidden" id="planID" name = "planID" value=<?php echo $_GET['planID'];?>/>

            <input type="submit" value="Update" name="Update" id="update" style="color:white; background: linear-gradient(rgb(255, 81, 0),rgba(255, 0, 0, 0.685));padding:6px; width:25%;font-size: large; border-radius:10px;"/><br/><br/>

             <script>
               // Filling Form Select   
               $('div#editPlan input#party').val('<?php echo ($party);?>');
               $('div#editPlan select#vehicle option[value="' +"<?php echo ($vehicle);?>"+ '"]').attr("selected", "selected");
               $('div#editPlan select#passengers option[value="' +"<?php echo ($passengers);?>"+ '"]').attr("selected", "selected");
               $('div#editPlan select#pointA option[value="' +"<?php echo ($pointA);?>"+ '"]').attr("selected", "selected");
               $('div#editPlan select#pointB option[value="' +"<?php echo ($pointB);?>"+ '"]').attr("selected", "selected");
               $('div#editPlan input#inputDate').val('<?php echo ($date);?>');
               $('div#editPlan input#inputTime').val('<?php echo ($time);?>');

               </script>

          </form>
          </h3>
        </div>

            <script>
var url_string = window.location.href;
var url = new URL(url_string);
var edit = url.searchParams.get("edit");

var slideIndex;

if(edit==1){
  slideIndex = 2;
    
}
  else
  {slideIndex = 1;}

showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("planner");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  

}
              </script>

         </div>

          

        

         <div class="clear"></div>

         <div class= "footer">
            <h4 style=" color:rgb(255, 0, 0); margin-left: 5px;font-family: Orbitron;"><a href="taAboutUs.php" style="color:rgb(223, 152, 1); text-decoration: none;">About Us</a> | <a href="taContactUs.php" style=" text-decoration: none; color:rgb(202, 133, 5)">Contact Us</a><div style="color:rgb(255, 38, 0);background: linear-gradient(black, rgba(255, 145, 0, 0.116));border-radius: 20px;  position:absolute; left:45%; bottom:3px; top:4px; text-align: center; padding:10px;"><span style="font-size: 22px;"  id="time"></span><br><span style="font-size: 15px;" font id="date"></span></div></h4> 
        </div>

        <script>
          updatedTD();
         function updatedTD(){
         var dt= new Date();
         document.getElementById("time").innerHTML = dt.toLocaleTimeString();
         document.getElementById("date").innerHTML = dt.toLocaleDateString();
         setTimeout(updatedTD, 1000);
         }


         /*----------------------Date Input Forum------------------------------*/
         var today = new Date();
         var TODAY = today;

        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
       if(dd<10){
             dd='0'+dd
          } 
          if(mm<10){
              mm='0'+mm
          } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("inputDate").setAttribute("min", today);
        document.getElementById("inputDate").setAttribute("value", today);
        

         /*----------------------Validate Forum------------------------------*/

         if(edit==1){
  formName = "editForm";
    
}
  else
  {formName = "planForm";}

          function formValidate(){
            var partyName = document.forms[formName]["party"].value;
            var vehicle = document.forms[formName]["vehicle"].options[ document.forms[formName]["vehicle"].selectedIndex].value;
            var passengers = document.forms[formName]["passengers"].options[ document.forms[formName]["passengers"].selectedIndex].value;
            var pointA = document.forms[formName]["pointA"].options[ document.forms[formName]["pointA"].selectedIndex].value;
            var pointB = document.forms[formName]["pointB"].options[ document.forms[formName]["pointB"].selectedIndex].value;
            var date = document.forms[formName]["inputDate"].value;
            var time = document.forms[formName]["inputTime"].value;

            var varAlert=true;

        if (partyName == "") {
        alert("Party Name must be filled out!");
        document.forms[formName]["party"].focus();
        event.preventDefault();
        varAlert=false;

         }

         if (vehicle == "" ) {
        alert("Choose the Vehicle!");
        event.preventDefault();
        varAlert=false;


         }

         if (vehicle == "Bike" && passengers!="1") {
        alert("Bike can only allow 1 Passenger!");
        event.preventDefault();
        varAlert=false;


         }
         
         if (pointA == "" || pointB=="") {
        alert("Travel Flags must be filled out!");
        event.preventDefault();
        varAlert=false;

         }

                               
function timeComparer(x){
  var now = new Date();
    var nowTime = new Date((now.getMonth()+1) + "/" + now.getDate() + "/" + now.getFullYear() + " " + now.getHours()+":"+now.getMinutes());
    var userTime = new Date((now.getMonth()+1) + "/" + now.getDate() + "/" + now.getFullYear() + " " + x);
   
    if (nowTime.getTime() >= userTime.getTime()) {
        return true;
    }else {
        return false;
    }
}

    if (timeComparer(time)  && TODAY.setHours(0,0,0,0) == new Date(date).setHours(0,0,0,0) ){
        alert("Invalid Time entered according to Date!");
        event.preventDefault();
        varAlert=false;
    }
         if (time=='' ) {
        alert("Enter the Approximated Time!");
        event.preventDefault();
      varAlert=false;

         }
         

      return varAlert;
          }

         </script>
    </body>
</html>

<?php                
$mysqli->close();
?>