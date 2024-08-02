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



if(isset($_POST["inform"])) {
    $problem = $_POST['problem'];
    $cliantid = 1;

    

    $problem_table = "INSERT INTO problem(cliant_id, problem) VALUES (?, ?)";
    $problem_table_statement = $connection->prepare($problem_table);
    $problem_table_statement->bind_param("is", $cliantid, $problem );
    $problem_table_statement->execute();

    $problem_id = $problem_table_statement->insert_id;
    

    $filenames = $_FILES["image"]["name"];
    $tempnames = $_FILES["image"]["tmp_name"];
    $images_folder = "problems/";

foreach ($tempnames as $index => $tempname) {
    $filename = $filenames[$index];
    $folder = $images_folder . $filename;
    move_uploaded_file($tempname, $folder);

    $images_table = "INSERT INTO images(problem_id, images) VALUES (?, ?)";
    $images_table_statement = $connection->prepare($images_table);
    $images_table_statement->bind_param("is", $problem_id, $folder);
    $images_table_statement->execute();

    if ($images_table_statement->execute()) {
        $message = "Your problem has been successfully sent.";
    } else {
        $message = "Error sending problem images: " . $images_table_statement->error;
    }

    
    
    
}

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
            <a href="supotr.php" class="customLink" id="suport">Suport</a>
            <a href="userdetails.php"  target="_blank" class="customLink" id="storedetails">Users Details</a>
            <a href="" target="_blank"><img src="66.png" alt="propic" id="profilpic"></a>
            <a href="logout.php" target="_blank" class="customLink" id="logout"><img src="44.png" id="logoutimage">Log out </a>
            
            
           
        </div>
        <div id="mail">
            <h3>What is your Problem?</h3><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <textarea name="problem" id="mail_box" placeholder="Write here ......" ></textarea><br>
                
                
                <div>
                    <input type="file" id="pic" name="image[]" multiple ><label for="pic" id="add_image">+Add image <label for="" style=" color: black;">(You can submit only 8 files)</label></label><br>
                <div id="picdivs"></div>
                
                </div>
                <style>
                    .image-container {
                        display: inline-block;
                        margin: 10px;
                        }

                    .image {
                        height: 100px;
                        width: 100px;
                        background-size: cover;
                        border: 1px solid black;
                        }
                </style>
                <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addImageInput = document.getElementById("pic");
            const imageDivs = document.getElementById("picdivs");

            addImageInput.addEventListener("change", function() {
                // Remove previously added images
                while (imageDivs.firstChild) {
                    imageDivs.removeChild(imageDivs.firstChild);
                }

                const files = addImageInput.files;

                // Limit the number of images to 8
                const maxImages = 8;
                const numImagesToAdd = Math.min(files.length, maxImages);

                for (let i = 0; i < numImagesToAdd; i++) {
                    const containerDiv = document.createElement("div");
                    containerDiv.className = "image-container";

                    const image = document.createElement("div");
                    image.className = "image";
                    image.style.backgroundImage = "url(" + URL.createObjectURL(files[i]) + ")";

                    containerDiv.appendChild(image);
                    imageDivs.appendChild(containerDiv);
                }
            });
        });
    </script>
                
                
                
                
                
                
                
                
                
                <div id="info_button_div">
                    <input type="submit" name="inform" class="info_button" id="submitinfo"><label for="submitinfo" class="info_button">Inform</label>
                </div>
                
            </form>

            <div id="pharagrhafdiv">
                <p style="font-size: 20px;" id="pharagrhaf">After inform  your problem. Our team will work to resolve your issue within 24 hours on working days</p>
            </div>
           
            <style>
                #pharagrhafdiv{
                    position: absolute;
                    top: 590px;
                }
                #submitinfo{
                    display: none;
                }
                #mail{
                    position: absolute;
                    top: 120px;
                    left: 40px;
                }
                
                #mail_box{
                    width: 1000px;
                    height: 350px;
                    resize: none;
                    padding: 10px;
                }
                #info_button_div{
                    position: absolute;
                    left: 932px;
                    top: 550px;
                }
                .info_button{
                    padding: 10px;
                    border: none;
                    color: white;background-color: green;
                    font-size: 15px;
                    font-weight: bold;
                    
                }
                .info_button:hover{
                    background-color: red;
                }
                #pic{
                    display: none;
                }
                #add_image{
                    color: blue;
                    padding: 5px;
                    position: absolute;
                }
                #pharagrhaf::before{
                    content: "*";
                    color: red;
                    margin-right: 5px;
                }
            </style>
        </div>
        <div class="contactsdiv">
            <div>
                <img src="phone.png"   id="phone" alt="">
                <label for="phone" id="phonelable">078233636</label>
            </div><br><br><br><br>
            <div>
                <img src="whatapp.png"  id="whatsapp" alt="">
                <label for="whatsapp" id="whatsapplable">078233636</label>
            </div><br><br><br>
            <div>
                <img src="gmail.png"   id="gmail" alt="">
                <label for="gmail" id="gmaillable"><label id="lable1">criativetech</label><label id="lable2">@</label><label id="lable3">gmail.</label><label id="lable4">com</label></label>
            </div>

            <style>
                #lable1{
                    color: #4387f4;
                }
                #lable2{
                    color: #e64531;
                }
                #lable3{
                    color: #fdbb05;
                }
                #lable4{
                    color: #33a953;
                }

                #gmaillable{
                    position: relative;
                    left: 40px;
                    top: 16px;
                    background-color: white;
                    font-weight: bold;
                    padding: 7px;
                    padding-left: 20px;
                    padding-right: 15px;
                    border-radius: 10px;
                    box-shadow: 0px 4px 5px #fdbb05;
                    color: white;
                    z-index: 5;
                }
                #gmail{
                    height: 50px;
                    width: 50px;
                    position: absolute;
                    border-radius: 10px;
                    box-shadow: -4px 4px 5px #e64531;
                    z-index:6;
                }
                #whatsapp{
                    height: 50px;
                    width: 50px;
                    position: absolute;
                    border-radius: 10px;
                    box-shadow: -4px 4px 5px rgb(0, 0, 0, 0.5);
                    z-index:4;
                }
                #whatsapplable{
                    position: relative;
                    left: 40px;
                    top: 16px;
                    background-color: #3de35b;
                    font-weight: bold;
                    padding: 7px;
                    padding-left: 20px;
                    padding-right: 15px;
                    border-radius: 10px;
                    box-shadow: 0px 4px 5px rgb(0, 0, 0, 0.5);
                    color: white;
                    z-index: 3;
                }
                #phonelable{
                    position: absolute;
                    left: 40px;
                    top: 10px;
                    background-color: white;
                    font-weight: bold;
                    padding: 7px;
                    padding-left: 20px;
                    padding-right: 15px;
                    border-radius: 10px;
                    box-shadow: 0px 4px 5px rgb(112, 112, 255);
                    color: blue;
                    z-index: 1;
                }
                #phone{
                    height: 50px;
                    width: 50px;
                    position: absolute;
                    border-radius: 10px;
                    box-shadow: -4px 4px 5px rgb(112, 112, 255);
                    z-index:2;

                }
                
                .contactsdiv{
                    position: absolute;
                    left: 1100px;
                    top: 150px;
            }
            </style>
            
        </div>
        <div id="linkdiv">
            <a href=""><img src="facebook.png"   id="facebook" alt="">
            <a href=""><img src="youtube.png"   id="youtube" alt="">
            <style>
                #youtube{
                    height: 50px;
                    width: 55px;
                    left: 80px;
                    position: relative;
                    border-radius: 10px;
                    box-shadow: -4px 4px 5px red;
                }
                #youtube:hover{
                    height: 55px;
                    width: 60px;

                }
                #facebook{
                    height: 50px;
                    width: 50px;
                    position: absolute;
                    border-radius: 10px;
                    box-shadow: -4px 4px 5px #0e8ef1;
                }
                #facebook:hover{
                    height: 55px;
                    width: 55px;

                }
                #linkdiv{
                    position: absolute;
                    left: 1350px;
                    top: 650px;

                }
            </style>
</a>            
        </div>
    </body>
</html>