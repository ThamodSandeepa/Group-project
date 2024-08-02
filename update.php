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

if(isset($_POST["Update"])){
    

    $id=$_POST['id'];

    $query2 = "DELETE FROM wood WHERE Product_id = $id";
    $query2_run = mysqli_query($connection, $query2);

    $title=$_POST['title'];
    $catogary=$_POST['category'];

    $woodtypes = $_POST['woodtypes'];
    $unlisted_or_deleted = 1;

    $query = "UPDATE product SET Title ='$title', Catagory='$catogary' WHERE Product_id = '$id'"; 
    $query_run = mysqli_query($connection, $query);

    $filename = $_FILES["image"]["name"];

     if(!empty($filename)){

        
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname, $folder);

        $query3 = "UPDATE product SET Images='$folder' WHERE Product_id = '$id'"; 
        $query3_run = mysqli_query($connection, $query3);
     }


    foreach ($woodtypes as $index => $multytypes) {
        // Use prepared statement for querying the type_id
        $id_query = "SELECT `Type_id` FROM `woodtype` WHERE Wood_type=?";
        $id_statement = $connection->prepare($id_query);
        $id_statement->bind_param("s", $multytypes);
        $id_statement->execute();
        $id_result = $id_statement->get_result();
        
        if ($id_result && $id_row = $id_result->fetch_assoc()) {
            $type_id = $id_row['Type_id'];
            // Insert data into the wood table using prepared statements
            $woodtype_table = "INSERT INTO wood(Product_id, type_id, types, is_deleted) VALUES (?, ?, ?, ?)";
            $type_table_statement = $connection->prepare($woodtype_table);
            $type_table_statement->bind_param("issi", $id, $type_id, $multytypes, $unlisted_or_deleted);
            $type_table_statement->execute();
        }
    }

  
}

echo '<h1>Product Updated Successfully. Back to <a href="products.php">Manage Products</a></h1>';
?>