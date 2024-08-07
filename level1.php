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
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
              What do you want?
              </h2>
            </div>
  <style>
        .detail-box{
            width:396px;
        }
        .catogary {
            font-size: 18px;
        }
        .formdiv{
            position: absolute;
            
        }
        #nextbtn{
            background-color: orange;
            border: none;
            border-radius: 5px;
            position: relative;
            left: 310px;
            padding:5px 15px 5px 15px;

        }
    </style>
  
        
        <br><form action="level2.php" method="GET">
            <input type="radio" id="Table" name="category" value="Table">
            <label class="catogary" for="Table"> Table</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="Chair" name="category" value="Chair">
            <label class="catogary" for="Chair"> Chair</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="Dore" name="category" value="Dore">
            <label class="catogary" for="Dore"> Door</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="Window" name="category" value="Window">
            <label class="catogary" for="Window"> Window</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="Cabod" name="category" value="Cabinet">
            <label class="catogary" for="Cabod"> Cabinet</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="Bed" name="category" value="Bed">
            <label class="catogary" for="Bed"> Bed</label><br><br>
            <input type="submit" name="submit" id="nextbtn" value="Next">
        </form>
        
        </div>
      </div>
    </div>
  </section>
  

  <!-- end about section -->

  <!-- info section -->
  <footer>
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
