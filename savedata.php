<?php     


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$uname=$name;
$uemail=$email;
$ucontact=$contact;
$unpass=$pass;$encunpass=md5($unpass) ;
$ucpass=$cpass;
$ugender=$gender;
//For not showing the implode arguments error
if(!empty($hobbies)){
$uhobby=implode("-",$hobbies);}
$ucountry=$country;


if(!empty($name)&& !empty($email)&& !empty($contact)&& !empty($pass)&& !empty($cpass)&& !empty($gender)&& !empty($hobbies)&& !empty($country))
 {
    $conn=mysqli_connect("localhost","root","Teamwebethics3!!!","project1")or die("Connection Error");
    //experiment of email showing email errors

    $squli = "SELECT email FROM users WHERE email='$uemail'" ;
    $exresults = mysqli_query($conn,$squli);
    if(mysqli_num_rows($exresults)>0){
      header("Location: register2.php?error=Email ID already Registered Please Log In To Continue") ;
      exit () ;
    }else{

    

    //experiments ending of showing email errors
    $sqls="INSERT INTO users(name,email,contact,Password,Confirm_password,Gender,Hobbies,Country) VALUES('{$uname}','{$uemail}','{$ucontact}','{$encunpass}','{$ucpass}','{$ugender}','{$uhobby}','{$ucountry}')";
    mysqli_query($conn,$sqls) or die("Error in Queryies");

    $success= "<h3 style=color:green;>Data Entered Successfully</h3> <br>";
    header('Location:welcome.php?msg='.$success);
    }

    }
                 else{
                    $unsuccess= "Please enter all the required fields" ;
                                    
                  
                }





//mysqli_close($conn);
  //die(header("Location: welcome.php"));
  
  ob_end_flush();

?>
    
