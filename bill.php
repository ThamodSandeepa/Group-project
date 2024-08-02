<?php
session_start();

if (isset($_SESSION["User"])) {
  // User is logged in, allow access to functionalities
  
} else {
  
  header("location:login.php");
  
}


?>

<?php
$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');

$email= $_SESSION['User'];

$uid = "SELECT id FROM users WHERE email =  '$email'  ";
$uid_set = mysqli_query($connection, $uid);
$result = mysqli_fetch_assoc($uid_set);
    $user_id = $result['id'];

$sum = "SELECT SUM(Price) AS TotalPrice FROM orders WHERE (AStatus = 1 OR AStatus = 2) AND Customer_id = '$user_id'";
$sum_set = mysqli_query($connection, $sum);
$result2 = mysqli_fetch_assoc($sum_set);
    $pricesum = $result2['TotalPrice'];
    

    if(isset($_POST["delete"])){
      $id=$_POST['Order_id'];
      $query = "UPDATE orders SET AStatus ='0' WHERE Order_id = '$id'"; 
      $query_run = mysqli_query($connection, $query);
    }

    
    $uname = "SELECT Name FROM users WHERE email =  '$email'  ";
    $uname_set = mysqli_query($connection, $uname);
    $result = mysqli_fetch_assoc($uname_set);
        $nusername = $result['Name'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .middiv{
            position: relative;
            height:900px ;
            width:100% ;
            
        }
        .note{
          position: relative;
          left: 20px;
          top: 50px;
        }
        
    </style>
<title>Wood Mastery</title>
        <link rel="icon" type="image/png" href="1copy.png" >
        
    
   
        
    

  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title> About </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
  
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section ">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="home.html">
             <img src="images/logo2.png"> 
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
              <li class="nav-item">
                  <a class="nav-link" href=""> <?php echo $nusername?> </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="home.php"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="level1.php"> Request item </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php"> Contact us </a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="bill.php"> Bill </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Log out  </a>
                </li>
              </ul>

            </div>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <div class="note"><h4>Note : Carpenter will update the price within an hour</h4></div>

  <!-- about section -->

  <div class="middiv">

  <style>
    .productimg{
          width: 100px;
          height: 50px;
          border: solid white 3px;
        }
        table th{
          padding: 50px 15px 20px 0;
     
          text-align: left;

        }
        .billdiv{
          position: absolute;
          height: 1000px;
          width:100% ;
        }
</style>
<div style="position: absolute; left: 50px; top: 100px; width:90%; height: 80%;">
    <?php
                    
    $query = "SELECT o.Order_id, o.Product_id, o.Customer_id, o.Wood_type, o.Sizes, o.Color, o.Quantity, o.Price, p.Images, p.Catagory AS Product_Category, u.id, u.Phone_no AS User_Phone_no, u.Phone_no AS Customer_Phone_no
    FROM orders o
    INNER JOIN users u ON o.Customer_id = u.id
    INNER JOIN product p ON o.Product_id = p.Product_id
    WHERE (o.AStatus = 1 OR o.AStatus = 2) AND o.Customer_id = '$user_id'

    ORDER BY o.Order_id DESC
    ";
    $result_set = mysqli_query($connection, $query);

    $table = "<table>";
    $table .= "
    <tr><th>Order id</th><th>Design</th><th>Category</th><th></th><th style='width: 300px;'></th><th>Price</th></tr>";

    while($result = mysqli_fetch_assoc($result_set)){
      $table .= "
      <tr>
        <td>{$result['Order_id']}</td>
        <td><img src='{$result['Images']}' class='productimg'></td>
        <td>{$result['Product_Category']}</td>
        <td></td>
        <td></td>
        <td>{$result['Price']}</td>

        <td>
          <form method='post'>
          <input type='hidden' name='Order_id'  value='{$result['Order_id']}' ><br>
              <input type='submit' name='delete' class='buttons_style' value='Delete' ><br>
          </form>
          
          
      </td>
      </tr>";
        
    }

    
    $table .= "<tr><th>Totle</th><th></th><th></th><th></th><th style='width: 300px;'></th><th>Rs:{$pricesum}</th></tr>";

    $table .= "</table>";
    echo $table; ?>
  </div>

  


  </div>

  <!-- end about section -->

  <!-- info section -->
  <footer class="footbar">
  <section class="info_section ">

<div class="container">
  <div class="info_top ">
    <div class="row ">
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="info_detail">
          <a href="home.html">
             <img src="images/logo2.png"> 
          </a>
          
          
            
          <div class="social_box">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
        <h4>
          Contact us
        </h4>
        
        <div class="contact_nav">
          <a href="">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
              Sri dewananda mawatha,
              Nahalla,
              Neboda.
              Sri lanka
            </span>
          </a>
          <a href="">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span>
              Call : 77 566 0211
            </span>
          </a>
          <a href="">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>
              Email : heshansayuranga@gmail.com
            </span>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="info_form">
          <h4>
            SIGN UP TO OUR NEWSLETTER
          </h4>
          <form action="">
            <input type="text" placeholder="Enter Your Email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- end info_section -->



<!-- footer section -->
<footer class="footer_section">
<div class="container">
  <p>
    &copy; <span id="displayYear"></span> All Rights Reserved By 
    <a href="" > <b> Creative Tech Team. </b> </a> 
  </p>
</div>
</footer>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>
</html>