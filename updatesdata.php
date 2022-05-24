<?php 
session_start();
include "db_conn.php" ;
$uphobbiesarray=implode("-",$uphobbies) ;
echo $upname;echo $upemail;echo $upcontact;echo $upgender;
echo $uphobbiesarray;echo $upcountry ;
//$upname=$_POST["upname"];
//$upemail=$_POST["upemail"];
//$upcontact=$_POST["upcontact"];
/*if(empty($upname)){
    header("Location: update.php?error=Name can not be empty");
    exit() ;
}elseif(empty($upemail)){
    header("Location: update.php?error=Email can not be empty");
    exit() ;
}elseif(empty($upcontact)){
    header("Location: update.php?error=Contact can not be empty") ;

}else{*/
    if(!empty($upname)&& !empty($upemail)&& !empty($upcontact)&& !empty($upgender)&& !empty($uphobbiesarray)&& !empty($upcountry)){
    
    $sqls="UPDATE users SET name='$upname',email='$upemail',contact='$upcontact',gender='$upgender',hobbies='$uphobbiesarray',country='$upcountry' WHERE id='$_SESSION[id]';" ;
    $results=mysqli_query($conn,$sqls) or die("error in Queries");
    
    header("Location: profile.php?update=1") ;
    }

    ob_end_flush();
//}
?>