<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');
session_start();
if(isset($_POST['login'])){
    $email = $_POST["email"];
    $pasword = $_POST["pwd"];

    $quary = "SELECT * FROM users WHERE email = '$email' AND Pwd = '$pasword'";
    $result_set = mysqli_query($connection, $quary);
    $row = mysqli_fetch_array($result_set);


    if(is_array($row)){
        if($email == "admin@Email.com"){
            $_SESSION['Username'] = $row['email'];
            $_SESSION['Pasword'] = $row['Pwd'];
        } else{
            $_SESSION['User'] = $row['email'];
            $_SESSION['Pasw'] = $row['Pwd'];
        }
        
    } else {
    echo '<script type="text/javascript">';
    echo 'alert("Invalid Username or Password!");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
    }


}
if(isset($_SESSION["Username"])){
    header("Location:sellerIntaface.php");
    
} if(isset($_SESSION["User"])){
    header("Location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <!-- Below CSS link(For icons of labels)from this web side-: https://boxicons.com/?query=enve -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

    



        <!--Register form-->
        <div class="formbox register" id="registerForm" >
            <form action= "connection.php" method="POST">
                <h2> Register </h2>
                <div class="input-box">
                    <span class="icon">
                      <i class='bx bxs-user'></i> <!--from boxicons.com-->
                    </span>
                    <input type="text" id="name" name="name" required>
                    <label> Name </label>
                </div>
        
                <div class="input-box">
                    <span class="icon">
                      <i class='bx bxs-envelope'> </i> <!--from boxicons.com-->
                    </span>
                    <input type="email" id="email" name="email" required>
                    <label> Email </label>
                </div>
        
                <div class="input-box">
                    <span class="icon">
                       <i class='bx bxs-lock-alt'> </i> <!--From boxicons.com-->
                    </span> 
                    <input type="password" id="password" name= "pwd" required>
                    <label> Password </label>
                </div>
                
                <div class="input-box">
                    <span class="icon">
                      <i class='bx bxs-lock-alt'> </i> <!--From boxicons.com-->
                    </span>
                    <input type="password" id="confirmpassword" name= "confirmpass" required>
                    <label> Confirm Password </label>
                </div>
                
                <div class="condition-checker">
                    <Input type="checkbox" id="termsCheckbox"required>
                    <label for="termsCheckbox">I accept the <a href="conditionForm.php" id="termsLink"> Terms & Conditions.</a> </label>
                </div>
        
                <input type="submit" class="btn"  value= "Register" >

                <div class="create-account">
                    <p>Already have an account? <a href="#" class="login-link"> Login </a> </p>
                </div> 
                
            </form>
           
        </div>
    </div>
   <!--End of Register form-->

   <script src="login.js"> </script>
   <script src="validation.js"> </script>
   



  
</body>
</html>










