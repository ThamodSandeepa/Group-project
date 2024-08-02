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
  $id=$_POST['Type_id'];
  $price=$_POST['price_input'];
  $query = "UPDATE woodtype SET Price ='$price' WHERE Type_id = '$id'"; 
  $query_run = mysqli_query($connection, $query);
}


?>

<html>
    <head>
        <title>Wood Mastery</title>
        <link rel="icon" type="image/png" href="1copy.png" >
        <style>
            *{
                margin: 0;
                padding: 0;
                
            }
            .productimg{
              width: 100px;
              height: 50px;
              border: solid white 3px;
            }
            table{
              width:100%;
              border-bottom: 3px solid blue;
              border-top: 3px solid blue;
              border-collapse: collapse;
               
            }
            table th{
              border-bottom: 3px solid blue;
              text-align: left;

            }
            table th, table td{
              padding: 20px;
            }
            table tr:nth-child(even){
              background-color: lightblue;
            }

            #price_input {
            background-color: transparent;
            border: none; 
            width: 100px; 
            outline: none;
            }

            .buttons_style{
              padding: 2px 5px 2px 5px; 
              margin: 2px;
            }
            #upbar{
                background-color: lightgray;
                width: 100%;
                height: 75px;
                position: fixed;
                z-index: 2;
               
            }
            .customLink{
                text-decoration: none;
                color: black;
                position: relative;
                font-size: 20px; 
                top: 0px;
                bottom: 95%;
                
            
            }
            #logout{
                left: 71%;
                right: 50px;
                
            }
            #dashbord{
                left: 50%;
                right: 50px;
            }
            #orders{
                left: 55%;
                right: 50px;
                
            }
            #suport{
                left: 60%;
                right: 50px;
               
            }
            #storedetails{
                left: 65%;
                right: 50px;
            }
            #image{
                height: 52.5px; 
                width: 225px;
                left: 10px;
                right: 0;
                top: 20px;
                bottom: 0;
                position: absolute;  
                margin: none;
                
            }
            #logoutimage{
                height: 20px;
                width: 20px;
                left: -27px;
                right: 0;
                top: 0;
                bottom: 0;
                position: absolute;

            }
            #profilpic{
                height: 40px;
                width: 40px;
                left: 68%;
                right: 20%;
                top: 15px;
                bottom: 95%;
                border-radius: 50%;
                position:relative;
                border: 5px solid rgb(177, 125, 42);
                background-color: white;

            }

            
            
        </style>

        <div id="upbar">
            
            <a href="" target="_blank"><img src="5.png"  id="image" > </a>
            <a href="sellerIntaface.php"  class="customLink" id="orders">Orders</a>
            <a href="supotr.php" target="_blank" class="customLink" id="suport">Suport</a>
            <a href="userdetails.php" target="_blank" class="customLink" id="storedetails">Users Details</a>
            <a href="" target="_blank"><img src="66.png" alt="propic" id="profilpic"></a>
            <a href="logout.php" target="_blank" class="customLink" id="logout"><img src="44.png" id="logoutimage">Log out </a>
            
            
            
           
        </div>

    </head>
    <body style="background-color: rgb(215, 215, 215);">
        
        <div id="sidebar">
        <style>
              .customlink2{
                text-decoration: none;
                color: rgb(38, 60, 82);
                background-color: green;
                position: relative;
                font-size: 25px; 
                left: 35px;
                right: 90%;
                
            }
            .customlink2:hover{
              text-decoration: underline;
              text-decoration-color: darkblue;
            }
            #customelinkid{
              text-decoration: underline;
              text-decoration-color: darkblue;
            }
            </style>
          <style>
            #sidebar{
                background-color: lightgray;
                width: 250px;
                height: 100%;
                position: fixed;
                z-index: 1;
            }
          </style>
          <div id="sidebarlink">
            <style>
              #sidebarlink{
                top: 250px;
                position: absolute;
                
              }
              .h5{
                color: rgb(91, 100, 146);
              }
            </style>
            
            <a href="sellerIntaface.php" target="_blank" class="customlink2" ><h5 class="h5">Manage Orders</h5></a><br><br> 
            <a href="products.php" target="_blank" class="customlink2" ><h5 class="h5">Manage Products</h5></a><br><br> 
            <a href="postproduct.php" target="_blank" class="customlink2" ><h5 class="h5">Add New Product</h5></a><br><br>
            <a href="woodprice.php" id="customelinkid" class="customlink2" ><h5 class="h5">Wood Price Template</h5></a> 
            
          </div>

        </div>
        <div id="midlebar">
          <style>
            #midlebar{
                background-color: white;
                height: 1000px;
                width: 80%;
                top: 200px;
                left: 275px;
                position: absolute;
                border-bottom: 75px solid rgb(215, 215, 215);
                margin-right: 0;
            }
          </style>
          
            
                  <h2  id="tablediv">Wood Types Prices</h2>
                  <style>
                    #tablediv{
                      position: absolute;
                      margin: 20px;
                     
                    }
                  </style>
                  <div style="position: absolute; left: 50px; top: 100px; width:90%; height: 80%;">
                    <?php
                                    
                    $query = "SELECT  Type_id, Wood_type, Price FROM woodtype ORDER BY Type_id  ";
                    $result_set = mysqli_query($connection, $query);

                    $table = "<table>";
                    $table .= "
                    <tr><th>Type_id</th><th>Wood_type</th><th>Price</th></tr>";

                    while($result = mysqli_fetch_assoc($result_set)){
                      $table .= "
                      <tr>
                        <td>{$result['Type_id']}</td>
                        <td>{$result['Wood_type']}</td>

                        <td>
                          <form method='post'>
                              <input type='text' name='price_input' id='price_input' value='{$result['Price']}'>
                              <input type='hidden' name='Type_id' value='{$result['Type_id']}'>
                              <input type='submit' name='Update' class='buttons_style' value='Update' ><br>
                          </form>
                          
                          
                      </td>
                      </tr>";
                        
                    }

                    
                   

                    $table .= "</table>";
                    echo $table; ?>
                  </div>
                 
               
              
              
                 
             
              

              
              
              
              

        </div>
        
    </body>
</html>