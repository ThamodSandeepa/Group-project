<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');
if(isset($_POST["submit"])) {
    $Product_id = $_POST['Product_id'];
    $user_id = $_POST['user_id'];
    $woodtype = $_POST['woodtype'];
    $Length = $_POST['Length'];
    $Width = $_POST['Width'];
    $Height = $_POST['Height'];
    $Color = $_POST['Color'];
    $quantity = $_POST['quantity'];
    $size = $Length . ' X ' . $Width . ' X ' . $Height;
    $status = 1;

    $orders_table = "INSERT INTO orders(Product_id, Customer_id, Wood_type, Sizes, Color, Quantity, AStatus) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $orders_table_statement = $connection->prepare($orders_table);
    $orders_table_statement->bind_param("iisssii", $Product_id, $user_id, $woodtype, $size, $Color, $quantity, $status );
    $orders_table_statement->execute();
    
}

echo '<h1>Item added to Bill Successfully. Back to <a href="level1.php">Request Item</a></h1>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    
</body>
</html>