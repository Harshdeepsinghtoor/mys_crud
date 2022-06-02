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
        <title>Update</title>
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
                    <h1> Update Your Profile</h1>
                    

                    <?php ob_start();
                    //Validating Updates data like the registration validations
                    $nameerr=$emailerr=$contacterr=$gendererr=$hobbiesarr=$countryerr=""  ;
                    $upname= $upemail= $upcontact= $upgender= $uphobbies= $upcountry="";

                    if(isset($_POST["updates"])){
                        //For Name validations
                        if(empty($_POST["upname"])){
                            $nameerr="Name field is required " ;
                        }else{
                            $upname=$_POST["upname"] ;
                        }
                        //For email validations

                        if(empty($_POST["upemail"])){
                            $emailerr="Email field is required" ;
                        }elseif(filter_var($_POST["upemail"],FILTER_VALIDATE_EMAIL) ===false){
                            $emailerr="Please enter a valid Email" ;

                        }else{
                            $upemail=$_POST["upemail"] ;

                        }
                        //For contact validations
                        if(empty($_POST["upcontact"])){
                            $contacterr="Contact filed is required" ;
                        }elseif(mb_strlen($_POST["upcontact"])<10||mb_strlen($_POST["contact"])>10){
                            $contacterr="Contact should be of 10 characters long " ;

                        }else{
                            $upcontact=$_POST["upcontact"] ;

                        }
                        //For gender validations
                        if(empty($_POST["upgender"])){
                            $gendererr="Gender filed is required" ;
                        }else{

                            $upgender=$_POST["upgender"] ;
                        }
                        //For hobbies validations 
                        if(empty($_POST["hobby"])){
                            $hobbiesarr="Hobbies filed is required" ;
                        }else{
                            $uphobbies=$_POST["hobby"] ;
                        }
                        //For Country validations
                        if(empty($_POST["upcountry"])){
                            $countryerr=" Country filed is also required  " ;
                        }else{

                            $upcountry=$_POST["upcountry"] ;
                        }



                    }
                    
                    ?>
                    <?php if (isset($_GET['error'])) { ?>

                        <p class="errors"><?php echo $_GET['error']; ?></p>

                    <?php } ?>
                    
                    <?php 
                    include "db_conn.php" ;
                    $squli= "SELECT * FROM users WHERE id='$_SESSION[id]'" ;
                    $results= mysqli_query($conn,$squli) or die("Query is not a correct") ;
                    if(mysqli_num_rows($results)===1){

                        $row=mysqli_fetch_assoc($results) ;
                        // Exploding hobbies check boxes to check alwayss
                        //echo $row['hobbies'] ;
                        $hoarr= explode('-',$row['hobbies']) ;
                        //print_r($hoarr)  ;  
                    }

                    
                    ?>

                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <label for="upname">Name</label><br>
                        <input name="upname" type="text" value="<?php echo $row['name']; ?>">
                        <span class="errors">*<?php echo "$nameerr"; ?></span><br><br>
                        <label for="upemail">Email</label><br>
                        <input name="upemail" type="text" value="<?php echo $row['email']; ?>">
                        <span class="errors">*<?php echo "$emailerr"; ?></span><br><br>
                        <label for="upcontact">Contact</label><br>
                        <input name="upcontact" type="text" value="<?php echo $row['contact'] ?>">
                        <span class="errors">*<?php echo "$contacterr"; ?></span><br><br>
                        <label for="upgender">Gender</label>
                        <span class="errors">*<?php echo "$gendererr"; ?></span><br>
                        <input type="radio" name="upgender" value="male" <?php echo($row['gender'] == 'male' ? 'checked': ''); ?>>
                    <label for="male">Male</label>
                    <input type="radio" name="upgender" value="female"<?php echo($row['gender'] == 'female' ? 'checked': ''); ?>>
                    <label for="female">Female</label>
                    <input type="radio" name="upgender" value="other" <?php echo($row['gender'] == 'other' ? 'checked': ''); ?>>
                    <label for="other">Other</label><br><br>

                    <label for="hobbies">Hobbies</label>
                    <span class="errors">*<?php echo "$hobbieserr"; ?></span><br>
                    <?php //echo $row["hobbies"] ; ?>
                    <?php //$hobbyarr=explode("-", $row['hobbies']);echo $hobbyarr ; ?>
                    <input type="checkbox" name="hobby[]" id="hobby1" value="cricket" <?php if(in_array("cricket",$hoarr)){echo 'checked';}else{echo '';}  ?>>
                    <label for="hobby1">Cricket</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby2" value="music" <?php if(in_array("music",$hoarr)){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby2">Music</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby3" value="dance" <?php if(in_array("dance",$hoarr)){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby3">Dance</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby4" value="travel" <?php if(in_array("travel",$hoarr)){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby4">Travel</label><br>
                    <input type="checkbox" name="hobby[]" id="hobby5" value="reading" <?php if(in_array("reading",$hoarr)){echo 'checked';}else{echo '';} ?>>
                    <label for="hobby5">Reading</label><br><br>

                    <label for="country">Country</label>
                    <span class="errors">*<?php echo "$countryerr"; ?></span><br>
                    <select name="upcountry" id="country">
                        <option value="none" selected disabled hidden>Select an Option</option>
                        <option <?php if($row["country"]=="INDIA"){ ?> selected="true" <?php }; ?> value="INDIA">India</option>
                        <option <?php if($row["country"]=="AMERICA"){ ?> selected="true" <?php }; ?> value="AMERICA">America</option>
                        <option <?php if($row["country"]=="RUSSIA"){ ?> selected="true" <?php }; ?> value="RUSSIA">Russia</option>
                    </select><br><br>
                    


                        

                        <input name="updates" type="submit" value="Update Profile">
                        <button type="button" onclick="javascript:history.back()">Cancel</button>
                        <p>To change password please <a href="password.php" style="color:blue">click here</a></p>
                    </form>
                    <?php include "updatesdata.php" ; ?>




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