<?php 
session_start()  ;                    
include "db_conn.php" ;
$squli1= "SELECT * FROM albums WHERE album_id='$_GET[albumid]' AND id='$_SESSION[id]'" ;  
$results1= mysqli_query($conn,$squli1) or die("error is Queries ") ;      
if(mysqli_num_rows($results1)===1){

    $row=mysqli_fetch_assoc($results1) ;
    //First Deleting photos inside the album to saves our resources
    $squli4= "SELECT * FROM photos WHERE album_id='$row[album_id]' AND id='$_SESSION[id]'" ;
    $results4=mysqli_query($conn,$squli4) ;  
    if(mysqli_num_rows($results4)>0){
    $squli3= "DELETE FROM photos WHERE album_id='$row[album_id]' AND id='$_SESSION[id]'"  ;
    $results3=mysqli_query($conn,$squli3) or die("Error deleting the photos inside the albumss") ; }             
    
    $squli2= "DELETE FROM albums WHERE album_id='$row[album_id]' AND id='$_SESSION[id]'" ;
    $results2=mysqli_query($conn,$squli2) or die("Error in Deletings") ;
    header("Location: album.php")  ;      
    exit() ;     

}else{
    echo "Results is not equals to the One " ;   
}  


?>