<?php
    if(isset($_GET['code'])) {  //in here check that code is set or not 
        $code = $_GET['code'];     //in this assign the code's value to the another code variable 

        $conn = new mySqli('localhost', 'root', '', 'woodmastery');  //database connection
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM users  WHERE code = '$code' and updated_time >= NOW() - Interval 1 DAY");  //create variable and assign values

        if($verifyQuery->num_rows == 0) {    
            header("Location: login.php");
            exit();
        }

        if(isset($_POST['change'])) {     //check that coustomer clicked change button
            $email = $_POST['email'];
            $new_password = $_POST['new_password']; //email and new password assign to the variables

            $changeQuery = $conn->query("UPDATE users  SET pwd = '$new_password' WHERE email = '$email' and code = '$code' and updated_time >= NOW() - INTERVAL 1 DAY");

            if($changeQuery) {
                header("Location: success.html");
            }
        }
        $conn->close();
    }
    else {
        header("Location:login.php");
        exit();
    }
?>
