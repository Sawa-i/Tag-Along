<?php

session_start();

include_once("dbLink.php");

if(isset($_POST['signUpI'])) {	
	$cms = mysqli_real_escape_string($mysqli, $_POST['cms']);
    $password =  $_POST['password'];
    $password = md5($password);

   
   
    $result = mysqli_query($mysqli, "SELECT * FROM nustreg where $cms = cms");
    $statusQ = 0;
    if($result){
    $Array = mysqli_fetch_array($result);

    if( $Array['cms']==$cms){
        $fName = $Array['fName'];
        $lName = $Array['lName'];
        $department = $Array['department'];

        $resCheck = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM members WHERE cms = '$cms'"));
        if($resCheck){
            $resultB=false;
        }
        else{
        $resultB = mysqli_query($mysqli, "INSERT INTO members(cms,password,fName,lName,department) VALUES($cms,'$password','$fName', '$lName', '$department')");
        }

        if ($resultB){
            $statusQ = 1;
            $_SESSION["cms"]=$aCMS;
            $_SESSION["password"]=1;
        }
        else
        {
            $statusQ = 0;
        }
    }
}
    else{
        $statusQ = 0;
    }

  echo($statusQ);
	
	
	$mysqli->close();
}
?>