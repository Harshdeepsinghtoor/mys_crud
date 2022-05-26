<?php 

session_start()  ;                  
include "db_conn.php" ;
$squli1= "SELECT * FROM photos WHERE photo_id='$_GET[photoid]'" ;  
$results1= mysqli_query($conn,$squli1) or die("error is Queries ") ;      
if(mysqli_num_rows($results1)===1){

    $row=mysqli_fetch_assoc($results1) ;
    
    $squli2= "DELETE FROM photos WHERE photo_id='$row[photo_id]' AND id='$_SESSION[id]'" ;
    $results2=mysqli_query($conn,$squli2) or die("Error in Deletings") ;
    header("Location: inside_album.php?albumid=$row[album_id]")  ;      
    exit() ;     

}else{
    echo "Results is not equals to the One " ;   
}  

?>