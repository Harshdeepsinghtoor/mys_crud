<?php 
session_start();
if(isset($_POST["upload"])){
    if(!empty($_FILES["photo"]["name"])){
    //if($_FILES["photo"]["error"]=4){
        //header("Location: profile.php?error=photo can not be empty");
        //exit() ;
        //die("photo can not be empty") ;
    //}else{
    print_r($_FILES) ;
    $filename=$_FILES["photo"]["name"] ;
    $tempname=$_FILES["photo"]["tmp_name"] ;
    $folder="image/".$filename ;

    include "db_conn.php" ;
    $sqls="UPDATE users SET photo='$filename' WHERE id='$_SESSION[id]'" ;
    $imgresults=mysqli_query($conn,$sqls) or die("Query Failed") ;
    if(move_uploaded_file($tempname,$folder)){
        echo "Image uploaded successfully" ;
        header("Location: profile.php") ; 
    }else{
        echo "Failed to upload" ;
    }
}else{header("Location: profile.php?error=1");}
//}
    

}
?>