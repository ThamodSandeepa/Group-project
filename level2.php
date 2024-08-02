<?php
session_start();

if (isset($_SESSION["User"])) {
  // User is logged in, allow access to functionalities
  
} else {
  
  header("location:login.php");
  
}

$connection = mysqli_connect('localhost', 'root', '', 'woodmastery');

$email= $_SESSION['User'];

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

  <!-- about section -->

  <div class="middiv">

  <div class="formdiv">

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


<?php

// Set the number of results per page
$resultsPerPage = 12;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting point for the results to fetch from the database
$startFrom = ($page - 1) * $resultsPerPage;

// Your search query (you may need to modify this based on your actual search implementation)
$searchTerm = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch data from the database based on the search term and pagination
$query = "SELECT Product_id, Images, Title FROM product WHERE Catagory =  '$searchTerm' AND  Unlisted_or_Deleted = 1 ORDER BY time_date DESC LIMIT {$startFrom}, {$resultsPerPage}";
$result = mysqli_query($connection, $query);

$i="";
// Display the search results
while ($row = mysqli_fetch_assoc($result)) {
    // Display your results here
    $i++;

    $div = "<div class='canteinerdiv' >";
    $div .= "
    
    <form action='leval3.php' method='POST'>
        
        <input type='hidden' name='Product_id' value='{$row['Product_id']}'>
        <input type='hidden' name='Images' value='{$row['Images']}'>
        <label class='canteinerlabel' for='button$i' >
        <div class='imagediv'><img src='{$row['Images']}' class='productimg'></div>
        <div class='titlediv'><h4 class='h4class'>{$row['Title']}</h4></div>
        </label>
        <input type='submit' name='submit' class='buttons_style' id='button$i' ' >
        
    </form>
    
    
    
    ";
    
    $div .= "</div>";
    echo $div;
}

// Calculate the total number of pages
$totalPagesQuery = "SELECT COUNT(Product_id) AS total_rows FROM product WHERE Catagory =  '$searchTerm' AND  Unlisted_or_Deleted = 1 ORDER BY time_date DESC ";
$totalPagesResult = mysqli_query($connection, $totalPagesQuery);
$totalRows = mysqli_fetch_assoc($totalPagesResult)['total_rows'];
$totalPages = ceil($totalRows / $resultsPerPage);



$lastpage_no = ceil($totalRows/$resultsPerPage);
                    if ($page >= $lastpage_no) {
                      $next = "<a id='next'>NEXT</a>";
                  } else {
                      $next_page_no = $page + 1;
                      $next = "<a id='next' href=\"level2.php?category={$searchTerm}&page={$next_page_no}\">NEXT</a>";
                  }
                  
                  if ($page <= 1) {
                      $previs = "<a id='previous'>PREVIOUS</a>";
                  } else {
                      $prev_page_no = $page - 1;
                      $previs = "<a id='previous' href=\"level2.php?category={$searchTerm}&page={$prev_page_no}\">PREVIOUS</a>";
                  }


// Display pagination links


// Close the database connection

?>
    
    

    </div>

    <div class="npbutton">

    <style>

      .npbutton{
        position: relative;
        top:850px;
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


    <?php

echo $previs . '&nbsp;&nbsp;&nbsp;&nbsp; ' . ' ' . $page . '&nbsp;&nbsp;&nbsp;&nbsp; ' . ' ' . $next;

?>
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