<?php
session_start();

if (isset($_SESSION["Username"])) {
  // User is logged in, allow access to functionalities
  
} else {
  
  header("location:login.php");
  
}

?>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');


if(isset($_POST["delete"])){
    $id=$_POST['Product_id'];
    $query = "UPDATE product SET Unlisted_or_Deleted ='0' WHERE Product_id = '$id'"; 
    $query_run = mysqli_query($connection, $query);
}


?>