<?php 
//Password Change
if(!empty($crpass)&& !empty($pass)&& !empty($cpass)){
    include "db_conn.php" ;
    $sqls1="SELECT * FROM users WHERE id='$_SESSION[id]'" ;
    $results1=mysqli_query($conn,$sqls1) or die("Error in Query") ;
    if(mysqli_num_rows($results1)===1){
        $row=mysqli_fetch_assoc($results1);
    }else{echo "Result is not 1" ;}
    //Encrypting current password entered by the Users
    $enc_crpass=md5($crpass) ;
    if($row["password"]===$enc_crpass){
        //Here i am encrypt new password which will replace the current Passwords
        $encpass=md5($pass) ;
        //Main for Changing the Passwords
        $sqls2= "UPDATE users SET password='$encpass',confirm_password='$cpass' WHERE id='$_SESSION[id]'" ;
        $results2= mysqli_query($conn,$sqls2) or die("Error Changing the password in main query problem");
        echo "<span class='success'>Password is changed Successfully Heres</span>" ;
        header("Location: profile.php?password=1") ;

    }else{
        echo "<span class='errors'>*Current Password is not correct</span>";
    }
    

}else{
    echo "<span class='errors'>*Please enter all the required fields</span>" ;
}

?>