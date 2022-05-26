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
    $folder="albumsimages/".$filename ;
    $albumid= $_GET["albumid"]  ;   

    include "db_conn.php" ;
    $sqls="INSERT INTO photos (album_id,id,photo_names) VALUES ('$albumid','$_SESSION[id]','$filename')" ;       
    $photoresults=mysqli_query($conn,$sqls) or die("Query Failed") ;
    if(move_uploaded_file($tempname,$folder)){
        echo "Image uploaded successfully" ;
        header("Location:inside_album.php?albumid=$_GET[albumid]") ; 
    }else{
        echo "Failed to upload" ;
    }
}else{header("Location: addphoto.php?albumid=$_GET[albumid]&error=1");}
//}
    

}
?>