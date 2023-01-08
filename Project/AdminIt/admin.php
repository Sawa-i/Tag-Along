<?php
include("../phps/dbLink.php");
//include("../phps/session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link href="Pictures/Logo1.png" rel="icon" type="logo-image">
    <link href='adminStyle.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium&display=swap" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>    
    <script src="js/jquery-1.11.0.js"></script>
</head>
<title>Admin Page</title>
</head>

<body style="background-image: url(../Images/Void.png); background-repeat: no-repeat; background-color:black;background-size: cover;">
    <div class='login'>
        <?php
        $username = "admin123";
        $password = "admin456";
        $password = md5($password);

        $result = mysqli_query($mysqli, "SELECT * FROM admins where username = '$username' and password = '$password'");

        if(mysqli_num_rows($result)){
           
            $Array = mysqli_fetch_array($result);
        
            $aUSER = $Array['username'];
            $aPASS = $Array['password'];
    
            if( $aUSER ==$username   && $aPASS ==$password ){
               
                    ?>
                        Admin Mode On. Click to <a style="color:rgb(194, 0, 0);"href="../htmls+css/TagAlongHome.php" tite="AdmingModeOff">Admin Mode Off.</a>
                    <?php
                    } else {
                        header("Location:../htmls+css/TagAlongHome.php");
                    }
                }
            
                    ?>
           
    </div>

    <div class="maincontainer">
        <div class="nav nav-tabs">
            <div class='li'><a data-toggle="tab" href="#meeting">Plans Data</a></div>
            <div class='li'><a data-toggle="tab" href="#userslist">Applicants Data</a></div>
        </div>
        <div class="tab-content">
            
            <div id="meeting" class="tab-pane fade">
                <div id="content">
                    <h1>Plans Data</h1>
                </div>

                <table width="60%" class="PlansTable" style="margin:auto;">

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
                
                $result = mysqli_query($mysqli, 'SELECT * FROM plans, members');

                while ($row = mysqli_fetch_assoc($result)) {
                   // echo "<table class = 'center'>";
                        echo "<tr  style=\"color:white; font-family: 'Varela Round', sans-serif;\">";
                        echo "<td>".$row['partyName']."</td>";
                        echo "<td>".$row['fName']." ".$row['lName']." (".$row['department'].")"."</td>";
                        echo "<td>".$row['vehicle']." (".$row['passengers'].")"."</td>";
                        echo "<td>Sector ".$row['pointA'][0]."-".substr($row['pointA'],1)."</td>";
                        echo "<td>Sector ".$row['pointB'][0]."-".substr($row['pointB'],1)."</td>";
                        echo "<td>".$row['date']."</td>";		
                        echo "<td>".$row['time']."</td>";		
                        echo "<td> <a href=\"..\phps\deletePlanner.php?planID=$row[planID]&adm=../AdminIt/admin.php\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                        echo "</tr></table>";
                    }
                ?>
            </div>
            <div id="userslist" class="tab-pane fade">
                <div class="maincontainer center" style = 'width:500px;margin-top:20px'>
                    <div class="nav nav-tabs">
                        <div class="li active"><a data-toggle="tab" href="#json">Using Json</a></div>
                        <div class='li'><a data-toggle="tab" href="#angularjs">Using Angular Js</a></div>
                    </div>
                    <div class="tab-content">
                        <div id="json" class="tab-pane fade">
                            <br />
                            <button style = 'text-align:center;float:none;width:150px;font-size:18px;height:50px;outline:none;color:white;border:none' class='login center' id='submitButton'>Fetch Data</button><br/><br/>
                            <div id="location"></div>
                            <script>
                                $('#submitButton').on('click', function() {
                                    $.ajax({
                                        url: "login.json",
                                        success: parseJSON,
                                        method: "GET",
                                        dataType: "json",
                                        error: function(response, status) {
                                            alert(status);
                                            $("#location").html("An error occured: " + status);
                                        }
                                    });

                                    function parseJSON(json) {
                                        $("#location").append("<table class = 'center' style = 'width:900px'><tr><th style=\"text-align:center;\">User Id</th><th style=\"text-align:center;\">Email</th></tr></table>");
                                        $(json.users).each(function() {
                                            $("#location").find("table").append(
                                                `<tr><td>${this.id}</td>
						    <td>${this.username}</td>`
                                            );
                                        });
                                    }
                                });
                            </script>
                        </div>
                        <div id="angularjs" class="tab-pane fade">
                            <div ng-app="" ng-init="users=[{id:'3',username:'fayyazawais1412@gmail.com'}, {id:'4',username:'mawais.bscs18seecs@seecs.edu.pk'}]">
                        <br/><br/>
                               <table class = 'center' style = 'width:900px'>
                                    <tr style = 'background-color:black;'>
                                        <th style="text-align:center;">User Id</th>
                                        <th style="text-align:center;">Email</th>
                                    </tr>
                                    <tr ng-repeat="User in users">
                                        <td>{{User.id}}</td>
                                        <td>{{User.username}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
</body>
</html>