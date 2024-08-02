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

if(isset($_POST["Delete"])){
  $id=$_POST['User_id'];
  $query = "UPDATE users SET 	Is_deleted ='0' WHERE id = '$id'"; 
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
        <style>
            .productimg{
              width: 100px;
              height: 50px;
              border: solid white 3px;
            }
            table{
              width:100%;
              border-bottom: 3px solid black;
              border-top: 3px solid black;
              border-collapse: collapse;
               
            }
            table th{
              border-bottom: 3px solid black;
              text-align: left;

            }
            table th, table td{
              padding: 10px;
            }
            table tr:nth-child(even){
              background-color: rgb(214, 214, 214);
            }
            .buttons_style{
              padding: 2px 5px 2px 5px; 
              margin: 2px;
            }
                #next{
                  border: none;
                  color:white;
                  background-color: #4CAF50;
                  padding: 5px 10px 5px 10px;
                  text-decoration: none;
                  font-size: 18px;
                  font-weight: bold;
                }
                #next:hover{
                  background-color: red;
                }
              </style>
              
              <style>
                #previous{
                  border: none;
                  color: white;
                  background-color: #4CAF50;
                  padding: 5px 10px 5px 10px;
                  text-decoration: none;
                  font-size: 18px;
                  font-weight: bold;
                }
                #previous:hover{
                  background-color: red;
                }
              </style>
    </head>
    <body>
        <div id="upbar">
            
            <a href="" target="_blank"><img src="5.png"  id="image" > </a>
            <a href="sellerIntaface.php" target="_blank" class="customLink" id="orders">Orders</a>
            <a href="supotr.php" target="_blank" class="customLink" id="suport">Suport</a>
            <a href="userdetails.php"  class="customLink" id="storedetails">Users Details</a>
            <a href="" ><img src="66.png" alt="propic" id="profilpic"></a>
            <a href="logout.php" target="_blank" class="customLink" id="logout"><img src="44.png" id="logoutimage">Log out </a>
            
            
           
        </div>
        <div style="position: absolute; left: 50px; top: 100px; width:90%; height: 80%;">
                    <?php
                    
                    
                    
                    $query = "SELECT COUNT(id) AS total_rows FROM users WHERE Is_deleted = 1";
                    $result_set = mysqli_query($connection, $query);
                    $result = mysqli_fetch_assoc($result_set);
                    $total_rows = $result['total_rows'];
                    


                    $rows_per_page = 10;
                    if(isset($_GET['page'])){
                      $page_number = $_GET['page'];
                  } else {
                      $page_number = 1; 
                  }
                  
                    
                    $start = ($page_number-1)*$rows_per_page; 
                                      
                    $query = "SELECT id , User_image, name, Username, email, Phone_no, updated_time FROM users WHERE Is_deleted = 1 ORDER BY id DESC LIMIT {$start}, {$rows_per_page}";
                    $result_set = mysqli_query($connection, $query);

                    $table = "<table>";
                    $table .= "<tr><th>USER_ID</th><th>IMAGE</th><th>NAME</th><th>USERNAME</th><th>EMAIL</th><th>PHONE_NO</th></th><th>LAST_LOGIN_TIME</th><th></th></tr>";

                    while($result = mysqli_fetch_assoc($result_set)){
                      $table .= "
                      <tr>
                      <td>{$result['id']}</td>
                      <td><img src='{$result['User_image']}' class = 'productimg'></td>
                      <td>{$result['name']}</td>
                      <td>{$result['Username']}</td>
                      <td>{$result['email']}</td>
                      <td>{$result['Phone_no']}</td>
                      <td>{$result['updated_time']}</td>
                      <td>
                          <form method='post'>
                              <input type='hidden' name='User_id' value='{$result['id']}'>
                              <input type='submit' name='Delete' class='buttons_style' value='Delete' ><br>
                          </form>
                          
                          
                      </td>
                      </tr>";
                        
                    }

                    $lastpage_no = ceil($total_rows/$rows_per_page);
                    if ($page_number >= $lastpage_no) {
                      $next = "<a id='next'>NEXT</a>";
                  } else {
                      $next_page_no = $page_number + 1;
                      $next = "<a id='next' href=\"userdetails.php?page={$next_page_no}\">NEXT</a>";
                  }
                  
                  if ($page_number <= 1) {
                      $previs = "<a id='previous'>PREVIOUS</a>";
                  } else {
                      $prev_page_no = $page_number - 1;
                      $previs = "<a id='previous' href=\"userdetails.php?page={$prev_page_no}\">PREVIOUS</a>";
                  }
                   

                    $table .= "</table>";
                    echo $table; ?>
                  </div>
                  <div style="position: absolute; top: 950px; left: 50px;" >
                    <?php

                    echo $previs.'&nbsp;&nbsp;&nbsp;&nbsp; '.' '.' '.$page_number.'&nbsp;&nbsp;&nbsp;&nbsp; '.' '.' '.$next;
                    
                    ?>
                  </div>
    </body>
</html>