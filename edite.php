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

if(isset($_POST["Edit"])){
  $id=$_POST['Product_id'];
  $title=$_POST['Title'];
  $catogary=$_POST['Catagory'];
  $image=$_POST['Images'];

  $query = "SELECT types FROM wood WHERE Product_id = $id" ;
  $result_set = mysqli_query($connection, $query);

  
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
    </head>
    <body>
        <div id="upbar">
            
            <a href="" target="_blank"><img src="5.png"  id="image" > </a>
            <a href="sellerIntaface.php" target="_blank" class="customLink" id="orders">Orders</a>
            <a href="supotr.php" target="_blank" class="customLink" id="suport">Suport</a>
            <a href="userdetails.php" target="_blank" class="customLink" id="storedetails">Users Details</a>
            <a href="" target="_blank"><img src="66.png" alt="propic" id="profilpic"></a>
            <a href="logout.php" target="_blank" class="customLink" id="logout"><img src="44.png" id="logoutimage">Log out </a>
            
            
           
        </div>
        <h2 style="position: absolute; top: 100px; left: 10px;">Edite</h2>
        <div id="form">

            <style>
                 #form{

                    display: flex;
                    justify-content: center;
                    
                }
                .catogary{
                    font-size: 18px;
                }
                

            </style>
            
            <form action="update.php" method="POST" enctype="multipart/form-data" id="inputs">

                <style>
                    #inputs{
                        position: absolute;
                        top: 200px;
                    }
                </style>
                

                <input type='hidden' name='id' value='<?php echo $id ?>'>
                <label class="point">*</label>
                <label for="title" class="labels" > Title</label><br>
                <input type="text" placeholder="Title" id="title" name="title" value="<?php echo $title ?>"><br><br>
                <label class="point">*</label>
                <label for="catogary" class="labels">Category : </label><br><br>

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
                <label class="catogary" for="Cabod"> Bed</label><br><br>

                <script>
                    // JavaScript code
                    var selectedOptionValue = "<?php echo $catogary ?>"; // Set the value of the selected option

                    var radioInputs = document.querySelectorAll('input[type="radio"]');
                    for (var i = 0; i < radioInputs.length; i++) {
                        if (radioInputs[i].value === selectedOptionValue) {
                            radioInputs[i].checked = true;
                            break; // Once found and checked, exit the loop
                        }
                    }
                </script>


                <label class="point">*</label>
                <label class="labels">Wood types</label><br><br>

                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Badidel" value="Badidel"><label class="woodtypelables" for="Badidel">Badidel</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Halmilla" value="Halmilla"><label class="woodtypelables" for="Halmilla">Halmilla</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Jak" value="Jak"><label class="woodtypelables" for="Jak">Jak</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Kohomba" value="Kohomba"><label class="woodtypelables" for="Kohomba">Kohomba</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Kumbuk" value="Kumbuk"><label class="woodtypelables" for="Kumbuk">Kumbuk</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Mara" value="Mara"><label class="woodtypelables" for="Mara">Mara</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Nedun" value="Nedun"><label class="woodtypelables" for="Nedun">Nedun</label><br>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Palu" value="Palu"><label class="woodtypelables" for="Palu">Palu</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Buruta" value="Buruta"><label class="woodtypelables" for="Buruta">Buruta</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Suriya" value="Suriya"><label class="woodtypelables" for="Suriya">Suriya</label>
                <input type="checkbox" class="checkboxes" name="woodtypes[]"  id="Teak" value="Teak"><label class="woodtypelables" for="Teak">Teak</label>

                <script>
                    // JavaScript code
                    var selectedOptions = [
                        <?php
                        $options = array();
                        while ($result = mysqli_fetch_assoc($result_set)) {
                            $options[] = '"' . $result['types'] . '"';
                        }
                        echo implode(',', $options);
                        ?>
                    ]; // Set the values of the selected options

                    for (var i = 0; i < selectedOptions.length; i++) {
                        var checkbox = document.getElementById( selectedOptions[i]);
                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    }
                </script>

                

                <br><br>
                
                <label class="point">*</label>
                <label for="addpic" class="labels">Add Images</label><br><br><br>
                <div>
                    <div>
                     <input type="file" id="addimage" name="image">
                    <label for="addimage" id="addimagelab">Add</label><br><br><br><br>
                    </div>
                    <div id="imagedivs">

                    <div class="image-container">
                            <div class="image"  >
                                <img src="<?php echo $image ?>" class="fit-image" >
                            </div>
                            
                        </div>
        
                    </div>
                    <style>
                        .fit-image {
                            width: 100%; /* Make sure the image doesn't exceed the container's width */
                            height: 100%; /* Automatically adjust the height to maintain aspect ratio */
                        }
                        .woodtypeprice{
                            padding: 5px;
                            width: 150px;
                            margin: 3px;
                        }
                        .checkboxes{
                            margin-left: 15px;
                        }
                        .woodtypelables{
                            width: 65px;
                            display: inline-block;
                            padding: 5px;
                        }
                        #addimage {
                            display: none;
                        }
                        #addimagelab {
                            padding: 20px;
                            background-image: url(image.jpg);
                            background-size: cover;
                            border: 2px solid black;
                            border-radius: 10px;
                            color: rgb(93, 93, 248);
                            
                        }
                        .image-container {
                            display: inline-block; /* Display the image containers in one line */
                            margin-right: 20px; /* Add some spacing between the image containers */
                            position: relative;
                            
                        }
                        .delete-button {
                            background-image: url(bin.png); /* Replace bin.png with your delete button image */
                            width: 20px;
                            height: 25px;
                            background-size: contain;
                            background-repeat: no-repeat;
                            padding: 5px;
                            border: none;
                            position: absolute;
                            top: 87px;
                            left: 92px;
                            cursor: pointer;
                            background-color: transparent;
                        }
                        .image {
                            height: 100px;
                            width: 100px;
                            background-size: cover;
                            border: 1px solid black;
                        }
                    </style>
                    <script>
                    window.onload = function() {
                        
                        
                       

                        var getdeleteButton = document.createElement("button");
                        getdeleteButton.className = "delete-button";
                        

                            
                        var getimagedivs = document.querySelector("#imagedivs");
                        var Container = document.querySelector(".image-container");
                        

                            Container.appendChild(getdeleteButton);

                            getdeleteButton.addEventListener("click", function() {
                            getimagedivs.removeChild(Container);
});
                        }

                        
                    </script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var a = document.getElementById("addimage");
                            var imagedivs = document.getElementById("imagedivs");

                            a.addEventListener("change", function() {
                                // Remove previously added images
                                while (imagedivs.firstChild) {
                                    imagedivs.removeChild(imagedivs.firstChild);
                                }
                            });
                            function createImageContainer(imageSrc) {
                                var imageContainer = document.createElement("div");
                                imageContainer.className = "image-container";
                
                                var image = document.createElement("div");
                                image.className = "image";
                                image.style.backgroundImage = "url(" + imageSrc + ")";
                
                                var deleteButton = document.createElement("button");
                                deleteButton.className = "delete-button";
                                deleteButton.addEventListener("click", function() {
                                    imagedivs.removeChild(imageContainer);
                                });
                
                                imageContainer.appendChild(image);
                                imageContainer.appendChild(deleteButton);
                                imagedivs.appendChild(imageContainer);
                            }
                
                            a.addEventListener("change", function(event) {
                                var files = event.target.files;
                                if (files && files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        var imageSrc = e.target.result;
                                        createImageContainer(imageSrc);
                                    };
                                    reader.readAsDataURL(files[0]);
                                }
                            });
                        });
                    </script>
                   </div><br><br>
                
                <input type="submit" id="submit_button" name="Update" value="Update"><br>
                

                <style>
                    #submit_button{
                        background-color:  #4CAF50;
                        padding: 10px 15px 10px 15px;
                        margin-bottom: 10px;
                        border: none;

                    }
                    #submit_button:hover{
                        background-color: red;
                    }
                   
                    #submit{
                        display: none;
                    }
                    .point{
                        color: red;
                    }
                    .labels{
                        font-size: 19px;
                        font-weight: bold;
                    }
                    #title{
                        height: 30px;
                        width: 787px;
                        padding: 5px;
                    }

                    .file{
                        display: none;
                    }
                    .adds{
                        padding: 20px;
                        background-image:url(image.jpg);
                        background-size: cover;
                        border: 2px solid black;
                        border-radius: 10px;
                        color: rgb(93, 93, 248);
                        
                    }
                    
                        
                    
                    #description{
                        width: 800px;
                        height: 500px;
                        padding: 10px;
                        resize:none ;
                    }
                    
                    
                    
                </style>
                

            </form>
        </div>
    </body>
</html>