<?php
$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="woodmastery";

$connection = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

//Check the connection is built or not (For debuging)

if($connection){
   // echo "Connection OK";
}
else{
    echo "Connection failed" .mysqli.error();
}

//Below ['text'] should be from login.php/Registration form name= ""//
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
$confirmpass = $_POST['confirmpass'];
$is_deleted = 1; // Provide a non-null value

$users_table = "INSERT INTO users (name, email, Phone_no, pwd, `con-password`, Is_deleted) VALUES (?, ?, ?, ?, ?, ?)";
$users_table_statement = $connection->prepare($users_table);
$users_table_statement->bind_param("ssissi", $name, $email, $phone, $pwd, $confirmpass, $is_deleted); // Assuming $is_deleted is an integer
$users_table_statement->execute();

if($users_table_statement){
    //echo "Data is send" ;
    header("Location:login.php") ;
}
else{
    echo "Data is not send" ;
}


?>