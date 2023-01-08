<?php
session_start();

include_once("dbLink.php");

if(isset($_POST['signInI'])) {	
	$cms = mysqli_real_escape_string($mysqli, $_POST['cms']);
    $password =  $_POST['password'];
    $password = md5($password);


    $result = mysqli_query($mysqli, "SELECT * FROM members where cms = $cms and password = '$password'");

    $statusQ = 0;
    if(mysqli_num_rows($result)){
       
        $Array = mysqli_fetch_array($result);
    
        $aCMS = $Array['cms'];
        $aPASS = $Array['password'];

        if( $aCMS ==$cms   && $aPASS ==$password ){
            $statusQ = 1;
            $_SESSION["cms"]=$aCMS;
            $_SESSION["password"]=1;
        }

    }
    else{
        $statusQ = 0;
    }

   echo($statusQ);

    
	
	
}

$mysqli->close();

?>