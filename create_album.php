<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['name'])) {
    //print_r($_SESSION) ;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Album </title>
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="CSS/style.css">
    </head>

    <body>
        <div class="container">
        <?php include "aelementss/heading.php" ; ?>
        
        <div class="main">
            <?php include "aelementss/sidebar.php" ; ?>
                <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX THE CONTENT MAINS AREA OF THE PAGE IS STARTING FROM HERE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                <div class="news">
                    <?php 
                    //Validations of the Create Album
                    $nameerr= $descriptionerr= "" ;
                    $albname= $albdescription= "" ;

                    //Validation of the Album Names
                    if(isset($_POST["save"])){
                        if(empty($_POST["albname"])){
                            $nameerr = "Album Name can not be empty" ;

                        }else{
                            $albname= $_POST["albname"] ;
                        }
                        //Validations of the Album Description
                        if(empty($_POST["albdescription"])){

                            $descriptionerr = "Album Desctiption is required " ;
                        }elseif(mb_strlen($_POST["albdescription"])<10){
                            $descriptionerr = " Please Enter Atleast 10 Characters " ;
                        }else{

                            $albdescription = $_POST["albdescription"] ;
                        }
                        


                    }
                    
                    ?>
                    <h1 style="color:orange; display:inline"> Create New Album </h1>
                    <a href="album.php"><button class="button-30" role="button" style="float:right ;margin-bottom:5px">&#128064; View Albums</button></a>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="albname">Album Name</label><br>
                <input name="albname" type="text" value="<?php echo $albname ; ?>">
                <span class="errors">*<?php echo $nameerr ; ?></span>
                <?php 
                // Givings message for the Albums names already 

                if(isset($_GET["alreadyy"])){ ?>
                <span class="errors"><?php echo "Album name already existed please enter a new names" ; ?></span> 
                <?php    } //Ending is Heres  ?>      
                <br><br>
                <label for="albdescription">Album Description</label><br>
                <textarea name="albdescription" rows="06" cols="28" placeholder="Album Description ..."></textarea>
                <span class="errors">*<?php echo $descriptionerr ; ?></span><br><br>
                <input name="save" type="submit" value="Create Album">
                </form>
                <?php 
                include "create_album_data.php"  ; 

                ?>
                    

                    
                    
                </div>


            </div>
        </div>



    </body>

    </html>

<?php
} else {
    header("Location: login.php");
}

?>