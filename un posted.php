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

if(isset($_POST["Post"])){
  $id=$_POST['Product_id'];
  $query = "UPDATE product SET Unlisted_or_Deleted ='1' WHERE Product_id = '$id'"; 
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
            <a href="sellerIntaface.php" target="_blank" class="customLink" id="orders">Orders</a>
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
            
            <a href="sellerIntaface.php" target="_blank" class="customlink2" ><h5 class="h5">Manage Orders</h5></a><br><br> 
            <a href="products.php" id="customelinkid" class="customlink2" ><h5 class="h5">Manage Products</h5></a><br><br> 
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
          
            
                  <h2  id="tablediv">Unposted Products</h2>
                  <style>
                    #tablediv{
                      position: absolute;
                      margin: 20px;
                     
                    }
                  </style>
                  <div style="position: absolute; left: 50px; top: 100px; width:90%; height: 80%;">
                    <?php
                    
                    
                    
                    $query = "SELECT COUNT(Product_id) AS total_rows FROM product WHERE Unlisted_or_Deleted = 2";
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
                                      
                    $query = "SELECT Product_id, Images, Title, Catagory FROM product WHERE Unlisted_or_Deleted = 2 ORDER BY time_date DESC LIMIT {$start}, {$rows_per_page}";
                    $result_set = mysqli_query($connection, $query);

                    $table = "<table>";
                    $table .= "<tr><th>PRODUCT_ID</th><th>PRODUCT</th><th>TITLE</th><th>CATERGORRY</th><th></th></tr>";

                    while($result = mysqli_fetch_assoc($result_set)){
                      $table .= "
                      <tr>
                      <td>{$result['Product_id']}</td>
                      <td><img src='{$result['Images']}' class = 'productimg'></td>
                      <td>{$result['Title']}</td><td>{$result['Catagory']}</td>
                      <td>
                          <form method='post'>
                              <input type='hidden' name='Product_id' value='{$result['Product_id']}'>
                              <input type='submit' name='delete' class='buttons_style' value='Delete' ><br>
                          </form>
                          
                          <form  method='post'>
                              <input type='hidden' name='Product_id' value='{$result['Product_id']}'>
                              <input type='submit' name='Post' class='buttons_style' value='Post' >
                          </form>
                      </td>
                      </tr>";
                        
                    }

                    $lastpage_no = ceil($total_rows/$rows_per_page);
                    if ($page_number >= $lastpage_no) {
                      $next = "<a id='next'>NEXT</a>";
                  } else {
                      $next_page_no = $page_number + 1;
                      $next = "<a id='next' href=\"un posted.php?page={$next_page_no}\">NEXT</a>";
                  }
                  
                  if ($page_number <= 1) {
                      $previs = "<a id='previous'>PREVIOUS</a>";
                  } else {
                      $prev_page_no = $page_number - 1;
                      $previs = "<a id='previous' href=\"un posted.php?page={$prev_page_no}\">PREVIOUS</a>";
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
                <a href="products.php" class="upbutton" >Posted</a>
                <a href="un posted.php" class="upbutton" id="up1" >Unposted</a>
                <a href="removed.php" class="upbutton"  >Removed</a>
                
                

                

              </div>
              
              
              

        </div>
        
    </body>
</html>