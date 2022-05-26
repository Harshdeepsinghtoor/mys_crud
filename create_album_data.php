<?php

if(isset($_POST["save"])){
if(!empty($albname)&& !empty($albdescription)){
echo $albname. "<br>" ;
echo $albdescription. "<br>" ;
include "db_conn.php"  ;
$sql1 = "SELECT * FROM albums WHERE id='$_SESSION[id]' AND albname='$albname' " ;
$results1= mysqli_query($conn, $sql1) ;
if(mysqli_num_rows($results1)>0){
    header("Location: create_album.php?alreadyy=1") ;
    exit() ;
}else{
$squli1="INSERT INTO albums(id,albname,albdescriptionss) VALUES ('$_SESSION[id]','$albname','$albdescription')" ;
$results2= mysqli_query($conn,$squli1) or die("Error in the queries") ;
header("Location:album.php?albcrtd=1") ;
}
}
}
?>