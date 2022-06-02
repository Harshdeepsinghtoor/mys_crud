<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['name'])){
   // print_r($_SESSION) ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/style.css">
<!-- This is Jquery cdn for using Jquery in the Pages -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <!-- This is Javascript for using live search feature    -->
    <script>
        $(document).ready(function(){
  $("#searchfield").keyup(function(){        
    var searchvalues=$("#searchfield").val();
    $.get("livesearch.php",{keys: searchvalues} ,function(data,status){
        //This means that change the html of Areas and put the html intos the area which is recieved through the data parameter of the Callback Functions SWG
       $("#liveareas").html(data);    
       
       
    })
  });
});


    </script>
</head>

<body>
    <div class="container">
        
    <?php include "aelementss/heading.php" ; ?>
        
        <div class="main">
            <?php include "aelementss/sidebar.php" ; ?>
            <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX THE CONTENT MAINS AREA OF THE PAGE IS STARTING FROM HERE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
            <div id="newsid">
                <div id="upforms" style="position:relative ;">      
                    <?php
                    
                if(isset($_GET["password"])){
                    echo "<h3 class='success'>Password changed Successfully</h3><br>" ;
                }
                if(isset($_GET["update"])){
                    echo "<h3 class='success'>Profile updated Successfully</h3><br>" ;
                }
            

                ?>

                <a href="logout.php" style="color:white;background-color:#E60000;font-weight:bolder;padding:4px">Log Out</a>
                <a href="password.php" style="color:white;background-color:blue;font-weight:bolder;padding:4px">Change Password</a>
                <a href="album.php" style="color:white;background-color:green;font-weight:bolder;padding:4px" onclick="alert('How are u')">Photo Album</a>
                <!-- This is for Search Box -->
                <form action="searchresults.php" method="post" style="display:inline ;">        

                <input name="names" type="text" placeholder="type to search users ..." style="border-radius:4px ;padding:4px; border-right:0px;margin-right:0px;border:2px solid black;" autocomplete="off" id="searchfield">        
                <input name="save" type="submit" value="&#x1F50E;" style="padding:4px ;border-left : 0px;margin-left:0px;">
                <div id="liveareas"></div>         
                </form>
                <!-- Search Box Endings -->
                <div id="belowlinks" style="position:absolute;">

                <h1>Profile</h1>
                <h2 style=color:orange>This data is coming Through Session Variable</h2>
                <p>Hello <b><?php echo $_SESSION["name"]; ?></b>, how are you Today </p>
                <!--  <p>Email : <b><?php //echo $_SESSION["email"]; ?></b></p>
                <p>Contact : <b><?php //echo $_SESSION["contact"] ?></b></p>
                <p>Gender : <b><?php //echo $_SESSION["gender"] ?></b></p>
                <p>Hobbies : <b><?php //echo $_SESSION["hobbies"] ?></b></p>
                <p>Country : <b><?php //echo $_SESSION["country"] ?></b></p>  -->


                <h2 style=color:orange>This data is coming from Database</h2>
                <?php
                include "db_conn.php" ;

                $sqls= "SELECT * FROM users WHERE id='$_SESSION[id]';";
                $results= mysqli_query($conn,$sqls) or die("Query is not a correct");
                if(mysqli_num_rows($results)===1){
                    $row=mysqli_fetch_assoc($results);

                    //echo $row["name"] . "<br>";
                    //echo $row["email"] . "<br>";
                    //echo $row["contact"] . "<br>";
                    //echo $row["gender"] . "<br>";
                    //echo $row["hobbies"] . "<br>";
                    //echo $row["country"] . "<br><br>";
                    //echo "<a href='update.php' style=color:white;background-color:black>Update Data</a>";
                    
                }else{echo "Results not coming in num rows";}




                ?>
                <p>Name : <b><?php echo $row["name"]; ?></b></p>
                <p>Email : <b><?php echo $row["email"]; ?></b></p>
                <p>Contact : <b><?php echo $row["contact"] ?></b></p>
                <p>Gender : <b><?php echo $row["gender"] ?></b></p>
                <p>Hobbies : <b><?php echo $row["hobbies"] ?></b></p>
                <p>Country : <b><?php echo $row["country"] ?></b></p>
                <p>Profile Created : <b><?php echo $row["Dates"]; ?></b></p>
                <br><a href="update.php"><button class="button-30" role="button">Update Profile</button></a>
                </div>

                </div>

                <div id="profile">
                    <h2 style="text-align:left;margin-top:6%;">Profile Photo</h2>
                    <?php if (isset($_GET['error'])) { if($_GET['error']=1){ ?>

                    <p class="errors"><?php echo "Photo can not be empty , Please select a photo to upload " ;} ?></p>

                    <?php } ?>
                    <?php if(!isset($row["photo"])){ ?>
                        <img src="images/blank-profile.jpg" alt="blank_image" style="width:40%;height: 200px;"><br>
                        <?php }else{ ?>
                        <img src="image/<?php echo $row["photo"]; ?> " alt="Profile Photo" style="width:40%;height: 200px;">
                        <?php } ?>
                    <form action="photo.php" method="post" enctype="multipart/form-data">
                        <!--<label for="photo">Profile Photo</label><br>-->
                        
                        <input type="file" name="photo" id=""><br>
                        <input type="submit" name="upload" value= <?php if(!isset($row["photo"])){echo '"Upload Photo"';}else{echo '"Change Profile Photo"';} ?>>
                    </form><br>
                    <a href="removedp.php" style="color:white;background-color:#E60000;font-weight:bolder;padding:4px;width:130px;margin-top:10px;">Remove Photo</a>
                    
                </div>
                

            </div>


        </div>
    </div>
    


</body>

</html>

<?php
}else{
    header("Location: login.php") ;
}

?>