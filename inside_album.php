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
        <title>Photoss </title> 
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="CSS/style.css">
    </head>

    <body>
        <div class="container">
            <?php include "aelementss/heading.php"; ?>

            <div class="main">
                <?php include "aelementss/sidebar.php"; ?>
                <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX THE CONTENT MAINS AREA OF THE PAGE IS STARTING FROM HERE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                <div class="news">
                    
                    <h1 style="color:orange; display:inline"> Photos inside albumcoding... of <?php echo $_SESSION["name"] ?> </h1>
                    <a href="album.php"><button class="button-30" role="button" style="float:right ;margin-bottom:5px">Albums</button></a>
                    <a href="addphoto.php?albumid=<?php echo $_GET["albumid"] ;  ?>"><button class="button-30" role="button" style="float:right ;margin-bottom:5px">➕ Add Photos</button></a>
                    <div class="photo_grid">
                        <?php

                        //Adding Dynamic Photo from the Albums from the Heres Databases
                        include "db_conn.php";
                        $squli1 = "SELECT * FROM photos WHERE id='$_SESSION[id]' AND album_id='$_GET[albumid]'";
                        $results1 = mysqli_query($conn, $squli1) or die("Error in the Heres Queries ");
                        if (mysqli_num_rows($results1) > 0) {


                            //echo "Albums Numbers is : ". mysqli_num_rows($results1)  ;  
                            while ($row = mysqli_fetch_assoc($results1)) { ?>
                                <div class="photo_grid_items" style="background-image:url('albumsimages/<?php echo $row["photo_names"] ; ?>') ;">

                               <!-- <img src="albumsimages/<?php //echo $row['photo_names']; ?>" alt="Image" >  -->
                                     
                                    <p style="text-align:center ; "> <?php echo $row["photo_id"]; ?></p>
                                    <a href="deletephoto.php?photoid= <?php echo $row['photo_id'] ; ?>" class="errors" style="position:absolute;bottom:0px;">Delete</a>


                                </div>

                            <?php } ?>

                        <?php } else {
                            echo "<h1>No Photos Found in This Album !</h1> ";
                        }



                        
                        
                        ?>


                    </div>



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
