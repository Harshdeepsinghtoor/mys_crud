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
        <title>Search Results </title>
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

                    <!-- This is for Search Box -->
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" style="display:inline ;">

                        <input name="names" type="text" placeholder="type to search users ..." value="<?php echo $_POST['names'] ;  ?>" style="border-radius:4px ;padding:4px; border-right:0px;margin-right:0px;">
                        <input name="save" type="submit" value="&#x1F50E;" style="padding:4px ;border-left : 0px;margin-left:0px;">
                    </form>
                    <!-- Search Box Endings -->
                    <!-- Writing Codes for getting the search Results  -->
                    <?php
                    if (isset($_POST["save"])) {
                        if (empty($_POST["names"])) {
                            header("Location: profile.php");
                        } else {
                            include "db_conn.php";
                            $squli1 = "SELECT id,name,country,photo FROM users WHERE name LIKE '%$_POST[names]%'";
                            $results1 = mysqli_query($conn, $squli1) or die("Error in Queries ");
                            if (mysqli_num_rows($results1) > 0) {
                                echo "<h3>".mysqli_num_rows($results1) . " Results Are Found...  </h3>";      
                            } else {
                                echo "<h3>No Results Found !</h3>";         
                            }
                            while($row=mysqli_fetch_assoc($results1)){ ?>

                                 <div style="position:relative;">
                                 <?php if(isset($row["photo"])){ ?>
                                     <img src="image/<?php echo $row['photo'] ; ?>" alt="Users Photos" style="height:50px ;width:50px ;object-fit:contain ;">

                                 <?php }else{ ?>
                                    <img src="images/blank-profile.jpg" alt="Users Photos" style="height:50px ;width:50px ;object-fit:contain ;">         
                                 <?php } 
                                 ?>
                                 
                                <p style="display:inline ;position:absolute;top:0px;"><?php echo $row["name"] ; ?></p>       
                                <span><?php echo "from: ". $row["country"] ; ?></span>    
                                </div>
                                <hr>          
                                        


                            <?php
                            }
                        }
                    }

                    ?>
                    <!-- Endings Heres Writing Codes for getting the search Results  -->


                    
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