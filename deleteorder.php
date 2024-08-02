<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');
session_start();

if (isset($_SESSION["Username"])) {
  // User is logged in, allow access to functionalities
  
} else {
  
  header("location:login.php");
  
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
    </head>
    <body style="background-color: rgb(215, 215, 215);">
        <div id="upbar">
            
            <a href="" target="_blank"><img src="5.png"  id="image" > </a>
            <a href="sellerIntaface.php"  class="customLink" id="orders">Orders</a>
            <a href="supotr.php" target="_blank" class="customLink" id="suport">Suport</a>
            <a href="userdetails.php" target="_blank" class="customLink" id="storedetails">Users Details</a>
            <a href="" target="_blank"><img src="66.png" alt="propic" id="profilpic"></a>
            <a href="logout.php" target="_blank" class="customLink" id="logout"><img src="44.png" id="logoutimage">Log out </a>
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
            
            
           
        </div>
        <div id="sidebar">
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
            
            <a href="sellerIntaface.php" id="customelinkid" class="customlink2" ><h5 class="h5">Manage Orders</h5></a><br><br> 
            <a href="products.php" target="_blank" class="customlink2" ><h5 class="h5">Manage Products</h5></a><br><br> 
            <a href="postproduct.php" target="_blank" class="customlink2" ><h5 class="h5">Add New Product</h5></a> <br><br>
            <a href="woodprice.php" target="_blank" class="customlink2" ><h5 class="h5">Wood Price Template</h5></a>
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
          
            
                  <h2  id="tablediv">Completed Orders</h2>
                  <style>
                    #tablediv{
                      position: absolute;
                      margin: 20px;
                     
                    }
                  </style>
                  <div style="position: absolute; left: 50px; top: 100px; width:90%; height: 80%;">
                    <?php
                    
                    
                    
                    $query = "SELECT COUNT(Order_id) AS total_rows FROM orders WHERE AStatus = 0";
                    $result_set = mysqli_query($connection, $query);
                    $result = mysqli_fetch_assoc($result_set);
                    $total_rows = $result['total_rows'];
                    


                    $rows_per_page = 7;
                    if(isset($_GET['page'])){
                      $page_number = $_GET['page'];
                  } else {
                      $page_number = 1; 
                  }
                  
                    
                    $start = ($page_number-1)*$rows_per_page; 
                                      
                    $query = "SELECT o.Order_id, o.Product_id, o.Customer_id, o.Wood_type, o.Sizes, o.Color, o.Quantity, o.Price, p.Images, p.Catagory AS Product_Category, u.id, u.Phone_no AS User_Phone_no, u.Phone_no AS Customer_Phone_no
                    FROM orders o
                    INNER JOIN users u ON o.Customer_id = u.id
                    INNER JOIN product p ON o.Product_id = p.Product_id
                    WHERE o.AStatus = 0
                    ORDER BY o.Order_id DESC
                    LIMIT {$start}, {$rows_per_page}
                    ";

$result_set = mysqli_query($connection, $query);

$table = "<table>";
$table .= "
    <tr>
        <th>Order id</th>
        <th>Product id</th>
        <th>Customer id</th>
        <th>Design</th>
        <th>Category</th>
        <th>Wood_type</th>
        <th>Sizes</th>
        <th>Color</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Phone_no</th>
        
         <!-- Renamed column name -->
    </tr>";

while ($result = mysqli_fetch_assoc($result_set)) {
    $table .= "
    <tr>
        <td>{$result['Order_id']}</td>
        <td>{$result['Product_id']}</td>
        <td>{$result['Customer_id']}</td>
        <td><img src='{$result['Images']}' class='productimg'></td>
        <td>{$result['Product_Category']}</td>
        <td>{$result['Wood_type']}</td>
        <td>{$result['Sizes']}</td>
        <td>{$result['Color']}</td>
        <td>{$result['Quantity']}</td>
        <td>{$result['Price']}</td>
        <td>{$result['Customer_Phone_no']}</td></tr>";
                        
                    }

                    $lastpage_no = ceil($total_rows/$rows_per_page);
                    if ($page_number >= $lastpage_no) {
                      $next = "<a id='next'>NEXT</a>";
                  } else {
                      $next_page_no = $page_number + 1;
                      $next = "<a id='next' href=\"Completed.php?page={$next_page_no}\">NEXT</a>";
                  }
                  
                  if ($page_number <= 1) {
                      $previs = "<a id='previous'>PREVIOUS</a>";
                  } else {
                      $prev_page_no = $page_number - 1;
                      $previs = "<a id='previous' href=\"Completed.php?page={$prev_page_no}\">PREVIOUS</a>";
                  }
                   

                    $table .= "</table>";
                    echo $table; ?>
                  </div>
                  <div style="position: absolute; top: 950px; left: 50px;" >
                    <?php

                    echo $previs.'&nbsp;&nbsp;&nbsp;&nbsp; '.' '.' '.$page_number.'&nbsp;&nbsp;&nbsp;&nbsp; '.' '.' '.$next;
                    
                    ?>
                  </div>
               
              
              
                  <style>
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
             
              <div id="search">
                <style>
                  .search-input {
                    position: absolute;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    width: 200px;
                  }
                  .search-button {
                    left: 202px;
                    position: absolute;
                    padding: 8px 12px;
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                  }
                  #search{
                    position: absolute;
                    left: 70%;
                    
                    top: 35px;
                    
                    
                    
                  }
                  .search-button:hover{
                background-color: red;
              }
                </style>
                <input class="search-input" type="text" name="query" placeholder="Search...">
                <button class="search-button" type="submit">Search</button>
              </div>

              <div id="upbuttons">
                <style>
                  #upbuttons{
                    margin: 0px;
                    position: absolute;
                    top: -38px;
                    display: flex;
                   
                  }
                 
                  .upbutton{
                    
                    padding:10px;
                    background-color: lightgray;
                    border-radius: 15px 15px 0 0;
                    margin: 0px;
                    text-decoration: none;
                    color: black;
                    font-size: 16px;
                  }
                  .upbutton:hover{
                    background-color: white;
                  }
                  #up1{
                    
                    background-color: white;
                  }
                </style>
                <a href="sellerIntaface.php" class="upbutton" >To_Review</a>
                <a href="Un Paied.php" class="upbutton" >Confirmed</a>
                <a href="To Ship.php" class="upbutton" >Processing</a>
                <a href="Completed.php" class="upbutton"  >Completed</a>
                <a href="deleteorder.php" class="upbutton" id="up1" >Removed</a>

                

              </div>
              
              
              

        </div>
        
    </body>
</html>