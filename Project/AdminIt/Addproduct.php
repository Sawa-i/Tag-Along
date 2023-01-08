<?php
include("../phps/dbLink.php");

if (isset($_POST['submit'])){  
    $name = $_POST['productname'];
	$price = $_POST['productprice'];	
    $location = $_POST['productlocation'];

    $query = "INSERT INTO tbl_product(name, image, price) VALUES('$name','$location', '$price')";
    $result = mysqli_query($mysqli , $query);
		if (!$result){
            echo "error!";
        }
        else{
            echo "Product added!";
		}
}

if (isset($_POST['delete'])){  
    $name = $_POST['productname'];
    $id = $_POST['productid'];

    $query = "DELETE from tbl_product where (name = '$name') && (id = '$id')";
    $result = mysqli_query($mysqli , $query);
		if (!$result){
            echo "error!";
        }
        else{
            echo "Product deleted!";
		}
}

if (isset($_POST['Update'])){
    $name = $_POST['productname'];
	$price = $_POST['productprice'];	
	$location = $_POST['productlocation'];
    $id = $_POST['productid'];

    $query = "UPDATE Productdb SET 
    name = '$name', image = '$location', price='$price'  WHERE id = '$id'" ;
    $result = mysqli_query($mysqli , $query);
		if (!$result){
            echo "error!";
        }
        else{
            echo "Product updated!";
		}  
}

if (isset($_POST['updatestatus'])){
    $id = $_GET['order_id'];
       $sql = "UPDATE tbl_order SET 
       order_status = 'Done' WHERE order_id = '$id'";
    $result = mysqli_query($mysqli , $sql);
   header("Location:Adminpage.php");
}

if (isset($_POST['deleteorder'])){  
    $id = $_POST['order_id'];

    $query = "DELETE from tbl_order where order_id = '$id'";
    $query1 = "DELETE from tbl_order_details where order_id = '$id'";
    $result = mysqli_query($mysqli , $query);
    $result1 = mysqli_query($mysqli , $query1);
		if (!$result){
            echo "error!";
        }
        else{
            echo "Product deleted!";
		}
}
?>