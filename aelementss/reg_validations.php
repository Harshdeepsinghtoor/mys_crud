<?php   ob_start();
                //Starts from Here 
                $nameerr= $emailerr= $contacterr= $passerr= $cpasserr= $gendererr= $hobbieserr= $countryerr="";
                $name= $email= $contact= $pass= $cpass= $gender= $hobbies= $country="";
                $success= $unsuccess= "" ;
                
                //PHP for Name
                //THIS IS EXPERIMENT STARTING
                //if($_POST["fullname"]!=null && $_POST["email"]!=null && $_POST["contact"]!=null && $_POST["npass"]!=null &&  $_POST["cpass"]!=null && $_POST["gender"]!=null && $_POST["hobby"]!=null &&  $_POST["country"]!=null){
                //THIS IS THE EXPERIMENT ENDING
                if (isset($_POST["save"])) {
                if (empty($_POST["fullname"])) {
                    $nameerr="Name field is required";
                    
                }/*elseif(!preg_match ("/^[a-zA-z]*$/", $_POST["fullname"]) )
                {
                    $nameerr= "Only Alphabets are allowed in the Names";
                }*/ 
                else{
                    $name=$_POST["fullname"];
                }
                //PHP for Email
                if (empty($_POST["email"])) {
                    $emailerr="Email field is required";
                }elseif(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) ===false)
                {
                    $emailerr="Please Enter valid Email";
                }
                else{
                    $email=$_POST["email"];
                }
                //PHP for Contact
                if (empty($_POST["contact"])) {
                    $contacterr= "Contact Field is required";
                }elseif(mb_strlen($_POST["contact"])<10||mb_strlen($_POST["contact"])>10){
                    $contacterr= "Contact shoulds be of 10 characters";
                }else{
                    $contact=$_POST["contact"];
                }
                //PHP for Passwords
                if (empty($_POST["npass"])) {
                    $passerr= "Password field is required";
                }elseif(mb_strlen($_POST["npass"])<8){
                    $passerr= "Please Enter minimum eight characters";

                }else{
                    $pass=$_POST["npass"];
                }
                //PHP for CPass
                if (empty($_POST["cpass"])) {
                    $cpasserr= "Please enter confirm Password";
                }elseif($_POST["npass"]!==$_POST["cpass"]){
                    $cpasserr= "Confirm Password is not matching";
                }else{
                    $cpass=$_POST["cpass"];
                }
                //PHP for Gender
                if (empty($_POST["gender"])) {
                    $gendererr= "Gender Field is required";
                }else{
                    $gender=$_POST["gender"];
                }
                //PHP for Hobbies
                if (empty($_POST["hobby"])) {
                    $hobbieserr= "Hobbies Field is required";
                }else{
                    $hobbies=$_POST["hobby"];
                }
                //PHP for Country
                if (empty($_POST["country"])) {
                    $countryerr= "Country Field is required";
                }else{
                    $country=$_POST["country"];
                }
                //if(isset($name) && $name!=""){$success= "Name is not Empty <br>";}
                //HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH
                }

                //THIS IS EXPERIMENT STARTING
              //  echo "<pre>";
                //print_r($_POST);
                //echo $_POST["hobby"];
             //   echo "</pre>";
                //}else{echo "<span class=errors>Please fill the required fields</span>";};
                    //THIS IS THE EXPERIMENT ENDING

                //Ending Here
                ?>