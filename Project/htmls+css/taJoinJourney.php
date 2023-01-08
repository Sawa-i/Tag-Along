<?php
include_once("../phps/dbLink.php");

include("../phps/session.php");


if(!isset($_SESSION['cms'])){
  header("Location: TagAlongSignIn.php"); 
}


if(isset($_GET['Search'])) {	

	$party = $_GET['party'];
	$vehicle = $_GET['vehicle'];
  $passengers = $_GET['passengers'];
  $pointA = $_GET['pointA'];
	$pointB = $_GET['pointB'];
	$date = $_GET['inputDate'];
  $timeA = $_GET['inputTimeA'];
  $timeB = $_GET['inputTimeB'];

  
/*-----------Join Plans Adaptive Query------------*/
$where = "WHERE date = '$date' ";

if(!empty($party)){
$where .= "and partyName LIKE '%$party%'";
}

if(!empty($vehicle )){
$where .= "and vehicle= '$vehicle '";
}

if(!empty($passengers)){
  $where .= "and passengers >= '$passengers'";
}
  
if(!empty($pointA )){
  $where .= "and pointA = '$pointA '";
}
  
if(!empty($pointB)){
  $where .= "and pointB = '$pointB'";
}
    // PAY ATTENTION
if(!empty($timeA )){
  $where .= "and time >= '$timeA'";
}

if(!empty($timeB )){
  $where .= "and time <= '$timeB '";
}
   
$qTable = mysqli_query($mysqli, "SELECT * from plans, members  $where;");
}
else
{
  $qTable = mysqli_query($mysqli, "SELECT * from plans, members WHERE date = (select curdate());");
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
 
            <li><a style="color:#ff0051;" href="taJoinJourney.php">Join a Journey</a></li>
             <li><a href="taPlanJourney.php">Plan a Journey</a></li>
             <li <?php if(isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="TagAlongSignIn.php">Sign In</a></li>
            <li <?php if(!isset($_SESSION['cms'])){ echo"style = \"display:none\"";}?>><a href="../phps/signOut.php?signOut=1">Sign Out</a></li>

           </ul>          </h1>
            
         </div>
        
         <div class="clear"></div>
         <div class="overview col-m-9 col-n-11 " style="padding-top: 5px;  width: 95%">
         <div id="joinPlan" class="planner oSlides animate-opacity" style="float:left;width:35%; display: block;background: linear-gradient(black, rgba(63, 63, 63, 0.822)); padding-left: 25px; padding-top: 4px; font-family: Orbitron; text-align: center;"><h1 style="margin:auto;font-size:28px;font-family:Orbitron;background:linear-gradient(black, rgba(41, 41, 41, 0.301));border-radius: 150px; width:50%;"><span style="color:rgb(255, 208, 0);">Search Plans</span> </h1>
          <h3 style="color: #FF0000;">
         
          <form name="joinForm" onsubmit=" return formValidate()" action="" method="GET" >
             

             <table id="joinFormTable" width="95%" style=" padding:5px; font-size: 15px; ">
             <tr>
               
             <td> <label for="party" >Party Name</label></td> <td><input type="text" id="party" name="party" /></td>
</tr><tr>
             <td><label for="vehicle" >Vehicle</label> </td>
            <td> <select id="vehicle" name=vehicle style="width:90%; text-align: center;"> 
            <option value="">Choose</option>
               <option value="Car">Car</option>
               <option value="Bike">Bike</option>
               <option value="Other">Other</option>
             </select></td>
             </tr><tr>
            <td> <label for="passengers" >Passengers</label> </td>
            <td> <select id="passengers" name=passengers value="1" style="width:90%; text-align: center; display:inline-block; "> 
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="4+">5 Or More</option>
             </select></td>
            
            </tr>
            <tr>
             <td><label for="apoint"  ">Flag A</label></td>
            <td><select id="pointA" name=pointA style="width:90%; text-align: center;"> 
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
             </select></td>
             </tr><tr>
            <td> <label for="bpoint" >Flag B</label> </td>
             <td><select id="pointB" name=pointB style="width:90%; text-align: center;"> 
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
             </select></td>
 
             </tr><tr>
            <td> <label for="date"  >Date</label></td><td> <input type="date" name="inputDate" id="inputDate" style="border-radius: 20px; "/></td>
            </tr>
            <tr>
            <td rowspan="2"> <label  for="time" >Time Range</label></td> <td><input type="time" name="inputTimeA" id="inputTimeA" style="border-radius: 20px; " /></td>
            </tr><tr> <td><input type="time" name="inputTimeB" id="inputTimeB" style="border-radius: 20px; ;" /></td>
            </tr><tr>
<td></td>
              <td  style="text-align:center;"><input type="submit" value="Search" name="Search" id="search" style="color:white; background: linear-gradient(rgb(255, 81, 0),rgba(255, 0, 0, 0.685));width:50%;font-size: 15px; border-radius:10px;"/></td></tr>
</table>
           </form>
             <script>

var url_string = window.location.href;
var url = new URL(url_string);

var party = url.searchParams.get("party");
var vehicle = url.searchParams.get("vehicle");
var passengers = url.searchParams.get("passengers");
var pointA = url.searchParams.get("pointA");
var pointB = url.searchParams.get("pointB");
var inputDate = url.searchParams.get("inputDate");
var inputTimeA = url.searchParams.get("inputTimeA");
var inputTimeB = url.searchParams.get("inputTimeB");


               // Filling Form Select   
               
                $('div#joinPlan input#party').val(party);
               
                $('div#joinPlan select#vehicle option[value="' +vehicle+ '"]').attr("selected", "selected");

                  $('div#joinPlan select#passengers option[value="' +passengers+ '"]').attr("selected", "selected");

                  $('div#joinPlan select#pointA option[value="' +pointA+ '"]').attr("selected", "selected");

                  $('div#joinPlan select#pointB option[value="' +pointB+ '"]').attr("selected", "selected");

                  $('div#joinPlan input#inputDate').val(inputDate);

                  $('div#joinPlan input#inputTimeA').val(inputTimeA);

                  $('div#joinPlan input#inputTimeB').val(inputTimeB);

               </script>

        
          </h3>
        </div>
        <div id="availablePlans" class="oSlides animate-left" style="float:right; display:block; width:60%; background: linear-gradient(black, rgba(63, 63, 63, 0.822)); padding: 5px; padding-top: 4px; font-family: Orbitron; text-align: center;"><h3 style="margin:auto;font-size:28px;font-family:Orbitron;background:linear-gradient(black, rgba(41, 41, 41, 0.301));border-radius: 150px; width:50%;"><span style="color:rgb(255, 208, 0);">Available Plans</span> </h3>
        <div style="height:95%">   
        <h4 style="color:rgb(255, 51, 0);">
            
           <table width="90%" class="PlansTable" style="margin:auto;">

	<tr bgcolor='white' style="color:black;">
		<th>Party Name</th>
    <th>Leadre (Department)</th>
    <th>Vehicle (Available Passengre)</th>
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
			echo "<tr  style=\"color:white; font-family: 'Varela Round', sans-serif;\">";
			echo "<td>".$qArray['partyName']."</td>";
			echo "<td>".$qArray['fName']." ".$qArray['lName']." (".$qArray['department'].")"."</td>";
			echo "<td>".$qArray['vehicle']." (".$qArray['passengers'].")"."</td>";
      echo "<td>Sector ".$qArray['pointA'][0]."-".substr($qArray['pointA'],1)."</td>";
      echo "<td>Sector ".$qArray['pointB'][0]."-".substr($qArray['pointB'],1)."</td>";
      echo "<td>".$qArray['date']."</td>";		
      echo "<td>".$qArray['time']."</td>";		

			echo "<td><a href=\"\">Request</a> </td>";		
    }
    
		$mysqli->close();
	?>
    </table>
    <?php
    
    if ($rows==0){
      echo"<h1 style =\"color:red;\"> No Plans Found <h1>";
    }
    ?>
 


           </h4></div>
          </div>
         <script>

            /*----------------------Date Input Forum------------------------------*/
         var today = new Date();

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
            </script>

         <div class="clear"></div>

         <div class= "footer">
            <h4 style=" color:rgb(255, 0, 0); margin-left: 5px;font-family: Orbitron;"><a href="taAboutUs.php" style="color:rgb(223, 152, 1); text-decoration: none;">About Us</a> | <a href="taContactUs.html" style=" text-decoration: none; color:rgb(202, 133, 5)">Contact Us</a><div style="color:rgb(255, 38, 0);background: linear-gradient(black, rgba(255, 145, 0, 0.116));border-radius: 20px;  position:absolute; left:45%; bottom:3px; top:4px; text-align: center; padding:10px;"><span style="font-size: 22px;"  id="time"></span><br><span style="font-size: 15px;" font id="date"></span></div></h4> 
        </div>
        <script>
          updatedTD();
         function updatedTD(){
         var dtT = new Date();
         var dtD = new Date();
         document.getElementById("time").innerHTML = dtT.toLocaleTimeString();
         document.getElementById("date").innerHTML = dtD.toLocaleDateString();
         setTimeout(updatedTD, 1000);
         }
         </script>
    </body>
</html>