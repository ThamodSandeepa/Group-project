<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');




    
    
    




?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>

.npbutton{
  position: relative;
  top:1050px;
  left:20px;
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
<style>
        .canteinerdiv{
            position: relative;
            display: inline-block;
        }
        .canteinerlabel{
            
            position: relative;
            width:200px ;
            height:300px ;
            border: 3px solid orange;
            display: inline-block;
            margin: 20px;
        }
        .canteinerlabel:hover{
            box-shadow: 0px 0px 30px blue; 
        }
         
        
        .imagediv{
            position: absolute;
            width:195px ;
            height:195px ;
            border-bottom: 3px solid orange ;
        }
        .productimg{
            position: absolute;
            width:100% ;
            height:100% ;


        }
        .titlediv{
            position: relative;
            top:200px;
            padding: 5px;
            width:100% ;
        }
        h4{
            position: absolute;
            
        }
        .buttons_style{
            display: none;
        }
        .formdiv{
            position: absolute;
            top: 30px;
            left: 30px;
            width: 95%;
            height: 95%;
        }
        .h4class{
            font-size: 13px;
            font-weight: bold;
        }
        
    </style>
    
</head>
<body>
    <?php

if(isset($_POST["catagary"])){
        
    $catagary=$_POST['catagary'];
}

if($catagary=='Chair'){
$query = "SELECT COUNT(Product_id) AS total_rows FROM product WHERE Catagory =  'Chair' AND  Unlisted_or_Deleted = 1 ORDER BY time_date DESC ";
                    $result_set = mysqli_query($connection, $query);
                    $result = mysqli_fetch_assoc($result_set);
                    $total_rows = $result['total_rows'];
                    


                    $rows_per_page = 2;
                    if(isset($_GET['page'])){
                      $page_number = $_GET['page'];
                  } else {
                      $page_number = 1; 
                  }
                  
                    
                    $start = ($page_number-1)*$rows_per_page;



$query = "SELECT Product_id, Images, Title FROM product WHERE Catagory =  'Chair' AND  Unlisted_or_Deleted = 1 ORDER BY time_date DESC LIMIT {$start}, {$rows_per_page}";
$result_set = mysqli_query($connection, $query);

$previs = "";
$next = "";
$i="";
while ($result = mysqli_fetch_assoc($result_set)) {
    $i++;

$div = "<div class='canteinerdiv' >";
$div .= "

<form action='leval3.php' method='post'>
    
    <input type='hidden' name='Product_id' value='{$result['Product_id']}'>
    <input type='hidden' name='Images' value='{$result['Images']}'>
    <label class='canteinerlabel' for='button$i' >
    <div class='imagediv'><img src='{$result['Images']}' class='productimg'></div>
    <div class='titlediv'><h4 class='h4class'>{$result['Title']}</h4></div>
    </label>
    <input type='submit' name='submit' class='buttons_style' id='button$i' ' >
    
</form>



";

$div .= "</div>";
echo $div;



}

$lastpage_no = ceil($total_rows/$rows_per_page);
                    if ($page_number >= $lastpage_no) {
                      $next = "<a id='next'>NEXT</a>";
                  } else {
                      $next_page_no = $page_number + 1;
                      $next = "<a id='next' href=\"example.php?page={$next_page_no}\">NEXT</a>";
                  }
                  
                  if ($page_number <= 1) {
                      $previs = "<a id='previous'>PREVIOUS</a>";
                  } else {
                      $prev_page_no = $page_number - 1;
                      $previs = "<a id='previous' href=\"example.php?page={$prev_page_no}\">PREVIOUS</a>";
                  }

echo "<div class='npbutton'>";
echo $previs . '&nbsp;&nbsp;&nbsp;&nbsp; ' . ' ' . $page_number . '&nbsp;&nbsp;&nbsp;&nbsp; ' . ' ' . $next;
echo "</div>";

                }
    ?>


</body>
</html>