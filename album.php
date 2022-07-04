<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['name'])) {
    //print_r($_SESSION) ;
?>
    <!DOCTYPE html>
    <html lang="en">
<?php //s ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Album </title>
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

                    <h1 style="color:orange; display:inline"> Albums of <?php echo $_SESSION["name"] ?> </h1>
                    <?php
                    //Success Message for album created


                    if (isset($_GET["albcrtd"])) { ?>
                        <h3 class="success" style="display:inline;margin-left:70px"> <?php echo "Album Created Successfully !";  ?> </h3>
                    <?php   } ?>
                    <a href="create_album.php"><button class="button-30" role="button" style="float:right ;margin-bottom:5px">➕ Create New Album</button></a>
                    <div class="album_grid">
                        <?php

                        //Adding Dynamic Albums from the Heres Databases
                        include "db_conn.php";
                        $squli1 = "SELECT * FROM albums WHERE id='$_SESSION[id]' ORDER BY albname";
                        $results1 = mysqli_query($conn, $squli1) or die("Error in the Heres Queries ");
                        if (mysqli_num_rows($results1) > 0) {


                            //echo "Albums Numbers is : ". mysqli_num_rows($results1)  ;  
                            while ($row = mysqli_fetch_assoc($results1)) { ?>
                                <div class="album_grid_items">

                                <a href="inside_album.php?albumid=<?php echo $row["album_id"] ;   ?>" id="albumlinks"><h2 style="text-align:center ; "> <?php echo $row["albname"]; ?></h2> </a>  
                                    <p style="text-align:center ; "> <?php echo $row["albdescriptionss"]; ?></p>
                                    <a href="deletealbum.php?albumid=<?php echo $row["album_id"] ;   ?>" class="errors" style="position:absolute; bottom:0px;" onclick="return confirm('Are you sure ?')">Delete Album</a>         


                                </div>

                            <?php } ?>

                        <?php } else {
                            echo "<h1>Harsh</h1> ";
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
