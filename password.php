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
        <title>Change Password </title>
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
                    <h1> Change Password </h1>
                    <?php 
                    $crerr= $passerr= $cpasserr= "" ;
                    $crpass= $pass = $cpass = "" ;
                    //Validations is starting from Here
                    if(isset($_POST["changes"])){
                    //Validations of the Confirm Password
                    if(empty($_POST["current_password"])){
                        $crerr= "Current Password is required Here " ;

                    }else{
                        $crpass=$_POST["current_password"] ;
                    }
                    //Validations for the New Passwordss
                    if(empty($_POST["pass"])) {
                        $passerr= "New Password is required";
                    }elseif(mb_strlen($_POST["pass"])<8){
                        $passerr= "Please enter minimum eight characters " ;
                    }else{
                        $pass= $_POST["pass"] ;
                    }
                    //Validations for the Confirm Passwordsss
                    if(empty($_POST["cpass"])){
                        $cpasserr= "Please enter Confirm Passwords " ;
                    }elseif($_POST["cpass"]!==$_POST["pass"]){
                        $cpasserr= "Confirm Password is not matching " ;
                    }else{
                        $cpass= $_POST["cpass"] ;
                    }


                    }
                    
                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <label for="current_password">Current Password</label><br>
                        <input name="current_password" type="password">
                        <span class="errors">*<?php echo "$crerr"; ?></span><br><br>
                        <label for="pass">New Password</label><br>
                        <input name="pass" type="password">
                        <span class="errors">*<?php echo "$passerr"; ?></span> <br><br>
                        <label for="cpass">Confirm New Password</label><br>
                        <input name="cpass" type="password">
                        <span class="errors">*<?php echo "$cpasserr"; ?></span> <br><br>
                        <input name="changes" type="submit" value="Change Password"><br>



                    </form>
                    <?php 
                    include "password_change.php" ;
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