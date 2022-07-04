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
    <title>Friends</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>

<body>
    <div class="container">
        
    <?php include "aelementss/heading.php" ; ?>
        
        <div class="main">
            <?php include "aelementss/sidebar.php" ; ?>
            <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX THE CONTENT MAINS AREA OF THE PAGE IS STARTING FROM HERE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
            <div id="newsid">
                <div id="upforms" style="position:relative ;">      
                    
                
                <div id="belowlinks" style="position:absolute;">

                
                <?php
                include "db_conn.php" ;

                $sqls= "SELECT * FROM users WHERE id='$_GET[id]';";
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
                <!-- Experimentingss the code to convert into dayss -->
                <?php
                $dateOfBirth = $row["Dates"];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                $daysago=$diff->format('%a').' days ago';
                ?>
                <h1 style="color:Orange ;"><?php echo $row["name"]; ?></h1>
                <p>Name : <b><?php echo $row["name"]; ?></b></p>
                <p>Email : <b> <i class="fa fa-envelope"></i>  <?php echo $row["email"]; ?></b></p>
                <p>Contact : <b> <i class="fa fa-phone-square" style="font-size:16px"></i>  <?php echo $row["contact"] ?>   </b></p>     
                <p>Gender : <b> <i class="fa fa-<?php if($row['gender']=='male'){echo 'male';}else{echo 'female';} ?>"></i>  <?php echo $row["gender"] ?></b></p>
                <p>Hobbies : <b> <img src="images/painting.png" alt="Image" style="width:16px ;height:16px ;">  <?php echo $row["hobbies"] ?></b></p>
                <p>Country : <b>  <i class="fa fa-home"></i> <?php echo $row["country"] ?>   </b></p>
                <p>Profile Created : <b> <i class="fa fa-calendar"></i>  <?php echo $row["Dates"].' ('. $daysago . ')'; ?>   </b></p>       
                <br><a href="#"><button class="button-30" role="button"> <pre>Send Request </pre> <img src="images/icons8-add-user-group-man-man-50.png" alt="Imagess" width="18px" height="18px"> </button></a>     
                <a href="#"><button class="button-30" role="button"><pre>Message </pre>  <i class="fa fa-send-o"></i>       </button></a>
                
                </div>
                </div>

                <div id="profile">
                    <h2 style="text-align:left;margin-top:6%;">Profile Photo</h2>
                    <?php if(!isset($row["photo"])){ ?>
                        <img src="images/blank-profile.jpg" alt="blank_image" style="width:40%;height: 200px;"><br>
                        <?php }else{ ?>
                        <img src="image/<?php echo $row["photo"]; ?> " alt="Profile Photo" style="width:40%;height: 200px;">
                        <?php } ?>
                    
                    
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