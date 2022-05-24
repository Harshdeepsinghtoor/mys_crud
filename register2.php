<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA3PDTADaMDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEiEAAAAAAAESIQAAAAAAASIiEAAAAAASIiIQAAAAARIhEiEAAAABIhASIRAAAAERAAEiEQAAAAAAABIhEAAAAAAAASIRAAAAAAAAEiEQAAAAAAABIhEAAAAAAAASIgAAAAAAAAERAAAAAAAAAAD//wAA+f8AAPD/AADg/wAA4H8AAMB/AACAPwAAhB8AAI4PAAD/BwAA/4MAAP/BAAD/4AAA//AAAP/4AAD//wAA" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/style.css">
</head>

<?php 

?>
<body>
    <div class="container">
        <?php include "aelementss/heading.php" ; ?>
        
        <div class="main">
            <?php include "aelementss/sidebar.php" ; ?>
            
            <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX THE CONTENT MAINS AREA OF THE PAGE IS STARTING FROM HERE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
            <div class="news">
                <h1>Registration</h1>
                <!-- PHP Validation of the Forms -->
                <?php include "aelementss/reg_validations.php" ; ?>

                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <!--Names Field -->
                    <label for="fname">Full Name</label><br>
                    <input type="text" name="fullname" value="<?php echo $_POST['fullname'];?>">
                    <span class="errors">*<?php echo "$nameerr"; ?></span>
                    <br>
                <!--Emails Field -->
                    <label for="emails">Email</label><br>
                    <input type="text" name="email" id="emails" value="<?php echo $_POST['email'];?>">
                    <span class="errors">*<?php echo "$emailerr"; ?></span>
                <!--For Showing Already exists email errorss -->
                <?php if(isset($_GET['error'])){ ?> <span class="errors"> <?php echo $_GET['error'] ; ?></span>  <?php } ?>            
                <!--Ending the code For Showing Already exists email errorss -->
                    <br>
                <!--Contact Field -->
                    <label for="phone">Contact number</label><br>
                    <input type="tel" name="contact" id="phone" value="<?php echo $_POST['contact'];?>">
                    <span class="errors">*<?php echo "$contacterr"; ?></span>

                    <br>
                <!--Password Field -->
                    <label for="pass">New Password</label><br>
                    <input type="password" name="npass" id="pass">
                    <span class="errors">*<?php echo "$passerr"; ?></span>
                    <br>
                <!--Cpass Field -->
                    <label for="cfmpass">Confirm Password</label><br>
                    <input type="password" name="cpass" id="cfmpass">
                    <span class="errors">*<?php echo "$cpasserr"; ?></span>
                    <br><br>
                    <!--Genders Field -->
                    <label for="abc">Select your gender</label>
                    <span class="errors">*<?php echo "$gendererr"; ?></span>
                    <br>
                    <input type="radio" name="gender" value="male" <?php echo($_POST['gender'] == 'male' ? 'checked': ''); ?>>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="female"<?php echo($_POST['gender'] == 'female' ? 'checked': ''); ?>>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="other" <?php echo($_POST['gender'] == 'other' ? 'checked': ''); ?>>
                    <label for="other">Other</label>
                    <br><br>
                    <!--Hobbies Field -->
                    <label for="defgh">Choose your hobbies</label>
                    <span class="errors">*<?php echo "$hobbieserr"; ?></span>
                    <br>
                    <input type="checkbox" name="hobby[]" id="hobby1" value="cricket" <?php if(in_array("cricket",$_POST['hobby'])){echo 'checked';}else{echo '';}  ?>>
                    <label for="hobby1">Cricket</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby2" value="music" <?php if(in_array("music",$_POST['hobby'])){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby2">Music</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby3" value="dance" <?php if(in_array("dance",$_POST['hobby'])){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby3">Dance</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby4" value="travel" <?php if(in_array("travel",$_POST['hobby'])){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby4">Travel</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby5" value="reading" <?php if(in_array("reading",$_POST['hobby'])){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby5">Reading</label>
                    <br><br>
                    <!--Country Field -->
                    <label for="country">Choose your country</label>
                    <span class="errors">*<?php echo "$countryerr"; ?></span>
                    <br>
                    <select name="country" id="country">
                        <option value="none" selected disabled hidden>Select an Option</option>
                        <option <?php if($_POST["country"]=="INDIA"){ ?> selected="true" <?php }; ?> value="INDIA">India</option>
                        <option <?php if($_POST["country"]=="AMERICA"){ ?> selected="true" <?php }; ?> value="AMERICA">America</option>
                        <option <?php if($_POST["country"]=="RUSSIA"){ ?> selected="true" <?php }; ?> value="RUSSIA">Russia</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Submit" name="save">

                </form><?php  include 'savedata.php';
               // echo $success;
                
                
                    //if(isset($_POST["save"])){
                        //echo $_REQUEST["fullname"]. "<br>";
                        //echo $_REQUEST["age"] . "<br>";
                        //echo $_REQUEST["email"] . "<br>";
                        //echo $_REQUEST["password"] . "<br>";
                    //}
                    //echo "Hello World";
                    //echo "Hello World GG";
                    //print_r($_POST);

?>
                

            </div>


        </div>
    </div>
    


</body>

</html>
