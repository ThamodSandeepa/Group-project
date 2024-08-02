<!DOCTYPE html>
<html lang="en">
<head>

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

  <title> WoodMastery </title>

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
    <!-- header section starts -->
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
                <li class="nav-item ">
                  <a class="nav-link" href="home.html">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Ritems.php"> Request item </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="contact.html">Contact Us <span class="sr-only">(current)</span> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login/login.php"> Login </a>
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




 <div class="container">

    <label class="topiclbl"> <h2> Request Your Item </h2> </label>
    <br><br>

   <div class="item-container">

      
      <!-- Form Start-->   
      <form >
      <div class="select-Items">

       
        <!--Select Item-->
        <div class="dropdownmenu">

        <label for="Items">Select Items:</label>
        <select name="Items" id="dropdownmenu1">
            <option value="Not Select" selected>Not Selected</option>            
            
            <?php  include("php/RitemMenuLoading.php") ; ?>


        </select>
        
        </div>

  
        <div class="design-container" id="designContainer">
            <!-- Designs will be displayed here based on the selected item -->
        </div>
        

        <br>
        <div class="dropdownmenu">

        
        <!--Select Wood Type-->
        <label for="Items">Select Wood Type:</label>
       
        <select name="Items" id="dropdownmenu2">
            <option value="Select item" selected>Not Selected</option>

            <?php  include("php/RWoodTypeLoading.php") ; ?>
        
            
        </select>
        </div>
        <br>

        <!--Select Colour-->

        <div class="dropdownmenu">
        <label for="Items">Select Colour:</label>
        <select name="Items" id="dropdownmenu3">
            <option value="Select item" selected>Not Selected</option>
            <option value="door">Light Colour</option>
            <option value="door">Dark Colour</option>
        </select>
        <br>
        </div>
    </div>


    <br><br>
    <div class="input-text">
        <label>Measurements :</label>
        <br><br>
        <input type="text" name="input-select" placeholder="Width in inch"><br>
        <input type="text" name="input-select" placeholder="Height in inch">       
    </div>

    <br>

    <div class="input-number">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" min="1" max="50" value="1">
    </div>

    <div class="input-text label">
    <label >Sub Total Rs: <span class="priceshowlbl"></span></label>
    </div>


    <br><br>
    <div class="btnsubmit">
        <button id="btnsubmit">Place Request</button>
    </div>
        </form>
        
    </div>
 </div>   
 

  <!-- info section -->
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
 <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By 
        <a href="" > <b> Creative Tech Team. </b> </a> 
      </p>
    </div>
  </footer>
  <!-- end footer section -->

     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

     <script src="js/displayItems.js"></script>


</body>
</html>