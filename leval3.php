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

if(isset($_POST["submit"])){
        
    $id=$_POST['Product_id'];
    $Images=$_POST['Images'];

    
    

}

$email= $_SESSION['User'];

$uid = "SELECT id FROM users WHERE email =  '$email'  ";
$uid_set = mysqli_query($connection, $uid);
$result1 = mysqli_fetch_assoc($uid_set);
    $user_id = $result1['id'];
    
    
    
    $uname = "SELECT Name FROM users WHERE email =  '$email'  ";
    $uname_set = mysqli_query($connection, $uname);
    $result2 = mysqli_fetch_assoc($uname_set);
        $nusername = $result2['Name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Wood Mastery</title>
        <link rel="icon" type="image/png" href="1copy.png" >
        
    
    
    


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
  <style>
    .exdiv{
        position: absolute;
        
        height:500px ;
        width:820px ;
        left: 650px;
        top:150px;

    }
    .col-md-6{
        position: relative;
        left: -150px;

    }
  </style>
  <div class="exdiv">
  <style>

        

.catogary {
    font-size: 18px;
}
.formdiv{
    position: absolute;
    width:100%;
    
}
#nextbtn{
    background-color: orange;
    border: none;
    border-radius: 5px;
    position: relative;
    left: 720px;
    padding:5px 15px 5px 15px;

}
.canteinerdiv{
    position: relative;
    display: inline-block;
    margin-top:8px;
    margin-right: 15px;
}
.formdiv{
    position: absolute;
    
}
.colorrradio{
    display: inline-block;
}
.h3tag{
    font-size: 18px;
    font-weight: bold;
}
.quantity{
  font-size: 18px;
    font-weight: bold;

}
</style>


<div class="formdiv">
<form action="level4.php" method="POST">
<input type="hidden" name="Product_id" value="<?php echo $id ?>">
<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
<h3 class="h3tag">Wood Type:</h3>
<?php
$query = "SELECT w.type_id, w.types, wt.Price
FROM wood AS w
INNER JOIN woodtype AS wt ON w.type_id = wt.type_id
WHERE w.Product_id = '$id'";
$result_set = mysqli_query($connection, $query);
$i='';

while ($result = mysqli_fetch_assoc($result_set)) {
    $i++;

$div = "<div class='canteinerdiv' >";
$div .= "


    
    <input type='radio' id='radio$i' name='woodtype' value='{$result['types']}'>
    <label for='radio$i'>{$result['types']} (Rs {$result['Price']} per ft&sup2)</label>
    






";

$div .= "</div>";
echo $div;
}

?><br><br>

<style>
    .sizediv{
        position: relative;
        display: inline-block;
        margin:30px;
        margin-left: 5px
        
    }
    .sizeinput{
        width:100px;
    }
    .Color{
        margin-right: 10px
    }
    .catagaryimg{
        position: relative;
        width: 500px;
        height: 400px;
    }
    #quantity{
      margin-left: 5px
    }
    
</style>
<h3 class="h3tag">Sizes:</h3>
<div class="sizediv" ><label for='Length'>Length</label><input class="sizeinput" id="Length" type="text" name="Length"><label for='Length'>ft</label></div>
<div class="sizediv" ><label for='Width'>Width</label><input class="sizeinput" id="Width" type="text" name="Width"><label for='Width'>ft</label></div>
<div class="sizediv" ><label for='Height'>Height</label><input class="sizeinput" id="Height" type="text" name="Height"><label for='Height'>ft</label></div><br>

<h3 class="h3tag">Color:</h3>
<div class="colorrradio"><input type="radio" id="Color#1" name="Color" value="Color#1">
<label class="Color" for="Color#1"> Color#1</label></div>
<div class="colorrradio"><input type="radio" id="Color#2" name="Color" value="Color#2">
<label class="Color" for="Color#2"> Color#2</label></div>
<div class="colorrradio"><input type="radio" id="Color#3" name="Color" value="Color#3">
<label class="Color" for="Color#3"> Color#3</label></div>
<div class="colorrradio"><input type="radio" id="Color#4" name="Color" value="Color#4">
<label class="Color" for="Color#4"> Color#4</label></div>
<div class="colorrradio"><input type="radio" id="Color#5" name="Color" value="Color#5">
<label class="Color" for="Color#5"> Color#5</label></div>
<div class="colorrradio"><input type="radio" id="Color#6" name="Color" value="Color#6">
<label class="Color" for="Color#6"> Color#6</label></div><br><br>

<label class="quantity" for="quantity"> Quantity: </label><input class="sizeinput" type="number" id="quantity" name="quantity" min="1"><br><br>

<input type="submit" id="nextbtn" name=" submit">
</form>
</div>

  </div>

  <!-- about section -->
  <section class="about_section layout_padding ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
          <img class="catagaryimg" src="<?php echo $Images; ?>" alt="">

          </div>
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